<?php

class Main_model extends CI_Model
{
	function can_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get('tb_admin');

		if ($query->row_array() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
?>