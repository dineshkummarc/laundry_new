<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *	@author 	: Red Planet Computer Team
 *	date		: 07 June, 2017
 *	Laundry Management Application
 *	rpcits2013@gmail.com
 */
 
class Login_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	function get_user($email, $pwd)
	{
		$this->db->like('username', $email);
		$this->db->like('password', sha1($pwd));
        $query = $this->db->get('admin');
		return $query->result();
	}
	
}
?>