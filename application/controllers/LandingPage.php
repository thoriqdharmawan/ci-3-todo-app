<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {
    public function index() {
        // $this->load->view('templates/providers/styles');
        $this->load->view('pages/landing_page');
        // $this->load->view('templates/providers/js');
    }
}
