<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth_model extends CI_Model{
    public function cek_login($nim)
    {
        $hasil = $this->db->where('nim', $nim)->limit(1)->get('user');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return array();
        }
    } 
}