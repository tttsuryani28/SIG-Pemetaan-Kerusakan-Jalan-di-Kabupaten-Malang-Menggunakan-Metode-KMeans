<?php 

	/**
	 * 
	 */
	class M_kecamatann extends CI_Model
	{
		
		public function tampilKecamatan()
		{
			return $this->db->get('tb_kecamatan')->result_array();
		}

		public function kecamatan()
		{
			$this->db->order_by('id_kecamatan', 'ASC');
			return $this->db->from('tb_kecamatan')
			->get()
			->result();
		}

		public function ruas($id_kecamatan)
		{
			$this->db->where('id_kecamatan', $id_kecamatan);
			$this->db->order_by('id_ruas', 'ASC');
			return $this->db->from('tb_ruas')
			->get()
			->result();
		}

		public function getDataRuas($id_kecamatan)
		{
			return $this->db->get_where('tb_ruas',['id_kecamatan'=>$id_kecamatan])->result();
		}


		// NEW 
		public function get_kecamatan()
		{
			$query = $this->db->get('tb_kecamatan');
			return $query;
		}

		public function get_ruas($id_kecamatan)
		{
			$query = $this->db->get_where('tb_ruas', array('id_kecamatan_ruas' => $id_kecamatan));
			return $query->result();
		}

		
	}

	?>