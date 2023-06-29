<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
    }

    public function index()
    {
        $data['categories'] = $this->Category_model->getCategories();
        $data['userLogin'] = $this->session->userdata('data_user_login');

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar', $data);
        $this->load->view('pages/categories/list_category', $data);
        $this->load->view('templates/providers/js');
    }

    public function add()
    {
        $data['userLogin'] = $this->session->userdata('data_user_login');

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar', $data);
        $this->load->view('pages/categories/add_category');
        $this->load->view('templates/providers/js');
    }

    public function save()
    {
        // Ambil data kategori dari form
        $category_name = $this->input->post('category_name');

        // Simpan data kategori ke dalam database
        $this->Category_model->addCategory($category_name);

        // Alihkan kembali ke halaman daftar kategori
        redirect('categories');
    }

    public function edit($category_id)
    {
        // Mengambil data kategori berdasarkan category_id
        $data['category'] = $this->Category_model->getCategoryById($category_id);
        $data['userLogin'] = $this->session->userdata('data_user_login');

        $this->load->view('templates/providers/styles');
        $this->load->view('templates/ui/preloader');
        $this->load->view('templates/ui/navbar');
        $this->load->view('templates/ui/sidebar', $data);
        $this->load->view('pages/categories/edit_category', $data);
        $this->load->view('templates/providers/js');
    }

    public function update($category_id)
    {
        // Ambil data kategori dari form
        $category_name = $this->input->post('category_name');

        // Update data kategori ke dalam database
        $this->Category_model->updateCategory($category_id, $category_name);

        // Alihkan kembali ke halaman daftar kategori
        redirect('categories');
    }

    public function delete($category_id)
    {
        // Hapus kategori dari database
        $this->Category_model->deleteCategory($category_id);

        // Alihkan kembali ke halaman daftar kategori
        redirect('categories');

    }
}