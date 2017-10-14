$('#mit').click(function(){

	var mall = $('#mall').val();
	var password = $('#password').val();
	var num = $('#num').val();
	if(mall!=""&&password!=""&&num.length==4){  
	$.ajax({
		type:'POST',
		url:"zhuce",
		datatype:'JSON',
		data:{
			"mall":mall,
			"password":password,
			"num":num
		},
		success:function(data){
			
			console.log(data);
   if (data ==1) {
   		alert("该用户已存在！请换一个用户名注册。");
   }else if(data ==2){
   		alert("注册成功！");
   		window.location.href="index";    
   }else if(data ==3){
   		alert('请输入正确的手机号码');
   }else if(data == 4){
   	alert('密码至少八位以上');
   }
		},
		error:function(){
			alert('错误');
		}

	})
}else{
	alert('请检查您的输入');
}
})

$('#submit').click(function(){
	var login = $('#text').val();
	var pwd = $('#pwd').val();
	if (text != '' && pwd != '') {
		$.ajax({
				type:"POST",  
                url:"denglu",  
                dataType:"JSON",  
                data:{  
                    "login":login,  
                    "pwd":pwd  
                    
                },  
                success:function(data){
                console.log(data);
                 if (data == 1) {
                 	window.location.href="";  
                 }else if(data ==2){
                 	alert('用户名或密码错误!');
                 }






                }







		})
	}else{
		alert('请检查您的输入');
	}
})





$('#huoqu').click(function(){
	var mall = $('#mall').val();
	if (mall.length == 0) {
		alert('请输入手机号');
	}else{
		var pattern = /^1[34578]\d{9}$/;
		
		if (!pattern.test(mall)) {
			alert('请输入正确的手机号码');
		}else{
			$.ajax({
				type:"POST",
				url:"app",
				datatype:"JSON",
				data:{
					"mall":mall
				},
				success:function(data){
					alert(data);
				}
			})
		}
	}
	
})



   function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }


$('#gwc').click(function(){

	var sid = getUrlParam('sid'); //获取到当前商品的id

	var img =$('#imga').attr('src');

	var title = img.substring(22); //获取到当前商品的路径

	var content = $('#poacxd').text();//商品介绍

	var snum = $('#value').val(); //加入购物车的数量

	var mon = $('#money').text();

	var money = mon.substring(1);  //获取到商品的单价


	$.ajax({
		type:"POST",
		url:"shoppinga",
		datatype:"JSON",
		data:{
			"sid":sid,
			"snum":snum
		},
		success:function(data){
			var JSON = new Function("return" + data)();
			
			if (JSON.code == 200) {
				$('#smanum').text(JSON.data);
				alert('添加购物车成功');
			}else if (JSON.code == 400) {
				alert('商品已经没有库存啦');
			}
		 }
	})


})


$('#saddg').click(function(){
	var user = $.trim($('#userd').val());  
	
	var from = $.trim($('#fromd').val());  
	var email = $.trim($('#emaild').val());  
	var mail = $.trim($('#maild').val());  

	var po =  /^[\u4E00-\u9FA5]{1,6}$/;

	var ue = po.test(user); //用户名验证

	var fo = from.length//地址的长度



	var reg =   /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

 	var em = reg.test(email); // 邮箱验证

 	var  li =  /^1[34578]\d{9}$/; 

 	var ma = li.test(mail);//电话验证

 	//var yica = $('#yica').val(); // 检测是修改该是更新由值来确定.

	if ( ue && fo != '' &&  em && ma)  {
		
		$.ajax({
			type:"POST",
			url:"information",
			datatype:"JSON",
			data:{
				"user":user,
				"from":from,
				"email":email,
				"mail":mail

			},
			success:function(data){
				var JSON = new Function("return" + data)();
				if (JSON.code == 200) {
					$('.address').html(JSON.data);
				}




			},
			error:function(){
				alert('失败');
			}
		})



	}else{
		alert('请检查您的输入');
	}


})


$('#saddpad').click(function(){
	var user = $.trim($('#users').val()); 
	var from = $.trim($('#froms').val());  
	var email = $.trim($('#emails').val());  
	var mail = $.trim($('#mails').val());  

	var po =  /^[\u4E00-\u9FA5]{1,6}$/;

	var ue = po.test(user); //用户名验证

	var fo = from.length//地址的长度

	var yica = $('#yica').val();

	var reg =   /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

 	var em = reg.test(email); // 邮箱验证

 	var  li =  /^1[34578]\d{9}$/; 

 	var ma = li.test(mail);//电话验证




	if ( ue && fo != '' &&  em && ma &&  yica != '')  {
		
		$.ajax({
			type:"POST",
			url:"information",
			datatype:"JSON",
			data:{
				"user":user,
				"from":from,
				"email":email,
				"mail":mail,
				"yica":yica
				
			},
			success:function(data){
				// alert(data);
				var JSON = new Function("return" + data)();

				if (JSON.code == 200) {
					$('.address').empty();
					$.each(JSON.data, function(i, item){ 
						
						var from = '<li class="liia" id = "poc'+item.fid+'" onclick="bord('+item.fid+')" type="none"><div class="tita"><span class="wo">'+item.user+'</span><span class="wr">'+item.mail+'</span> </div><p class="test"><span class="J_code">'+item.email+'</span> <br/><br/><span>'+item.from+'</span> <a title="修改地址" id="dian'+item.fid+'" onclick="xiugai('+item.fid+')">修改地址</a> </p></li>';

                    	
                        $('.address').append(from);
                        
						　　});
					$('.foaa').hide();

				}else if(JSON.code == 400){
					alert('最多只能添加3个下单地址');

				}else if (JSON.code == 405) {
					alert('下单地址内容一致，请重新修改');
				}
			},
			error:function(){
				alert('失败');
			}
		})



	}else{
		alert('请检查您的输入');
	}


})



function xiugai(i){
	var dian = 'dian'+i;

	var attr = $('#'+dian).attr('id');

	var fid = attr.substr(4);

	$.ajax({
		type:"POST",
		url:"information",
		datatype:"JSON",
		data:{
			"fid":fid
		},
		success:function(data){
			var JSON = new Function("return" + data)();
			if (JSON.code == 200) {
				$('#users').val(JSON.data.user);
				$('#froms').val(JSON.data.from);
				$('#emails').val(JSON.data.email);
				$('#mails').val(JSON.data.mail);
				$('#yica').val(JSON.data.fid);
				$('#tiaajia').text('修改地址');
				$('.foaa').show();
				
			}
			
		}
	})





}

function bord(i){
	var poc = 'poc'+i;
	var ocp = $('#'+poc).attr('id');
	var fid = ocp.substr('3');
	
	// var user = 
	$.ajax({
		type:"POST",
		url:"information",
		datatype:"JSON",
		data:{
			"fid":fid
		},
		success:function(data){
			var JSON = new Function("return" + data)();
			if (JSON.code == 200) {
				$('#'+poc).css({'border':'2px solid #e24565'});
				$('#'+poc).siblings().css({'border':'1px solid gray'});
				$('#use').val(JSON.data.fid);
				
			}else{
				alert(JSON.code);
			}
			


		},
	})
}




$('#queding').click(function(){

	var user = $('#use').val();
	
	if (user != '') {
		}
	})

	}else{
		alert('请选择下单地址');
	}












})











