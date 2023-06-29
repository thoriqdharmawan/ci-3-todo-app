<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {
    public function getProjects($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('projects');
        $projects =  $query->result();

        foreach ($projects as &$project) {
            $project->hasTodo = $this->Project_model->hasTodoTasks($project->project_id);
        }

        return $projects;
    }

    public function hasTodoTasks($project_id)
    {
        $this->db->where('project_id', $project_id);
        $query = $this->db->get('todos');

        return $query->num_rows() > 0;
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
