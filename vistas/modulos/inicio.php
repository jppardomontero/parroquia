 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menú</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inico</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php
          echo '

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">'.$_SESSION["nombre_parroquia"].'</h2>

          
        </div>
        <div class="card-body">
          
          <img class="img-fluid pad" src="'.$_SESSION["wallpapers"].'" alt="Parroquia">
          ';
          ?>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->