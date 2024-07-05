<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inico</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <?php
  if ($_SESSION['rol'] == 1) { ?>
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-primary" data-toggle="modal" data-target="#ModalUsuarios">
            Agregar Usuario<span class="fas fa-plus-circle"></span>
          </button>


        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo Empleado</th>

                <th>Parroquia</th>
                <th>Rango</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $parametros = null;
              $datos = null;

              $usuarios = ControladorUsuario::ctrlMostrarUsuario($parametros, $datos);
              foreach ($usuarios as $key => $value) {
                echo '
                        <tr>
                          <td>'.$value["cedula"].'</td>
                          <td>'.$value["nombres_apellidos"].'</td>
                          <td>'.$value["correo"].'</td>
                          <td>'.$value["telefono"].'</td>
                          <td>'.$value["tipo_empleado"].'</td>

                          <td>'.$value["parroquia"].'</td>
                          <td>'.$value["rango"].'</td>
                          <td>
                            
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarUsuario" idUsuario = "'.$value["id"].'"data-toggle="modal" data-target="#ModalUsuariosModificar">
                              <i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarUsuarios" idUsuario = "'.$value["id"].'" ><i class="far fa-window-close"></i></button>
                            </div> 
                          </td>
                        </tr>
                        ';
              }
              ?>

            </tbody>
            <tfoot>
              <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo Empleado</th>

                <th>Parroquia</th>
                <th>Rango</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

    <div class="modal" id="ModalUsuarios">
      <div class="modal-dialog">
        <div class="modal-content">

          <form role="form" method="POST">
            <!-- Modal Header -->
            <div class="modal-header" style="background: #adb5bd;">
              <h4 class="modal-title">AGREGAR NUEVA USUARIO</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="box-doby">
                <div class="input-group mb-3">
                  <!-- Cédula -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtCedula" class="form-control" placeholder="Ingrese la Cédula" required pattern="[0-9]+" required>


                </div>

                <div class="input-group mb-3">

                  <!-- Nombres -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" name="txtNombres" class="form-control" placeholder="Ingrese sus Nombres" required>

                  <!-- Correo -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="txtCorreo" class="form-control" placeholder="Ingrese Correo" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Teléfono -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtTelefono" class="form-control " placeholder="Ingrese Teléfono" required>
                  <!-- Empleado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxEmpleado" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Secretari@">Secretari@</option>
                  </select>


                </div>

                <div class="input-group mb-3">

                  <!-- Username -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" name="txtUsername" class="form-control" placeholder="Ingrese Nombre de Usuario" required>

                </div>

                <div class="input-group mb-3">


                  <!--Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtPass" class="form-control" placeholder="Ingrese la Contraseña" required>
                  <!-- Repetir Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtResPass" class="form-control" placeholder="Ingrese Repetir Contraseña" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Estado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-people-arrows"></i></span>
                  </div>
                  <select name="cbxEstado" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                  <!-- Rol -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxRol" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>


                </div>

                <div class="input-group mb-3">
                  <!-- Parroquia -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                  </div>
                  <select name="cbxParroquia" class="form-control input-lg">
                    <option value="Seleccione">Seleccion</option>
                    <?php
                    $parametros = null;
                    $datos = null;
                    $parroquia = ControladorParroquia::ctrlMostrarParroquia($parametros, $datos);
                    foreach ($parroquia as $key => $value) {
                      echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                    }

                    ?>
                  </select>

                  <!-- Rango -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                  </div>
                  <select name="cbxRango" id="cbxRango" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Párroco">Párroco</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Ninguno">Ninguno</option> 
                  </select>


                </div>


              </div>

              <!-- Modal footer -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Persona</button>
            </div>
            <?php
            $objGuardarUsuario = new ControladorUsuario();
            $objGuardarUsuario->ctrlGuardarUsuario();
            ?>
          </form>
        </div>
      </div>
    </div>

    <div class="modal" id="ModalUsuariosModificar">
      <div class="modal-dialog">
        <div class="modal-content">

          <form role="form" method="POST">
            <!-- Modal Header -->
            <div class="modal-header" style="background: #adb5bd;">
              <h4 class="modal-title">Modificar USUARIO</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="box-doby">

              <div class="input-group mb-3">
                  <!-- Cédula -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtCedulaModificar" id="txtCedulaModificar" class="form-control" placeholder="Ingrese la Cédula"  readonly required pattern="[0-9]+" required>


                </div>

                <div class="input-group mb-3">

                  <!-- Nombres -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" name="txtNombresModificar" id="txtNombresModificar"class="form-control" placeholder="Ingrese sus Nombres" required>

                  <!-- Correo -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="txtCorreoModificar" id="txtCorreoModificar" class="form-control" placeholder="Ingrese Correo" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Teléfono -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtTelefonoModificar" id="txtTelefonoModificar" class="form-control " placeholder="Ingrese Teléfono" required>
                  <!-- Empleado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxEmpleadoModificar" id="cbxEmpleadoModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Secretari@">Secretari@</option>
                  </select>


                </div>

                <div class="input-group mb-3">

                  <!-- Username -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" name="txtUsernameModificar" id="txtUsernameModificar" class="form-control" placeholder="Ingrese Nombre de Usuario" required  readonly>

                </div>

                <div class="input-group mb-3">


                  <!--Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtPassModificar" id="txtPassModificar" class="form-control" placeholder="Ingrese la Contraseña" required>
                  <!-- Repetir Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtResPassModificar" id="txtResPassModificar" class="form-control" placeholder="Ingrese Repetir Contraseña" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Estado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-people-arrows"></i></span>
                  </div>
                  <select name="cbxEstadoModificar" id="cbxEstadoModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                  <!-- Rol -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxRolModificar" id="cbxRolModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>


                </div>

                <div class="input-group mb-3">
                  <!-- Parroquia -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                  </div>
                  <select name="cbxParroquiaModificar" id="cbxParroquiaModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <?php
                    $parametros = null;
                    $datos = null;
                    $parroquia = ControladorParroquia::ctrlMostrarParroquia($parametros, $datos);
                    foreach ($parroquia as $key => $value) {
                      echo '<option value="'.$value["id"] .'">'.$value["nombre"] .'</option>';
                    }

                    ?>
                  </select>

                   <!-- Rango -->
                   <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                  </div>

                  <select name="cbxRangoModificar" id="cbxRangoModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Párroco">Párroco</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Ninguno">Ninguno</option>
                  </select>


                </div>

                <input id="int_prodId" name="int_prodId" type="hidden">


              </div>

              <!-- Modal footer -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Persona</button>
            </div>
            <?php
            $objUsuario = new ControladorUsuario();
            $objUsuario->ctrlModificarUsuario();
            ?>
          </form>
        </div>
      </div>
    </div>

  <?php }
  if ($_SESSION['rol'] == 2) { ?>
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-primary" data-toggle="modal" data-target="#ModalUsuarios">
            Agregar Usuario<span class="fas fa-plus-circle"></span>
          </button>


        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo Empleado</th>

                <th>Parroquia</th>
                <th>Rango</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $parametros = null;
              $datos = null;

              $usuarios = ControladorUsuario::ctrlMostrarUsuario($parametros, $datos);
              foreach ($usuarios as $key => $value) {
                echo '
                        <tr>
                          <td>'.$value["cedula"].'</td>
                          <td>'.$value["nombres_apellidos"].'</td>
                          <td>'.$value["correo"].'</td>
                          <td>'.$value["telefono"].'</td>
                          <td>'.$value["tipo_empleado"].'</td>

                          <td>'.$value["parroquia"].'</td>
                          <td>'.$value["rango"].'</td>
                          <td>
                            
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarUsuario" idUsuario = "'.$value["id"].'"data-toggle="modal" data-target="#ModalUsuariosModificar">
                              <i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarUsuarios" idUsuario = "'.$value["id"].'" ><i class="far fa-window-close"></i></button>
                            </div> 
                          </td>
                        </tr>
                        ';
              }
              ?>

            </tbody>
            <tfoot>
              <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo Empleado</th>

                <th>Parroquia</th>
                <th>Rango</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
          </table>
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

    <div class="modal" id="ModalUsuarios">
      <div class="modal-dialog">
        <div class="modal-content">

          <form role="form" method="POST">
            <!-- Modal Header -->
            <div class="modal-header" style="background: #adb5bd;">
              <h4 class="modal-title">AGREGAR NUEVA USUARIO</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="box-doby">
                <div class="input-group mb-3">
                  <!-- Cédula -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtCedula" class="form-control" placeholder="Ingrese la Cédula" required pattern="[0-9]+" required>


                </div>

                <div class="input-group mb-3">

                  <!-- Nombres -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" name="txtNombres" class="form-control" placeholder="Ingrese sus Nombres" required>

                  <!-- Correo -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="txtCorreo" class="form-control" placeholder="Ingrese Correo" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Teléfono -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtTelefono" class="form-control " placeholder="Ingrese Teléfono" required>
                  <!-- Empleado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxEmpleado" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Secretari@">Secretari@</option>
                  </select>


                </div>

                <div class="input-group mb-3">

                  <!-- Username -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" name="txtUsername" class="form-control" placeholder="Ingrese Nombre de Usuario" required>

                </div>

                <div class="input-group mb-3">


                  <!--Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtPass" class="form-control" placeholder="Ingrese la Contraseña" required>
                  <!-- Repetir Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtResPass" class="form-control" placeholder="Ingrese Repetir Contraseña" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Estado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-people-arrows"></i></span>
                  </div>
                  <select name="cbxEstado" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                  <!-- Rol -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxRol" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>


                </div>

                <div class="input-group mb-3">
                  <!-- Parroquia -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                  </div>
                  <?php
                  echo '<input name="cbxParroquia" value="' . $_SESSION["nombre_parroquia"] . '" class="form-control input-lg" readonly> </input>';
                  ?>

                  <!-- Rango -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                  </div>
                  <select name="cbxRango" id="cbxRango" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Párroco">Párroco</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Ninguno">Ninguno</option> 
                  </select>


                </div>


              </div>

              <!-- Modal footer -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Persona</button>
            </div>
            <?php
            $objGuardarUsuario = new ControladorUsuario();
            $objGuardarUsuario->ctrlGuardarUsuario();
            ?>
          </form>
        </div>
      </div>
    </div>

    <div class="modal" id="ModalUsuariosModificar">
      <div class="modal-dialog">
        <div class="modal-content">

          <form role="form" method="POST">
            <!-- Modal Header -->
            <div class="modal-header" style="background: #adb5bd;">
              <h4 class="modal-title">Modificar USUARIO</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="box-doby">

              <div class="input-group mb-3">
                  <!-- Cédula -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtCedulaModificar" id="txtCedulaModificar" class="form-control" placeholder="Ingrese la Cédula"  readonly required pattern="[0-9]+" required>


                </div>

                <div class="input-group mb-3">

                  <!-- Nombres -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" name="txtNombresModificar" id="txtNombresModificar"class="form-control" placeholder="Ingrese sus Nombres" required>

                  <!-- Correo -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  </div>
                  <input type="email" name="txtCorreoModificar" id="txtCorreoModificar" class="form-control" placeholder="Ingrese Correo" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Teléfono -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                  </div>
                  <input type="text" maxlength="10" name="txtTelefonoModificar" id="txtTelefonoModificar" class="form-control " placeholder="Ingrese Teléfono" required>
                  <!-- Empleado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxEmpleadoModificar" id="cbxEmpleadoModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Secretari@">Secretari@</option>
                  </select>


                </div>

                <div class="input-group mb-3">

                  <!-- Username -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" name="txtUsernameModificar" id="txtUsernameModificar" class="form-control" placeholder="Ingrese Nombre de Usuario" required  readonly>

                </div>

                <div class="input-group mb-3">


                  <!--Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtPassModificar" id="txtPassModificar" class="form-control" placeholder="Ingrese la Contraseña" required>
                  <!-- Repetir Contraseña-->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                  <input type="password" name="txtResPassModificar" id="txtResPassModificar" class="form-control" placeholder="Ingrese Repetir Contraseña" required>

                </div>

                <div class="input-group mb-3">
                  <!-- Estado -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-people-arrows"></i></span>
                  </div>
                  <select name="cbxEstadoModificar" id="cbxEstadoModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                  <!-- Rol -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                  </div>
                  <select name="cbxRolModificar" id="cbxRolModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                  </select>


                </div>

                <div class="input-group mb-3">
                  <!-- Parroquia -->
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                  </div>
                  <select name="cbxParroquiaModificar" id="cbxParroquiaModificar" class="form-control input-lg" disabled="disabled>
                    <option value="Seleccione">Seleccione</option>
                    <?php
                    $parametros = null;
                    $datos = null;
                    $parroquia = ControladorParroquia::ctrlMostrarParroquia($parametros, $datos);
                    foreach ($parroquia as $key => $value) {
                      echo '<option value="'.$value["id"] .'">'.$value["nombre"] .'</option>';
                    }

                    ?>
                  </select>

                   <!-- Rango -->
                   <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                  </div>

                  <select name="cbxRangoModificar" id="cbxRangoModificar" class="form-control input-lg">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Párroco">Párroco</option>
                    <option value="Sacerdote">Sacerdote</option>
                    <option value="Ninguno">Ninguno</option>
                  </select>


                </div>

                <input id="int_prodId" name="int_prodId" type="hidden">


              </div>

              <!-- Modal footer -->

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Persona</button>
            </div>
            <?php
            $objUsuario = new ControladorUsuario();
            $objUsuario->ctrlModificarUsuario();
            ?>
          </form>
        </div>
      </div>
    </div>
    <?php }
  ?>

</div>
<!-- /.content-wrapper -->