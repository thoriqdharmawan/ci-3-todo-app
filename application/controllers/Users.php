<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function index()
  {
    $data['users'] = $this->User_model->getAllUsers();
    $data['userLogin'] = $this->session->userdata('data_user_login');

    $this->load->view('templates/providers/styles');
    $this->load->view('templates/ui/preloader');
    $this->load->view('templates/ui/navbar');
    $this->load->view('templates/ui/sidebar', $data);
    $this->load->view('pages/users/list_user', $data);
    $this->load->view('templates/providers/js');
  }

  public function add()
  {
    $data['userLogin'] = $this->session->userdata('data_user_login');

    $this->load->view('templates/providers/styles');
    $this->load->view('templates/ui/preloader');
    $this->load->view('templates/ui/navbar');
    $this->load->view('templates/ui/sidebar', $data);
    $this->load->view('pages/users/add_user');
    $this->load->view('templates/providers/js');

  }
  public function save()
  {
    $name = $this->input->post('name');
    $username = $this->input->post('user_name');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $role = $this->input->post('role');

    $data = array(
      'name' => $name,
      'username' => $username,
      'email' => $email,
      'password' => $password,
      'role' => $role
    );


    $this->User_model->addUser($data);

    redirect('users');
  }

  public function edit($user_id)
  {
    $data['user'] = $this->User_model->getUserById($user_id);
    $data['userLogin'] = $this->session->userdata('data_user_login');

    $this->load->view('templates/providers/styles');
    $this->load->view('templates/ui/preloader');
    $this->load->view('templates/ui/navbar');
    $this->load->view('templates/ui/sidebar', $data);
    $this->load->view('pages/users/edit_user', $data);
    $this->load->view('templates/providers/js');
  }

  public function update($user_id)
  {
    $name = $this->input->post('name');
    $username = $this->input->post('user_name');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $role = $this->input->post('role');

    $data = array(
      'name' => $name,
      'username' => $username,
      'email' => $email,
      'password' => $password,
      'role' => $role
    );

    $this->User_model->updateUser($user_id, $data);

    // Alihkan kembali ke halaman daftar pengguna
    redirect('users');
  }

  public function delete($user_id)
  {
    // Hapus pengguna dari database
    $this->User_model->deleteUser($user_id);

    // Alihkan kembali ke halaman daftar pengguna
    redirect('users');
  }
}