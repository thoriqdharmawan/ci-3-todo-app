<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper kanban">
  <section class="content-header pt-4">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="font-weight-bold">Todo</h1>
        <a href="<?php echo base_url('dashboard/addTodo/' . $project_id); ?>">
          <button class="btn btn-primary">Tambah Todo</button>
        </a>
      </div>
    </div>
  </section>
  
  <section class="content pb-3">
    <div class="container-fluid h-100">
      <div class="card card-row card-secondary">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-list-ul mr-2"></i>
            Todo
          </h3>
        </div>
        <div class="card-body">

          <?php foreach ($todosTodo as $todo): ?>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">
                  <?php echo $todo->todo_name; ?>
                </h5>
                <div class="card-tools">

                  <div class="dropdown mr-3">
                    <i class="fas fa-caret-down" data-toggle="dropdown" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a href="<?php echo base_url('dashboard/editTodo/' . $project_id . '/' . $todo->todo_id); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-pen mr-2"></i>
                        Edit Todo
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo->todo_id . '/INPROGRESS'); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-bolt mr-2"></i>
                        Ubah Ke In Progress
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo->todo_id . '/DONE'); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-check mr-2"></i>
                        Ubah Ke Done
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/deleteTodo/' . $project_id . '/' . $todo->todo_id); ?>"
                        class="dropdown-item text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                      </a>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                  <label for="customCheckbox1" class="custom-control-label">Bug</label>
                </div>
                <!-- <div class="custom-control custom-checkbox">
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
                </div> -->
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="card card-row card-primary">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-bolt mr-2"></i>
            In Progress
          </h3>
        </div>
        <div class="card-body">

          <?php foreach ($todosInprogress as $todo): ?>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">
                  <?php echo $todo->todo_name; ?>
                </h5>
                <div class="card-tools">

                  <div class="dropdown mr-3">
                    <i class="fas fa-caret-down" data-toggle="dropdown" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a href="<?php echo base_url('dashboard/editTodo/' . $project_id . '/' . $todo->todo_id); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-pen mr-2"></i>
                        Edit Todo
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo->todo_id . '/TODO'); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-list-ul mr-2"></i>
                        Ubah Ke Todo
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo->todo_id . '/DONE'); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-check mr-2"></i>
                        Ubah Ke Done
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/deleteTodo/' . $project_id . '/' . $todo->todo_id); ?>"
                        class="dropdown-item text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                      </a>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                  <label for="customCheckbox1" class="custom-control-label">Bug</label>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>

      <div class="card card-row card-success">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-check mr-2"></i>
            Done
          </h3>
        </div>
        <div class="card-body">
          <?php foreach ($todosDone as $todo): ?>
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">
                  <?php echo $todo->todo_name; ?>
                </h5>
                <div class="card-tools">

                  <div class="dropdown mr-3">
                    <i class="fas fa-caret-down" data-toggle="dropdown" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <a href="<?php echo base_url('dashboard/editTodo/' . $project_id . '/' . $todo->todo_id); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-pen mr-2"></i>
                        Edit Todo
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo->todo_id . '/TODO'); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-list-ul mr-2"></i>
                        Ubah Ke Todo
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo->todo_id . '/INPROGRESS'); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-bolt mr-2"></i>
                        Ubah Ke In Progress
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/deleteTodo/' . $project_id . '/' . $todo->todo_id); ?>"
                        class="dropdown-item text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                      </a>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                  <label for="customCheckbox1" class="custom-control-label">Bug</label>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

</div>