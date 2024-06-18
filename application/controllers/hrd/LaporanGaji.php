<?php

class LaporanGaji extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('Role') != 'HRD') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Anda Belum Login!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('welcome');
		}
		$this->load->model('GajiModel'); // Pastikan model dimuat di constructor
	}

	public function index()
	{
		$data['title'] = "Laporan Gaji Pegawai";
		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/laporanGaji', $data);
		$this->load->view('templates_hrd/footer');
	}

	public function filter()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data['title'] = "Laporan Gaji Pegawai";
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$data['gaji'] = $this->GajiModel->getGajiByDate($bulan, $tahun);

		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/laporanGaji', $data);
		$this->load->view('templates_hrd/footer');
	}
}
?>
