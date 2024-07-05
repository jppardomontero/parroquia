<?php
class ControladorPerona{

    //Controlador para guaradar datos de una persona
    static public function ctrlGuardarPerdona(){
      
        if (isset($_POST['txt_nombreM'])&& 
            isset($_POST['txt_apellidoM'])&&
            $_POST['cbx_sexoM']!="Seleccione"&& 
            isset($_POST['txt_estado_civilM'])&&
            isset($_POST['txt_nacionalidadM'])&&
            isset($_POST['txt_lugarNacimienoM'])&&
            isset($_POST['txt_f_nacimientoM'])){

            
                
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_apellidoM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_estado_civilM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_lugarNacimienoM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nacionalidadM'])){

                $tabla= "persona";
              
                $datos = array('id' => $_POST['int_prodId'],
                               'cedula' => $_POST['txt_cedulaM'],
                               'nombres' => $_POST['txt_nombreM'],
                               'apellidos' => $_POST['txt_apellidoM'],
                               'f_nacimiento' => $_POST['txt_f_nacimientoM'],
                               'genero' => $_POST['cbx_sexoM'],
                               'estado_civil' => $_POST['txt_estado_civilM'],
                               'nacionalidad' => $_POST['txt_nacionalidadM'],
                               'lugar_nacimiento' => $_POST['txt_lugarNacimienoM'],
                               'profesion' => $_POST['txt_profesionM']);
                
                $res = ModeloPersona::mdlGuardarPersona($tabla, $datos);
               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Persona Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "personas";
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
                                window.location= "personas";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }

    static public function ctrlModificarPerdona(){
      
        if (isset($_POST['txt_nombreModM'])&& 
            isset($_POST['txt_apellidoModM'])&&
            $_POST['cbx_sexoModM']!="Seleccione"&& 
            isset($_POST['txt_estado_civilModM'])&&
            isset($_POST['txt_nacionalidadModM'])&&
            isset($_POST['txt_lugarNacimientoModM'])&&
            isset($_POST['txt_f_nacimientoModM'])){

                
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_apellidoModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_estado_civilModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_lugarNacimientoModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nacionalidadModM'])){

                $tabla= "persona";

                $datos = array('id' => $_POST['int_prodId'],
                                'cedula' => $_POST['txt_cedulaModM'],
                               'nombres' => $_POST['txt_nombreModM'],
                               'apellidos' => $_POST['txt_apellidoModM'],
                               'f_nacimiento' => $_POST['txt_f_nacimientoModM'],
                               'genero' => $_POST['cbx_sexoModM'],
                               'estado_civil' => $_POST['txt_estado_civilModM'],
                               'nacionalidad' => $_POST['txt_nacionalidadModM'],
                               'lugar_nacimiento' => $_POST['txt_lugarNacimientoModM'],
                               'profesion' => $_POST['txt_profesionModM']);
                
                $res = ModeloPersona::mdlModificarPersona($tabla, $datos);
               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Persona Modificados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "personas";
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
                                window.location= "personas";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }

    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarPersona($parametros, $datos){

        $res = ModeloPersona::mdlMostrarPersona($parametros, $datos);
        return $res;
    }

     //Controlador para eliminar los datos de la tabla persona
     static public function ctrlEliminarPersona($parametros){
        $tabla= "persona";
        ModeloPersona::mdlEliminarPersona($tabla, $parametros);
        return 1;
    }
}