<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ratingkecocokan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_ratingkecocokan');
		$this->load->helper('url_helper');
	}
	public function index()
	{
		$data['itemratingkecocokan'] = $this->model_ratingkecocokan->getratingkecocokan();
		$data['pilihkriteria'] = $this->model_ratingkecocokan->getpilihankriteria();
		$data['pilihatribut'] = $this->model_ratingkecocokan->getpilihanatribut();
		$this->load->view('header');
		$this->load->view('ratingkecocokan', $data);
		$this->load->view('footer');
	}
	public function buatratingkecocokanbaru()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('idkriteria', 'Id Kriteria', 'required');
		$this->form_validation->set_rules('idatribute', 'Id Atribut', 'required');
		$this->form_validation->set_rules('nilairating', 'Nilai Rating', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('header');
			$this->load->view('ratingkecocokan');
			$this->load->view('footer');
			redirect('ratingkecocokan');
		} else {
			$this->model_ratingkecocokan->simpanrekordratingkecocokan();
			redirect('ratingkecocokan');
		}
	}
	public function edit($id)
	{
    $data['ratingkecocokan'] = $this->model_ratingkecocokan->get_rating_by_id($id);

    if (empty($data['ratingkecocokan'])) {
        show_404();
    }

    $this->load->view('header');
    $this->load->view('edit_rating', $data);
    $this->load->view('footer');
	}

	public function update()
	{
    $id = $this->input->post('idrating');
    $nilairating = $this->input->post('nilairating');

    if (empty($nilairating)) {
        $this->session->set_flashdata('error', 'Nilai rating kecocokan tidak boleh kosong.');
        redirect('ratingkecocokan/edit/' . $id);
    } else {
        $this->model_ratingkecocokan->update_rating($id, ['nilairating' => $nilairating]);
        $this->session->set_flashdata('success', 'Rating kecocokan berhasil diperbarui.');
        redirect('ratingkecocokan');
    }
	}

	public function hapusratingkecocokan($id)
	{
		$iddihapus = html_escape($this->security->xss_clean($id));
		$this->db->where('idrating', $iddihapus);
		$this->db->delete('ratingkecocokan');
		redirect('ratingkecocokan');
	}

    }
