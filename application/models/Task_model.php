<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {
  public function addTask($data) {
    $this->db->insert('tasks', $data);
  }
}


