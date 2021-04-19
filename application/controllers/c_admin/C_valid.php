<?php

class C_valid extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_kecamatann');
		$this->load->model('M_ruas');
		$this->load->model('M_kerusakan');
		$this->load->model('M_valid');
		$this->load->model('M_status');

		if($this->session->userdata('login') != "true"){
	      redirect(base_url("Main/login"));
	    }
	}

	public function chained()
	{

		$data['kecamatan']=$this->M_kecamatann->tampilKecamatan();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_tambah_valid', $data);
		$this->load->view('admin/footer');
	}

	public function get_ruas()
	{
		$id_kecamatan = $this->input->post('id');
		$data=$this->M_kecamatann->get_ruas($id_kecamatan);
		echo json_encode($data);
	}

	public function index()
	{
		$this->load->model('M_valid');

		$data['valid'] = $this->M_valid->tampil_valid();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_valid',$data);
		$this->load->view('admin/footer');
	}


	public function simpan_valid()
	{
		$this->rules();

		if ($this->form_validation->run() == FALSE) 
		{
			$this->tambah_valid();
		} else {
			$data = array(
				'id_kecamatan' => $this->input->post('id_kecamatan', TRUE),
				'id_ruas' => $this->input->post('id_ruas', TRUE),
				'dari' => $this->input->post('dari', TRUE),
				'ke' => $this->input->post('ke', TRUE),
				'lebar' => $this->input->post('lebar', TRUE),
				'luas' => $this->input->post('luas', TRUE),
				'id_kerusakan' => $this->input->post('id_kerusakan', TRUE),
				'latitude' => $this->input->post('latitude', TRUE),
				'longitude' => $this->input->post('longitude', TRUE),
			);

			
			$this->load->model('M_valid');
			$this->M_valid->tambah_valid($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Data Valid Berhasil Ditambahkan
				</div>');
			redirect('C_admin/C_valid');
		}
	}

	public function rules()
	{
		$this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required', ['required' => 'Kecamatan wajib diisi']);
		$this->form_validation->set_rules('id_ruas', 'id_ruas', 'required', ['required' => 'Ruas wajib diisi']);
		$this->form_validation->set_rules('dari', 'dari', 'required', ['required' => 'Dari wajib diisi']);
		$this->form_validation->set_rules('ke', 'ke', 'required', ['required' => 'Ke wajib diisi']);
		$this->form_validation->set_rules('lebar', 'lebar', 'required', ['required' => 'Lebar wajib diisi']);
		$this->form_validation->set_rules('luas', 'luas', 'required', ['required' => 'Luas wajib diisi']);
		$this->form_validation->set_rules('id_kerusakan', 'id_kerusakan', 'required', ['required' => 'Jenis wajib diisi']);
		$this->form_validation->set_rules('latitude', 'latitude', 'required', ['required' => 'latitude wajib diisi']);
		$this->form_validation->set_rules('longitude', 'longitude', 'required', ['required' => 'longitude wajib diisi']);

	}

	public function update($id)
	{
		$this->load->model('M_valid');

		$where = array('id_valid' => $id);
		$data['kecamatan'] = $this->M_kecamatann->tampilKecamatan();
		$data['kerusakan'] = $this->M_kerusakan->tampilKerusakan();
		$data['status']=$this->M_status->tampilStatus();
		$data['valid'] = $this->M_valid->edit_valid($where, 'tb_valid')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_edit_valid', $data);
		$this->load->view('admin/footer');
	}

	public function update_valid()
	{

		$id = $this->input->post('id_valid');
		$id_kecamatan = $this->input->post('id_kecamatan');
		$id_ruas = $this->input->post('id_ruas');
		$dari = $this->input->post('dari');
		$ke = $this->input->post('ke');
		$lebar = $this->input->post('lebar');
		$luas = $this->input->post('luas');
		$id_kerusakan = $this->input->post('id_kerusakan');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$status = $this->input->post('status');

		$data['kecamatan'] = $this->M_kecamatann->tampilKecamatan();
		$data['kerusakan'] = $this->M_kerusakan->tampilKerusakan();
		$data['status'] = $this->M_status->tampilStatus();
		$data = array(
			'id_kecamatan' => $id_kecamatan,
			'id_ruas' => $id_ruas,
			'dari' => $dari,
			'ke' => $ke,
			'lebar' => $lebar,
			'luas' => $luas,
			'id_kerusakan' => $id_kerusakan,
			'longitude' => $longitude,
			'latitude' => $latitude,
			'status' => $status,
		);

		$where = array(
			'id_valid' => $id
		);

		$this->load->model('M_valid');
		$this->M_valid->update_valid($where, $data, 'tb_valid');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Valid Berhasil Diupdate
			</div>');
		redirect('C_admin/C_valid');
	}

	public function delete($id)
	{
		$where = array('id_valid' => $id);
		$this->load->model('M_valid');
		$this->M_valid->hapus_valid($where, 
			'tb_valid');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Valid Berhasil Dihapus
			</div>');
		redirect('C_admin/C_valid');
	}

	public function getkec($id)
	{	
		$where = array('kecamatan'=> $id);

		$data = array(
			'kondisi'=>$id,
			'kecamatan'=> $this->M_data_kecamatan->tampil_kecamatan('tb_kecamatan','kecamatan')
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

	public function kecamatan()
	{
		$data['kecamatan']=$this->M_kecamatann->kecamatan();
		$this->load->view('v_tambah_valid',$data);
	}

	public function detail($id)
	{
		$this->load->model('M_valid');
		$this->load->model('M_kecamatann');
		$this->load->model('M_ruas');

		$data['kec']=$this->db->get('tb_kecamatan')->result_array();
		$data['ruas']=$this->M_ruas->getAllRuas();

		$detail = $this->M_valid->detail_data($id);
		$data['detail'] = $detail;

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_detail_valid',$data);
		$this->load->view('admin/footer');
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['valid'] = $this->M_valid->justValid();

		$this->load->view('admin/v_valid_pdf.php', $data);

		$paper_size ='A4';
		$orientation ='landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size,$orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Data Valid", array('Attachment' => false ));
	}

}
?>