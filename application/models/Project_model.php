<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
    public function getProjects() {
        // Implementasi logika untuk mengambil daftar proyek dari database
        // Misalnya, menggunakan query ke tabel "projects" dan mengembalikan hasilnya

        $query = $this->db->get('projects');
        return $query->result();
    }
}
