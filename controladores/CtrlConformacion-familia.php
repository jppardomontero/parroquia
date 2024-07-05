<?php
class ControladorConfornmacionfamilia
{

    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarPersonaBautizo($parametros, $datos)
    {

        $res = ModeloConfornmacionfamilia::mdlMostrarPersonaBatizo($parametros, $datos);
        return $res;
    }


    //Controlador para presentar los datos de la tabla familia
    static public function ctrlMostrarFamilia($parametros, $datos)
    {

        $res = ModeloConfornmacionfamilia::mdlMostrarFamilia($parametros, $datos);
        return $res;
    }



    //Controlador para guaradar datos de Conformacion familia
    static public function ctrlGuardarConformacionfamilia()
    {
        error_reporting(0);

        if ($_POST['cbxRolFamilia'] != "Seleccione") {

            $tabla = "formacion_familia";

            $datos = array(
                'id_persona' => intval($_POST['intPersona']),
                'id_familia' => intval($_POST['intFamilia']),
                'rol' => $_POST['cbxRolFamilia'],
            );



            $res = ModeloConfornmacionfamilia::mdlGuardarConformacionFamilia($tabla, $datos);

          

            if ($res == "Suscribete") {


                echo '<script>
            Swal.fire({
                icon:"success",
                title: "¡Datos de Persona Guardados Correctamente...!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "conformacion-familia";
                    }
                    })
                    </script>
                    ';
            }
        } else {
            echo '<script>
                Swal.fire({
                    icon:"error",
                    title: "¡Debes Seleccionar un rol en la familia!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "conformacion-familia";
                        }
                        })
                        </script>
                        ';
        }
    }




    //Controlador para presentar los datos de la tabla Conformacio familia
    static public function ctrlMostrarConformacionfamilia($parametros, $datos)
    {
        $res = ModeloConfornmacionfamilia::mdlMostrarConformacionfamilia($parametros, $datos);
        return $res;
    }



    //Controlador para eliminar los datos de la tabla conformacion de familia
    static public function ctrlEliminarConformacionFamilia($idPersona)
    {
        $tabla = "formacion_familia";

        //$datos_conformacionfamilia = 

        //ControladorConfornmacionfamilia::mdlEliminarConformacionFamilia($idPersona);

        //echo "<script>console.log('datos: " . json_encode($datos_conformacionfamilia) . "' );</script>";
        //ModeloConfornmacionfamilia::mdlEliminarPadrino($tabla2, intval($datos_conformacionfamilia['id_padrino_padrino1']));
        //ModeloConfornmacionfamilia::mdlEliminarPadrino($tabla2, intval($datos_conformacionfamilia['id_padrino_padrino2']));
        //ModeloConfornmacionfamilia::mdlEliminarBautizo($tabla, intval($datos_conformacionfamilia['id']));

        return 1;
    }
}
