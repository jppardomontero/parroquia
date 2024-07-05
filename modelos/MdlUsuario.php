<?php

require_once ("conexion.php");


 class ModeloUsuario
 {
 	
 	static public function mdlBuscarUsuario($username, $password, $parroquia) 
 	{
 		
 		$stm = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE username=:user AND password=:pass AND id_parroquia = :parroquia");
 		$stm -> bindParam(":user", $username, PDO::PARAM_STR);
 		$stm -> bindParam(":pass", $password, PDO::PARAM_STR);
 		$stm -> bindParam(":parroquia", $parroquia, PDO::PARAM_INT);
 		$stm->execute();
 		return $stm->fetch();
 	}

	 // Modelo para mostrar datos de persona
	 static public function mdlMostrarUsuario($parametros, $datos){

        if($parametros!=null){
			
            $stm = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE id=:datos");
 		    $stm -> bindParam(":datos", $datos, PDO::PARAM_INT);
			$stm->execute();
 			return $stm->fetch();

        }else{

			if ($_SESSION['rol'] == 1){
            	$stm = conexion::conectar()->prepare("SELECT usuarios.id, usuarios.cedula, usuarios.nombres_apellidos,
				usuarios.correo, usuarios.tipo_empleado, usuarios.username, usuarios.estado, usuarios.telefono, usuarios.password,
				parroquias.nombre AS parroquia, roles.rol, usuarios.rango FROM usuarios
				INNER JOIN parroquias ON parroquias.id = usuarios.id_parroquia
				INNER JOIN roles ON roles.id = usuarios.id_rol");
 		
            	$stm->execute();
            	return $stm->fetchAll();
			}else{
				$stm = conexion::conectar()->prepare("SELECT usuarios.id, usuarios.cedula, usuarios.nombres_apellidos,
				usuarios.correo, usuarios.tipo_empleado, usuarios.username, usuarios.estado, usuarios.telefono, usuarios.password,  
				parroquias.nombre AS parroquia, roles.rol,usuarios.rango FROM usuarios
				INNER JOIN parroquias ON parroquias.id = usuarios.id_parroquia
				INNER JOIN roles ON roles.id = usuarios.id_rol
				where roles.id <> 1");
            	$stm->execute();
            	return $stm->fetchAll();
			}
        }

       
    }

	static public function mdlGuardarUsuario($tabla, $datos){

		
        $stm = conexion::conectar()->prepare("INSERT INTO $tabla (cedula, nombres_apellidos, correo, telefono, tipo_empleado, username, password, estado, id_rol, id_parroquia, rango) VALUES(:cedula, :nombres_apellidos, :correo, :telefono, :tipo_empleado, :username, :password, :estado, :id_rol, :id_parroquia, :rango)");
        $stm -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stm -> bindParam(":nombres_apellidos", $datos["nombres_apellidos"], PDO::PARAM_STR);
        $stm -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stm -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stm -> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
        $stm -> bindParam(":username", $datos["username"], PDO::PARAM_STR);
        $stm -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stm -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stm -> bindParam(":id_rol", $datos["id_rol"], PDO::PARAM_INT);
        $stm -> bindParam(":id_parroquia", $datos["id_parroquia"], PDO::PARAM_INT);
        $stm -> bindParam(":rango", $datos["rango"], PDO::PARAM_STR);
        

		
        
        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

	static public function mdlMostrarUsuarioSacerdote($datos){	
			
        $stm = conexion::conectar()->prepare("SELECT id, nombres_apellidos  FROM usuarios WHERE id_parroquia=:id_parroquia AND tipo_empleado=:tipo_empleado AND estado = :estado");
		$stm -> bindParam(":id_parroquia", $datos["parroquia"], PDO::PARAM_INT);
		$stm -> bindParam(":tipo_empleado", $datos["sacerdote"], PDO::PARAM_STR);
		$stm -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stm->execute();
 		return $stm->fetchAll();
		 
	}

	static public function mdlModificarUsuario($tabla, $datos){

      
        $stm = conexion::conectar()->prepare("UPDATE $tabla SET  nombres_apellidos=:nombres_apellidos, correo=:correo, telefono=:telefono, tipo_empleado=:tipo_empleado, password=:password, estado=:estado, id_rol=:id_rol, id_parroquia=:id_parroquia, rango=:rango WHERE id=:id");
       
        $stm -> bindParam(":nombres_apellidos", $datos["nombres_apellidos"], PDO::PARAM_STR);
        $stm -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stm -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stm -> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
        $stm -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stm -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stm -> bindParam(":id_rol", $datos["id_rol"], PDO::PARAM_INT);
        $stm -> bindParam(":id_parroquia", $datos["id_parroquia"], PDO::PARAM_INT);
        $stm -> bindParam(":rango", $datos["rango"], PDO::PARAM_STR);
        $stm -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        

		
        
        if ($stm->execute()){
            return "Suscribete";
        }else{
           
            return "Error";
        }
    }

	static public function mdlEliminarUsuario($tabla, $parametros){
        $stm = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:datos");
        $stm -> bindParam(":datos", $parametros, PDO::PARAM_INT);
        $stm->execute();
        return 1;
	}
 } 