<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthHook {
    public function checkLogin() {
        $CI = &get_instance();

        // Periksa apakah user sudah login atau belum
        if (!$CI->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }
}
