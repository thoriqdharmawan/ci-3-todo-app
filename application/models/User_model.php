<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function login($username, $password) {
        // Implementasi logika untuk melakukan proses login
        // Misalnya, menggunakan query ke tabel "users" untuk memeriksa kecocokan username dan password

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
