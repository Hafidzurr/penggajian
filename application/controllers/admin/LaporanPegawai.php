<?php

class LaporanPegawai extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('Role') != 'admin') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Anda Belum Login!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('welcome');
		}
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
