<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
    public function getProjects() {
        $query = $this->db->get('projects');
        return $query->result();
    }

    public function addProject($data) {
        // Simpan data proyek ke database
        $this->db->insert('projects', $data);
    }
    
}
