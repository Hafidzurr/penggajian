<?php

class Dashboard extends CI_Controller
{
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

		// Hitung jumlah admin
		$admin = $this->db->query("SELECT COUNT(DISTINCT ID_Pengguna) AS total_admin FROM pengguna WHERE Role = 'admin'");
		$data['admin'] = $admin->row()->total_admin;

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
}

?>
