<?php

class LaporanGaji extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
