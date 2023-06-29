<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Edit Kategori</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content-header">
    <div class="container-fluid">
      <form method="post" action="<?php echo base_url('categories/update/' . $category->category_id); ?>">
        <div class="form-group">
          <input type="text" name="category_name" class="form-control" value="<?php echo $category->category_name; ?>"
            required>
        </div>
        <button class="btn btn-primary" type="submit">Update</button>
      </form>
    </div>
  </section>
</div>