<?php
class ControladorIntenciones{

    //Controlador para guardar datos de las Intenciones
    static public function ctrlGuardarIntenciones(){
      
        if (isset($_POST['txt_nombreM'])&& 
            isset($_POST['txt_valorM'])){

                
            if (preg_match('/^[0-9]+$/', $_POST['txt_valorM'])){

                $tabla= "intenciones";

                $datos = array('id_eucaristia' => intval($_POST['cbxintenciones']),
                                'nombres' => $_POST['txt_nombreM'],
                               'valor' => intval($_POST['txt_valorM']));

                echo "<script>console.log('respuesta: " .json_encode($datos). "');</script>";
                
                $res = ModeloIntenciones::mdlGuardarIntenciones($tabla, $datos);
               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Intenciones Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "intenciones";
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
                                window.location= "intenciones";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }


    static public function ctrltraerintenciones(){
        $res = ModeloIntenciones::mdlmostrarintencion();
        return $res;
    }

    static public function ctrlModificarIntenciones(){
      

        if (isset($_POST['txt_nombreModM'])&& 
            isset($_POST['txt_fechaModM'])&&
            isset($_POST['txt_horaModM'])&&
            isset($_POST['txt_descripcionModM'])){

                
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_descripcionModM'])){

                $tabla= "intenciones";

                $datos = array('id' => $_POST['int_prodId'],
                                'nombre' => $_POST['txt_nombreModM'],
                               'fecha' => $_POST['txt_fechaModM'],
                               'hora' => $_POST['txt_horaModM'],
                               'descripcion' => $_POST['txt_descripcionModM']);
                
                $res = ModeloIntenciones::mdlModificarIntenciones($tabla, $datos);
               
                
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Persona Modificados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "intenciones";
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
                                window.location= "Intenciones";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }

    //Controlador para presentar los datos de la tabla Intenciones
    static public function ctrlMostrarIntenciones($parametros, $datos){

        $res = ModeloIntenciones::mdlMostrarIntenciones($parametros, $datos);
        return $res;
    }

     //Controlador para eliminar los datos de la tabla Intenciones
     static public function ctrlEliminarIntenciones($parametros){
        $tabla= "intenciones";
        ModeloIntenciones::mdlEliminarIntenciones($tabla, $parametros);
        return 1;
    }
}