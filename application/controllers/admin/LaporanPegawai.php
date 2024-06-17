<?php

class LaporanPegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PegawaiModel');
	}

	public function index()
	{
		$data['title'] = "Laporan Data Pegawai";
		$data['pegawai'] = $this->PegawaiModel->get_all_pegawai();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporanPegawai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function filter()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data['title'] = "Laporan Data Pegawai";
		$data['pegawai'] = $this->PegawaiModel->get_filtered_pegawai($bulan, $tahun);
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/laporanPegawai', $data);
		$this->load->view('templates_admin/footer');
	}

	public function cetak()
	{
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		$data['title'] = "Laporan Data Pegawai";
		$data['pegawai'] = $this->PegawaiModel->get_filtered_pegawai($bulan, $tahun);
		$this->load->view('admin/cetakLaporanPegawai', $data);
	}
}
?>
