var i = 0;
var ti;
$(function(){
	$('.lb1').eq(0).show().siblings().hide();
	 showtime();
	$('.li').hover(function(){
		i = $(this).index();
		show();
		clearInterval(ti);
	},function(){
		showtime();
	});

	$('.lbt1').click(function(){
		clearInterval(ti);
		if (i==0) {
			i=2;
		}
		i--;
		show();
		showtime();
	});

	$('.lbt2').click(function(){
		clearInterval(ti);
		if (i==1) {
			i=-1;
		}
		i++;
		show();
		showtime();
	})
})

function show(){
	//eq()某元素的下标;fadeIn()淡入动画效果，fadeOut()淡出动画效果
	$('.lb1').eq(i).fadeIn().siblings().fadeOut();
	//
	$('.li').eq(i).addClass('abc').siblings().removeClass('abc');

}

function showtime(){
	ti = setInterval(function(){
		i++;
		if (i==1) {
			i=0;
		}
		show();
	},3000);
}