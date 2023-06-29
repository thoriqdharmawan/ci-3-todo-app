<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>User</h1>
        </div>
        <div class="col-sm-6 d-none d-sm-block">
          <a href="<?php echo base_url('users/add'); ?>">
            <button class="btn btn-primary ml-auto d-block">Tambah User</button>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $key => $user) { ?>
                    <tr>
                      <td>
                        <?php echo $key + 1; ?>
                      </td>
                      <td>
                        <?php echo $user->name; ?>
                      </td>
                      <td>
                        <?php echo $user->username; ?>
                      </td>
                      <td>
                        <?php echo $user->email; ?>
                      </td>
                      <td>
                        <?php echo $user->password; ?>
                      </td>
                      <td>
                        <?php echo $user->role; ?>
                      </td>
                      <td>
                        <a href="<?= base_url('users/edit/' . $user->user_id) ?>">
                          <button class="btn btn-primary">
                            Edit
                          </button>
                        </a>
                        <a href="<?= base_url('users/delete/' . $user->user_id) ?>">
                          <button class="btn btn-danger">hapus</button>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>