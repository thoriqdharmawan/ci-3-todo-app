<div class="content-wrapper">
  <section class="content-header pt-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold">Project</h1>
        <!-- <a href="/dashboard/add">
          <button class="btn btn-primary">Tambah Project</button>
        </a> -->
      </div>
    </div>
  </section>

  <section class="content-header">
    <div class="container-fluid">
      <form action="<?php echo base_url('dashboard/addProject'); ?>" method="POST">
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <div class="form-group">
              <input type="text" name="project_name" placeholder="Tambahkan Project" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </div>
      </form>

    </div>
  </section>

  <section class="content-header">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h3>Daftar Project</h3>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php foreach ($projects as $project): ?>
          <div class="col-sm-12 col-md-3">
            <div class="card">
              <a href="<?php echo base_url('dashboard/todos/' . $project->project_id); ?>">
                <div class="card-body">
                  <h4 class="card-title font-weight-bold mb-3">
                    <?php echo $project->project_name; ?>
                  </h4>
                  <p class="card-text">
                    dibuat pada
                    <?php
                    $dateObj = new DateTime($project->created_at);
                    $formattedDate = $dateObj->format('d M Y');
                    echo $formattedDate;
                    ?>
                  </p>
                </div>

              </a>
              <a class="btn btn-danger"
                onclick="return confirm('Apakah yakin untuk menghapus project?')"
                href="<?php echo base_url('dashboard/deleteProject/' . $project->project_id); ?>">Hapus
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>