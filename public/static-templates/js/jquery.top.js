/*
    jquery.top.js	
	
	Fumiya Sakai(Just One Factory)
	
*/
$(function(){
	$("#ticker").ticker({
 		cursorList:  "_",
 		rate: 100,
 		delay: 6000
	}).trigger("play");
});