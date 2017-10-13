
var i = 0;
var ti;
$(function(){
	$('.a1').eq(0).show().siblings().hide();
	 showtime();
	$('li').hover(function(){
		i = $(this).index();
		show();
		clearInterval(ti);
	},function(){
		showtime();
	});

	$('.b1').click(function(){
		clearInterval(ti);
		if (i==0) {
			i=7;
		}
		i--;
		show();
		showtime();
	});

	$('.b2').click(function(){
		clearInterval(ti);
		if (i==6) {
			i=-1;
		}
		i++;
		show();
		showtime();
	})
})

function show(){
	//eq()某元素的下标;fadeIn()淡入动画效果，fadeOut()淡出动画效果
	$('.a1').eq(i).fadeIn().siblings().fadeOut();
	//
	$('li').eq(i).addClass('abc').siblings().removeClass('abc');

}

function showtime(){
	ti = setInterval(function(){
		i++;
		if (i==6) {
			i=0;
		}
		show();
	},3000);
}