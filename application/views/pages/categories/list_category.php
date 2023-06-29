<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Kategori</h1>
        </div>
        <div class="col-sm-6 d-none d-sm-block">
          <a href="<?php echo base_url('categories/add'); ?>">
            <button class="btn btn-primary ml-auto d-block">Tambah Kategori</button>
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
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categories as $key => $category) { ?>
                    <tr>
                      <td>
                        <?php echo $key + 1; ?>
                      </td>
                      <td>
                        <?php echo $category->category_name; ?>
                      </td>
                      <td>
                        <a href="<?= base_url('index.php/categories/edit/' . $category->category_id) ?>">
                          <button class="btn btn-primary">
                            Edit
                          </button>
                        </a>
                        <?php if (!$category->isUsed): ?>
                          <a href="<?= base_url('index.php/categories/delete/' . $category->category_id) ?>">
                            <button class="btn btn-danger">hapus</button>
                          </a>
                        <?php endif; ?>
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