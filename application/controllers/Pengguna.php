<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_pengguna');
        $this->load->helper('url_helper');
    }
    public function index(){
        $data ['title'] = "Form Login";
        $data['content'] = "Masukkan Username dan password";
        $this->load->view('header', $data);
        $this->load->view('login', $data);
        $this->load->view('footer');
    }
    public function logout()
    {
        redirect('login');
    }

    public function cekpengguna()
    {
        $idpengguna = $this->input->post('idpengguna');
        $password = $this->input->post('password');
        $login_result = $this->model_pengguna->cekpengguna($idpengguna, $password);

        if (!$login_result){
            $this->session->set_flashdata('error', 'Username atau password SALAH');     
        }

        redirect('login');
    }    
}
?>
