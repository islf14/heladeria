<?php
	function conectar(){
		$server="localhost";
		$bd="heladeria";
		$user="root";
		$pass="123456";

		$conexion=new mysqli($server,$user,$pass,$bd);

		if($conexion->connect_error){
			die ($conexion->connect_error);		
		}
		return $conexion;
	}
?>