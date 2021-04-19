    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class M_ruas extends CI_Model {
    	
    	public function ruas()
    	{    
    		// $this->db->where('id_kecamatan', $id_kecamatan);    
    		// $result = $this->db->get('tb_ruas')->result(); 
    		// return $result;   
    		$this->db->select('*');
			$this->db->from('tb_kecamatan');
			$this->db->join('tb_ruas', 'tb_kecamatan.id_kecamatan = tb_ruas.id_kecamatan');
		    $query = $this->db->get();
		    return $query->result();
    	}

    	public function getAllRuas()
    	{
    		$query = $this->db->get('tb_ruas');
		    return $query->result();
    	}
    }