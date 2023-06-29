<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todo_model extends CI_Model
{
    public function getTodosStatus($project_id, $status)
    {
        $this->db->where('project_id', $project_id);
        $this->db->where('status', $status);
        $query = $this->db->get('todos');
        return $query->result();
    }

    public function addTodo($data)
    {
        // Simpan data todo ke database
        $this->db->insert('todos', $data);
    }

    public function deleteTodo($todo_id)
    {
        // Hapus todo berdasarkan todo_id
        $this->db->where('todo_id', $todo_id);
        $this->db->delete('todos');
    }

    public function getTodoById($todo_id)
    {
        $this->db->where('todo_id', $todo_id);
        $query = $this->db->get('todos');
        return $query->row();
    }

    public function updateTodo($todo_id, $data)
    {
        $this->db->where('todo_id', $todo_id);
        $this->db->update('todos', $data);
    }

    public function updateTodoStatus($todo_id, $status)
    {
        $this->db->where('todo_id', $todo_id);
        $this->db->set('status', $status);
        $this->db->update('todos');
    }
}