<?php
/**
 * 
 */
class Dashboard_admin extends CI_Controller
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
    $data['dataValid'] = $this->db->get('tb_valid')->result_array();
    
    $this->db->from('tb_valid');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];


    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/v_dashboard_admin', $data);
    $this->load->view('admin/footer');
  }

  public function tampil_laporan()
  {
    $this->load->model('M_lap');
		// $data['lapor'] = $this->m_lap->tampil_lap();
    $this->load->library('pagination');
    $config['base_url'] = 'http://localhost/kerusakanjalan/c_admin/dashboard_admin/tampil_laporan';

    //ambil data keyword
    if($this->input->post('submit')){
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');
    }

        //config
    $this->db->like('kecamatan', $data['keyword']);
    $this->db->or_like('kerusakan', $data['keyword']);
    $this->db->from('tb_lap');
    $config['total_rows'] = $this->db->count_all_results();
    $data['total_rows'] = $config['total_rows'];
    $config['per_page'] = 3;

        //inisoaliasai
    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(4);
    $data['lapor'] = $this->m_lap->getPage($config['per_page'], $data['start'], $data['keyword']);


    $this->load->view('admin/header');
    $this->load->view('admin/sidebar');
    $this->load->view('admin/v_tampil_laporan', $data);
    $this->load->view('admin/footer');
  }

  // public function chart()
  // {
  //   $this->load->view('admin/header');
  //   $this->load->view('admin/sidebar');
  //   $this->load->view('admin/v_chart');
  //   $this->load->view('admin/footer');
  // }

}
?>
