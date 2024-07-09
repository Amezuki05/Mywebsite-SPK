<?php
class model_atribut extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
	public function getatribut($idatribute = FALSE)
	{
		if ($idatribute === FALSE) {
			$query = $this->db->get('atribut');
			return $query->result_array();
		}

		$query = $this->db->get_where('atribut', array('idatribute' => $idatribute));
		return $query->row_array();
	}

	public function insert_atribut($data)
	{
		return $this->db->insert('atribut', $data);
	}

	public function get_atribut_by_id($id)
	{
		$query = $this->db->get_where('atribut', array('idatribute' => $id));
		return $query->row_array();
	}

	public function update_atribut($id, $data)
	{
		$this->db->where('idatribute', $id);
		return $this->db->update('atribut', $data);
	}

	public function delete_atribut($id)
	{
		$this->db->where('idatribute', $id);
		return $this->db->delete('atribut');
	}
}
