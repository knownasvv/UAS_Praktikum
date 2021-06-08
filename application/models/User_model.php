<?php defined('BASEPATH') OR exit('No direct script access allowed !');

class User_model extends CI_Model {
    //PERHATIAN !! GUNAKAN sSNAKE CASE DEMI MENJAGA KERAPIHAN
    //ex : get_model()
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function get_user($email = null, $password = null){
		if($email == null && $password == null) $query = $this->db->get('users');
		else $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
        return $query->result_array();
    }

    function get_salt($email){
        $this->db->select('salt');
		$this->db->from('users');
		$this->db->where('email', $email);
        $query = $this->db->get();
        // $query = $this->db->query("SELECT salt FROM users WHERE email = $email");
        return $query->result_array();
    }

    function get_email($id){
        $this->db->select('email');
		$this->db->from('users');
		$this->db->where('email', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}