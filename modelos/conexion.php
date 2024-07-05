<?php
/**
 * 
 */
class conexion
{
	static public function conectar(){

		$con = new PDO("mysql:host=localhost;dbname=parroquia;charset=utf8","root",""); 
		//$con->exec("set name utf-8");
		return $con;
	}
}