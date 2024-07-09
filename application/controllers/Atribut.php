<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atribut extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_atribut');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['itematribut'] = $this->model_atribut->getatribut();
		$this->load->view('header');
		$this->load->view('atribut', $data);
		$this->load->view('footer');
	}

	public function buatatributbaru()
	{
		// Ambil data dari form input
		$namaAtribut = $this->input->post('namaatribut');

		// Validasi input
		if (empty($namaAtribut)) {
			// Redirect kembali ke form jika input kosong
			$this->session->set_flashdata('error', 'Nama Atribut tidak boleh kosong.');
			redirect('atribut');
		} else {
			// Simpan ke database melalui model
			$this->model_atribut->insert_atribut(['namaatribut' => $namaAtribut]);

			// Redirect ke halaman kriteria dengan pesan sukses
			$this->session->set_flashdata('success', 'Atribut baru berhasil ditambahkan.');
			redirect('atribut');
		}
	}

	public function edit($id)
	{
		$data['atribut'] = $this->model_atribut->get_atribut_by_id($id);

		if (empty($data['atribut'])) {
			show_404();
		}

		$this->load->view('header');
		$this->load->view('edit_atribut', $data);
		$this->load->view('footer');
	}

	public function update()
	{
		$id = $this->input->post('idatribute');
		$namaAtribut = $this->input->post('namaatribut');

		if (empty($namaAtribut)) {
			$this->session->set_flashdata('error', 'Nama Atribut tidak boleh kosong.');
			redirect('atribut/edit/' . $id);
		} else {
			$this->model_atribut->update_atribut($id, ['namaatribut' => $namaAtribut]);
			$this->session->set_flashdata('success', 'Atribut berhasil diperbarui.');
			redirect('atribut');
		}
	}

	public function delete($id)
	{
		$this->model_atribut->delete_atribut($id);
		$this->session->set_flashdata('success', 'Atribut berhasil dihapus.');
		redirect('atribut');
	}
}
