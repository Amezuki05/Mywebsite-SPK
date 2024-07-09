<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_saw');
        $this->load->model('model_ratingkecocokan');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $this->model_saw->hitungratingkecocokan();
        $data['itemratingkecocokan'] = $this->model_ratingkecocokan->getratingkecocokan();
        $data['pilihkriteria'] = $this->model_ratingkecocokan->getpilihankriteria();
        $data['pilihatribut'] = $this->model_ratingkecocokan->getpilihanatribut();

        $this->load->view('header');
        $this->load->view('matrixnilainormal', $data);
        $this->load->view('footer');
    }

    public function hasil()
    {
        $data['itemratingkecocokan'] = $this->model_ratingkecocokan->getratingkecocokan();
        $data['pilihkriteria'] = $this->model_ratingkecocokan->getpilihankriteria();
        $data['pilihatribut'] = $this->model_ratingkecocokan->getpilihanatribut();
        $data['rangking']=$this->model_saw->lakukanperangkingan();
        $this->load->view ('header');
        $this->load->view ('hasil', $data);
        $this->load->view ('footer');
    }

}
