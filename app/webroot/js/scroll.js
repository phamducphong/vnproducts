/**
 * 
 */
var convas, ctx, R;
var Dig = 0;
var img = new Image();
img.src = "nhatrang.jpg";
function init() {
	convas = document.getElementById("canvasBd");
	ctx = convas.getContext("2d");
	rotation();
}
function rotation() {
	Dig = (Dig + 1) % 360;
	ctx.fillStyle = 'rgba(0, 0, 0, 0)';
	ctx.fillRect(0, 0, convas.width, convas.height);
	ctx.clearRect(0, 0, convas.width, convas.height);
	ctx.save();
	ctx.translate(convas.width/2, convas.height/2);
	R = Dig/180*Math.PI;
	ctx.rotate(R);
	ctx.translate(-img.width/2, -img.height/2);
	ctx.drawImage(img, 0, 0);
	ctx.restore();
}
$(function(){
	init();
	var windowH = $('#scrollArea').innerHeight();
    $(window).scroll(function(){
    	rotation();
		var bodyH = $(window).height();
        var scroll = Math.floor($(this).scrollTop());
        var scrollAll = scroll + bodyH;
        if( windowH <= scrollAll){
        	$(window).scrollTop(0,0);
        }
    });
});