<?php

class C_cluster extends CI_Controller
{
	function __construct(){
	    parent::__construct();
	  
	    if($this->session->userdata('login') != "true"){
	      redirect(base_url("Main/login"));
	    }
	  }
	  
	public function index()
	{

		$this->load->model('M_valid');

		$data['alldata'] = $this->M_valid->tampil_valid();

		$data['dataValid'] = $this->db->get('tb_valid')->result_array();
		
		$data['kecamatan'] = $this->db->get('tb_kecamatan')->result_array();
		$data['ruas'] = $this->db->get('tb_ruas')->result_array();		

		$this->db->from('tb_valid');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_cluster',$data);
		$this->load->view('admin/footer');
	}

	public function rules()
	{
		$this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required', ['required' => 'id_Kecamatan wajib diisi']);
		$this->form_validation->set_rules('id_ruas', 'id_ruas', 'required', ['required' => 'Ruas wajib diisi']);
		$this->form_validation->set_rules('dari', 'dari', 'required', ['required' => 'Dari wajib diisi']);
		$this->form_validation->set_rules('ke', 'ke', 'required', ['required' => 'Ke wajib diisi']);
		$this->form_validation->set_rules('lebar', 'lebar', 'required', ['required' => 'Lebar wajib diisi']);
		$this->form_validation->set_rules('luas', 'luas', 'required', ['required' => 'Luas wajib diisi']);
		$this->form_validation->set_rules('jenis', 'jenis', 'required', ['required' => 'Jenis wajib diisi']);
		$this->form_validation->set_rules('longitude', 'longitude', 'required', ['required' => 'longitude wajib diisi']);
		$this->form_validation->set_rules('latitude', 'latitude', 'required', ['required' => 'latitude wajib diisi']);
	}

	public function getkec($id)
	{	
		$where = array('id_kecamatan'=> $id);

		$data = array(
			'kondisi'=>$id,
			'kecamatan'=> $this->M_data_kecamatan->tampil_kecamatan('tb_kecamatan','id_kecamatan')
		);

		if ($id=='0')
		{
			$data["valid"] = $this->M_valid->tampil_valid('tb_valid','id_valid');
		}
		else
		{
			$data["valid"] = $this->M_valid->where_kec($where,'tb_valid')->result_array();
		}

		$this->load->view('admin/v_valid.php', $data);

	}
}
