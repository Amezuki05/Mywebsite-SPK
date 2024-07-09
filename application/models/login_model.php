<?php
class login_model extends CI_Model{

    function cekpengguna($idpengguna, $password){
        $query = $this->db->get_where('pengguna', array('idpengguna' => $idpengguna, 'password' => $password));
        
        if ($query->num_rows() > 0) {
            redirect('Menuutama'); //Kalo bener
        } else {
            return false; //kalo salah
        }
    }
}