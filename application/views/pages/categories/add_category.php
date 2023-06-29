<div class="content-wrapper">
  <section class="content-header pt-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold">Tambah Kategori</h1>
      </div>
    </div>
  </section>

  <section class="content-header">
    <div class="container-fluid">
      <form action="<?php echo base_url('categories/save'); ?>" method="POST">
        <div class="form-group">
          <input type="text" name="category_name" class="form-control" placeholder="Nama Kategori" required>
        </div>
        <button class="btn btn-primary" type="submit">Tambah</button>
      </form>
    </div>
  </section>
</div>