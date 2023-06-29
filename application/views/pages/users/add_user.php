<div class="content-wrapper">
  <section class="content-header pt-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold">Tambah User</h1>
      </div>
    </div>
  </section>

  <section class="content-header">
    <div class="container-fluid">
      <form action="<?php echo base_url('users/save'); ?>" method="POST">
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Nama User" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="text" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
          <input type="text" name="user_name" class="form-control" placeholder="Nama User" required>
        </div>
        <select class="form-control" name="role">
          <option value="ADMIN">Admin</option>
          <option value="USER">User</option>
        </select>
        <button class="btn btn-primary mt-4" type="submit">Tambah</button>
      </form>
    </div>
  </section>
</div>