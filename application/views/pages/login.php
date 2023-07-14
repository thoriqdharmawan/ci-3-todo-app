<div style="height:100vh" class="container d-flex flex-column justify-content-center align-items-center">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Todo</b>APP</a>
    </div>

    <!-- Login form -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Masuk</p>
        <p class="alert alert-primary">Email: admin | Password: admin</p>

        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('error'); ?>
        <?php echo form_open('auth/login'); ?>
          <div class="input-group mb-3">
            <input value="admin" type="text" name="username" id="username" placeholder="Username" class="form-control" required>
            <div class="input-group-append">
              <span class="fa fa-envelope input-group-text"></span>
            </div>
          </div>

          <div class="input-group mb-3">
            <input value="admin" type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>
            </div>
          </div>
          <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error; ?>
            </div>
          <?php } ?>

          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>