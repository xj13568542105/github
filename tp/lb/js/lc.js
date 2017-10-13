// alert('讨鬼传！');
var len = $('li').length;

for (var i = 0; i <len; i++) {
	if (i == len-1) {
		var did = 'a1';
	}else{
		var did = 'a'+(i+1);
	}
	run(did,i);
}
function run(did ,i){
	$($('li')[i]).click(function(){
		abc(did,i);
	});
}

function abc(id,val){
	var num = $('#'+id).offset().top;
	$('li').removeClass('aa');
	$($('li')[val]).addClass('aa');
	$('body','html').animate({scrollTop:num})
}