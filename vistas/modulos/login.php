<div class="login-box">
  <div class="login-logo">
    <a href="login"><b>Parroquia San Lucas</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicio de Sesión</p>

      <form  method="post">
        <div class="input-group mb-3">
          <select name="cbxParroquia" class="form-control input-lg">
            <option value="Seleccione">Seleccion</option>
          <?php
            $parametros = null;
            $datos = null;
            $parroquia = ControladorParroquia::ctrlMostrarParroquia($parametros, $datos);
            foreach($parroquia as $key=>$value){
              echo '<option value="'.$value["id"].'">' . $value["nombre"] . '</option>';
            }

          ?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>

        <?php
          
          $obj_login = new ControladorUsuario();
          $obj_login->ctrlLoginUsuario(); 

        ?>

      </form>

      

      <p class="mb-1">
        <a href="forgot-password.html">Olvidé mi contraseña</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Registrar una nuevo usuario</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>