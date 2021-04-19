<?php 

	/**
	 * 
	 */
	class M_kerusakan extends CI_Model
	{
		
		public function tampilKerusakan()
		{
			return $hsl=$this->db->get('tb_kerusakan')->result_array();
		}
	}

 ?>