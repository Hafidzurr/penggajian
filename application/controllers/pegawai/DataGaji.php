<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('Role') != 'pegawai') {
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
		$id = $this->session->userdata('Pegawai_NIP');

		// Join query to get data from pengguna, pegawai, and jabatan tables
		$data['pegawai'] = $this->db->query("
            SELECT pengguna.*, pegawai.NIP, pegawai.Nama, pegawai.Alamat, pegawai.Tanggal_Lahir, pegawai.Tanggal_Masuk, pegawai.Jabatan_ID,
            jabatan.Nama_Jabatan, jabatan.Bidang
            FROM pengguna 
            JOIN pegawai ON pengguna.Pegawai_NIP = pegawai.NIP 
            JOIN jabatan ON pegawai.Jabatan_ID = jabatan.ID_Jabatan
            WHERE pengguna.Pegawai_NIP = '$id'
        ")->result();

		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('templates_pegawai/sidebar');
		$this->load->view('pegawai/dashboard', $data);
		$this->load->view('templates_pegawai/footer');
	}
}
?>
