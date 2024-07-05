<?php

class ControladorUsuario
{
	
	public function ctrlLoginUsuario()
	{
		if (isset($_POST["username"])){
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"]) &&
		       preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"]) &&
			   $_POST['cbxParroquia']!="Seleccione"){

				$username = $_POST["username"];
				$password = $_POST["password"];
				$parroquia = $_POST['cbxParroquia'];
				$result = ModeloUsuario::mdlBuscarUsuario($username, $password, $parroquia); 

				if (isset($result["username"]) && $result["username"] == $_POST["username"] &&
			        isset($result["password"]) && $result["password"] == $_POST["password"] &&
					isset($result["id_parroquia"]) && $result["id_parroquia"] == $_POST["cbxParroquia"]) {

					$_SESSION['login'] = 'activa';
					$_SESSION['nombre'] = $result["nombres_apellidos"];
					$_SESSION['rol'] = $result["id_rol"];
					$_SESSION['parroquia'] = $result['id_parroquia'];
					$parametro = "idParroquia";
        			$idParroquia = $_SESSION['parroquia'];
        			$respuesta = ControladorParroquia::ctrlMostrarParroquia($parametro, $idParroquia);
					$_SESSION['logo'] = $respuesta['logo'];
					$_SESSION['wallpapers'] = $respuesta['wallpapers'];
					$_SESSION['nombre_parroquia'] = $respuesta['nombre'];
				
					
					echo '<script>
							window.location.href="inicio";
						  </script>';
				}else{
					echo '<div class="alert alert-danger"> Error en el Acceso </div>';
				}
			}
		}
	}


	//Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarUsuario($parametros, $datos){

        $res = ModeloUsuario::mdlMostrarUsuario($parametros, $datos);
        return $res;
    }

	//Controlador para guaradar datos de una persona
    static public function ctrlGuardarUsuario(){
      
        if (isset($_POST['txtCedula'])&& 
			isset($_POST['txtNombres'])&& 
            isset($_POST['txtCorreo'])&&
            $_POST['cbxEmpleado']!="Seleccione"&& 
			$_POST['cbxEstado']!="Seleccione"&& 
			$_POST['cbxParroquia']!="Seleccione"&& 
            isset($_POST['txtUsername'])&&
            isset($_POST['txtPass'])&&
            isset($_POST['txtResPass'])){


           
                
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtNombres']))
                {
                    
                $tabla= "usuarios";
              
                $datos = array('cedula' => $_POST['txtCedula'],
                               'nombres_apellidos' => $_POST['txtNombres'],
                               'correo' => $_POST['txtCorreo'],
                               'telefono' => $_POST['txtTelefono'],
                               'tipo_empleado' => $_POST['cbxEmpleado'],
                               'username' => $_POST['txtUsername'],
                               'password' => $_POST['txtPass'],
                               'id_rol' => intval($_POST['cbxRol']),
                               'id_parroquia' => intval($_POST['cbxParroquia']),
                               'estado' => $_POST['cbxEstado'],
                               'rango' => $_POST['cbxRango']);
                        
                
                
                $res = ModeloUsuario::mdlGuardarUsuario($tabla, $datos);

               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Persona Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                    ';
                }

                
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡No se permite caracteres especiales en los campos!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                ';

            }
        }
        else{
        }
       
    }

    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarUsuarioSacerdote($datos){

       
        $res = ModeloUsuario::mdlMostrarUsuarioSacerdote($datos);
        return $res;
    }

    //Controlador para modificar datos de una persona
    static public function ctrlModificarUsuario(){
      
        if (isset($_POST['txtNombresModificar'])&& 
            isset($_POST['txtCorreoModificar'])&&
            $_POST['cbxEmpleadoModificar']!="Seleccione"&& 
			$_POST['cbxEstadoModificar']!="Seleccione"&& 
			$_POST['cbxParroquiaModificar']!="Seleccione"&& 
            isset($_POST['txtPassModificar'])&&
            isset($_POST['txtResPassModificar'])){


           
                
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtNombresModificar']))
                {
                    
                $tabla= "usuarios";
              
                $datos = array('id'  =>  intval($_POST['int_prodId']),
                                'nombres_apellidos' => $_POST['txtNombresModificar'],
                               'correo' => $_POST['txtCorreoModificar'],
                               'telefono' => $_POST['txtTelefonoModificar'],
                               'tipo_empleado' => $_POST['cbxEmpleadoModificar'],
                               'password' => $_POST['txtPassModificar'],
                               'id_rol' => intval($_POST['cbxRolModificar']),
                               'estado' => $_POST['cbxEstadoModificar'],
                               'rango' => $_POST['cbxRangoModificar']);
                               echo "<script>console.log('Debug Objects: " . json_encode($datos) . "' );</script>";
                        
                
                
                $res = ModeloUsuario::mdlModificarUsuario($tabla, $datos);

               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Persona Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                    ';
                }

                
            }else{
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡No se permite caracteres especiales en los campos!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "usuarios";
                            }
                        })
                      </script>
                ';

            }
        }
        else{
        }
       
    }

     //Controlador para eliminar los datos de la tabla persona
     static public function ctrlEliminarUsuario($parametros){
        $tabla= "usuarios";
        ModeloUsuario::mdlEliminarUsuario($tabla, $parametros);
        return 1;
    }

}