<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="d-flex justify-content-between mb-2">
        <h1>Daftar Project</h1>
        <a href="index.php/dashboard/add">
          <button class="btn btn-primary">Tambah Project</button>
        </a>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($projects as $key=>$project): ?>
                  <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $project->project_name; ?></td>
                    <td>
                      <a href="<?= base_url('index.php/dashboard/edit/'. $project->project_id) ?>">
                        <button class="btn btn-primary">
                        Edit
                        </button>
                      </a>
                      <a href="<?= base_url('index.php/dashboard/delete/'. $project->project_id) ?>">
                        <button class="btn btn-danger">hapus</button>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>