<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    // public function index()
    // {
    // 	return view('user');
        
    // }
    // function user(){
    // 	// echo '<a href="app.html">跳转</a>';
    // 	// $res = db('a')->where('title','like','%不%')->select
    // 	// ();
    // 	// dump($res);
    // 	// $arr['data'] = $res;

    	

    // }
    // function app(){
    // 	return view();
    // }
    // function mode(){
    // 	$a = input('post.','','','htmlspecialchars');
    // 	$user = $a['user'];
    // 	$pwd = $a['pwd'];
    // 	$res = db('user')->where('username',$user)->where('pwd',$pwd)->find();
    // 	if ($res) {
    // 		$this->success('登录成功,正在为您跳转...','view');
    // 	}else{
    // 		$this->error('登录失败');
    // 	}

    // }
    // function view(){
    // 	return view('app');
    // }

     public function index(){
        $list = Db::table('navigation_tb')->paginate(3);
        // dump($list);
       $page = $list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch('user');
        // return view('user');


    }









}
