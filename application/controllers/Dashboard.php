<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();

        $this->load->model('Todo_model');
        $this->load->model('User_model');
        $this->load->model('Project_model');
        $this->load->model('Task_model');
    }

    private function checkLogin()
    {
        // Periksa apakah user sudah login atau belum
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['projects'] = $this->Project_model->getProjects();
        $data['userLogin'] = $this->session->userdata('data_user_login');

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar', $data);
        $this->load->view('pages/projects/list_project', $data);
        $this->load->view('templates/providers/js');
    }

    public function addProject()
    {
        // Ambil data input dari form tambah proyek
        $project_name = $this->input->post('project_name');

        // Validasi data input
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan pesan error dan kembali ke halaman dashboard
            $this->session->set_flashdata('error', validation_errors());
        } else {
            // Jika validasi sukses, simpan data proyek ke database
            $user_id = $this->session->userdata('user_id');
            $data = array(
                'project_name' => $project_name,
                'user_id' => $user_id,
            );
            $this->Project_model->addProject($data);

            // Set pesan sukses dan kembali ke halaman dashboard
            $this->session->set_flashdata('success', 'Project added successfully.');
        }

        redirect('dashboard');
    }

    public function editProject($project_id)
    {
        // Ambil data proyek berdasarkan project_id
        $data['project'] = $this->Project_model->getProjectById($project_id);
        $data['userLogin'] = $this->session->userdata('data_user_login');

        if (!$data['project']) {
            // Jika proyek tidak ditemukan, tampilkan pesan error dan kembali ke halaman dashboard
            $this->session->set_flashdata('error', 'Project not found.');
            redirect('dashboard');
        }

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar', $data);
        $this->load->view('pages/projects/edit_project', $data);
        $this->load->view('templates/providers/js');
    }

    public function updateProject($project_id)
    {
        // Ambil data input dari form update proyek
        $project_name = $this->input->post('project_name');

        // Validasi data input
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan pesan error dan kembali ke halaman edit project
            $this->session->set_flashdata('error', validation_errors());
            redirect('dashboard/editProject/' . $project_id);
        } else {
            // Jika validasi sukses, update data proyek di database
            $data = array(
                'project_name' => $project_name
                // tambahkan field lainnya sesuai kebutuhan
            );
            $this->Project_model->updateProject($project_id, $data);

            // Set pesan sukses dan kembali ke halaman dashboard
            $this->session->set_flashdata('success', 'Project updated successfully.');
            redirect('dashboard');
        }
    }


    public function deleteProject($project_id)
    {
        // Hapus proyek berdasarkan project_id
        $this->Project_model->deleteProject($project_id);

        // Set pesan sukses dan kembali ke halaman dashboard
        $this->session->set_flashdata('success', 'Project deleted successfully.');

        redirect('dashboard');
    }

    public function todos($project_id)
    {
        $data['detailProject'] = $this->Project_model->getProjectById($project_id);
        $data['todosTodo'] = $this->Todo_model->getTodosStatus($project_id, 'TODO');
        $data['todosInprogress'] = $this->Todo_model->getTodosStatus($project_id, 'INPROGRESS');
        $data['todosDone'] = $this->Todo_model->getTodosStatus($project_id, 'DONE');
        $data['userLogin'] = $this->session->userdata('data_user_login');
        $data['project_id'] = $project_id;

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar', $data);
        $this->load->view('pages/todos/list_todo', $data);
        $this->load->view('templates/providers/js');
    }

    public function addTodo($project_id)
    {
        $data = array(
            'todo_name' => "Todo Baru",
            'project_id' => $project_id,
        );

        $this->Todo_model->addTodo($data);


        redirect('dashboard/todos/' . $project_id);
    }

    public function deleteTodo($project_id, $todo_id)
    {
        // Hapus todo berdasarkan todo_id
        $this->Todo_model->deleteTodo($todo_id);

        // Set pesan sukses dan kembali ke halaman daftar task
        $this->session->set_flashdata('success', 'Berhasil menghapus todo');

        redirect('dashboard/todos/' . $project_id);
    }

    public function editTodo($project_id, $todo_id)
    {
        // Ambil data todo berdasarkan todo_id
        $data['todo'] = $this->Todo_model->getTodoById($todo_id);
        $data['userLogin'] = $this->session->userdata('data_user_login');
        $data['project_id'] = $project_id;

        if (!$data['todo']) {
            // Jika todo tidak ditemukan, tampilkan pesan error dan kembali ke halaman daftar task
            $this->session->set_flashdata('error', 'Todo not found.');
            redirect('dashboard/todos/' . $project_id);
        }

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar', $data);
        $this->load->view('pages/todos/edit_todo', $data);
        $this->load->view('templates/providers/js');
    }

    public function updateTodo($project_id, $todo_id)
    {
        // Ambil data input dari form update todo
        $todo_name = $this->input->post('todo_name');

        // Validasi data input
        $this->form_validation->set_rules('todo_name', 'Todo Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan pesan error dan kembali ke halaman edit todo
            $this->session->set_flashdata('error', validation_errors());
            redirect('dashboard/editTodo/' . $todo_id);
        } else {
            // Jika validasi sukses, update data todo di database
            $data = array(
                'todo_name' => $todo_name
                // tambahkan field lainnya sesuai kebutuhan
            );
            $this->Todo_model->updateTodo($todo_id, $data);

            // Set pesan sukses dan kembali ke halaman daftar task
            $this->session->set_flashdata('success', 'Todo updated successfully.');
            redirect('dashboard/todos/' . $project_id);
        }
    }

    public function updateTodoStatus($project_id, $todo_id, $status)
    {
        // Update status berdasarkan $status
        $this->Todo_model->updateTodoStatus($todo_id, $status);

        redirect('dashboard/todos/' . $project_id);
    }

    public function addTask($project_id, $todo_id)
    {
        // Ambil data input dari form tambah task
        $task_name = $this->input->post('task_name');

        // Validasi data input
        $this->form_validation->set_rules('task_name', 'Task Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan pesan error dan kembali ke halaman daftar task
            $this->session->set_flashdata('error', validation_errors());
            redirect('dashboard/todos/' . $project_id);
        } else {
            // Jika validasi sukses, tambahkan task ke database
            $data = array(
                'task_name' => $task_name,
                'todo_id' => $todo_id
            );
            $this->Task_model->addTask($data);

            redirect('dashboard/todos/' . $project_id);
        }
    }

}