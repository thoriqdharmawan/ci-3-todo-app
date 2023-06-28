<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo_model extends CI_Model {
    public function getTodosByProject($project_id) {
        $this->db->where('project_id', $project_id);
        $query = $this->db->get('todos');
        return $query->result();
    }
}