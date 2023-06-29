<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task_model extends CI_Model
{
    public function addTask($data)
    {
        $this->db->insert('tasks', $data);
    }

    public function deleteTask($task_id)
    {
        $this->db->where('task_id', $task_id);
        $this->db->delete('tasks');
    }
    public function updateTaskStatus($task_id, $status)
    {
        $this->db->where('task_id', $task_id);
        $this->db->set('status', $status);
        $this->db->update('tasks');
    }
}