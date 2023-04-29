<?php
// class Home untk default ketika mengunjungi aplikasi ini maka method ini lan yang akan muncul pertama kali
class Home extends CI_Controller {
    // buat method index
    public function index()
    {
        // title
        $data['judul'] = 'Home | PT. Arca International';
        // load views
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}