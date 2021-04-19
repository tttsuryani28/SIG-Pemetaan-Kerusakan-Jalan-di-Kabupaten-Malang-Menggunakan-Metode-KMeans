<?php

class M_lap extends CI_Model
{
	public function tampil_lap()
	{
		return $this->db->get('tb_lap')->result_array();
	}

	public function tampil_lapor($id)
	{
		return $this->db->get('tb_lap')->result_array();
	}

	public function tampilLapor()
	{
		$this->db->select('*');
		$this->db->from('tb_lap');
		$this->db->join('tb_kecamatan', 'tb_lap.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->join('tb_kerusakan', 'tb_lap.id_kerusakan = tb_kerusakan.id_kerusakan');
		$this->db->order_by('tanggal', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_lap($data)
	{
		$this->db->insert('tb_lap', $data);
	}

	public function edit_lap($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_lap($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_lap($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getPage($limit, $start, $keyword = null)
	{
		if($keyword){
			$this->db->like('kecamatan', $keyword);
			$this->db->or_like('kerusakan', $keyword);
		}
		return $this->db->get('tb_lap',$limit, $start)->result_array();
	}

	public function getPageFront($limit, $start)
	{
		return $this->db->get('tb_lap',$limit, $start)->result_array();
	}

	public function countPage()
	{
		return $this->db->get('tb_lap')->num_rows();
	}

	public function where_kecamatan($where,$table)
	{
		return $this->db->get_where($table, $where);
	}

	public function detail_data($id = null)
	{
		$query = $this->db->get_where('tb_lap', array('id_laporan'=>$id))->row();
		return $query;
	}
}
?>
