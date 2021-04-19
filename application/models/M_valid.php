<?php

class M_valid extends CI_Model
{
	public function justValid()
	{
		return $this->db->get('tb_valid')->result_array();
	}

	public function tampil_valid()
	{
		$this->db->select('*');    
		$this->db->from('tb_valid');
		$this->db->join('tb_kecamatan', 'tb_valid.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->join('tb_ruas', 'tb_valid.id_ruas = tb_ruas.id_ruas');
		$this->db->join('tb_kerusakan', 'tb_valid.id_kerusakan = tb_kerusakan.id_kerusakan');
		$this->db->order_by('id_valid', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_valid($data)
	{

		$this->db->insert('tb_valid', $data);
	}

	public function edit_valid($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_valid($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_valid($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function where_kec($where,$table)
	{
		return $this->db->get_where($table, $where);
	}

	public function getPage($limit, $start, $keyword = null)
	{
		$this->db->select('tb_kecamatan.id_kecamatan, tb_kecamatan.kode, tb_kecamatan.nama_kecamatan, tb_ruas.id_ruas, tb_ruas.id_kecamatan_ruas, tb_ruas.nama_ruas, tb_valid.id_valid, tb_valid.id_kecamatan, tb_valid.id_ruas, tb_valid.dari, tb_valid.ke, tb_valid.lebar, tb_valid.luas, tb_valid.id_kerusakan, tb_valid.latitude, tb_valid.longitude, tb_valid.id_cluster');
		$this->db->from('tb_valid');
		$this->db->join('tb_kecamatan', 'tb_valid.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->join('tb_ruas', 'tb_valid.id_ruas = tb_ruas.id_ruas');
		if($keyword){
			$this->db->like('tb_kecamatan.nama_kecamatan', $keyword, 'both');
			$this->db->or_like('tb_ruas.nama_ruas', $keyword, 'both');
		}
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function countPage()
	{
		return $this->db->get('tb_valid')->num_rows();
	}

	public function joinKerusakan()
	{
		$this->db->select('*');
		$this->db->from('tb_kerusakan');
		$this->db->join('tb_valid', 'tb_kerusakan.id_kerusakan = tb_valid.id_kerusakan');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_data($id = null)
	{
		// $this->db->select('*');
		// $this->db->from('tb_valid');
		// $this->db->join('tb_kecamatan', 'tb_valid.id_kecamatan = tb_kecamatan.id_kecamatan');
		// $this->db->join('tb_ruas', 'tb_valid.id_ruas = tb_ruas.id_ruas');
		$query = $this->db->get_where('tb_valid', array('id_valid'=>$id))->row();
		return $query;
	}
}
