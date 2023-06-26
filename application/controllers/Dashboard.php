<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->checkLogin();
    }
    
    private function checkLogin() {
        // Periksa apakah user sudah login atau belum
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }
    
    public function index() {
        $this->load->model('Project_model');
        $data['projects'] = $this->Project_model->getProjects();
        
        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar');
        $this->load->view('pages/projects/list_project', $data);
        $this->load->view('templates/providers/js');
    }
}
