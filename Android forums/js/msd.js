i=0;
window.onload=function() {
	setTimeout(func,2000);
};

function func(){
	var id=["#1","#2","#3","#4","#5"];
	var src=["src/1.png","src/2.png","src/3.png","src/4.png","src/5.png"];
	$(id[i]).attr("src",src[i]);
	i++;
	setTimeout(func,2000);
}