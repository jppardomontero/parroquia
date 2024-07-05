<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pase de año de Catesismo</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Pase Año Catesismo</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">



        <!-- Main content -->
        <section class="content">
     
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped b">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Nivel Matriculado</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $parametros = null;
                  $datos = null;

                  $matriculas = ControladorMatriculas::ctrlMostrarMatriculas($parametros, $datos);
                  foreach ($matriculas as $key => $value) {
                    echo '
                        <tr>
                          <td>' . $value["id"] . '</td>
                          <td>' . $value["nombres"] . '</td>
                          <td>' . $value["apellidos"] . '</td>
                          <td>' . $value["nombre_nivel"] . '</td>
                          <td>' . $value["estado"] . '</td>
                          <td>
                            <div class="btn btn-group">
                              <button class="btn btn-success btnReporteMatriculaAprobado" idMatricula = "'.$value["id"].'" required data-toggle="tooltip" data-placement="top" title="Imprimir Reporte Aprobado"><i class="far fa-smile"></i></button>
                              <button class="btn btn-danger btnReporteMatriculaReprobado" idMatricula = "'.$value["id"].'" required data-toggle="tooltip" data-placement="top" title="Imprimir Reporte Reprobado""><i class="far fa-frown"></i></button>
                            </div> 
                          </td>
                        </tr>
                        ';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Nivel Matriculado</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>

                </tfoot>
              </table>

            </div>

          </div>

        </section>
        <!-- /.content -->

      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->