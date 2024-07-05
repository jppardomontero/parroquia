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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Bautizo <span class="fas fa-plus-circle"></span></button>
      </div>

      <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Tomo</th>
              <th>Pagina</th>
              <th>Acta</th>
              <th>Nota Marginal</th>
              <th>Lugar</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <?php
          $parametros = null;
          $datos = null;

          $persona = ControladorBautizo::ctrlMostrarBautismos($parametros, $datos);
          foreach ($persona as $key => $value) {
            echo '
                        <tr>
                          <td>' . $value["nombres"] . '</td>
                          <td>' . $value["apellidos"] . '</td>
                          <td>' . $value["tomo"] . '</td>
                          <td>' . $value["pagina"] . '</td>
                          <td>' . $value["acta"] . '</td>
                          <td>' . $value["nota_marginal"] . '</td>
                          <td>' . $value["lugar"] . '</td>
                          <td>' . $value["fecha"] . '</td>
                          <td>
                            <div class="btn btn-group">
                            <button class="btn btn-warning btnEditarBautizo" idPersona = "' . $value["id"] . '"data-toggle="modal" data-target="#myModalModificar">
                              <i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarBautizo" idPersona = "' . $value["id"] . '" ><i class="far fa-window-close"></i></button>
                            </div> 
                          </td>
                        </tr>
                        ';
          }
          ?>

          <tfoot>
            <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Tomo</th>
              <th>Pagina</th>
              <th>Acta</th>
              <th>Nota Marginal</th>
              <th>Lugar</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
        </table>

      </div>



    </div>
  </section>
  <!-- /.content -->
</div>


<div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <!-- Modal Header -->
      <form role="form" method="POST">
        <div class="modal-header" style="background: #adb5bd;">
          <h4 class="modal-title">AGREGAR NUEVA PERSONAS A BAUTIZARCE</h4>
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


            <!-- usuario -->
            <div class="input-group mb-3">
              <!-- Nombre usuario -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
              </div>
              <select name="cbxUsuario" class="form-control input-lg">
                <option value="Seleccione">Seleccione</option>
                <?php
                $datos = [
                  "sacerdote" => "Sacerdote",
                  "parroquia"  => intval($_SESSION["parroquia"]),
                  "estado" => "Activo"
                ];
                $parroquia = ControladorUsuario::ctrlMostrarUsuarioSacerdote($datos);
                echo "<script>console.log('Debug Objects: " . json_encode($parroquia) . "' );</script>";
                foreach ($parroquia as $key => $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["nombres_apellidos"] . '</option>';
                }


                ?>
              </select>
            </div>


            <!-- tomo -->
            <div class="input-group mb-3">
              <!-- tomo -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bible"></i></span>
              </div>
              <input type="text" name="txtTomo" class="form-control" placeholder="Ingresar Tomo">

              <!-- pagina -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-book-open"></i></span>
              </div>
              <input type="text" name="txtPagina" class="form-control" placeholder="Ingresar Página" required>
            </div>


            <div class="input-group mb-3">
              <!-- acta -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
              </div>
              <input type="text" name="txtActa" class="form-control" placeholder="Ingresar Acta">

              <!-- nota marginal -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-file-alt"></i></span>
              </div>
              <input type="text" name="txtNota_marginal" class="form-control" placeholder="Ingresar Nota Marginal">
            </div>


            <div class="input-group mb-3">
              <!-- lugar -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
              </div>
              <input type="text" name="txtLugar" id="txtLugar" class="form-control" placeholder="Ingresar Lugar" required>

              <!-- fecha -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" name="txtFecha" class="form-control fecha" placeholder="Ingresar la fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>

              <input id="intPersona" name="intPersona" type="hidden">
              <input id="intFamilia" name="intFamilia" type="hidden">

              <div class="input-group mb-3">

              </div>

              <div class="modal-header" style="background: #adb5bd;">
                <h4 class="modal-title ">PADRINOS DEL BAUTISMO</h4>
              </div>

              <!-- Persona -->
              <div class="input-group mb-3">
                <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtNombrePadrino1" id="txtNombrePadrino1" class="form-control" placeholder="Seleccione Nombre" readonly>

                <!-- apellido -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtApellidoPadribo1" id="txtApellidoPadribo1" class="form-control" placeholder="Seleccione Apellido" readonly>

                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal2">Persona</button>
                <input id="intPadrino1" name="intPadrino1" type="hidden">
              </div>

              <!-- Persona -->
              <div class="input-group mb-3">
                <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtNombrePadrino2" id="txtNombrePadrino2" class="form-control" placeholder="Seleccione Nombre" readonly>

                <!-- apellido -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtApellidoPadribo2" id="txtApellidoPadribo2" class="form-control" placeholder="Seleccione Apellido" readonly>

                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal3">Persona</button>
                <input id="intPadrino2" name="intPadrino2" type="hidden">
              </div>

            </div>
          </div>
        </div>


        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Bautizo</button>
        </div>
        <?php
        $objGuardarBautizo = new ControladorBautizo();
        $objGuardarBautizo->ctrlGuardarBautizo();
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

            $persona = ControladorBautizo::ctrlMostrarPersonaBautizo($parametros, $datos);
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


