/**
 * 
 */
$("document").ready(function(){
    $(".clSlider").touchSlider({
        duration: 350,	// スライドスピード
        delay: 8000,	// スクロールスピード
        margin: 5,	// 枠線
		namespace: "touchslider",
		next: ".touchslider-next",
		pagination: ".touchslider-nav-item",
		currentClass: "touchslider-nav-item-current",
		prev: ".touchslider-prev",
        mouseTouch: true,	//マウスタッチイベントを有効
        autoplay: true	//自動再生
    });
});