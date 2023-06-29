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
    
    public function deleteProject($project_id) {
        // Hapus proyek berdasarkan project_id
        $this->db->where('project_id', $project_id);
        $this->db->delete('projects');
    }

    public function getProjectById($project_id) {
        $this->db->where('project_id', $project_id);
        $query = $this->db->get('projects');
        return $query->row();
    }
    
    public function updateProject($project_id, $data) {
        $this->db->where('project_id', $project_id);
        $this->db->update('projects', $data);
    }
}
