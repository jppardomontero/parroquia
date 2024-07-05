<?php
/**
 * 
 */
class conexion
{
	static public function conectar(){

		$con = new PDO("mysql:host=bjpmy2p7n0gzzbckcbc2-mysql.services.clever-cloud.com;dbname=bjpmy2p7n0gzzbckcbc2;charset=utf8","uwt1xowivxiy1bfg","ku7Q7BZWmoVZAFkH8NqS"); 
		//$con->exec("set name utf-8");
		return $con;
	}
}