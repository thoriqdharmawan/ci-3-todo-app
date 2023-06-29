<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper kanban">
  <section class="content-header pt-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold">Todo</h1>
        <!-- <a href="/dashboard/add">
          <button class="btn btn-primary">Tambah Project</button>
        </a> -->
      </div>
    </div>
  </section>

  <?php if (empty($todos)): ?>
    <p>Tidak ada tugas untuk proyek ini.</p>
  <?php else: ?>
    <ul>
      <?php foreach ($todos as $todo): ?>
        <li>
          <?php echo $todo->todo_name; ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Kanban Board</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content pb-3">
    <div class="container-fluid h-100">
      <div class="card card-row card-secondary">
        <div class="card-header">
          <h3 class="card-title">
            Todo
          </h3>
        </div>
        <div class="card-body">
          
          <div class="card card-info card-outline">
            <div class="card-header">
              <h5 class="card-title">Create Labels</h5>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-link">#3</a>
                <a href="#" class="btn btn-tool">
                  <i class="fas fa-pen"></i>
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                <label for="customCheckbox1" class="custom-control-label">Bug</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox2" disabled>
                <label for="customCheckbox2" class="custom-control-label">Feature</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox3" disabled>
                <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox4" disabled>
                <label for="customCheckbox4" class="custom-control-label">Documentation</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="customCheckbox5" disabled>
                <label for="customCheckbox5" class="custom-control-label">Examples</label>
              </div>
            </div>
          </div>
        
        </div>
      </div>
      
      <div class="card card-row card-primary">
        <div class="card-header">
          <h3 class="card-title">
            In Progress
          </h3>
        </div>
        <div class="card-body">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="card-title">Create first milestone</h5>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-link">#5</a>
                <a href="#" class="btn btn-tool">
                  <i class="fas fa-pen"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card card-row card-success">
        <div class="card-header">
          <h3 class="card-title">
            Done
          </h3>
        </div>
        <div class="card-body">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h5 class="card-title">Create repo</h5>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-link">#1</a>
                <a href="#" class="btn btn-tool">
                  <i class="fas fa-pen"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>