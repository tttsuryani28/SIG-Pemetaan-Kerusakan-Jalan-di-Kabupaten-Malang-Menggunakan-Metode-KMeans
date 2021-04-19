<?php 

	/**
	 * 
	 */
	class M_marker extends CI_Model
	{
		
		public function get_all_data()
		{
			$this->db->select('*');    
			$this->db->from('tb_valid');
			$this->db->join('tb_kerusakan', 'tb_valid.id_kerusakan = tb_kerusakan.id_kerusakan');
			$this->db->join('tb_ruas','tb_valid.id_ruas = tb_ruas.id_ruas');
			$this->db->join('tb_kecamatan','tb_valid.id_kecamatan = tb_kecamatan.id_kecamatan');
			// $this->db->join('tb_lap','tb_lap.id_valid =  tb_valid.id_valid');
			// $this->db->join('tb_cluster','tb_valid.id_cluster = tb_cluster.id_cluster');
			$query = $this->db->get();
			return $query->result();
		}

		public function tampil_marker()
		{
			return $this->db->get('tb_cluster')->result_array();
		}

		public function tambah_marker($data)
		{
			$this->db->insert('tb_cluster', $data);
		}

		public function get_see_maps()
		{
			$this->db->select('*');
			$this->db->from('tb_lap');
			$this->db->join('tb_kecamatan', 'tb_lap.id_kecamatan = tb_kecamatan.id_kecamatan');
			$this->db->join('tb_kerusakan', 'tb_lap.id_kerusakan = tb_kerusakan.id_kerusakan');
			$query = $this->db->get();
			return $query->result_array();
		}
	}

	?>