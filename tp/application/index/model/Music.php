<?php

namespace app\index\model;
use think\Model;
use think\Db;
use think\Request;
class Music extends Model{
 	//大分类的model层
 static public function daohang(){
 	$res = DB::table('commodity')->select();
 	return $res;

 }
 //商品分类的model层
 static public function xiashu($val,$arr=false){
 	if ($arr != false ) {
 		$mas = DB::table('class')
 	->alias('a')
 	->join('small_class c','a.id = c.cid','right')
 	->where('a.d_id',$val)
 	->select();
 	return $mas;
 	}else{
 		$arr = DB::table('class')->where('d_id',$val)->select();
 		return $arr;
 	}
 	

 }
//商品动态输出的model层
 static public function shuju($val,$num=NULL){
 	$list = DB::table('class')
 	->alias('a')
 	->join('small_class c','a.id = c.cid')
 	->join('information d','c.x_cid = d.s_id')
 	->join('spxq2 e','d.content = e.content_id')
 	->where('a.d_id',$val)
 	->paginate(20, false);
     
 
 	return $list;
 }

 //登录注册的model层
static public function zc($name,$pwd,$val = true){
	if ($val == true) {
		return DB::table('use')->where(['user'=>$name])->where(['password'=>$pwd])->find();
	}elseif($val == false){
		$data = ['user'=>$name,'password'=>$pwd];
		$app =  Db::name('use')->insert($data);

		return $app;
	}
}

//执行商品的查询model方法
static public function shal($val = NULL){
	$uid = session('uid');
	if ($val != NULL) {

		$sho = DB::table('shopping')->where('uid',$uid)->where('sid',$val)->find();
		return $sho;
	}
	
}



static public function shopa($sid,$snum){
	$shp = DB::table('information')->where('id',$sid)->find(); //通过传入的id查询商品的信息

	$uid = session('uid');// 登录时所得到的用户id

	$sho = Music::shal($sid);


	
	//查询出数据库有没有这条商品信息
	if ($sho) {
		$sum = $sho['snum']; //计算出商品原数目;
		$suma = $sho['suma'];//计算出商品原总价格
		$money = $sho['mona']*$snum+$suma;//将商品的原价格加上最新数目的价格得出新的总价格;
		$shangpin = $shp['shangpin'];
		if ($sum+$snum>$shangpin) {
			return json_encode(400);die;
		}


		$numa = DB::table('shopping')->where('spi',$sid)->where('uid',$uid)->update(['snum' => $sum+$snum,'suma' => $money ]);//在原商品上更新数目和价格;

		$man =  Music::numad();
		$json = ['code' => 200,
				'data' => $man];

		return json_encode($json);
	}else{
		$title = $shp['imsrc'];   //图片路径
		$content = $shp['title'];//图片解释
		$mona  = $shp['money']; //商品单价
		$suma = $mona*$snum; //商品总价

		$data = ['title'=>$title,'content'=>$content,'snum'=>$snum,'mona'=>$mona,'suma'=>$suma,'uid'=>$uid,'spi'=>$sid];
		$mood = DB::table('shopping')->insert($data);
		$man = Music::numad();
		$json = ['code' => 200,
				'data'=> $man];
		return json_encode($json);
	}


}
//计算出商品数目的model方法
static function numad(){
	$uid = session('uid');
	$man = DB::table('shopping')->where('uid',$uid)->count();
	return $man;
} 
// 循环的去查询购物车内的商品的model方法
static function shangd(){
	$uid = session('uid');
	$shoda = DB::table('shopping')->where('uid',$uid)->paginate(5); 

	$sum = DB::table('shopping')->where('uid',$uid)->sum('suma');

	$arr = ['shoda' => $shoda,'sum'=>$sum];
	return $arr;
}

//商品表的输出
static function infor($val){
	$res = DB::table('information')->where('id',$val)->find();
	return $res;
}

//购物车内数量的加减model层
static function mosd($did,$jian = false){

	$uid =  session('uid');

	$mosdd = Music::shal($did);

	$snum = $mosdd['snum'];//商品数目

	
	$suma = $mosdd['suma']+$mosdd['mona'];//加的商品价格
	$sama =  $mosdd['suma']-$mosdd['mona'];//减得商品价格
	$aid = $mosdd['spi'];

	$res = Music::infor($aid);
	$num = $res['shangpin'];
	if ($snum>$num) {
		$data = ['code' => 401,'data' => $snum];
		return $data;
	}

	if ($jian == false) {
		$arr = [
		'snum'=>$snum+1,
		'suma'=>$suma
		];
		$db = DB::table('shopping')->where('uid', $uid)->where('sid' , $did)->update($arr);
	}elseif ($jian == true) {
		if ($snum<=1) {
		return ['code' =>402,'data' =>$snum];
	}
		$arr = ['snum' => $snum-1,'suma' => $sama];
		$db = DB::table('shopping')->where('uid', $uid)->where('sid' , $did)->update($arr);

	}
	
	$mosd = Music::shal($did);

	

	$sum = Music::sum();

	$data = ['code' => 200,
			'data' => $mosd['snum'],
			'sum' => $sum,
			'suma' =>$mosd['suma']
	];



	return $data;
}

//计算商品总价的model层
static public function sum(){
	$uid = session('uid');
	$sum = DB::table('shopping')->where('uid',$uid)->sum('suma');
	return $sum;
}


//商品下单地址的model层
static  function information($val = NULL){
	$uid = session('uid');
		if ($val == NULL) {
				
			$order = DB::table('order')->where('uid',$uid)->order('fid desc')->select();

			
		}else{
			$order = DB::table('order')->where('uid',$uid)->where('fid',$val)->find();
		}
			
		return $order;
	
			
	

}

//下单地址的增加的model层
static function ookder($user,$from,$email,$mail,$fid){
	$uid = session('uid');
		
	$ab = DB::table('order')->where('user',$user)->where('from',$from)->where('email',$email)->where('mail',$mail)->where('fid',$fid)->find();
			if ($ab) {
				return 405;die;
			}
	if ( $fid > 0 ){
		
		// echo $fid;die;
		$orderd = DB::table('order')->where('uid',$uid)->where('fid',$fid)->update([
				'user'=>$user,
				'from'=>$from,
				'email'=>$email,
				'mail'=>$mail
				]);
				
			return $orderd;die;

	}else{
		

		
		$add = DB::table('order')->where('uid',$uid)->count();
		if ($add >= 3) {
			return false;die;
		}
		$data = [
				'user'=>$user,
				'from'=>$from,
				'email'=>$email,
				'mail'=>$mail,
				'uid' =>$uid
			];
			$orderd = DB::table('order')->insert($data);
			return $orderd;die;

		}		

		
		
		
}














































}























?>