<div id="myModal2" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="example3" class="table table-bordered table-striped">
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

            $persona = ControladorBautizo::ctrlMostrarPersonaBautizo($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPadrino1" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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


<div id="myModal3" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="example4" class="table table-bordered table-striped">
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

            $persona = ControladorBautizo::ctrlMostrarPersonaBautizo($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPadrino2" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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





<!-- /.Modal del Bautizo Modificar -->

<div id="myModalModificar" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <!-- Modal Header -->
      <form role="form" method="POST">
        <div class="modal-header" style="background: #adb5bd;">
          <h4 class="modal-title">AGREGAR NUEVA PERSONAS A BAUTIZARCE</h4>
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
              <input type="text" name="txtNombreEdit" id="txtNombreEdit" class="form-control" placeholder="Seleccione Nombre" readonly>

              <!-- apellido -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="txtApellidoEdit" id="txtApellidoEdit" class="form-control" placeholder="Seleccione Apellido" readonly>

              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal4">Persona</button>
            </div>


            <!-- usuario -->
            <div class="input-group mb-3">
              <!-- Nombre usuario -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
              </div>
              <input name="txtUsuarioEdit" id="txtUsuarioEdit" class="form-control input-lg" readonly>
              </input>
            </div>


            <!-- tomo -->
            <div class="input-group mb-3">
              <!-- tomo -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-bible"></i></span>
              </div>
              <input type="text" name="txtTomoEdit" id="txtTomoEdit" class="form-control" placeholder="Ingresar Tomo">

              <!-- pagina -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-book-open"></i></span>
              </div>
              <input type="text" name="txtPaginaEdit" id="txtPaginaEdit" class="form-control" placeholder="Ingresar Página" required>
            </div>


            <div class="input-group mb-3">
              <!-- acta -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
              </div>
              <input type="text" name="txtActaEdit" id="txtActaEdit" class="form-control" placeholder="Ingresar Acta">

              <!-- nota marginal -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-file-alt"></i></span>
              </div>
              <input type="text" name="txtNota_marginalEdit" id="txtNota_marginalEdit" class="form-control" placeholder="Ingresar Nota Marginal">
            </div>


            <div class="input-group mb-3">
              <!-- lugar -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
              </div>
              <input type="text" name="txtLugarEdit" id="txtLugarEdit" class="form-control" placeholder="Ingresar Lugar" required>

              <!-- fecha -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" name="txtFechaEdit" id="txtFechaEdit" class="form-control fecha" placeholder="Ingresar la fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>

              <input id="intPersonaEdit" name="intPersonaEdit" type="hidden">
              <input id="intFamiliaEdit" name="intFamiliaEdit" type="hidden">



              <div class="modal-header" style="background: #adb5bd;">
                <h4 class="modal-title ">PADRINOS DEL BAUTISMO</h4>
              </div>

              <!-- Persona -->
              <div class="input-group mb-3">
                <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtNombrePadrino1Edit" id="txtNombrePadrino1Edit" class="form-control" placeholder="Seleccione Nombre" readonly>

                <!-- apellido -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtApellidoPadrino1Edit" id="txtApellidoPadrino1Edit" class="form-control" placeholder="Seleccione Apellido" readonly>

                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal5">Persona</button>
                <input id="intPadrino1Edit" name="intPadrino1Edit" type="hidden">
                <input id="intPersonaPadrino1Edit" name="intPersonaPadrino1Edit" type="hidden">
              </div>

              <!-- Persona -->
              <div class="input-group mb-3">
                <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtNombrePadrino2Edit" id="txtNombrePadrino2Edit" class="form-control" placeholder="Seleccione Nombre" readonly>

                <!-- apellido -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="txtApellidoPadrino2Edit" id="txtApellidoPadrino2Edit" class="form-control" placeholder="Seleccione Apellido" readonly>

                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal6">Persona</button>
                <input id="intPadrino2Edit" name="intPadrino2Edit" type="hidden">
                <input id="intPersonaPadrino2Edit" name="intPersonaPadrino2Edit" type="hidden">
              </div>

            </div>
          </div>
        </div>
        <input id="intBautizo" name="intBautizo" type="hidden">

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar Bautizo</button>
        </div>
        <?php
        $objGuardarBautizo = new ControladorBautizo();
        $objGuardarBautizo->ctrlActualizarBautizo();
        ?>
      </form>


    </div>
  </div>
</div>


<div id="myModal4" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModalModificar">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="example5" class="table table-bordered table-striped">
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

            $persona = ControladorBautizo::ctrlMostrarPersonaBautizo($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPersonaEdit" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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


<div id="myModal5" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModalModificar">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="example6" class="table table-bordered table-striped">
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

            $persona = ControladorBautizo::ctrlMostrarPersonaBautizo($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPadrino1Edit" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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


<div id="myModal6" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModalModificar">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="example7" class="table table-bordered table-striped">
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

            $persona = ControladorBautizo::ctrlMostrarPersonaBautizo($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPadrino2Edit" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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