<!-- <?php

class c_pemetaan extends CI_Controller
{
	function __construct(){
	    parent::__construct();
	  
	    if($this->session->userdata('login') != "true"){
	      redirect(base_url("main/login"));
	    }
	  }
  
	public function index()
	{
        $this->load->model('m_marker');
		$data['marker']=$this->m_marker->get_all_data();
		$data['dataValid'] = $this->db->get('tb_valid')->result_array();

		$this->db->from('tb_valid');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_pemetaan',$data, FALSE);
		$this->load->view('admin/footer');
    }
}
?> -->