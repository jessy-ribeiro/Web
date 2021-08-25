// JavaScript Document

$('.banner').slick({
	dots:true,
	fade:true,
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 2000,
});

$('.historia').slick({
	dots: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 5000,
});

//menu fixo 
window.onscroll = function(){
	var top = window.pageYOffset || document.documentElement.scrollTop;
	if(top > 400){
		document.getElementById("topo-fixo").classList.add("menu-fixo");
		console.log("CHEGOU em 400");
	}else{
		document.getElementById("topo-fixo").classList.remove("menu-fixo");
	} // fim menu fixo
}

new WOW().init(); 