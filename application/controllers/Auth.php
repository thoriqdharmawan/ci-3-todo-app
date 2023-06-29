<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function login() {
    if ($this->session->userdata('user_id')) {
        redirect('dashboard');
    }
    // Validasi form login
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/providers/styles');
      $this->load->view('templates/ui/preloader');
      $this->load->view('pages/login');
      $this->load->view('templates/providers/js');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user = $this->User_model->login($username, $password);

      if ($user) {
        // Login sukses
        // Set session untuk pengguna yang berhasil login
        $this->session->set_userdata('user_id', $user->user_id);
        $this->session->set_userdata('data_user_login', $user);
        redirect('dashboard');
      } else {
        // Login gagal
        $this->session->set_flashdata('error', 'Invalid username or password.');
        redirect('auth/login');
      }
    }
  }

  public function logout() {
    // Logout pengguna
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('data_user_login');
    
    redirect('auth/login');
  }
}
