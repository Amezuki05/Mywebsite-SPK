<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kriteria');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['itemkriteria'] = $this->model_kriteria->getkriteria();
		$this->load->view('header');
		$this->load->view('kriteria', $data);
		$this->load->view('footer');
	}

	public function pilihjeniskriteria()
	{
		$data['jeniskriteria'] = $this->Kriteria_model->getJeniskriteria();
		$this->load->view('bobot_kriteria', $data);
	}

	public function buatkriteriabaru()
	{
		// Ambil data dari form input
		$namaKriteria = $this->input->post('namakriteria');

		// Validasi input
		if (empty($namaKriteria)) {
			// Redirect kembali ke form jika input kosong
			$this->session->set_flashdata('error', 'Nama kriteria tidak boleh kosong.');
			redirect('kriteria');
		} else {
			// Simpan ke database melalui model
			$this->model_kriteria->insert_kriteria(['namakriteria' => $namaKriteria]);

			// Redirect ke halaman kriteria dengan pesan sukses
			$this->session->set_flashdata('success', 'Kriteria baru berhasil ditambahkan.');
			redirect('kriteria');
		}
	}

	public function edit($id)
	{
		$data['kriteria'] = $this->model_kriteria->get_kriteria_by_id($id);

		if (empty($data['kriteria'])) {
			show_404();
		}

		$this->load->view('header');
		$this->load->view('edit_kriteria', $data);
		$this->load->view('footer');
	}

	public function update()
	{
		$id = $this->input->post('idkriteria');
		$namaKriteria = $this->input->post('namakriteria');

		if (empty($namaKriteria)) {
			$this->session->set_flashdata('error', 'Nama kriteria tidak boleh kosong.');
			redirect('kriteria/edit/' . $id);
		} else {
			$this->model_kriteria->update_kriteria($id, ['namakriteria' => $namaKriteria]);
			$this->session->set_flashdata('success', 'Kriteria berhasil diperbarui.');
			redirect('kriteria');
		}
	}

	public function delete($id)
	{
		$this->model_kriteria->delete_kriteria($id);
		$this->session->set_flashdata('success', 'Kriteria berhasil dihapus.');
		redirect('kriteria');
	}

	public function bobotharapan()
	{
    $this->load->helper('form');
    $bSimpan = $this->input->post('bSimpanBobot');
    if (!isset($bSimpan)) {
        $data['itemkriteria'] = $this->model_kriteria->getkriteria();
        $this->load->view('header');
        $this->load->view('bobot_kriteria', $data);
        $this->load->view('footer');
    } else {
        $this->model_kriteria->simpanbobotkriteria();
        redirect('kriteria/bobotharapan');
    }
	}

}