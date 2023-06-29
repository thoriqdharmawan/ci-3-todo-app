<div class="content-wrapper">
  <section class="content-header pt-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold">Ubah Project</h1>
      </div>
    </div>
  </section>
  <section class="content-header">
    <div class="container-fluid">
      <?php if ($this->session->flashdata('error')): ?>
        <p>
          <?php echo $this->session->flashdata('error'); ?>
        </p>
      <?php endif; ?>

      <form action="<?php echo base_url('dashboard/updateProject/' . $project->project_id); ?>" method="POST">
        <div class="form-group">
          <input type="text" name="project_name" placeholder="Nama Project" class="form-control"
            value="<?php echo $project->project_name; ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
      </form>
    </div>
  </section>
</div>