<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {
    public function index() {
        $data['user_id'] = $this->session->userdata('user_id');

        $this->load->view('pages/landing_page', $data);
    }
}
