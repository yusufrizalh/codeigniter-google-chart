<?php 

class Authentication_model extends CI_Model {
    
    // registrasi user baru 
    public function registration_insert($data) {
        // cek user_name tidak boleh berulang 
        $kondisi = "user_name = " . "'" . $data['user_name'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($kondisi);
        $this->db->limit(1);
        $perintah = $this->db->get();

        if($perintah->num_rows() == 0) {
            $this->db->insert('users', $data);
            if($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

    // membaca user_name dan user_password 
    public function user_login($data) {
        $kondisi = "user_name = " . "'" . $data['user_name'] . 
            "' AND " . "user_password = " . "'" . 
            $data['user_password'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($kondisi);
        $this->db->limit(1);
        $perintah = $this->db->get();

        if($perintah->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    // membaca user profile 
    public function user_profile($user_name) {
        $kondisi = "user_name = " . "'" . $user_name . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($kondisi);
        $this->db->limit(1);
        $perintah = $this->db->get();

        if($perintah->num_rows() == 1) {
            return $perintah->result();
        } else {
            return false;
        }
    }

}