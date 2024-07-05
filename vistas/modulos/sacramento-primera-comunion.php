 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sacramentos/Primera Comunión</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Primera Comunión</li>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Primera Comunión <span class="fas fa-plus-circle"></span></button>
      </div>

      <div class="card-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Lugar</th>
              <th>Fecha</th>
              <th>Acciones</th>               
            </tr>
          </thead>
          <?php



          $parametros = null;
          $datos = null;

          $persona = ControladorPrimeraComunion::ctrlMostrarPrimeraComunion($parametros, $datos);
          foreach ($persona as $key => $value) {
            echo '
                        <tr>
                          <td>' . $value["id"] . '</td>
                          <td>' . $value["nombres"] . '</td>
                          <td>' . $value["apellidos"] . '</td>
                          <td>' . $value["lugar"] . '</td>
                          <td>' . $value["fecha"] . '</td>
                          
                          <td>
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarPrimeraComunion" idPersona = "' . $value["id"] . '"data-toggle="modal" data-target="#myModalModificar">
                              <i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarPrimeraComunion" idPersona = "' . $value["id"] . '" ><i class="far fa-window-close"></i></button>
                            </div> 
                          </td>
                        </tr>
                        ';
          }
          ?>

          <tfoot>
            <tr>
            <th>Id</th>
              <th>Nombre</th>
              <th>Apellido</th>
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
          <h4 class="modal-title">AGREGAR NUEVA PERSONA A REALIZAR PRIMERA COMUNIÓN</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <!-- Modal body -->
        <div class="modal-body">
          <div class="box-doby">

            <!-- Persona -->
            <div class="input-group mb-3">
              <!-- Nombre -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Seleccione Nombre" readonly>

              <!-- Apellido -->
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

              

            </div>
          </div>
        </div>


        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Primera Comunion</button>
        </div>
        <?php
        $objGuardarPrimeraComunion = new ControladorPrimeraComunion();
        $objGuardarPrimeraComunion->ctrlGuardarPrimeraComunion();
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

            $persona = ControladorPrimeraComunion::ctrlMostrarPersonaPrimeraComunion($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPersonaPrimeraComunion" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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



<div id="myModalModificar" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <!-- Modal Header -->
      <form role="form" method="POST">
        <div class="modal-header" style="background: #adb5bd;">
          <h4 class="modal-title">MODIFICAR PERSONA A REALIZAR PRIMERA COMUNIÓN</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <!-- Modal body -->
        <div class="modal-body">
          <div class="box-doby">

            <!-- Persona -->
            <div class="input-group mb-3">
              <!-- Nombre -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="txtNombreModificar" id="txtNombreModificar" class="form-control" placeholder="Seleccione Nombre" readonly>

              <!-- Apellido -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="txtApellidoModificar" id="txtApellidoModificar" class="form-control" placeholder="Seleccione Apellido" readonly>

              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalModificarDatos">Persona</button>
            </div>


            <!-- usuario -->
            <div class="input-group mb-3">
              <!-- Nombre usuario -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
              </div>
              <input type="text" name="txtSacerdoteModificar" id="txtSacerdoteModificar" class="form-control"  readonly>
            </div>


            


            <div class="input-group mb-3">
              <!-- lugar -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
              </div>
              <input type="text" name="txtLugarModificar" id="txtLugarModificar" class="form-control" placeholder="Ingresar Lugar" required>

              <!-- fecha -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
              </div>
              <input type="text" name="txtFechaModificar" id="txtFechaModificar"  class="form-control fecha" placeholder="Ingresar la fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>

              <input id="intPersonaModificar" name="intPersonaModificar" type="hidden">
              <input id="intFamiliaModificar" name="intFamiliaModificar" type="hidden"> 
              <input id="codigo" name="codigo" type="hidden"> 

              <div class="input-group mb-3">

              </div>

              

            </div>
          </div>
        </div>


        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar Primera Comunion</button>
        </div>
        <?php
        $PrimeraComunion = new ControladorPrimeraComunion();
        $PrimeraComunion->ctrlActualizarPrimeraComunion();
        ?>
      </form>


    </div>
  </div>
</div>


<div id="myModalModificarDatos" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModal">
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

          <button class="btn btn-warning btnTraerPersonaModificarPrimeraComunion" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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
