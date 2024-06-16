<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Dashboard";

		$pegawai = $this->db->query("SELECT * FROM pegawai");
		$data['pegawai'] = $pegawai->num_rows();

		$HRD = $this->db->query("SELECT * FROM jabatan WHERE Bidang = 'HRD'");
		$data['hrd'] = $HRD->num_rows();

		$jabatan = $this->db->query("SELECT * FROM jabatan");
		$data['jabatan'] = $jabatan->num_rows();

		$admin = $this->db->query("SELECT * FROM pengguna WHERE Role = 'admin'");
		$data['admin'] = $admin->num_rows();


		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
}

?>
