<?php
class ControladorBautizo
{
    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarPersonaBautizo($parametros, $datos)
    {

        $res = ModeloBautizo::mdlMostrarPersonaBatizo($parametros, $datos);
        return $res;
    }

    //Contalaodr par presentr los datos de familia
    static public function ctrlMostrarPersonaFamilia($datos)
    {

        $res = ModeloBautizo::mdlMostrarPersonaFamilia($datos);
        return $res;
    }

    //Controlador para guaradar datos de una persona
    static public function ctrlGuardarBautizo()
    {

        if (
            isset($_POST['txtTomo']) &&
            isset($_POST['txtPagina']) &&
            $_POST['cbxUsuario'] != "Seleccione" &&

            isset($_POST['txtLugar']) &&
            isset($_POST['txtFecha'])
        ) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtTomo']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtPagina']) &&

                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtLugar'])
            ) {
      

                $tabla = "bautizo";
                $tabla2 = "padrinos_bautizo";

                $datos = array(
                    'id_persona' => intval($_POST['intPersona']),
                    'id_familia' => intval($_POST['intFamilia']),
                    'id_usuario' => intval($_POST['cbxUsuario']),
                    'tomo' => $_POST['txtTomo'],
                    'pagina' => $_POST['txtPagina'],
                    'acta' => $_POST['txtActa'],
                    'nota_marginal' => $_POST['txtNota_marginal'],
                    'lugar' => $_POST['txtLugar'],
                    'fecha' => $_POST['txtFecha'],
                    'id_parroquia' => intval($_SESSION['parroquia'])
                );

                echo "<script>console.log('Sacrementos: " . json_encode($_POST) . "' );</script>";

                $res = ModeloBautizo::mdlGuardarBautizos($tabla, $datos);
                $bautizo = ModeloBautizo::mdlMostrarIdGuardado();

                if ($_POST['intPadrino2'] == "") {
                    $datosPadrino = array(
                        'id_bautizo' => intval($bautizo["id"]),
                        'id_persona' => intval($_POST["intPadrino1"])
                    );

                    $res2 = ModeloBautizo::mdlGuardarPadrinos($tabla2, $datosPadrino);
                } else {
                    $datosPadrino = array(
                        'id_bautizo' => intval($bautizo["id"]),
                        'id_persona' => intval($_POST["intPadrino1"])
                    );

                    $res2 = ModeloBautizo::mdlGuardarPadrinos($tabla2, $datosPadrino);

                    $datosPadrino = array(
                        'id_bautizo' => intval($bautizo["id"]),
                        'id_persona' => intval($_POST["intPadrino2"])
                    );

                    $res2 = ModeloBautizo::mdlGuardarPadrinos($tabla2, $datosPadrino);
                }






                if ($res == "Suscribete" and  $res2 == "Suscribete") {


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos del Bautismo Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "sacramento-bautizo";
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
                                window.location= "sacramento-bautizo";
                            }
                        })
                      </script>
                ';
            }
        }
    }

    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarBautismos($parametros, $datos)
    {

        $res = ModeloBautizo::mdlMostrarBautismos($parametros, $datos);
        return $res;
    }

    //función para cargar los datos en el modal de actualizar
    static public function ctrlDatosBautizo($datos)
    {

        $res = ModeloBautizo::mdlDatosBautizo($datos);

        $res1 = ModeloBautizo::mdlDatosPadrinosAll($datos);
        $con_padrinos = count($res1);
        if ($con_padrinos == 2) {
            $res1 = ModeloBautizo::mdlDatosPadrinos1($datos);

            $res2 = ModeloBautizo::mdlDatosPadrinos2($datos);
            $res3 = array_merge($res1, $res2);
           
        } else {
            $res3 = ModeloBautizo::mdlDatosPadrinos1($datos);
            
        }
      
        return   $res4 =  array_merge($res, $res3);
        
      
    }

    //Controlador para guaradar datos de una persona
    static public function ctrlActualizarBautizo()
    {

        if (
            isset($_POST['txtTomoEdit']) &&
            isset($_POST['txtPaginaEdit']) &&
           
            isset($_POST['txtLugarEdit']) &&
            isset($_POST['txtFechaEdit'])
        ) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtTomoEdit']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtPaginaEdit']) &&

                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtLugarEdit'])
            ) {

                $tabla = "bautizo";
                $tabla2 = "padrinos_bautizo";

                $datos = array(
                    'id' => intval($_POST['intBautizo']),
                    'id_persona' => intval($_POST['intPersonaEdit']),
                    'id_familia' => intval($_POST['intFamiliaEdit']),
                    'tomo' => $_POST['txtTomoEdit'],
                    'pagina' => $_POST['txtPaginaEdit'],
                    'acta' => $_POST['txtActaEdit'],
                    'nota_marginal' => $_POST['txtNota_marginalEdit'],
                    'lugar' => $_POST['txtLugarEdit'],
                    'fecha' => $_POST['txtFechaEdit'],
                );




                $res = ModeloBautizo::mdlModificarBautizos($tabla, $datos);

                if ($_POST['txtNombrePadrino2Edit'] = "") {
                    $datosPadrino = array(
                        'id' => intval($_POST["intPadrino1Edit"]),
                        'id_bautizo' => intval($_POST["intBautizo"]),
                        'id_persona' => intval($_POST["intPersonaPadrino1Edit"])
                    );

                    $res2 = ModeloBautizo::mdlModificarPadrinos($tabla2, $datosPadrino);
                    ModeloBautizo::mdlEliminarPadrino($tabla2, intval($_POST["intPadrino2Edit"]));
                } else {
                    $datosPadrino = array(
                        'id' => intval($_POST["intPadrino1Edit"]),
                        'id_bautizo' => intval($_POST["intBautizo"]),
                        'id_persona' => intval($_POST["intPersonaPadrino1Edit"])
                    );

                    $res2 = ModeloBautizo::mdlModificarPadrinos($tabla2, $datosPadrino);

                    $datosPadrino = array(
                        'id' => intval($_POST["intPadrino2Edit"]),
                        'id_bautizo' => intval($_POST["intBautizo"]),
                        'id_persona' => intval($_POST["intPersonaPadrino2Edit"])
                    );

                    $res2 = ModeloBautizo::mdlModificarPadrinos($tabla2, $datosPadrino);
                }






                if ($res == "Suscribete" and  $res2 == "Suscribete") {


                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos del Bautismo Actualizados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "sacramento-bautizo";
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
                                window.location= "sacramento-bautizo";
                            }
                        })
                      </script>
                ';
            }
        }
    }

    //Controlador para eliminar los datos de la tabla bautismo y  sus padrinos
    static public function ctrlEliminarBautizo($idPersona)
    {
        $tabla = "bautizo";
        $tabla2 = "padrinos_bautizo";
        $datos_bautizo = ControladorBautizo::ctrlDatosBautizo($idPersona);
        ModeloBautizo::mdlEliminarPadrino($tabla2, intval($datos_bautizo['id']));
        ModeloBautizo::mdlEliminarBautizo($tabla, intval($datos_bautizo['id']));

        return 1;
    }

    static public function ctrlFeBautizmo($idBautizo)
    {
        require('vistas/plugins/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(40, 10, '¡Hola, Mundo!');
        $pdf->Output();
        return "hola";
    }
}
