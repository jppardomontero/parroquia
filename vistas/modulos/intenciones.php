 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Intenciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Intenciones</li>
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
          <button class="btn btn-primary" data-toggle="modal" data-target="#ModalIntenciones">
            Agregar Intenciones <span class="fas fa-plus-circle"></span>
          </button>
    
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
           <thead>
            <tr>
              <th>Id</th>
              <th>Eucaristia</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Intensión</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
              <?php
                $parametros = null;
                $datos = null;

                $intenciones = ControladorIntenciones::ctrlMostrarIntenciones($parametros, $datos);
                foreach($intenciones as $key=>$value){
                  echo '
                  <tr>
                    <td>'.$value["id"].'</td>
                    <td>'.$value["nombre_eucaristia"].'</td>
                    <td>'.$value["fecha"].'</td>
                    <td>'.$value["hora"].'</td>
                    <td>'.$value["nombre_intension"].'</td>
                    <td>
                      <div class="btn btn-group">
                        <button class="btn btn-warning btnEditarIntenciones" idIntenciones = "'.$value["id"].'"data-toggle="modal" data-target="#ModalIntencionesModificar"><i class="far fa-edit"></i></button>
                        <button class="btn btn-danger btnEliminarIntenciones" idIntenciones = "'.$value["id"].'" ><i class="far fa-window-close"></i></button>
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
              <th>Fecha</th>
              <th>Hora</th>
              <th>Descripción</th>
              <th>Acciones</th>
            </tr>
                
            </tfoot>
    </table>
  </div>
  
</div>
<!-- /.card -->

</section>

   <!-- /.Modal del Personas -->

   <div class="modal" id="ModalIntenciones">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">AGREGAR NUEVA INTENCION</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       
          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">
              <div class="input-group mb-3">
                <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                </div>
                <input type="text" name="txt_nombreM" class="form-control" placeholder="Ingrese el nombre">

              

              </div>

              <div class="input-group mb-3">

            <!-- combobox intenciones -->
            
             <select name="cbxintenciones" class = "form-control input-lg">
               <option value="Seleccione">Seleccione Eucaristia</option>
               <?php
               $intenciones = ControladorIntenciones::ctrltraerintenciones();
               foreach ($intenciones as $key => $value){
                 echo '<option value = "' . $value["id"] .'">' . $value["nombre"] . " " . $value["fecha"] . " " . $value["hora"] .'</option>';
               }
                          
               ?>
             </select>
            

              </div>
       
              <div class="input-group mb-3">
              <!-- descripción -->
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                    <input type="text" name="txt_valorM" placeholder="Ingrese valor" class="form-control">

       
              </div>
            </div>
       
            <!-- Modal footer -->
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Intenciones</button>
          </div>
          <?php
            $objGuardarIntenciones = new ControladorIntenciones();
            $objGuardarIntenciones->ctrlGuardarIntenciones();
          ?>
        </form>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->



  <!-- /.Modal del Personas Modificar -->

  <div class="modal" id="ModalIntencionesModificar">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="POST">
        <!-- Modal Header -->
          <div class="modal-header" style="background: #adb5bd;">
            <h4 class="modal-title">EDITAR DATOS DE INTENCIONES</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
       
          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-doby">
              <div class="input-group mb-3">
                <!-- nombre -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                </div>
                <input type="text" id="txt_nombreModM" name="txt_nombreModM" class="form-control" placeholder="Ingrese el nombre">

              

              </div>

              <div class="input-group mb-3">
               
                   <!-- fecha -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" id="txt_fechaModM" name="txt_fechaModM" class="form-control fecha" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
       
                <!-- hora -->
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa fa-user"></i></span>
                </div>
                <input type="text" id="txt_horaModM" name="txt_horaModM" class="form-control" placeholder="Ingrese la hora">
                
             

              </div>
       
              <div class="input-group mb-3">
              <!-- descripcion -->
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                    <input type="text" id="txt_descripcionModM" name="txt_descripcionModM" class="form-control" placeholder= "Ingrese descripcion">
                    
              </div>
       
            </div>
            <input id="int_prodId" name="int_prodId" type="hidden">
       
            <!-- Modal footer -->
             
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar Intenciones</button>
          </div>
          <?php
            $objGuardarIntenciones = new ControladorIntenciones();
            $objGuardarIntenciones->ctrlModificarIntenciones();
          ?>
        </form>
      </div>
    </div>
  </div>