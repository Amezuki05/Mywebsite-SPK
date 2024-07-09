<?php
class model_kriteria extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}
	public function getkriteria($idkriteria = FALSE)
	{
		if ($idkriteria === FALSE) {
			$query = $this->db->get('kriteria');
			return $query->result_array();
		}

		$query = $this->db->get_where('kriteria', array('idkriteria' => $idkriteria));
		return $query->row_array();
	}

	public function insert_kriteria($data)
	{
		return $this->db->insert('kriteria', $data);
	}

	public function get_kriteria_by_id($id)
	{
		$query = $this->db->get_where('kriteria', array('idkriteria' => $id));
		return $query->row_array();
	}

	public function update_kriteria($id, $data)
	{
		$this->db->where('idkriteria', $id);
		return $this->db->update('kriteria', $data);
	}

	public function delete_kriteria($id)
	{
		$this->db->where('idkriteria', $id);
		return $this->db->delete('kriteria');
	}
	public function simpanbobotkriteria()
	{
    $this->load->helper('url');
    $idkriteria  = $this->input->post('idkriteria');
    $bobotharapan  = $this->input->post('bobotharapan');
    $jeniskriteria = $this->input->post('jeniskriteria');
    $jumrek = count($idkriteria);

    for ($n = 0; $n < $jumrek; $n++) {
        $idkriterianya = html_escape($this->security->xss_clean($idkriteria[$n]));
        $nilaibobotnya = html_escape($this->security->xss_clean($bobotharapan[$n]));
        $jeniskriterianya = html_escape($this->security->xss_clean($jeniskriteria[$n]));

        // Debug Output
        log_message('debug', 'ID Kriteria: ' . $idkriterianya);
        log_message('debug', 'Nilai Bobot: ' . $nilaibobotnya);
        log_message('debug', 'Jenis Kriteria: ' . $jeniskriterianya);

        $data = array(
            'bobotpreferensi' => $nilaibobotnya, 
            'jeniskriteria' => $jeniskriterianya
        );
        $this->db->where('idkriteria', $idkriterianya);
        $this->db->update('kriteria', $data);
    }
    return;
	}

	public function getJeniskriteria()
	{
		$query = $this->db->get('jeniskriteria');
		return $query->result_array();
	}
}
