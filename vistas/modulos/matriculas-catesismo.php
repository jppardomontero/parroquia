<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sacramentos/Bautizo</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inico</a></li>
            <li class="breadcrumb-item active">Bautizo</li>
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

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Matricula <span class="fas fa-plus-circle"></span></button>

      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
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
                              <button class="btn btn-warning btnEditarMatriculas" idMatriculas = "' . $value["id"] . '"data-toggle="modal" data-target="#ModalMatriculasModificar"><i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarMatriculas" idMatriculas = "' . $value["id"] . '" ><i class="far fa-window-close"></i></button>
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
<!-- Content Wrapper. Contains page content -->


<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form role="form" method="POST">

        <!-- Modal Header -->
        <div class="modal-header" style="background: #adb5bd;">
          <h4 class="modal-title">AGREGAR NUEVA MATRICULA DE CATECISMO</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="box-doby">
            <!-- Persona -->
            <div class="input-group mb-3">
              <!-- nombre -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Seleccione Nombre" readonly>

              <!-- apellido -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="txtApellido" id="txtApellido" class="form-control" placeholder="Seleccione Apellido" readonly>

              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal1">Persona</button>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
              </div>
              <select name="cbx_matricula_nivelM" class="form-control input-lg">
                <option value="Seleccione">Seleccione Nivel Catesismo</option>

                <?php
                $objNiveles = new ControladorNiveles();
                $parametro = null;
                $datos = null;
                $resul = $objNiveles->ctrlMostrarNiveles($parametro, $datos);
                foreach ($resul as $key => $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["nombres"] . '</option>';
                }
                ?>
              </select>

            </div>

            <div class="input-group mb-3">

              <!-- Combo Partida de matrimonio -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
              </div>
              <select name="cbx_matricula_matrimonioM" class="form-control input-lg">
                <option value="Seleccione">Seleccione Partida de Matrimonio</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="input-group mb-3">

              <!-- Combo Fe de Bautismo -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
              </div>
              <select name="cbx_matricula_bautismoM" class="form-control input-lg">
                <option value="Seleccione">Seleccione Fe de Bautismo</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="input-group mb-3">


              <!-- Combo Tarjeta Parroquial -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
              </div>
              <select name="cbx_matricula_tarjetaM" class="form-control input-lg">
                <option value="Seleccione">Seleccione Tarjeta Parroquial</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

           
            <input id="intPersona" name="intPersona" type="hidden">
            <input id="intFamilia" name="intFamilia" type="hidden">

            <!-- Modal footer -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Matriculas Catecismo</button>
        </div>
        <?php
        $objMatriculas = new ControladorMatriculas();
        $objMatriculas->ctrlGuardarMatriculas();
        ?>
      </form>
    </div>
  </div>
</div>


<div id="myModal1" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Cédula</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
            <?php
            $parametros = null;
            $datos = null;

            $persona = ControladorMatriculas::ctrlMostrarPersona($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPersona" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
          <i class="far fa-edit"></i></button>
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
              <th>Cédula</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>