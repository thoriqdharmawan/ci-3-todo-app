<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todo_model extends CI_Model
{
    public function getTodosStatus($project_id, $status)
    {
        $this->db->select('todos.todo_id, todos.todo_name, tasks.task_id, tasks.task_name, tasks.status, categories.category_name');
        $this->db->from('todos');
        $this->db->join('tasks', 'todos.todo_id = tasks.todo_id', 'left');
        $this->db->join('categories', 'tasks.category_id = categories.category_id', 'left');
        $this->db->where('todos.project_id', $project_id);
        $this->db->where('todos.status', $status);
        $query = $this->db->get();
        $results = $query->result();

        $todos = array();
        foreach ($results as $row) {
            $todo_id = $row->todo_id;

            // Jika todo belum ada di array $todos, tambahkan ke array
            if (!isset($todos[$todo_id])) {
                $todos[$todo_id] = array(
                    'todo_id' => $todo_id,
                    'todo_name' => $row->todo_name,
                    'tasks' => array()
                );
            }

            // Tambahkan task ke array tasks pada todo yang sesuai
            if ($row->task_id) {
                $todos[$todo_id]['tasks'][] = array(
                    'task_id' => $row->task_id,
                    'task_name' => $row->task_name,
                    'status' => $row->status,
                    'category_name' => $row->category_name
                );
            }
        }

        return array_values($todos);
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