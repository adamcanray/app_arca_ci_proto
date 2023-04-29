<?php
// class About
class About extends CI_Controller {
    // method index
    public function index()
    {
        $data['judul'] = 'About | PT. Arca International';
        // load view
        $this->load->view('templates/header', $data);
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    }
}