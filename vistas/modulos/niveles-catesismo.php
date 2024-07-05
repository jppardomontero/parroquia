<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catequesis</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Niveles Catesismo</li>
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
          
        <button class="btn btn-primary" data-toggle="modal" data-target="#ModalNiveles">
            Agregar Niveles de Catecismo <span class="fas fa-plus-circle"></span>
          </button>

          </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Requisitos</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>

                  </tr>
                  </thead>
                  <tbody>

                  <?php
                      $parametros = null;
                      $datos = null;

                      $niveles = ControladorNiveles::ctrlMostrarNiveles($parametros, $datos);
                      foreach($niveles as $key=>$value){
                        echo '
                        <tr>
                          <td>'.$value["id"].'</td>
                          <td>'.$value["nombres"].'</td>
                          <td>'.$value["requisito"].'</td>
                          <td>'.$value["descripcion"].'</td>
                          <td>
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarNiveles" idNiveles = "'.$value["id"].'"data-toggle="modal" data-target="#ModalNivelesModificar"><i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarNiveles" idNiveles = "'.$value["id"].'" ><i class="far fa-window-close"></i></button>
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
                    <th>Requisitos</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                  </tr>
                      
                  </tfoot>
          </table>

      </div>
        
      </div>

    </section>
    <!-- /.content -->


    <!-- /.Modal del  Niveles -->
   <div class="modal" id="ModalNiveles">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">AGREGAR NUEVO NIVEL CATECISMO</h4>
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
                <input type="text" name="txt_nombresM" class="form-control" placeholder="Ingrese el nivel de catesismo">
              </div>

              <div class="input-group mb-3">

                <!-- requisitos -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                </div>
                <input type="text"  name="txt_requisitosM" class="form-control" placeholder="Ingrese sus requisitos">
              </div>

              <div class="input-group mb-3">

                <!-- descripcion -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text"  name="txt_descripcionM" class="form-control" placeholder="Ingrese su Descripcion">
              </div>

            </div>

            <!-- Modal footer -->   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Niveles Catecismo</button>
          </div>
          <?php
            $objGuardarNiveles = new ControladorNiveles();
            $objGuardarNiveles->ctrlGuardarNiveles();
          ?>
        </form>
      </div>
    </div>

  </div>
  <!-- /.content-wrapper -->

   <!-- /.Modal de Niveles Modificar -->

   <div class="modal" id="ModalNivelesModificar">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">EDITAR DATOS DE NIVELES DE CATECISMO</h4>
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
                <input type="text" id="txt_nombreModM" name="txt_nombreModM"class="form-control" placeholder="Ingrese el nivel de catesismo"">
              </div>

              <div class="input-group mb-3">

                <!-- requisitos -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                </div>
                <input type="text" id="txt_requisitosModM" name="txt_requisitosModM" class="form-control" placeholder="Ingrese sus requisitos">
              </div>

              <div class="input-group mb-3">

                <!-- descripcion -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                </div>
                <input type="text" id="txt_descripcionModM" name="txt_descripcionModM" class="form-control" placeholder="Ingrese su Descripcion">
              </div>

              <input id="int_prodId" name="int_prodId" type="hidden">

            </div>

            <!-- Modal footer -->   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Niveles Catecismo</button>
          </div>
          <?php
            $objGuardarNiveles = new ControladorNiveles();
            $objGuardarNiveles->ctrlModificarNiveles();
          ?>
        </form>
      </div>
    </div>

  </div>

 
