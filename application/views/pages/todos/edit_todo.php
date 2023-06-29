<div class="content-wrapper">
  <section class="content-header pt-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold">Ubah Todo</h1>
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

      <form action="<?php echo base_url('dashboard/updateTodo/' . $project_id . '/' . $todo->todo_id); ?>"
        method="POST">
        <div class="form-group">
          <input type="text" name="todo_name" placeholder="Nama Todo" class="form-control"
            value="<?php echo $todo->todo_name; ?>" required>
        </div>
        <button class="btn btn-primary" type="submit">Ubah Todo</button>
      </form>
    </div>
  </section>
</div>