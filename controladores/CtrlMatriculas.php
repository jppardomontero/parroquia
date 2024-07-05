<?php
class ControladorMatriculas
{

    //Controlador para guaradar datos de una Familia
    static public function ctrlGuardarMatriculas()
    {
        error_reporting(0);

        if ($_POST['cbx_matricula_nivelM'] != "Seleccione" &&
            $_POST['cbx_matricula_matrimonioM'] != "Seleccione" &&
            $_POST['cbx_matricula_bautismoM'] != "Seleccione" &&
            $_POST['cbx_matricula_tarjetaM'] != "Seleccione" &&

            isset($_POST['txtNombre']) &&
            isset($_POST['txtApellido'])
        ) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtNombre'])&&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txtApellido']))
                {



                $tabla = "matriculas_catesismo";

                $datos = array(
                    'id_persona' => intval($_POST['intPersona']),
                    'id_nivel_catesismo' => intval($_POST['cbx_matricula_nivelM']),
                    'partida_matrimonio' => $_POST['cbx_matricula_matrimonioM'],
                    'fe_bautismo' => $_POST['cbx_matricula_bautismoM'],
                    'tarjeta_parroquial' => $_POST['cbx_matricula_tarjetaM'],
                    'estado' => 'En curso',
                    'id_parroquia' => intval($_SESSION['parroquia'])
                );

                $res = ModeloMatriculas::mdlGuardaMatriculas($tabla, $datos);


                if ($res == "Suscribete") {
                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Matricula Guardados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "matriculas-catesismo";
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
                                window.location= "matriculas-catesismo";
                            }
                        })
                      </script>
                ';

            }
        }
    }
    //Controlador para modificar datos de matriculas
    static public function ctrlModificarNiveles()
    {

        if (
            isset($_POST['txt_partida_matrimonioModM']) &&
            isset($_POST['txt_fe_bautismoModM']) &&
            isset($_POST['txt_tarjeta_parroquialModM']) &&
            isset($_POST['txt_estadoModM'])
        ) {


            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_partida_matrimonioModM']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_fe_bautismoModM']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_tarjeta_parroquialModM']) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['txt_estadoModM'])
            ) {


                $tabla = "matriculas_catesismo";

                $datos = array(
                    'id' => $_POST['int_prodId'],
                    'partida_matrimonio' => $_POST['txt_partida_matrimonioModM'],
                    'fe_bautismo' => $_POST['txt_fe_bautismoModM'],
                    'tarjeta_parroquial' => $_POST['txt_tarjeta_parroquialModM'],
                    'estado' => $_POST['txt_estadoModM']
                );


                $res = ModeloMatriculas::mdlModificarMatriculas($tabla, $datos);


                if ($res == "Suscribete") {

                    echo '<script>
                        Swal.fire({
                            icon:"success",
                            title: "¡Datos de Nivel Modificados Correctamente...!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location= "matriculas-catesismo";
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
                                window.location= "matriculas-catesismo";
                            }
                        })
                      </script>
                ';
            }
        }
    }
    //Controlador para presentar los datos de la tabla matriculas
    static public function ctrlMostrarMatriculas($parametros, $datos)
    {

        $res = ModeloMatriculas::mdlMostrarMatriculas($parametros, $datos);
        return $res;
    }

    //Controlador para eliminar los datos de la tabla matriculas
    static public function ctrlEliminarMatriculas($parametros)
    {
        $tabla = "matriculas_catesismo";
        ModeloMatriculas::mdlEliminarMatriculas($tabla, $parametros);
        return 1;
    }

    //Controlador para presentar los datos de la tabla persona
    static public function ctrlMostrarPersona($parametros, $datos)
    {

        $res = ModeloMatriculas::mdlMostrarPersona($parametros, $datos);
        return $res;
    }
}
