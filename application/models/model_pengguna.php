<?php
class model_pengguna extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getpengguna($idpengguna = FALSE)
    {
        if ($idpengguna === FALSE)
        {
            $query = $this->db->get('pengguna');
            return $query->result_array();
        }

        $query = $this->db->get_where('pengguna', array('idpengguna' => $idpengguna));
        return $query->row_array();
    }

    public function cekpengguna($idpengguna, $password)
    {
        $query = $this->db->get_where('pengguna', array('idpengguna' => $idpengguna, 'password' => $password));
        
        if ($query->num_rows() > 0) {
            redirect('Menuutama'); //Kalo bener
        } else {
            return false; //kalo salah
        }
    }

    public function simpankanrecordbarunya()
    {
        $idpengguna = $this->input->post('idpengguna');
        $password = $this->input->post('password');

        $data = array(
            'idpengguna' => $idpengguna,
            'password' => $password // Simpan password sebagai teks biasa
        );

        return $this->db->insert('pengguna', $data);
    }

    public function simpankanrecordkoreksinya()
    {
        $idpengguna = $this->input->post('idpengguna');
        $password = $this->input->post('password');

        $data = array(
            'password' => $password // Simpan password sebagai teks biasa
        );

        $this->db->where('idpengguna', $idpengguna);
        return $this->db->update('pengguna', $data);
    }
}
?>
