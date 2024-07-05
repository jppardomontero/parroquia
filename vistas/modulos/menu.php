<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <?php
      echo '
      <img src="'.$_SESSION["logo"].'"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">'.$_SESSION["nombre_parroquia"].'</span>
    </a>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">';
    
      if ($_SESSION['rol'] == 2)
      {
      ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              
         
          
          <!-- Menu de Feligreses -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Feligreses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="personas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="familia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Familia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="conformacion-familia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Conformación de Familia</p>
                </a>
              </li>
            </ul>
          </li>
        
          <!-- Menu de Catequesis -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-praying-hands"></i>
              <p>
                Catequesis
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="niveles-catesismo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Niveles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="matriculas-catesismo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matrícula</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pase-anio-catesismo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pase de Año</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu de Sacramentos -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bible"></i>
              <p>
                Sacramentos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sacramento-bautizo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bautizo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sacramento-primera-comunion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primera Comunión</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sacramento-confirmacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Confirmación</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sacramento-matrimonio" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matrimonio</p>
                </a>
              </li>
              
            </ul>
          </li>

          <!-- Menu de Certíficados -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Certíficados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="certificado-bautizo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fé de Bautismo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificado-primera-comunion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primera Comunión</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificado-confirmacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comfirmación</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificado-matrimonio" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matrimonio</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu de Eucaristia -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-place-of-worship"></i>
              <p>
                Celebraciones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="eucaristia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eucaristia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="intenciones" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>intenciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ingresos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos Mensuales</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          
        
        <?php
        }else{
       
        }
        if($_SESSION['rol'] == 1 )
        {
        ?>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              
         
          
          <!-- Menu de Feligreses -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Feligreses
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> 
              <li class="nav-item">
                <a href="personas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Personas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="familia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Familia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="conformacion-familia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Conformación de Familia</p>
                </a>
              </li>
            </ul>
          </li>
        
          <!-- Menu de Catequesis -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-praying-hands"></i>
              <p>
                Catequesis
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="niveles-catesismo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Niveles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="matriculas-catesismo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matrícula</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pase-anio-catesismo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pase de Año</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu de Sacramentos -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bible"></i>
              <p>
                Sacramentos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="sacramento-bautizo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bautizo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sacramento-primera-comunion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primera Comunión</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sacramento-confirmacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Confirmación</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sacramento-matrimonio" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matrimonio</p>
                </a>
              </li>
              
            </ul>
          </li>

          <!-- Menu de Certíficados -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Certíficados
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="certificado-bautizo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fé de Bautismo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificado-primera-comunion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Primera Comunión</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificado-confirmacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comfirmación</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="certificado-matrimonio" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matrimonio</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu de Eucaristia -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-place-of-worship"></i>
              <p>
                Celebraciones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="eucaristia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Eucaristia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="intenciones" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>intenciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="ingresos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresos Mensuales</p>
                </a>
              </li>
              
            </ul>
          </li>
        <!--Menú para Parroquias-->
       
        <li class="nav-item">
            <a href="parroquia" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Parroquias
              </p>
            </a>
          </li>
     

          <!--Menú para Parroquias-->
       
        <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
    
        <?php
        }else{
        
        }
        ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>