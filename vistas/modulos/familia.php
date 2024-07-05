<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Familia</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inico</a></li>
              <li class="breadcrumb-item active">Familia</li>
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

          <button class="btn btn-primary" data-toggle="modal" data-target="#ModalFamilia">
            Agregar Familia <span class="fas fa-plus-circle"></span>
          </button>
          
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $parametros = null;
                      $datos = null;

                      $familia = ControladorFamilia::ctrlMostrarFamilia($parametros, $datos);
                      foreach($familia as $key=>$value){
                        echo '
                        <tr>
                          <td>'.$value["id"].'</td>
                          <td>'.$value["nombres"].'</td>
                          <td>'.$value["descripcion"].'</td>
                          <td>
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarFamilia" idFamilia = "'.$value["id"].'"data-toggle="modal" data-target="#ModalFamiliaModificar"><i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarFamilia" idFamilia = "'.$value["id"].'" ><i class="far fa-window-close"></i></button>
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
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                      
                  </tfoot>
          </table>
        </div>
        
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->



<!-- /.Modal del Familia -->
   <div class="modal" id="ModalFamilia">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">AGREGAR NUEVA FAMILIA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

           <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">
              <div class="input-group mb-3">
               
               <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                </div>
                <input type="text" name="txt_nombreM" class="form-control" placeholder="Ingrese sus Nombres">

                <!-- descripcion -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" name="txt_descripcionM" class="form-control" placeholder="Ingrese Descripcion">
              </div>

            </div>
       
          <!-- Modal footer -->   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Familia</button>
          </div>
          <?php
            $objGuardarCliente = new ControladorFamilia();
            $objGuardarCliente->ctrlGuardarFamilia();
          ?>
        </form>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->


  <!--Modal de Familia Modificar -->

   <div class="modal" id="ModalFamiliaModificar">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">EDITAR DATOS DE FAMILIA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">
              <div class="input-group mb-3">
                
                <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                </div>
                <input type="text" id="txt_nombreModM" name="txt_nombreModM" class="form-control" placeholder="Ingrese sus Nombres">
       
                <!-- Descripcion -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" id="txt_descripcionModM" name="txt_descripcionModM" class="form-control" placeholder="Ingrese Descripcion">
              </div>

            </div> 

            <input id="int_prodId" name="int_prodId" type="hidden">

          <!-- Modal footer -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar Familia</button>
          </div>
          <?php
            $objGuardarCliente = new ControladorFamilia();
            $objGuardarCliente->ctrlModificarFamilia();
          ?>
        </form>
      </div>
    </div>
  </div>

   <!--Modal de conformación de Familia -->

   <div class="modal" id="ModalConformacionFamilia">
    <div class="modal-dialog">
      <div class="modal-content">

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
                    <th>Estado Civil</th>
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
                          <td>'.$value["genero"].'</td>
                          <td>
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarPersona" idPersona = "'.$value["id"].'"data-toggle="modal" data-target="#ModalPersonasModificar"><i class="far fa-edit"></i></button>
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
                    <th>Estado Civil</th>
                    <th>Nacionalidad</th>
                    <th>Profesión</th>
                    <th>Acciones</th>
                  </tr>
                      
                  </tfoot>
          </table>
        </div>


        <form role="form" method="POST">
        
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">CONFORMACIÓN DE FAMILIA/h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">
              <div class="input-group mb-3">
                
                <!-- Nombre Persona -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                </div>
                <input type="text" id="txt_nombre_persona" name="txt_nombrepersona" class="form-control" readonly=»readonly» placeholder="Ingrese sus Nombres">
       
                <!-- Apellido Persona -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" id="txt_apellido_persona" name="txt_apellido_persona" class="form-control" placeholder="Ingrese Descripcion">
              </div>
              <input id="int_persona" name="int_persona" type="hidden">
            </div> 

            <div class="input-group mb-3">
                
                <!-- Nombre Integrate -->
                <div class="input-group-prepend">
                </div>
                <h4>Integrantes de Familia</h4>
       
                <!-- Apellido Persona -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <select id="cbx_integrante_familia" name="cbx_integrante_familia" class="form-control input-lg">
                  <option value="Pápa">Pápa</option>
                  <option value="Máma">Máma</option>
                  <option value="Hijo">Hijo</option>
                  <optiona value="Hija">Hija</optiona>
                </select>
              </div>
            </div> 

            

          <!-- Modal footer -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar Familia</button>
          </div>
          <?php
            $objGuardarCliente = new ControladorFamilia();
            $objGuardarCliente->ctrlModificarFamilia();
          ?>
        </form>
      </div>
    </div>
  </div>