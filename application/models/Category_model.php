<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function getCategories() {
        $query = $this->db->get('categories');
        return $query->result();
    }
}