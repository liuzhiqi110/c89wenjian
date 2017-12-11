<?php

namespace houdunwang\model;

use Exception;
use PDO;

class Base
{
	private static $pdo = null;

	public function __construct ()
	{
		//1.连接数据库
		if ( is_null ( self ::$pdo ) ) {
			$this -> connect ();
		}
	}

	public function getAll ()
	{
		echo 'getAll';
	}

	/**
	 * 连接数据库
	 */
	private function connect ()
	{
		try {
			$dsn        = c('database.driver').":host=".c('database.host').";dbname=".c('database.dbname');
			$user       = c('database.user');
			$password   = c('database.password');
			self ::$pdo = new PDO( $dsn , $user , $password );
		} catch ( Exception $e ) {
			exit( $e -> getMessage () );
		}
	}

	//执行有结果集的查询
	//select
	public function q ( $sql )
	{
		try {
			//执行sql语句
			$res = self ::$pdo -> query ( $sql );

			//将结果集取出来
			return $res -> fetchAll ( PDO::FETCH_ASSOC );
		} catch ( Exception $e ) {
			die( $e -> getMessage () );
		}
	}

	//执行无结果集的sql
	//insert、update、delete
	public function e ( $sql )
	{
		try {
			return self ::$pdo -> exec ( $sql );
		} catch ( Exception $e ) {
			//输出错误消息
			die( $e -> getMessage () );
		}
	}
}