<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function getCategories()
    {
        $query = $this->db->get('categories');
        $categories = $query->result();

        foreach ($categories as $category) {
            // Cek apakah kategori digunakan pada todo atau task
            $isUsed = $this->isCategoryUsed($category->category_id);

            // Tambahkan properti 'isUsed' pada objek kategori
            $category->isUsed = $isUsed;
        }

        return $categories;
    }

    private function isCategoryUsed($category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->from('tasks');
        $tasks_count = $this->db->count_all_results();

        return ($tasks_count > 0);
    }

    public function getCategoryById($category_id)
    {
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('categories');
        return $query->row();
    }

    public function addCategory($category_name)
    {
        $data = array(
            'category_name' => $category_name
        );
        $this->db->insert('categories', $data);
    }

    public function updateCategory($category_id, $category_name)
    {
        $data = array(
            'category_name' => $category_name
        );
        $this->db->where('category_id', $category_id);
        $this->db->update('categories', $data);
    }

    public function deleteCategory($category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->delete('categories');
    }
}