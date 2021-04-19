<?php

class M_cluster extends CI_Model
{
	public function tampil_valid()
	{
		$this->db->select('*');   
		$this->db->from('tb_valid');
		$this->db->order_by('id_valid', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function where_kec($where,$table)
	{
		return $this->db->get_where($table, $where);
	}
	
	public function getPage($limit, $start, $keyword = null)
	{
		if($keyword){
			$this->db->like('kecamatan', $keyword)
		}
		return $this->db->get('tb_valid',$limit, $start)->result_array();
	}

	public function countPage()
	{
		return $this->db->get('tb_valid')->num_rows();
	}
}
