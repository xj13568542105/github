<?php 
namespace app\index\Controller;

use think\Controller;
use think\Db;
use Api\api_demo\SmsDemo;
use app\index\model\Music;
use think\Session;
// use thinkphp\library\think\Paginator;

header('content-type:text/html;charset=utf-8');

class home extends Controller {
	// public function index(){
	// 	$res = commodity::get(1);
	// 	$res = $res->setd_idAttr(6);
	// 	dump($res);
	// }

	function homepage(){
		$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);

		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);

		$page = $list->render();
		
		$man = Music::numad();


		$this->assign('man',$man);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('homepage');

	}
	function detail(){
		$res = Music::daohang();
		
		$this->assign('res',$res);
        $sid = $_GET['sid'];
        // var_dump($sid);
		$nid = $_GET['nid'];

		$res = Db::table('commodity')->where('d_id',$nid)->select();
		
		$this->assign('re',$res);
        $list = Db::table('information')->where('id',$sid)->select();
        // var_dump($list);die;
        // $list = Music::detail($sid);
        $this->assign('information',$list);

        // $xx = Music::detail($sid,true);
        $xx = DB::table('pattern')->where('s_id',$sid)->select();
        // var_dump($xx);die;
        $this->assign('xxs1',$xx);
        
        $this->assign('xx',$xx);
		$man = Music::numad();


		$this->assign('man',$man);
		//对应每个小分类中查出所有的数据.
		
		return $this->fetch('detail');
	}
	function index(){	
		$res = Music::daohang();
		

		$this->assign('res',$res);

		$man = Music::numad();


		$this->assign('man',$man);

		return $this->fetch('index');
	}
	function clothes(){
		//输出导航栏内容
		$res = Music::daohang();
		$this->assign('res',$res);

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		// var_dump($arr);die;
		$this->assign('arr',$arr);

		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);

		$page = $list->render();
		
		$man = Music::numad();


		$this->assign('man',$man);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('clothes');
	}
	function album(){

		$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);

		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);

		$page = $list->render();
		$this->assign('res',$res);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		// $nid = $GET['nid'];
		$man = Music::numad();


		$this->assign('man',$man);


		return $this->fetch('album');
	}
	function cosmetics(){
		$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);
		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);

		$man = Music::numad();


		$this->assign('man',$man);


		$page = $list->render();
		$this->assign('res',$res);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('cosmetics');
	}
	function food(){
		$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);
		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);




		$man = Music::numad();


		$this->assign('man',$man);
		$page = $list->render();
		$this->assign('res',$res);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('food');
	}
	function phone(){
		$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);
		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);




		$man = Music::numad();


		$this->assign('man',$man);




		$page = $list->render();
		$this->assign('res',$res);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('phone');
	}
	function appliance(){
		$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);
		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);

		$page = $list->render();



		$man = Music::numad();


		$this->assign('man',$man);





		$this->assign('res',$res);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('appliance');
	}
	function car(){
		$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);
		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);

		$page = $list->render();


		$man = Music::numad();


		$this->assign('man',$man);

		$this->assign('res',$res);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('car');
	}
	function store(){
    	$res = Music::daohang();

		$nid = $_GET['nid'];
		//查出小分类
		$vad = Music::xiashu($nid,true);
		// dump($vad);die;
		$this->assign('vad',$vad);
		//查出大分类数据
		$arr = Music::xiashu($nid);
		
		$this->assign('arr',$arr);
		//对应每个小分类中查出所有的数据.
		$list = Music::shuju($nid);
		//调用了分页方法
		$page = $list->render();

		$man = Music::numad();//这是商品数目


		$this->assign('man',$man);
		$this->assign('res',$res);
		$this->assign('information',$list);
		$this->assign('page',$page);
		
		$this->assign('nid',$nid);
		return $this->fetch('store');
	}
	
	function warranty(){
		$res = Music::daohang();
		$man = Music::numad();


		$this->assign('man',$man);
		$this->assign('res',$res);
		return $this->fetch('warranty');
	}

	function shopHelpNotice(){
		$res = Music::daohang();
		$man = Music::numad();


		$this->assign('man',$man);
		$this->assign('res',$res);
		return $this->fetch('shopHelpNotice');
	}
	function Shopping(){
		$res = Music::daohang(); //导航

		$man = Music::numad();//数目


		$arr = Music::shangd();

		$list = $arr['shoda'];
		$page = $list->render();

		$sum = $arr['sum'];







		$this->assign('sum',$sum);
		$this->assign('list',$list);
		$this->assign('page',$page);
		$this->assign('man',$man);
		$this->assign('res',$res);
		return $this->fetch('Shopping');
	}

	function information(){
		 if (isset($_POST['yica'])) {

		 	
		 	$user = $_POST['user'];
		 	$from = $_POST['from'];
		 	$email = $_POST['email'];
		 	$mail = $_POST['mail'];
		 	$yica = $_POST['yica'];




		 	$xia = Music::ookder($user,$from,$email,$mail,$yica);
		 	// echo $xia;die;
		 	if ($xia) {
		 		
		 	
		 	$aoo = Music::information();

		 	$data = ['code' => 200,'data'=>$aoo];
		 	echo json_encode($data);die;
		 }elseif($xia == false){
		 	$data = ['code' => 400,'data'=>false];
		 	echo json_encode($data);die;
		 }elseif ($xia == 405) {
		 	$data = ['code' => 405,'data'=>false];
		 	echo json_encode($data);die;
		 }



		 }elseif(isset($_POST['fid'])){
		 	$fid = $_POST['fid'];
		 	$infora = Music::information($fid);

		 	$data = ['code'=>200,'data'=>$infora];
		 	echo json_encode($data);die;
		 }


		 $arr = Music::shangd();
		 $list = $arr['shoda'];   //商品展示逻辑
		 // $page = $list->render();
		 // var_dump($list);die;
		 $num = $arr['sum'];
		

		$res = Music::daohang();
		$man = Music::numad();

		$order = Music::information();
		

		$this->assign('list',$list);
		$this->assign('num',$num);
		


		$this->assign('order',$order);
		$this->assign('man',$man);

		$this->assign('res',$res);
		return $this->fetch('information');
	}

    
	function zhuce(){


		$name = $_POST['mall'];
		$g = "/^1[34578]\d{9}$/";
		if (!preg_match($g,$name)) {
			echo 3;
		}



	   	$pwd = $_POST['password'];
 
		$n = preg_match_all("/^[a-zA-Z\d_]{8,}$/",$pwd,$array); 

		if (!$n) {
			echo 4;
		}
		$pas = md5($pwd);
		$num = $_POST['num'];
		$user = Music::zc($name,$pas);
		
		if ($user) {
			echo 1;
		}else{
			Music::zc($name,$pas,false);
			$use = Music::zc($name,$pas);
			$uid = $use['uid'];
			Session::set('uid',$uid);
			echo 2;
		}
		
	}
	function denglu(){

		$user = $_POST['login'];
		
		$pwd = md5($_POST['pwd']);
		$user =  Music::zc($user,$pwd);
		$uid = $user['uid'];

		if ($user) {
			Session::set('uid',$uid);
			echo 1;
		}else{
			echo 2;
		}
	}

	function app(){
		//require_once  dirname(__DIR__).'/../../Api/api_demo/SmsDemo.php';
		$mall = $_POST['mall'];
		$num = rand(100000,999999);
		$demo = new SmsDemo(
							    "LTAIdHDSEOanx0Of",
							    "R5S9Br2DJgzutcIhfHVAuVlitKMpfB"
							);
		echo "SmsDemo::sendSms\n";
		$response = $demo->sendSms(
    "百汇商城", // 短信签名
    "SMS_96865031", // 短信模板编号
    $mall, // 短信接收者
    Array(  // 短信模板中字段的值
        "code"=>$num,    
    )
   
	);

	if ($response) {
		echo 1 ;
	}

}

	public function detailAjax(){
        
        $res = $_POST['add'];
        
		$arr = [
			'code' 	=> 200,
			'data'	=> $res,
			'success' => true
		];

		return json_encode($arr);


	}




	public function shoppinga(){


		if ( isset($_POST['sid']) && isset($_POST['snum'])) {
			
		

		$sid = $_POST['sid']; //获取到当前商品的id

		$snum = $_POST['snum']; //加入购物车的数量

		$res = MUsic::shopa($sid,$snum);

		echo $res;
	}elseif (isset($_POST['did'])) {
		$did = $_POST['did'];
		$db = Music::mosd($did);


		
		echo json_encode($db);
	}elseif (isset($_POST['fid'])) {
		$fid = $_POST['fid'];
		$mos = Music::mosd($fid,true);
		echo json_encode($mos);
	}

	}


}
?>