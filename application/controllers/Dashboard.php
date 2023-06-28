<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
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
        $this->load->model('Project_model');
        $data['projects'] = $this->Project_model->getProjects();

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar');
        $this->load->view('pages/projects/list_project', $data);
        $this->load->view('templates/providers/js');
    }

    public function addProject()
    {
        $this->load->model('Project_model');
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


    public function todos($project_id)
    {
        $this->load->model('Todo_model');
        $data['todos'] = $this->Todo_model->getTodosByProject($project_id);

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar');
        $this->load->view('pages/todos/list_todo', $data);
        $this->load->view('templates/providers/js');
    }
}