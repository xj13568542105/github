var timer;
var i = 0 ;
var li_leng = $('li').length; //获取LI 标签的长度

$(document).ready(function(){

	$('.img').eq(0).show().siblings('.img').hide();
	showTime();

	$('li').hover(function(){

		i = $(this).index();  // 这里的THIS  是当前的对象 INDEX 获取当前节点的元素

		xianshi(); 

		clearInterval(timer);  
		//清除定时器  图片轮播停止

		$('li').stop(true,true);
		$('.img').stop(true,true);	

	},function(){

		showTime();

	})


	$('.img').hover(function(){

		i = $(this).index();  // 这里的THIS  是当前的对象 INDEX 获取当前节点的元素

		xianshi(); 

		clearInterval(timer);  
		//清除定时器  图片轮播停止
		$('li').stop(true,true);

		$('.img').stop(true,true);	

	},function(){

		showTime();

	})

	$('.button1').click(function(){

		clearInterval(timer);

		if ( i == 0 ) {

			i = li_leng;
		}

		i--;

		xianshi();
		showTime();
	})

	$('.button2').click(function(){

		clearInterval(timer);

		if ( i == li_leng-1) {

			i = -1;
		}

		i++;

		xianshi();
		showTime();
	})
	
})




function showTime(){
  // 定时器 

	timer = setInterval(function(){   
		
		xianshi();

		i++; 

		if ( i == li_leng ) {
				//等于最大值返回第一张图片
			i = 0;
		}

	},1500);


}

function xianshi(){

	$('.img').eq(i).fadeIn(1000).siblings('.img').fadeOut(1000);
	$('li').eq(i).addClass('ys').siblings('li').removeClass('ys');

}

