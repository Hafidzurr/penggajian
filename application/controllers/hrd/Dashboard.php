<?php

class Dashboard extends CI_Controller
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
	}
	public function index()
	{
		$data['title'] = "Dashboard";

		// Hitung jumlah pegawai
		$pegawai = $this->db->query("SELECT COUNT(DISTINCT NIP) AS total_pegawai FROM pegawai");
		$data['pegawai'] = $pegawai->row()->total_pegawai;

		// Hitung jumlah bidang tanpa duplikasi
		$bidang = $this->db->query("SELECT COUNT(DISTINCT Bidang) AS total_bidang FROM jabatan");
		$data['bidang'] = $bidang->row()->total_bidang;

		// Hitung jumlah jabatan tanpa duplikasi
		$jabatan = $this->db->query("SELECT COUNT(DISTINCT Nama_Jabatan) AS total_jabatan FROM jabatan");
		$data['jabatan'] = $jabatan->row()->total_jabatan;

		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/dashboard', $data);
		$this->load->view('templates_hrd/footer');
	}
}

?>
