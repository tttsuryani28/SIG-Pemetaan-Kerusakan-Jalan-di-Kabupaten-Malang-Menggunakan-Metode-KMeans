<?phpdefined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller 
{   

	public function __construct()
	{    
		parent::__construct();        
		$this->load->model('m_kecamatann');   
		$this->load->model('m_ruas');  
		if($this->session->userdata('login') != "true"){
	      redirect(base_url("main/login"));
	    }
	}  

	public function index()
	{    
		$data['kecamatan'] = $this->m_kecamatann->tampilKecamatan();        
		$this->load->view('admin/v_tambah_valid', $data);  
	}

	public function listRuas()
	{
		$id_kecamatan = $this->input->post('id_kecamatan');        
		$ruas = $this->m_ruas->viewByKecamatan($id_kecamatan);
		$lists = "<option value=''>Pilih</option>";        
		foreach($ruas as $data)
			{      $lists .= "<option value='".$data->id_kecamatan."'>".$data->kecamatan."</option>";
			$callback = array('list_ruas'=>$lists);
			echo json_encode($callback);
			}
	}


}
