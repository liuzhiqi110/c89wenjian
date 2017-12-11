<?php

namespace houdunwang\model;

class Model
{
	 //建立一个普通call方法,
	public function __call ( $name , $arguments )
	{
		p($name);die;
		//__call这个方法要有返回值,所以要return，$name是
		return self ::runParse ( $name , $arguments );
	}
	//建立一个静态call方法,
	public static function __callStatic ( $name , $arguments )
	{
		return self ::runParse ( $name , $arguments );
	}

	public static function runParse ( $name , $arguments )
	{
		return call_user_func_array ( [ new Base , $name ] , $arguments );
	}
}

