 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Certíficados/Fé de Bautizo</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="inicio">Inico</a></li>
             <li class="breadcrumb-item active">Fé de Bautizo</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="card">
    <div class="card-body">
      <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombres</th>
              <th>Apellidos</th>
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
                          <td>' . $value["fecha"] . '</td>
                          <td>
                            <div class="btn btn-group">
                            <button class="btn btn-success btnFeBautizo" data-dismiss="modal" &times;  required data-toggle="tooltip" data-placement="top" title="Imprimir" idPersona = "' . $value["id"] . '">
                              <i class="far fa-edit"></i></button>
                            
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
 <!-- /.content-wrapper -->



 <div id="myModal" class="modal modal-" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #adb5bd;">
        <h4 class="modal-title">AGREGAR NUEVA PERSONA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

     
    </div>
  </div>
</div>