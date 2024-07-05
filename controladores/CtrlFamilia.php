<?php
class ControladorFamilia{

    //Controlador para guaradar datos de una Familia
    static public function ctrlGuardarFamilia(){
    
        if (isset($_POST['txt_nombreM'])&& 
            isset($_POST['txt_descripcionM'])){
    
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_descripcionM'])){

                $tabla= "familia";

                $datos = array(
                                'nombres' => $_POST['txt_nombreM'],
                               'descripcion' => $_POST['txt_descripcionM']);

                $res = ModeloFamilia::mdlGuardarFamilia($tabla, $datos);
               
                
                if ($res == "Suscribete"){

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Familia Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "familia";
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
                                window.location= "familia";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }


 //Controlador para modificar datos de una Familia
    static public function ctrlModificarFamilia(){
      
        if (isset($_POST['txt_nombreModM'])&& 
            isset($_POST['txt_descripcionModM'])){
              
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_descripcionModM'])){

                $tabla= "familia";

                $datos = array('id' => $_POST['int_prodId'],
                                'nombres' => $_POST['txt_nombreModM'],
                               'descripcion' => $_POST['txt_descripcionModM']);
                
                $res = ModeloFamilia::mdlModificarFamilia($tabla, $datos);
               
                
                if ($res == "Suscribete"){

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Familia Modificados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "familia";
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
                                window.location= "familia";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }

    //Controlador para presentar los datos de la tabla familia
    static public function ctrlMostrarFamilia($parametros, $datos){

        $res = ModeloFamilia::mdlMostrarFamilia($parametros, $datos);
        return $res;
    }

     //Controlador para eliminar los datos de la tabla famolia
     static public function ctrlEliminarFamilia($parametros){
        $tabla= "familia";
        ModeloFamilia::mdlEliminarFamilia($tabla, $parametros);
        return 1;
    }
}