<?php
class ControladorPrimeraComunion
{
    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarPersonaPrimeraComunion($parametros, $datos)
    {

        $res = ModeloPrimeraComunion::mdlMostrarPersonaPrimeraComunion($parametros, $datos);
        return $res;
    }

    static public function ctrlMostrarPersonaFamilia($datos)
    {

        $res = ModeloPrimeraComunion::mdlMostrarPersonaFamilia($datos);
        return $res;
    }

    //Controlador para guaradar datos de una persona
    static public function ctrlGuardarPrimeraComunion()
    {
        error_reporting(0);
        if ($_POST['cbxUsuario'] != "Seleccione" && isset($_POST['txtLugar'])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtLugar'])) {


                $tabla = "primera_comunion";

                $datos = array(
                    'id_persona' => intval($_POST['intPersona']),
                    'id_familia' => intval($_POST['intFamilia']),
                    'id_usuario' => intval($_POST['cbxUsuario']),
                    'lugar' => $_POST['txtLugar'],
                    'fecha' => $_POST['txtFecha'],
                    'id_parroquia' => intval($_SESSION['parroquia'])
                );

                echo "<script>console.log('datos a reservar prueba: " . json_encode($datos) . "' );</script>";

                 $res = ModeloPrimeraComunion::mdlGuardarPrimeraComunion($tabla, $datos);


                if ($res == "Suscribete") {


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Persona Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "sacramento-primera-comunion";
                            }
                        })
                      </script>
                    ';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon:"error",
                            title: "¡No se permite caracteres especiales en los campos!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "sacramento-primera-comunion";
                            }
                        })
                      </script>
                ';
            }
        }
    }
    //  Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarPrimeraComunion($parametros, $datos)
    {

        $res = ModeloPrimeraComunion::mdlMostrarPrimeraComunion($parametros, $datos);
        return $res;
    }

     //  Controlador editar
     static public function ctrlEditarPrimeraComunion($datos)
     {
 
         $res = ModeloPrimeraComunion::mdlEditarPrimeraComunion($datos);
         return $res;
     }

     static public function ctrlActualizarPrimeraComunion()
     {
         error_reporting(0);
         if ( isset($_POST['txtLugarModificar'])) {
 
             if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtLugarModificar'])) {
 
 
                 $tabla = "primera_comunion";
 
                 $datos = array(
                     'id' => intval($_POST['codigo']),
                     'id_persona' => intval($_POST['intPersonaModificar']),
                     'id_familia' => intval($_POST['intFamiliaModificar']),
                     'lugar' => $_POST['txtLugarModificar'],
                     'fecha' => $_POST['txtFechaModificar'],
                 );

                  echo "<script>console.log('actualizar: " . json_encode($datos) . "' );</script>";
                  $res = ModeloPrimeraComunion::mdlActualizarPrimeraComunion($tabla, $datos);

                  
 
 
                 if ($res == "Suscribete") {
 
 
                     echo '<script>
                         Swal.fire({
                             icon:"success",
                             title: "¡Datos de Primera Comunion Actualizados Correctamente...!",
                             showConfirmButton: true,
                             confirmButtonText: "Cerrar"
                         }).then(function(result){
                             if(result.value){
                                 window.location= "sacramento-primera-comunion";
                             }
                         })
                       </script>
                     ';
                 }
             } else {
                 echo '<script>
                         Swal.fire({
                             icon:"error",
                             title: "¡No se permite caracteres especiales en los campos!",
                             showConfirmButton: true,
                             confirmButtonText: "Cerrar"
                         }).then(function(result){
                             if(result.value){
                                 window.location= "sacramento-primera-comunion";
                             }
                         })
                       </script>
                 ';
             }
         }
     }


     static public function ctrlEliminarPrimeraComunion($parametros){
        $tabla= "primera_comunion";;
        ModeloPrimeraComunion::mdlEliminarPrimeraComunion($tabla, $parametros);
        return 1;
    }
}
