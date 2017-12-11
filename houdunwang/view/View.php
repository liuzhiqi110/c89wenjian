<?php

namespace houdunwang\view;
class View
{
	     //建立一个普通call的方法,
	public function __call ( $name , $arguments )
	{
		p($name);die;//make
		//p($arguments);
		return self ::runParse ( $name , $arguments );
	}

	public static function __callStatic ( $name , $arguments )
	{
		//p($arguments);die;
		return self ::runParse ( $name , $arguments );
	}

	public static function runParse ( $name , $arguments )
	{
		//p($arguments);die;
		//(new Base)->$name($arguments);
		return call_user_func_array ( [ new Base , $name ] , $arguments);
	}

}