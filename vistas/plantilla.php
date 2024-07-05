<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link  rel="icon"   href="vistas/img/favicon.png" type="image/png" />
  <title>Parroquia Ecleciastica San Lucas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="vistas/plugins/sweetalert2/sweetalert2.min.css">

</head>
<?php
    if (isset($_SESSION['login']) && $_SESSION['login'] == 'activa'){


      echo '<body class="hold-transition sidebar-mini"> <!--minimizar menu sidebar-collapse  --> ';




      echo '<div class="wrapper">';
      //Nav
      include "vistas/modulos/nav.php";

      //Menu
      include "vistas/modulos/menu.php";

      //Paginas Rutas

      if (isset($_GET["enlace"] )){
        if($_GET["enlace"] == "inicio"  ||
          $_GET["enlace"] == "personas" ||
          $_GET["enlace"] == "familia" || 
          $_GET["enlace"] == "conformacion-familia" ||
          $_GET["enlace"] == "niveles-catesismo" ||
          $_GET["enlace"] == "matriculas-catesismo" ||
          $_GET["enlace"] == "pase-anio-catesismo" ||
          $_GET["enlace"] == "sacramento-bautizo" ||
          $_GET["enlace"] == "sacramento-primera-comunion" ||
          $_GET["enlace"] == "sacramento-confirmacion" ||
          $_GET["enlace"] == "sacramento-matrimonio" ||
          $_GET["enlace"] == "certificado-bautizo" ||
          $_GET["enlace"] == "certificado-primera-comunion" ||
          $_GET["enlace"] == "certificado-confirmacion" ||
          $_GET["enlace"] == "certificado-matrimonio" ||
          $_GET["enlace"] == "eucaristia" ||
          $_GET["enlace"] == "intenciones" ||
          $_GET["enlace"] == "ingresos" ||
          $_GET["enlace"] == "parroquia" ||
          $_GET["enlace"] == "usuarios" ||
          $_GET["enlace"] == "salir" ){
            include "vistas/modulos/".$_GET["enlace"].".php";
        }else{
          include "vistas/modulos/404.php";
        }
      }else{
        include "vistas/modulos/inicio.php";
      }

    

      //footer
      include "vistas/modulos/footer.php";
      echo '</div>';
      }else{
        echo '<body class="hold-transition sidebar-mini login-page"> <!--minimizar menu sidebar-collapse  --> ';
        include "vistas/modulos/login.php";
      }

  ?>

 

  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->



<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="vistas/dist/js/demo.js"></script>
<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- DataTables -->
<script src="vistas/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="vistas/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>




<script src="vistas/js/general.js"></script>
<!--js para actulizar y eliminar  -->
<script src="vistas/js/persona.js"></script>
<script src="vistas/js/eucaristia.js"></script>
<script src="vistas/js/familia.js"></script>
<script src="vistas/js/niveles.js"></script>
<script src="vistas/js/bautizo.js"></script>
<script src="vistas/js/parroquia.js"></script>
<script src="vistas/js/usuarios.js"></script>


</body>
</html>





