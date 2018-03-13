import pymysql
import os
from PIL import Image
import numpy as np
import scipy
import scipy.cluster
import scipy.misc
import django
from django.conf import settings
from multiprocessing import Pool
import sys
from color import ColorNames
import time
import mandrill
sys.path.append(os.path.dirname(os.path.dirname(os.path.abspath(__file__))))
env = os.path.dirname(os.path.dirname(os.path.abspath(__file__))) + "/environ"
with open(env,"r") as f:
    for line in f.readlines():
        line = line.split('=')
        env = line[1].strip('"')
conf = "Exifdata.settings."+ env
os.environ.setdefault('DJANGO_SETTINGS_MODULE',conf)
BASE_DIR = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
CURR_DIR = os.path.dirname(os.path.abspath(__file__))
django.setup()
IMAGES_PATH1 = "/mnt/share/destreviewimages/"
IMAGES_PATH2 = "/mnt/share/resortreviewimages/"


def sendmail(text):
    MANDRILL_API_KEY = 'hlKxJxcw5Ef7yV3FbvSTyA'
    data = "Number of imges processed: " + str(text)
    mandrill_client = mandrill.Mandrill(MANDRILL_API_KEY)
    message = {'from_email': 'noreply@holidayiq.com',
               'from_name': 'Exif-extraction scheduler',
               'to': [{
                   'email': 'ajith@holidayiq.com',
                   'name': 'ajith',
                   'type': 'to'
               }],
               'subject': "Exif-extraction progress",
               'text': data
               }

    result = mandrill_client.messages.send(message=message)
    return result

def top_colors(im):
    NUM_CLUSTERS = 3
    ar = np.asarray(im)
    shape = ar.shape
    ar = ar.reshape(scipy.product(shape[:2]), shape[2]).astype(float)
    codes, dist = scipy.cluster.vq.kmeans(ar, NUM_CLUSTERS)
    vecs, dist = scipy.cluster.vq.vq(ar, codes)
    counts, bins = scipy.histogram(vecs, len(codes))
    counts = scipy.sort(counts)[::-1][:3]
    countindex = scipy.argsort(counts)[::-1][:3]
    total_sum = np.sum(counts)
    top_colors = []
    for i in range(0,3):
        peak = codes[countindex[i]]
        color_name = ColorNames.findNearestWebColorName(peak)
        top_colors.append([color_name,int(round((counts[i]/total_sum)*100))])
    return top_colors

def rgb_propotions(image):
    image = image.resize((150, 150))
    rgb = image.getcolors(150 * 150)
    columns_sum = [0, 0, 0]
    total_sum = 0
    for count, color in rgb:
        total_sum += sum(color)
        columns_sum[0] += color[0]
        columns_sum[1] += color[1]
        columns_sum[2] += color[2]
    for i in range(0, len(columns_sum)):
        columns_sum[i] = round(((columns_sum[i] / total_sum) * 100))
    return columns_sum

def get_dominant_color(rgb_prp):
    if rgb_prp[0] > rgb_prp[1]:
        if rgb_prp[0] > rgb_prp[2]:
            return "Red"
        else:
            return "Green"
    else:
        if rgb_prp[1] > rgb_prp[2]:
            return "Green"
        else:
            return "Blue"

def get_properties(row):
    id = row[0]
    name = row[1]
    type = row[2]
    data = []
    data.append(id)
    if type == "A" or type == "D":
        IMAGES_PATH = IMAGES_PATH1
    else:
        IMAGES_PATH = IMAGES_PATH2
    try:
        image = Image.open(IMAGES_PATH + name)
        width, height = image.size
        data.append(width)
        data.append(height)
        image = image.resize((150,150))
        rgb_prp = rgb_propotions(image)
        dominant_color = get_dominant_color(rgb_prp)
        data.append(dominant_color)
        top_color = top_colors(image)
        for score in rgb_prp:
            data.append(score)
        for color in top_color:
            data.append(color[0])
            data.append(color[1])
        try:
            insert = "insert into photo_upload_meta_data(photo_id,width,height,dominant_colour,red_score,green_score,blue_score,colour1,colour1_score,colour2,colour2_score,colour3,colour3_score) values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)	"
            cursor.execute(insert, data)
            print(id,name, "updated")
        except:
            print(id, name, "mysql error")
    except:
        print(id, name, type, "image not found")


if __name__ == "__main__":
    starttime = time.time()
    connection = pymysql.connect(host=settings.MYSQL_HOST, user=settings.MYSQL_USER, passwd=settings.MYSQL_PWD,
                                 database=settings.MYSQL_DB, autocommit=True)
    cursor = connection.cursor()
    maxid = "select max(photo_id) from photo_upload_meta_data"
    cursor.execute(maxid)
    maxid = cursor.fetchone()
    data = "select Photo_id, Image_name, Type from photo_upload where Status = 'A' and photo_id > %s limit 500"
    cursor.execute(data, maxid)
    rows = cursor.fetchall()
    p = Pool(4)
    p.map(get_properties, rows)
    p.close()
    p.join()
    endtime = time.time()
    data = "select count(id) from photo_upload_meta_data"
    cursor.execute(data)
    processed = cursor.fetchone()
    cursor.close()
    connection.close()
    print("Time taken", endtime - starttime)
    sendmail(text=processed[0])