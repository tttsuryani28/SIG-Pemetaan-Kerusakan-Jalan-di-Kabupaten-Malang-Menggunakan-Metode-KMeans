<?php 

	/**
	 * 
	 */
	class M_status extends CI_Model
	{
		
		public function tampilStatus()
		{
			return $hsl=$this->db->get("tb_status")->result_array();
		}

		public function statusDone()
		{
			$id_status = '4';
			$this->db->distinct();
			$this->db->select('status');
			$this->db->where('id_status', $id_status); 
			$query = $this->db->get('tb_status')->result_array();
			return $query;
		}
	}

	?>