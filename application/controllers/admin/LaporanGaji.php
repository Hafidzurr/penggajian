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
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporanGaji', $data);
		$this->load->view('templates_admin/footer');
	}

	public function filter()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data['title'] = "Laporan Gaji Pegawai";
		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;
		$data['gaji'] = $this->GajiModel->getGajiByDate($bulan, $tahun);

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporanGaji', $data);
		$this->load->view('templates_admin/footer');
	}
}
?>
