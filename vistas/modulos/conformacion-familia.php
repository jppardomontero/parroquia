 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Feligreses/Conformacion De Familia</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inico</a></li>
            <li class="breadcrumb-item active">Conformacion De Familia</li>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Comformar Familia <span class="fas fa-plus-circle"></span></button>
      </div>

      <div class="card-body">
        <table id="tabladatofamilia" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Familia</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <?php
          $parametros = null;
          $datos = null;

          $persona = ControladorConfornmacionfamilia::ctrlMostrarConformacionfamilia($parametros, $datos);
          foreach ($persona as $key => $value) {
            echo '
            <tr>
            <td>' . $value["nombres"] . '</td>
            <td>' . $value["apellidos"] . '</td>
            <td>' . $value["nombrefamilia"] . '</td>
            <td>' . $value["rol"] . '</td>
            <td>
            <div class="btn btn-group">
            <button class="btn btn-warning btnEditarConformacionFamilia" idPersona = "' . $value["id"] . '"data-toggle="modal" data-target="#ModalConformacionFamiliaModificar">
            <i class="far fa-edit"></i></button>
            <button class="btn btn-danger btnEliminarConformacionFamilia" idPersona = "' . $value["id"] . '" ><i class="far fa-window-close"></i></button>
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
              <th>Familia</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
        </table>

      </div>

    </div>
  </section>
  <!-- /.content -->
</div>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <!-- Modal Header -->
      <form role="form" method="POST">
        <div class="modal-header" style="background: #adb5bd;">
          <h4 class="modal-title">AGREGAR NUEVA PERSONAS A FAMILIA</h4>
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

            <input id="intPersona" name="intPersona" type="hidden">


            <div class="modal-header" style="background: #adb5bd;">
              <h4 class="modal-title ">AGREGAR FAMILIA</h4>
            </div>

            <!-- Familia -->
            <div class="input-group mb-3">
              <!-- nombre Padrino -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>

              <input type="text" name="txtNombrefamilia" id="txtNombrefamilia" class="form-control" placeholder="Seleccione Nombre Familia" readonly>

              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal2">Familia</button>
              
              <input id="intFamilia" name="intFamilia" type="hidden">
            </div>

            <div class="input-group mb-3">
              <!-- rol  -->
              
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-restroom"></i></span>
              </div>
              <select name="cbxRolFamilia" class="form-control input-lg">
                <option value="Seleccione">Seleccione Rol en la Familia</option>
                <option value="Padre">Padre</option>
                <option value="Madre">Madre</option>
                <option value="Hijo">Hijo</option>
                <option value="Hija">Hija</option>
              </select>
            </div>
          </div>
        </div>


            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Familia</button>
            </div>
            <?php
            $objGuardar = new ControladorConfornmacionfamilia();
            $objGuardar->ctrlGuardarConformacionfamilia();
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
        <table id="personaconformaciondefamilia" class="table table-bordered table-striped">
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

            $persona = ControladorConfornmacionfamilia::ctrlMostrarPersonaBautizo($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPersonaconformacionfamilia" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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
        <h4 class="modal-title">AGREGAR NUEVA FAMILIA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="familiaconformaciondefamilia" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombres</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
          <?php
            $parametros = null;
            $datos = null;

            $persona = ControladorConfornmacionfamilia::ctrlMostrarFamilia($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
              <tr>
              <td>'.$value["id"].'</td>
              <td>'.$value["nombres"].'</td>
              <td>'.$value["descripcion"].'</td>
              <td>
              <div class="btn btn-group">

              <button class="btn btn-warning btnTraerFamilia" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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
              <th>Nombres</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- /.Modal del Modificar Conformacion de familia-->
<div id="myModalModificar" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <!-- Modal Header -->
      <form role="form" method="POST">
        <div class="modal-header" style="background: #adb5bd;">
          <h4 class="modal-title">AGREGAR NUEVA PERSONAS A FAMILIA</h4>
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
              <input type="text" name="txtNombreEditar" id="txtNombreEditar" class="form-control" placeholder="Seleccione Nombre" readonly>

              <!-- apellido -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="txtApellidoEditar" id="txtApellidoEditar" class="form-control" placeholder="Seleccione Apellido" readonly>

              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal4">Persona</button>
            </div>

            <input id="intPersonaEditar" name="intPersonaEditar" type="hidden">


            <div class="modal-header" style="background: #adb5bd;">
              <h4 class="modal-title ">AGREGAR FAMILIA</h4>
            </div>

            <!-- Familia -->
            <div class="input-group mb-3">
              <!-- nombre Padrino -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>

              <input type="text" name="txtNombrefamiliaEditar" id="txtNombrefamiliaEditar" class="form-control" placeholder="Seleccione Nombre Familia" readonly>

              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal2">Familia</button>
              
              <input id="intFamiliaEditar" name="intFamiliaEditar" type="hidden">
            </div>


              <div class="input-group mb-3">
              <!-- rol  -->
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-restroom"></i></span>
              </div>
              <select name="cbxrolEditar" class="form-control input-lg">
                <option value="Seleccione">Seleccione Rol</option>
                <option value="padre">Padre</option>
                <option value="madre">Madre</option>
                <option value="hijo">Hijo</option>
                <option value="hija">Hija</option>
              </select>
            </div>
          </div>
        </div>

        <input id="intConformacionFamilia" name="intConformacionFamilia" type="hidden">

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar Familia</button>
        </div>
        <?php
        $objGuardarBautizo = new ControladorConfornmacionfamilia();
        //$objGuardarBautizo->ctrlActualizarConformacionfamilia();
        ?>
      </form>
    </div>
  </div>
</div>



<div id="myModal1" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModalModificar">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="personaconformaciondefamiliaEditar" class="table table-bordered table-striped">
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

            $persona = ControladorConfornmacionfamilia::ctrlMostrarPersonaBautizo($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
          <tr>
          <td>' . $value["id"] . '</td>
          <td>' . $value["cedula"] . '</td>
          <td>' . $value["nombres"] . '</td>
          <td>' . $value["apellidos"] . '</td>  
          <td>
          <div class="btn btn-group">

          <button class="btn btn-warning btnTraerPersonaEditar" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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



<div id="myModal2" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#myModalModificar">

  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA FAMILIA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <table id="familiaconformaciondefamiliaEditar" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nombres</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
          <?php
            $parametros = null;
            $datos = null;

            $persona = ControladorConfornmacionfamilia::ctrlMostrarFamilia($parametros, $datos);
            foreach ($persona as $key => $value) {
              echo '
              <tr>
              <td>'.$value["id"].'</td>
              <td>'.$value["nombres"].'</td>
              <td>'.$value["descripcion"].'</td>
              <td>
              <div class="btn btn-group">

              <button class="btn btn-warning btnTraerFamiliaEditar" data-dismiss="modal" data-dismiss="modal" aria-hidden="true" idPersona = "' . $value["id"] . '">
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
              <th>Nombres</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

