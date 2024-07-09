<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menuutama extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('blank');
		$this->load->view('footer');
	}
}
