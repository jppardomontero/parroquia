<?php
class ControladorNiveles{

    //Controlador para guaradar datos de una Familia
    static public function ctrlGuardarNiveles(){
    
        if (isset($_POST['txt_nombresM'])&& 
        isset($_POST['txt_requisitosM'])&& 
        isset($_POST['txt_descripcionM'])){
    
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombresM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_requisitosM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_descripcionM'])){

                $tabla= "niveles_catesismo";

                $datos = array(
                                'nombres' => $_POST['txt_nombresM'],
                                'requisito' => $_POST['txt_requisitosM'],
                               'descripcion' => $_POST['txt_descripcionM']);

                $res = ModeloNiveles::mdlGuardaNiveles($tabla, $datos);
               
                
                if ($res == "Suscribete"){
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Nivel Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "niveles-catesismo";
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
                                window.location= "niveles-catesismo";
                            }
                        })
                      </script>
                ';

            }
        }
        
         
       
    }
    //Controlador para modificar datos de una Niveles
    static public function ctrlModificarNiveles(){
      
        if (isset($_POST['txt_nombreModM'])&& 
            isset($_POST['txt_requisitosModM'])&&
            isset($_POST['txt_descripcionModM'])){
              
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_nombreModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_requisitosModM'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_descripcionModM'])){

                $tabla= "niveles_catesismo";

                $datos = array('id' => $_POST['int_prodId'],
                                'nombres' => $_POST['txt_nombreModM'],
                                'requisito' => $_POST['txt_requisitosModM'],
                               'descripcion' => $_POST['txt_descripcionModM']);
                
                $res = ModeloNiveles::mdlModificarNiveles($tabla, $datos);
               
                
                if ($res == "Suscribete"){

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Nivel Modificados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "niveles-catesismo";
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
                                window.location= "niveles-catesismo";
                            }
                        })
                      </script>
                ';

            }
        }
       
    }
     //Controlador para presentar los datos de la tabla niveles
     static public function ctrlMostrarNiveles($parametros, $datos){

        $res = ModeloNiveles::mdlMostrarNiveles($parametros, $datos);
        return $res;
    }

     //Controlador para eliminar los datos de la tabla famolia
     static public function ctrlEliminarNiveles($parametros){
        $tabla= "niveles_catesismo";
        ModeloNiveles::mdlEliminarNiveles($tabla, $parametros);
        return 1;
    }
}