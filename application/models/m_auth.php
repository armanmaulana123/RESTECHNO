<?php

class M_auth extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function cek_user($email)
	{
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}

	function tambah_user($data)
	{
		return $this->db->insert('user', $data);
	}
}
