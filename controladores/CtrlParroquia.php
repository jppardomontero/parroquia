<?php
class ControladorParroquia{
    static public function ctrlGuardarParroquia(){
        if (isset($_POST['nombre'])){
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre'])){
                $parroquias = ModeloParroquia::mdlMostrarUtimoResgistroParroquia();
                $numero = 0;
                if (isset($parroquias))
                    $numero = $parroquias['id'] + 1;
                $directorio_ico = "vistas/img/".$numero."_logo.ico";
                $directorio_wallpapers = "vistas/img/".$numero."_wallpapers.png";

                move_uploaded_file($_FILES['logo']['tmp_name'],$directorio_ico);
                move_uploaded_file($_FILES['wallpapers']['tmp_name'],$directorio_wallpapers);
                $tabla = "parroquias";

                $datos = array('nombre' => $_POST['nombre'],
                               'logo' => $directorio_ico,
                               'wallpapers' => $directorio_wallpapers);

                $res = ModeloParroquia::mdlGuardarParroquia($tabla, $datos);
               
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Parroquia Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "parroquia";
                            }
                        })
                      </script>
                    ';
                }
                
            }
            else{
                echo '<script>
                Swal.fire({
                    icon:"error",
                    title: "¡No se permite caracteres especiales en los campos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "parroquia";
                    }
                })
              </script>';
            }
        }
    }

    static public function ctrlMostrarParroquia($parametros, $datos){

        $res = ModeloParroquia::mdlMostrarparroquia($parametros, $datos);
        return $res;
    }

    static public function ctrlModificarParroquia(){
        if (isset($_POST['nombre_modificar'])){
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nombre_modificar'])){
                unlink($_POST['aux_logo']);
                unlink($_POST['aux_wallpapers']);
                
                $directorio_ico = "vistas/img/".$_POST['nombre_modificar']."_logo.ico";
                $directorio_wallpapers = "vistas/img/".$_POST['nombre_modificar']."_wallpapers.png";

                move_uploaded_file($_FILES['logo_modificar']['tmp_name'],$directorio_ico);
                move_uploaded_file($_FILES['wallpapers_modificar']['tmp_name'],$directorio_wallpapers);
                $tabla = "parroquias";

                $datos = array('nombre' => $_POST['nombre_modificar'],
                               'logo' => $directorio_ico,
                               'wallpapers' => $directorio_wallpapers);

                $res = ModeloParroquia::mdlModificarParroquia($tabla, $datos);
               
                if ($res == "Suscribete"){


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Parroquia Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "parroquia";
                            }
                        })
                      </script>
                    ';
                }
                
            }
            else{
                echo '<script>
                Swal.fire({
                    icon:"error",
                    title: "¡No se permite caracteres especiales en los campos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "parroquia";
                    }
                })
              </script>';
            }
        }
    }

     //Controlador para eliminar los datos de la tabla parroquia
     static public function ctrlEliminarParroquia($parametros){

        $tabla= "parroquias";
        ModeloParroquia::mdlEliminarParroquia($tabla, $parametros);
        return 1;
    }
}