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
              <li class="breadcrumb-item active">Parroquias</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#ModalParroquia">
            Agregar Parroquia<span class="fas fa-plus-circle"></span>
          </button>

          
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                 <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Walpaper</th>
                    <th>Localidad</th>
                    <th>Parroquia</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $parametros = null;
                      $datos = null;

                      $persona = ControladorParroquia::ctrlMostrarParroquia($parametros, $datos);
                      foreach($persona as $key=>$value){
                        echo '
                        <tr>
                          <td>'.$value["id"].'</td>
                          <td>'.$value["nombre"].'</td>
                          <td> <img src="'.$value["logo"].'" width = "32"></td>
                          <td> <img src="'.$value["wallpapers"].'" width = "150"></td>
                          <td>'.$value["localidad"].'</td>
                          <td>'.$value["parroquia"].'</td>
                          <td>
                            <div class="btn btn-group">
                              <button class="btn btn-warning btnEditarParroquia" idParroquia = "'.$value["id"].'"data-toggle="modal" data-target="#ModalParroquiModificar">
                              <i class="far fa-edit"></i></button>
                              <button class="btn btn-danger btnEliminarParroquia" idParroquia = "'.$value["id"].'" ><i class="far fa-window-close"></i></button>
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
                    <th>Logo</th>
                    <th>Walpaper</th>
                    <th>Localidad</th>
                    <th>Parroquia</th>
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

   <div class="modal" id="ModalParroquia">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST" enctype="multipart/form-data">
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">AGREGAR PARROQUIA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       
          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">

              <div class="input-group mb-3">
               
                   <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-city"></i></span>
                </div>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese la Parroquia" required>
                

              </div>

              <div class="input-group mb-3">
               
                   <!-- localidad -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input type="text" name="localidad" class="form-control" placeholder="Ingrese la Localidad" required>

                   <!-- localidad -->
                   <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input type="text" name="parroquia" class="form-control" placeholder="Ingrese la Parroquia" required>
                

              </div>
       
              <div class="input-group mb-3">
              <!-- Logo -->
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input type="file" name="logo" id="file_browse" accept="image/png" required>
               
       
               
              </div>

              <div class="input-group mb-3">

               <!-- Walpapers -->
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                </div>
                <input type="file" name="wallpapers" id="file_browse" accept="image/png" required>
                

       

       
                </div>

       
            </div>
       
            <!-- Modal footer -->
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Parroquia</button>
          </div>
          <?php
            $objGuardar = new ControladorParroquia();
            $objGuardar->ctrlGuardarParroquia();
          ?>
        </form>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->




  <div class="modal" id="ModalParroquiModificar">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST" enctype="multipart/form-data">
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">MODIFICAR PARROQUIA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       
          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">

              <div class="input-group mb-3">
               
                   <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-city"></i></span>
                </div>
                <input type="text" name="nombre_modificar" id = "nombre_modificar" class="form-control" placeholder="Ingrese la Parroquia" required>

              </div>

              <div class="input-group mb-3">
               
               <!-- localidad -->
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <input type="text" name="localidad_modificar" id="localidad_modificar" class="form-control" placeholder="Ingrese la Localidad" required>

               <!-- localidad -->
               <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
            </div>
            <input type="text" name="parroquia_modificar" id="parroquia_modificar" class="form-control" placeholder="Ingrese la Parroquia" required>
            

          </div>
       
              <div class="input-group mb-3">
              <!-- Logo -->
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                 
                  <input type="file" name="logo_modificar" id="logo_modificar" accept="image/x-icon" required>
               
       
               
              </div>

              <div class="input-group mb-3">

               <!-- Walpapers -->
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-child"></i></span>
                </div>
                <input type="file" name="wallpapers_modificar" id="wallpapers_modificar" accept="image/png" required>

       
                </div>

       
            </div>
       
            <!-- Modal footer -->
            <input id="int_prodId" name="int_prodId" type="hidden">
            <input id="aux_logo" name="aux_logo" type="hidden">
            <input id="aux_wallpapers" name="aux_wallpapers" type="hidden">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Parroquia</button>
          </div>
          <?php
            $objModificar = new ControladorParroquia();
            $objModificar->ctrlModificarParroquia();
          ?>
        </form>
      </div>
    </div>
  </div>


   <!-- /.Modal del Personas Modificar -->