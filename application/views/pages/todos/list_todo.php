<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper kanban">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Project:
            <?php echo $detailProject->project_name; ?>
          </h1>
        </div>
        <div class="col-sm-6 d-none d-sm-block">
          <a class="" href="<?php echo base_url('dashboard/addTodo/' . $project_id); ?>">
            <button class="btn btn-primary ml-auto d-block">Tambah Todo</button>
          </a>
        </div>
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
                  <?php echo $todo['todo_name']; ?>
                </h5>
                <div class="card-tools">
                  <div class="dropdown mr-3">
                    <i class="fas fa-caret-down" data-toggle="dropdown" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <button type="button" class="dropdown-item" data-toggle="modal"
                        data-target="#todo<?php echo $todo['todo_id']; ?>">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        Tambahkan Task
                      </button>
                      <a href="<?php echo base_url('dashboard/editTodo/' . $project_id . '/' . $todo['todo_id']); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-pen mr-2"></i>
                        Edit Todo
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo['todo_id'] . '/INPROGRESS'); ?>"
                        class="dropdown-item text-primary" type="button">
                        <i class="fas fa-bolt mr-2"></i>
                        Ubah Ke In Progress
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo['todo_id'] . '/DONE'); ?>"
                        class="dropdown-item text-success" type="button">
                        <i class="fas fa-check mr-2"></i>
                        Ubah Ke Done
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/deleteTodo/' . $project_id . '/' . $todo['todo_id']); ?>"
                        class="dropdown-item text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                      </a>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-body">
                <?php if (!empty($todo['tasks'])): ?>
                  <?php foreach ($todo['tasks'] as $task): ?>
                    <div class="custom-control custom-checkbox mb-3">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                      <label for="customCheckbox1" class="custom-control-label">
                        <?php echo $task['task_name']; ?>
                      </label>
                      <p class="m-0">
                        Status:
                        <?php echo $task['status']; ?>
                      </p>
                      <p class="m-0">
                        Kategori:
                        <?php echo $task['category_name']; ?>
                      </p>
                      <a href="<?php echo base_url('dashboard/deleteTask/' . $project_id . '/' . $task['task_id']); ?>"
                        class="mt-2 text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                      </a>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>Tidak ada task pada TODO ini</p>
                <?php endif; ?>
              </div>
            </div>

            <div class="modal fade" id="todo<?php echo $todo['todo_id']; ?>" tabindex="-1"
              aria-labelledby="todo<?php echo $todo['todo_id']; ?>Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="todo<?php echo $todo['todo_id']; ?>Label">Tambahkan Task:
                      <?php echo $todo['todo_name']; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?php echo base_url('dashboard/addTask/' . $project_id . '/' . $todo['todo_id']); ?>"
                    method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="text" name="task_name" placeholder="Nama Task" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="category_id">
                          <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                  </form>
                </div>
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
                  <?php echo $todo['todo_name']; ?>
                </h5>
                <div class="card-tools">
                  <div class="dropdown mr-3">
                    <i class="fas fa-caret-down" data-toggle="dropdown" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <button type="button" class="dropdown-item" data-toggle="modal"
                        data-target="#todo<?php echo $todo['todo_id']; ?>">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        Tambahkan Task
                      </button>
                      <a href="<?php echo base_url('dashboard/editTodo/' . $project_id . '/' . $todo['todo_id']); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-pen mr-2"></i>
                        Edit Todo
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo['todo_id'] . '/TODO'); ?>"
                        class="dropdown-item text-secondary" type="button">
                        <i class="fas fa-list-ul mr-2"></i>
                        Ubah Ke Todo
                      </a>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo['todo_id'] . '/DONE'); ?>"
                        class="dropdown-item text-success" type="button">
                        <i class="fas fa-check mr-2"></i>
                        Ubah Ke Done
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/deleteTodo/' . $project_id . '/' . $todo['todo_id']); ?>"
                        class="dropdown-item text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                      </a>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-body">

                <?php if (!empty($todo['tasks'])): ?>
                  <?php foreach ($todo['tasks'] as $task): ?>
                    <div class="custom-control custom-checkbox mb-3">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                      <label for="customCheckbox1" class="custom-control-label">
                        <?php echo $task['task_name']; ?>
                      </label>
                      <p class="m-0">
                        Status:
                        <?php echo $task['status']; ?>
                      </p>
                      <p class="m-0">
                        Kategori:
                        <?php echo $task['category_name']; ?>
                      </p>
                      <a href="<?php echo base_url('dashboard/deleteTask/' . $project_id . '/' . $task['task_id']); ?>"
                        class="mt-2 text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                      </a>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No tasks found for this todo.</p>
                <?php endif; ?>

              </div>
            </div>

            <div class="modal fade" id="todo<?php echo $todo['todo_id']; ?>" tabindex="-1"
              aria-labelledby="todo<?php echo $todo['todo_id']; ?>Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="todo<?php echo $todo['todo_id']; ?>Label">Tambahkan Task:
                      <?php echo $todo['todo_name']; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?php echo base_url('dashboard/addTask/' . $project_id . '/' . $todo['todo_id']); ?>"
                    method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="text" name="task_name" placeholder="Nama Task" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="category_id">
                          <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                  </form>
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
                  <?php echo $todo['todo_name']; ?>
                </h5>
                <div class="card-tools">
                  <div class="dropdown mr-3">
                    <i class="fas fa-caret-down" data-toggle="dropdown" aria-expanded="false"></i>
                    <div class="dropdown-menu">
                      <button type="button" class="dropdown-item" data-toggle="modal"
                        data-target="#todo<?php echo $todo['todo_id']; ?>">
                        <i class="fas fa-clipboard-list mr-2"></i>
                        Tambahkan Task
                      </button>
                      <a href="<?php echo base_url('dashboard/editTodo/' . $project_id . '/' . $todo['todo_id']); ?>"
                        class="dropdown-item" type="button">
                        <i class="fas fa-pen mr-2"></i>
                        Edit Todo
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo['todo_id'] . '/TODO'); ?>"
                        class="dropdown-item text-secondary" type="button">
                        <i class="fas fa-list-ul mr-2"></i>
                        Ubah Ke Todo
                      </a>

                      <a href="<?php echo base_url('dashboard/updateTodoStatus/' . $project_id . '/' . $todo['todo_id'] . '/INPROGRESS'); ?>"
                        class="dropdown-item text-primary" type="button">
                        <i class="fas fa-bolt mr-2"></i>
                        Ubah Ke In Progress
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php echo base_url('dashboard/deleteTodo/' . $project_id . '/' . $todo['todo_id']); ?>"
                        class="dropdown-item text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                        Hapus
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <?php if (!empty($todo['tasks'])): ?>
                  <?php foreach ($todo['tasks'] as $task): ?>
                    <div class="custom-control custom-checkbox mb-3">
                      <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                      <label for="customCheckbox1" class="custom-control-label">
                        <?php echo $task['task_name']; ?>
                      </label>
                      <p class="m-0">
                        Status:
                        <?php echo $task['status']; ?>
                      </p>
                      <p class="m-0">
                        Kategori:
                        <?php echo $task['category_name']; ?>
                      </p>
                      <a href="<?php echo base_url('dashboard/deleteTask/' . $project_id . '/' . $task['task_id']); ?>"
                        class="mt-2 text-danger" type="button">
                        <i class="fas fa-trash mr-2"></i>
                      </a>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p>No tasks found for this todo.</p>
                <?php endif; ?>
              </div>
            </div>

            <div class="modal fade" id="todo<?php echo $todo['todo_id']; ?>" tabindex="-1"
              aria-labelledby="todo<?php echo $todo['todo_id']; ?>Label" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="todo<?php echo $todo['todo_id']; ?>Label">Tambahkan Task:
                      <?php echo $todo['todo_name']; ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="<?php echo base_url('dashboard/addTask/' . $project_id . '/' . $todo['todo_id']); ?>"
                    method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="text" name="task_name" placeholder="Nama Task" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <select class="form-control" name="category_id">
                          <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>


    </div>
  </section>
</div>