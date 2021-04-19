<?php

class C_lap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_status');
		$this->load->model('M_lap');

		if($this->session->userdata('login') != "true"){
			redirect(base_url("Main/login"));
		}

	}
	
	public function index()
	{
		$this->load->model('M_lap');
		
		
		// //pagination
		// $this->load->library('pagination');
		// $config['base_url'] = 'http://localhost/kerusakanjalan/c_admin/c_lap/index';

		//ambil data keyword
		// if($this->input->post('submit')){
		// 	$data['keyword'] = $this->input->post('keyword');
		// 	$this->session->set_userdata('keyword', $data['keyword']);
		// } else {
		// 	$data['keyword'] = $this->session->userdata('keyword');
		// }

		//config
		// $this->db->like('kecamatan', $data['keyword']);
		// $this->db->or_like('kerusakan', $data['keyword']);
		$this->db->from('tb_lap');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 3;

		//inisoaliasai
		// $this->pagination->initialize($config);

		// $data['tanggal'] = $this->m_lap->tampil_lap();
		// $data['start'] = $this->uri->segment(4);



		$data['status'] = $this->M_status->tampilStatus();
		$data['lapor'] = $this->M_lap->tampilLapor();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_tampil_laporan',$data);
		$this->load->view('admin/footer');
	}


	public function rules()
	{
		$this->form_validation->set_rules('pelapor', 'pelapor', 'required', ['required' => 'Pelapor wajib diisi']);
		$this->form_validation->set_rules('email', 'email', 'required', ['required' => 'Email wajib diisi']);
		$this->form_validation->set_rules('telepon', 'telepon', 'required', ['required' => 'Telepon wajib diisi']);
		$this->form_validation->set_rules('lokasi', 'lokasi', 'required', ['required' => 'Lokasi wajib diisi']);
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'required', ['required' => 'Kecamatan wajib diisi']);
		$this->form_validation->set_rules('kerusakan', 'kerusakan', 'required', ['required' => 'Kerusakan wajib diisi']);
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required', ['required' => 'Kerusakan wajib diisi']);
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required', ['required' => 'Tanggal wajib diisi']);
		$this->form_validation->set_rules('longitude', 'longitude', 'required', ['required' => 'Longitude wajib diisi']);
		$this->form_validation->set_rules('latitude', 'latitude', 'required', ['required' => 'Latitude wajib diisi']);
		$this->form_validation->set_rules('gambar', 'gambar', 'required', ['required' => 'Gambar wajib diisi']);
	}

	public function update($id)
	{
		$this->load->model('M_lap');
		$where = array('id_laporan' => $id);
		$data['status'] = $this->M_status->tampilStatus();
		$data['lapor'] = $this->M_lap->edit_lap($where, 'tb_lap')->result();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_edit_lap', $data);
		$this->load->view('admin/footer');
	}

	public function update_lap()
	{
		$id = $this->input->post('id_laporan');
		// $pelapor = $this->input->post('pelapor');
		// $email = $this->input->post('email');
		// $telepon = $this->input->post('telepon');
		// $lokasi = $this->input->post('lokasi');
		// $kecamatan = $this->input->post('kecamatan');
		// $kerusakan = $this->input->post('kerusakan');
		// $keterangan = $this->input->post('keterangan');
		// $tanggal = $this->input->post('tanggal');
		// $longitude = $this->input->post('longitude');
		// $latitude = $this->input->post('latitude');
		// $gambar = $this->input->post('gambar');
		$status = $this->input->post('status');
		
		$data['status'] = $this->M_status->tampilStatus();
		$data = array(
			// 'pelapor' => $pelapor,
			// 'email' => $email,
			// 'telepon' => $telepon,
			// 'lokasi' => $lokasi,
			// 'kecamatan' => $kecamatan,
			// 'kerusakan' => $kerusakan,
			// 'keterangan' => $keterangan,
			// 'tanggal' => $tanggal,
			// 'longitude' => $longitude,
			// 'latitude' => $latitude,
			// 'gambar' => $gambar,
			'status' => $status,
		);

		$where = array(
			'id_laporan' => $id
		);
		

		$this->load->model('m_lap');
		$this->M_lap->update_lap($where, $data, 'tb_lap');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Status Laporan Berhasil Diupdate
			</div>');
		redirect('C_admin/C_lap');
	}

	public function delete($id)
	{
		$where = array('id_laporan' => $id);
		$this->load->model('M_lap');
		$this->M_lap->hapus_lap($where, 
			'tb_lap');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Laporan Berhasil Dihapus
			</div>');
		redirect('C_admin/C_lap');
	}

	public function detail($id)
	{
		$this->load->model('M_lap');
		$detail = $this->M_lap->detail_data($id);
		$data['detail'] = $detail;

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_detail_lap',$data);
		$this->load->view('admin/footer');
	}

	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['cetak'] = $this->M_lap->tampilLapor();

		$this->load->view('admin/v_report_lap.php', $data);

		$paper_size ='A4';
		$orientation ='landscape';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size,$orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Warga", array('Attachment' => false ));
	}


	// add valid
	public function lap_add($id)
	{
		$this->load->model('M_kecamatann');
		$this->load->model('M_valid');

		$where = array('id_laporan' => $id);
		$data['kecamatan']=$this->M_kecamatann->tampilKecamatan();
		$data['lapor']=$this->db->get_where('tb_lap',['id_laporan' => $id])->row_array();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_lap_add_valid', $data);
		$this->load->view('admin/footer');
	}

	public function lap_add_valid()
	{
		$this->rules_lap_add_valid();

		if ($this->form_validation->run() == FALSE) 
		{
			redirect('C_admin/C_lap');
		} else {
			// $pelapor=$this->input->post('pelapor');
			// $this->db->set('id_laporan', $pelapor);
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
			redirect('C_admin/C_lap');
		}
	}


	public function rules_lap_add_valid()
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


	// send email
	public function send_email($id)
	{
		$dataLap= $this->db->get_where('tb_lap',['id_laporan' => $id])->row_array();

		$data['status'] = $this->M_status->tampilStatus();
		$data['lapor'] = $this->M_lap->tampilLapor();
		
		$config =array('protocol' =>'smtp' ,
			'smtp_host' =>'ssl://smtp.googlemail.com',
			'smtp_port' =>465,
			'smtp_user' =>'skripsi1718071@gmail.com',
			'smtp_pass' =>'skripsi071',
			'mailtype' =>'html',
			'charset' =>'iso-8859-1');

		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('skripsi1718071@gmail.com', 'Admin Pelaporan Kerusakan Jalan Kab.Malang');
		$this->email->to($dataLap['email']);
		$this->email->cc('skripsi1718071@gmail.com');
		$this->email->subject('Verifikasi Pelaporan');
		$this->email->message('Halo <b>'. $dataLap['pelapor']. '</b>,<br>Terima kasih anda telah melaporkan kerusakan jalan di <br> Lokasi : '. $dataLap['lokasi'] . '<br> Keterangan : '.$dataLap['keterangan'] . '<br>Laporan anda akan segera kami survey, Terima kasih :) ');
		if(!$this->email->send())
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				Email Gagal Terkirim
				</div>');
		}
		else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				Email Berhasil Terkirim
				</div>');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/v_tampil_laporan', $data);
		$this->load->view('admin/footer');

	}


	public function excel(){
		$data['cetak'] = $this->M_lap->tampilLapor();
		$this->load->view('admin/v_excel', $data);
	}



	// public function excel()
	// {
	// 	$this->load->model('m_lap');
	// 	$data['cetak'] = $this->m_lap->tampil_lap('tb_lap')->results();
	// 	require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
	// 	require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

	// 	$object = new PHPExcel();

	// 	$object->getProperties()->setCreator("Administrator Kerusakan Jalan");
	// 	$object->getProperties()->setLastModifiedBy("Administrator Kerusakan Jalan");
	// 	$object->getProperties()->setTitle("Laporan Kerusakan Jalan");

	// 	$object->setActiveSheetIndex(0);

	// 	$object->getActiveSheet()->setCellValue('A1','id_laporan');
	// 	$object->getActiveSheet()->setCellValue('B1','pelapor');
	// 	$object->getActiveSheet()->setCellValue('C1','email');
	// 	$object->getActiveSheet()->setCellValue('D1','telepon');
	// 	$object->getActiveSheet()->setCellValue('E1','lokasi');
	// 	$object->getActiveSheet()->setCellValue('F1','id_kecamatan');
	// 	$object->getActiveSheet()->setCellValue('G1','id_kerusakan');
	// 	$object->getActiveSheet()->setCellValue('H1','keterangan');
	// 	$object->getActiveSheet()->setCellValue('I1','tanggal');
	// 	$object->getActiveSheet()->setCellValue('J1','latitude');
	// 	$object->getActiveSheet()->setCellValue('K1','longitude');
	// 	$object->getActiveSheet()->setCellValue('L1','status');

	// 	$baris = 2;
	// 	$no = 1;

	// 	foreach ($cetak as $ctk) {

	// 		$object->getActiveSheet()->setCellValue('A'.$baris, $no++);
	// 		$object->getActiveSheet()->setCellValue('B'.$baris, $ctk->pelapor);
	// 		$object->getActiveSheet()->setCellValue('C'.$baris, $ctk->email);
	// 		$object->getActiveSheet()->setCellValue('D'.$baris, $ctk->telepon);
	// 		$object->getActiveSheet()->setCellValue('E'.$baris, $ctk->lokasi);
	// 		$object->getActiveSheet()->setCellValue('F'.$baris, $ctk->id_kecamatan);
	// 		$object->getActiveSheet()->setCellValue('G'.$baris, $ctk->id_kerusakan);
	// 		$object->getActiveSheet()->setCellValue('H'.$baris, $ctk->keterangan);
	// 		$object->getActiveSheet()->setCellValue('I'.$baris, $ctk->tanggal);
	// 		$object->getActiveSheet()->setCellValue('J'.$baris, $ctk->latitude);
	// 		$object->getActiveSheet()->setCellValue('K'.$baris, $ctk->longitude);
	// 		$object->getActiveSheet()->setCellValue('L'.$baris, $ctk->status);

	// 		$filename="Laporan_Kerusakan_Jalan".'.xlsx';

	// 		$object->getActiveSheet()->setTitle("Laporan Kerusakan Jalan");

	// 		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	// 		header('Content-Disposition: attachment;filename="'.$filename. '"');
	// 		header('Cache-Control: max-age=0');

	// 		$writer=PHPExcel_IOFactory::createwriter($object, 'Excel2007');
	// 		$writer->save('php://output');

	// 		exit;

	// 	}
	// }


}
?>
