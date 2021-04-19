<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_kecamatann');
		$this->load->model('M_kerusakan');
		$this->load->model('M_marker');
	}

	public function home()
	{
		$this->load->view('frontend/header');
		$this->load->view('v_dashboard');
		$this->load->view('frontend/footer');
	}
	
	public function index()
	{
		$this->load->model('M_lap');
		$data['lapor'] = $this->M_lap->tampilLapor();
		$this->load->view('frontend/header');
		$this->load->view('frontend/v_tampil_laporan', $data);
		$this->load->view('frontend/footer');
	}

	public function marker(){
		$this->load->model('M_marker');
		$data['marker']=$this->M_marker->get_all_data();
		$data['dataValid'] = $this->db->get('tb_valid')->result_array();
		$data['kecamatan'] = $this->M_kecamatann->tampilKecamatan();
		$data['kerusakan'] = $this->db->get('tb_kerusakan')->result_array();

		$this->db->from('tb_valid');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];

		// var_dump($data['marker']);
		$this->load->view('frontend/header');
		$this->load->view('frontend/v_marker', $data, FALSE);
		$this->load->view('frontend/footer');

	}

	// public function searchMarker(){
	// 	$this->load->model('M_marker');
	// 	$data['marker']=$this->M_marker->get_all_data();
	// 	$data['dataValid'] = $this->db->get('tb_valid')->result_array();

	// 	$this->db->from('tb_valid');
	// 	$config['total_rows'] = $this->db->count_all_results();
	// 	$data['total_rows'] = $config['total_rows'];

	// 	$this->load->view('frontend/header');
	// 	$this->load->view('frontend/v_searchMarker', $data, FALSE);
	// 	$this->load->view('frontend/footer');
	// }

	public function tambah_laporan()
	{
		$data = array(
			'pelapor' =>set_value('pelapor'),
			'nik' =>set_value('nik'),
			'email' =>set_value('email'),
			'telepon' =>set_value('telepon'),
			'lokasi' =>set_value('lokasi'),
			'id_kecamatan' => set_value('id_kecamatan'),
			'id_kerusakan' => set_value('id_kerusakan'),
			'keterangan' => set_value('keterangan'),
			// 'tanggal' => set_value('tanggal'),
			'longitude' => set_value('longitude'),
			'latitude' => set_value('latitude'),
			'gambar' => set_value('gambar'),

		);

		$data['kecamatan'] = $this->M_kecamatann->tampilKecamatan();
		$data['kerusakan'] = $this->M_kerusakan->tampilKerusakan();
		// $this->load->model('m_lap');
		// $data['lapor'] = $this->m_lap->tampilLapor();
		// echo json_encode($data);

		$this->load->view('frontend/header');
		$this->load->view('frontend/v_tambahwarga', $data);
		$this->load->view('frontend/footer');
	}

	public function simpan_laporan()
	{
		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			echo "gagal tambah";
		}
		else
		{
			$gambar = $this->upload->data();
			$gambar = $gambar['file_name'];
			$pelapor = $this->input->post('pelapor', TRUE);
			$nik = $this->input->post('nik', TRUE);
			$email = $this->input->post('email', TRUE);
			$telepon = $this->input->post('telepon', TRUE);
			$lokasi = $this->input->post('lokasi', TRUE);
			$id_kecamatan = $this->input->post('id_kecamatan', TRUE);
			$id_kerusakan = $this->input->post('id_kerusakan', TRUE);
			$keterangan = $this->input->post('keterangan', TRUE);
			// $tanggal = $this->input->post('tanggal', TRUE);
			$longitude = $this->input->post('longitude', TRUE);
			$latitude = $this->input->post('latitude', TRUE);

			$data = array(
				'pelapor' => $pelapor,
				'nik' => $nik,
				'email' => $email,
				'telepon' => $telepon,
				'lokasi' => $lokasi,
				'id_kecamatan' => $id_kecamatan,
				'id_kerusakan' => $id_kerusakan,
				'keterangan' => $keterangan,
				// 'tanggal' => $tanggal,
				'longitude' => $longitude,
				'latitude' => $latitude,
				'gambar' => $gambar,
			);
			$this->db->insert('tb_lap', $data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Laporan Berhasil Ditambahkan
				</div>');
			redirect('Dashboard/done_insert');
		}
	}

	public function done_insert()
	{
		$this->load->model('M_lap');
		$data['lapor'] = $this->M_lap->tampilLapor();

		$this->load->view('frontend/header');
		$this->load->view('frontend/v_done_insert', $data);
		$this->load->view('frontend/footer');
	}

	public function rules()
	{
		$this->form_validation->set_rules('pelapor', 'pelapor', 'required', ['required' => 'Pelapor wajib diisi']);
		$this->form_validation->set_rules('nik', 'nik', 'required', ['required' => 'Pelapor wajib diisi']);
		$this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email wajib diisi']);
		$this->form_validation->set_rules('telepon', 'telepon', 'required', ['required' => 'Telepon wajib diisi']);
		$this->form_validation->set_rules('lokasi', 'lokasi', 'required', ['required' => 'Lokasi wajib diisi']);
		$this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required', ['required' => 'Kecamatan wajib diisi']);
		$this->form_validation->set_rules('id_kerusakan', 'id_kerusakan', 'required', ['required' => 'Kerusakan wajib diisi']);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', ['required' => 'Kerusakan wajib diisi']);
		// $this->form_validation->set_rules('tanggal', 'tanggal', 'required', ['required' => 'Tanggal wajib diisi']);
		$this->form_validation->set_rules('longitude', 'longitude', 'required', ['required' => 'Longitude wajib diisi']);
		$this->form_validation->set_rules('latitude', 'latitude', 'required', ['required' => 'Latitude wajib diisi']);
		$this->form_validation->set_rules('gambar', 'gambar', 'required', ['required' => 'Gambar wajib diisi']);
	}

	// public function save()
	// {
	// 	$post = $this->input->post();
	// 	$this->id_laporan = uniqid();
	// 	$this->pelapor = $post["pelapor"];
	// 	$this->email = $post["email"];
	// 	$this->telepon = $post["telepon"];
	// 	$this->lokasi = $post["lokasi"];
	// 	$this->id_kecamatan = $post["id_kecamatan"];
	// 	$this->id_kerusakan = $post["id_kerusakan"];
	// 	$this->keterangan = $post["keterangan"];
	// 	// $this->tanggal = $post["tanggal"];
	// 	$this->longitude = $post["longitude"];
	// 	$this->latitude = $post["latitude"];
	// 	$this->gambar = $post["gambar"];
	// 	return $this->db->insert($this->tb_lap, $this);
	// }

	// public function add_marker()
	// 	{
	// 			$data = array(
	// 				'cluster' =>set_value('cluster'),
	// 				'marker' => set_value('marker'),
	// 			);
		
				
	// 			$data['marker'] = $this->M_marker->tampil_marker();
	// 			$this->load->view('frontend/header');
	// 			$this->load->view('frontend/v_tambah_marker', $data);
	// 			$this->load->view('frontend/footer');
	// 	}
		
	// public function simpan_custom_marker()
	// {
	// 	$config['upload_path']          = './gambar/';
	// 	$config['allowed_types']        = 'gif|jpg|png|jpeg';
	// 	$config['max_size']             = 2048;
	// 	$config['max_width']            = 1024;
	// 	$config['max_height']           = 768;

	// 	$this->load->library('upload', $config);

	// 	if ( ! $this->upload->do_upload('userfile'))
	// 	{
	// 		echo "gagal tambah";
	// 	}
	// 	else
	// 	{
	// 		$marker = $this->upload->data();
	// 		$marker = $marker['file_name'];
	// 		$cluster = $this->input->post('cluster', TRUE);
			
			
	// 		$data = array(
	// 			'cluster' => $cluster,
	// 			'marker' => $marker,
	// 		);
	// 		$this->db->insert('tb_cluster', $data);
	// 		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	// 			Laporan Berhasil Ditambahkan
	// 			</div>');
	// 		redirect('Dashboard/index');
	// 	}
	// }


	// public function see_maps(){
	// 	$this->load->model('M_marker');
	// 	$this->load->model('M_lap');

	// 	$data['see']=$this->db->get('tb_lap')->result_array();
	// 	$data['marker']=$this->M_marker->get_all_data();
	// 	$data['dataValid'] = $this->db->get('tb_valid')->result_array();

	// 	$this->db->from('tb_valid');
	// 	$config['total_rows'] = $this->db->count_all_results();
	// 	$data['total_rows'] = $config['total_rows'];

	// 	$this->load->view('frontend/header');
	// 	$this->load->view('frontend/v_see_maps', $data, FALSE);
	// 	$this->load->view('frontend/footer');
	// }
}
?>