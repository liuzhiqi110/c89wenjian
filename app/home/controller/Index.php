<?php

namespace app\home\controller;

use houdunwang\core\Controller;
use houdunwang\model\Model;
use houdunwang\view\View;

class Index extends Controller {
	public function index(){
		//echo 'index';
		/*********第一步************/
		//实力化View类，调用make方法
		//下一步该去View(在哪看命名空间)类里面找make方法
		//View中没有make方法，那么这个时候会触发__call方法
		//__call方法调用View类中runParse方法
		//runParse方法：实例化Base调用make方法
		//(new View())->make();
		//View中没有make方法，那么这个时候会触发__callStatic方法
		//__call方法调用View类中runParse方法
		//runParse方法：实例化Base调用make方法
		//View::make();
		/*********第二步,解决变量************/
		$a = 1;
		$data = ['name'=>'后盾人','age'=>10];
		//分配变量时候使用compact函数
		//能把数据变成什么样，一定要打印：compact ('data')
		//函数：把变量变成数组下标
		//变量值变成下标对应的值
		//p(compact ('data','a'));die;
		//return View::with();
		return View::with(compact ('data','a'))->make();
		//View::make()->with();
		/*********第三步：封装model************/
		//测试获取数据库所有数据
		//$data = Model::getAll();
		//测试Model类中e和q方法是否有效
		//$res = Model::q('select * from student');
		//p($res);
		/*********第四步：测试读取配置项数据************/
		//读取配置项数据
		//c    config
		//$res = c('database');
		//p($res);
		//$res = c('database.driver');
		//p($res);

	}


	public function add(){
		View::make();
	}


}