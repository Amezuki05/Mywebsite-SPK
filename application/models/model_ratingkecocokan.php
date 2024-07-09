<?php
class model_ratingkecocokan extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function getratingkecocokan($idrating = FALSE)
{
    if ($idrating === FALSE)
    {
        $query = $this->db->get('ratingkecocokan');
        return $query->result_array();
    } else {
        $query = $this->db->get_where('ratingkecocokan', array('idrating' => $idrating));
        return $query->row_array(); 
    }
}
    public function getpilihankriteria()
    {
        $q = $this->db->get('kriteria');
        return $q->result_array();
    }
    public function getpilihanatribut()
    {
        $qa = $this->db->get('atribut');
        return $qa->result_array();
    }
    public function insert_rating($data)
	{
		return $this->db->insert('ratingkecocokan', $data);
	}

	public function get_rating_by_id($id)
    {
    $query = $this->db->get_where('ratingkecocokan', array('idrating' => $id));
    return $query->row_array();
    }

    public function update_rating($id, $data)
    {
    $this->db->where('idrating', $id);
    return $this->db->update('ratingkecocokan', $data);
    }

	public function delete_rating($id)
	{
		$this->db->where('idrating', $id);
		return $this->db->delete('ratingkecocokan');
	}
    public function simpanrekordratingkecocokan()
    {
        $this->load->helper('url');
        $post  = $this->input->post();
        $idkriteria = html_escape($this->security->xss_clean($post['idkriteria']));
        $idatribute = html_escape($this->security->xss_clean($post['idatribute']));
        $nilairating = html_escape($this->security->xss_clean($post['nilairating']));
        $data = array('idkriteria' => $idkriteria, 'idatribute' => $idatribute, 'nilairating' => $nilairating);
        return $this->db->insert('ratingkecocokan', $data);
    }
    public function simpanhasilkoreksiratingkecocokan()
    {
        $post = $this->input->post();
        $idkriteria = html_escape($this->security->xss_clean($post['idkriteria']));
        $idatribute = html_escape($this->security->xss_clean($post['idatribute']));
        $nilairating = html_escape($this->security->xss_clean($post['nilairating']));
        $data = array('idkriteria' => $idkriteria, 'idatribute' => $idatribute, 'nilairating' => $nilairating);
        return $this->db->update('ratingkecocokan', $data, $where);
    }
    
}