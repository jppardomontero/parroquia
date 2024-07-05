 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inico</a></li>
              <li class="breadcrumb-item active">Personas</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#ModalPersonas">
            Agregar Persona <span class="fas fa-plus-circle"></span>
          </button>

          
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Id</th>
                    <th>Cédula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha Nacimiento</th>
                    <th>Genero</th>
                    <th>Lugar Nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $parametros = null;
                      $datos = null;

                      $persona = ControladorPerona::ctrlMostrarPersona($parametros, $datos);
                      foreach($persona as $key=>$value){
                        echo '
                        <tr>
                          <td>'.$value["id"].'</td>
                          <td>'.$value["cedula"].'</td>
                          <td>'.$value["nombres"].'</td>
                          <td>'.$value["apellidos"].'</td>
                          <td>'.$value["f_nacimiento"].'</td>
                          <td>'.$value["genero"].'</td>
                          <td>'.$value["lugar_nacimiento"].'</td>
                          <td>'.$value["nacionalidad"].'</td>
                          <td>'.$value["profesion"].'</td>
                          <td>
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarPersona" idPersona = "'.$value["id"].'"data-toggle="modal" data-target="#ModalPersonasModificar">
                              <i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarPersona" idPersona = "'.$value["id"].'" ><i class="far fa-window-close"></i></button>
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
                    <th>Fecha Nacimiento</th>
                    <th>Genero</th>
                    <th>Lugar Nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                  </tr>
                      
                  </tfoot>
          </table>
        </div>
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
   
   
   
  

   <!-- /.Modal del Personas -->

   <div class="modal" id="ModalPersonas">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       
          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">
              <div class="input-group mb-3">
                <!-- cédula -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                </div>
                <input type="text" maxlength="10" name="txt_cedulaM" class="form-control" placeholder="Ingrese la Cédula" required pattern="[0-9]+" >

              

              </div>

              <div class="input-group mb-3">
               
                   <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" name="txt_nombreM" class="form-control" placeholder="Ingrese sus Nombres">
       
                <!-- apellido -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa fa-user"></i></span>
                </div>
                <input type="text" name="txt_apellidoM" class="form-control" placeholder="Ingrese sus Apellidos">
                
             

              </div>
       
              <div class="input-group mb-3">
              <!-- Fecha Nacimiento -->
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                    <input type="text" name="txt_f_nacimientoM" class="maform-control fecha"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                <!-- genero -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-restroom"></i></span>
                </div>
                <select name="cbx_sexoM" class="form-control input-lg">
                  <option value="Seleccione">Seleccione</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
       
               
              </div>

              <div class="input-group mb-3">

               <!-- Estado Civil -->
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                </div>
                <input type="text" name="txt_estado_civilM" class="form-control" placeholder="Ingrese sus Estado Civil">
                
                <!-- Nacionalidad -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-flag"></i></span>
                </div>
                <input type="text" name="txt_nacionalidadM" class="form-control" placeholder="Ingrese sus Nacionalidad">
       

       
            </div>

            <div class="input-group mb-3">
                
                 <!-- Lugar Nacimiento -->
                 <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                </div>
                <input type="text" name="txt_lugarNacimienoM" class="form-control" placeholder="Ingrese sus Lugar de Nacimiento">
                <!-- profesión -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                </div>
                <input type="text" name="txt_profesionM" class="form-control" placeholder="Ingrese sus Profesión">
              </div>
       
            </div>
       
            <!-- Modal footer -->
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Persona</button>
          </div>
          <?php
            $objGuardarCliente = new ControladorPerona();
            $objGuardarCliente->ctrlGuardarPerdona();
          ?>
        </form>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->



   <!-- /.Modal del Personas Modificar -->

   <div class="modal" id="ModalPersonasModificar">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">EDITAR DATOS DE PERSONA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       
          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">
              <div class="input-group mb-3">
                <!-- cédula -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                </div>
                <input type="text" id="txt_cedulaModM" name="txt_cedulaModM" class="form-control" placeholder="Ingrese la Cédula">

              

              </div>

              <div class="input-group mb-3">
               
                   <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" id="txt_nombreModM" name="txt_nombreModM" class="form-control" placeholder="Ingrese sus Nombres">
       
                <!-- apellido -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa fa-user"></i></span>
                </div>
                <input type="text" id="txt_apellidoModM" name="txt_apellidoModM" class="form-control" placeholder="Ingrese sus Apellidos">
                
             

              </div>
       
              <div class="input-group mb-3">
              <!-- Fecha Nacimiento -->
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                    <input type="text" id="txt_f_nacimientoModM" name="txt_f_nacimientoModM" class="form-control fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                <!-- genero -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-restroom"></i></span>
                </div>
                <select id="cbx_sexoModM" name="cbx_sexoModM" class="form-control input-lg">
                  <option value="Seleccione">Seleccione</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
       
               
              </div>

              <div class="input-group mb-3">

               <!-- Estado Civil -->
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                </div>
                <input type="text" id="txt_estado_civilModM" name="txt_estado_civilModM" class="form-control" placeholder="Ingrese sus Estado Civil">
                
                <!-- Nacionalidad -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-flag"></i></span>
                </div>
                <input type="text" id="txt_nacionalidadModM" name="txt_nacionalidadModM" class="form-control" placeholder="Ingrese sus Nacionalidad">
       

       
            </div>

            <div class="input-group mb-3">
                
                <!-- Lugar Nacimiento -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                </div>
                <input type="text" name="txt_lugarNacimientoModM" id="txt_lugarNacimientoModM" class="form-control" placeholder="Ingrese sus Lugar de Nacimiento">
                <!-- profesión -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                </div>
                <input type="text" id="txt_profesionModM" name="txt_profesionModM" class="form-control" placeholder="Ingrese sus Profesión">
              </div>
       
            </div>
            <input id="int_prodId" name="int_prodId" type="hidden">
           
       
            <!-- Modal footer -->
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar Persona</button>
          </div>
          <?php
            $objGuardarCliente = new ControladorPerona();
            $objGuardarCliente->ctrlModificarPerdona();
          ?>
        </form>
      </div>
    </div>
  </div>






 

