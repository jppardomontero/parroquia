<?php
class ControladorEucaristia{

    //Controlador para guaradar datos de la eucaristia
    static public function ctrlGuardarEucaristia(){
      
        if (isset($_POST['txt_nombreM'])&& 
            isset($_POST['txt_fechaM'])&&
            isset($_POST['txt_horaM'])&&
            isset($_POST['txt_descripcionM'])){

                
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_descripcionM'])){

                $tabla= "eucaristias";

                $datos = array('id' => $_POST['int_prodId'],
                                'nombre' => $_POST['txt_nombreM'],
                               'fecha' => $_POST['txt_fechaM'],
                               'hora' => $_POST['txt_horaM'],
                               'descripcion' => $_POST['txt_descripcionM'],
                               'id_parroquia' => $_SESSION['parroquia']);
                
                $res = ModeloEucaristia::mdlGuardarEucaristia($tabla, $datos);
               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Eucaristia Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "eucaristia";
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
                                window.location= "eucaristia";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }

    static public function ctrlModificarEucaristia(){
      
        if (isset($_POST['txt_nombreModM'])&& 
            isset($_POST['txt_fechaModM'])&&
            isset($_POST['txt_horaModM'])&&
            isset($_POST['txt_descripcionModM'])){

                
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_descripcionModM'])){

                $tabla= "eucaristias";

                $datos = array('id' => $_POST['int_prodId'],
                                'nombre' => $_POST['txt_nombreModM'],
                               'fecha' => $_POST['txt_fechaModM'],
                               'hora' => $_POST['txt_horaModM'],
                               'descripcion' => $_POST['txt_descripcionModM']);
                
                $res = ModeloEucaristia::mdlModificarEucaristia($tabla, $datos);
               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Persona Modificados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "eucaristia";
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
                                window.location= "eucaristia";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }

    //Controlador para presentar los datos de la tabla eucaristia
    static public function ctrlMostrarEucaristia($parametros, $datos){

        $res = ModeloEucaristia::mdlMostrarEucaristia($parametros, $datos);
        return $res;
    }

     //Controlador para eliminar los datos de la tabla eucaristia
     static public function ctrlEliminarEucaristia($parametros){
        $tabla= "eucaristias";
        ModeloEucaristia::mdlEliminarEucaristia($tabla, $parametros);
        return 1;
    }


   
    
}

  
