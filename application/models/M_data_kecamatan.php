<?php
	class M_data_kecamatan extends CI_Model
	{
		public function tampil_kecamatan()
		{
			return $hsl=$this->db->get("tb_kecamatan")->result_array();
		}
		public function tampil_kecamatan_by_id($id){
			return $hsl=$this->db->get_where("tb_kecamatan",["id_kecamatan" => $id])->row_array();
		}

		public function hapus_kecamatan($id)
	    {
	        $this->db->delete('tb_kecamatan', ['id_kecamatan' => $id]);
	    }

		public function update_kecamatan(){
			$data = [
			"kode" => $this->input->post('kode', true),
		    "kecamatan" => $this->input->post('kecamatan', true)

	    ];
		    $this->db->where('id_kecamatan', $this->input->post('id'));
		    $this->db->update('tb_kecamatan', $data);
		}

		public function simpan_kecamatan(){
			$data = [
			"kode" => $this->input->post('kode', true),
		    "kecamatan" => $this->input->post('kecamatan', true)
	    ];
			$this->db->insert('tb_kecamatan', $data);
		}

	}
?>