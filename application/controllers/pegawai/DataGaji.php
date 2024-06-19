<?php

class DataGaji extends CI_Controller
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
		$this->load->model('PenggajianModel');
	}

	public function index()
	{
		$data['title'] = "Data Gaji Pegawai";
		$nip = $this->session->userdata('Pegawai_NIP');

		$data['gaji'] = $this->db->query("
            SELECT gaji.*, pegawai.Nama as Nama_Pegawai, jabatan.Nama_Jabatan, jabatan.Bidang
            FROM gaji 
            JOIN pegawai ON gaji.Pegawai_NIP = pegawai.NIP 
            JOIN jabatan ON pegawai.Jabatan_ID = jabatan.ID_Jabatan
            WHERE gaji.Pegawai_NIP = '$nip'
        ")->result();

		$this->load->view('templates_pegawai/header', $data);
		$this->load->view('templates_pegawai/sidebar');
		$this->load->view('pegawai/dataGaji', $data);
		$this->load->view('templates_pegawai/footer');
	}

	public function cetakSlip($id_gaji)
	{
		$data['title'] = "Slip Gaji Pegawai";
		$nip = $this->session->userdata('Pegawai_NIP');

		$data['gaji'] = $this->db->query("
            SELECT gaji.*, pegawai.Nama as Nama_Pegawai, jabatan.Nama_Jabatan, jabatan.Bidang
            FROM gaji 
            JOIN pegawai ON gaji.Pegawai_NIP = pegawai.NIP 
            JOIN jabatan ON pegawai.Jabatan_ID = jabatan.ID_Jabatan
            WHERE gaji.ID_Gaji = '$id_gaji' AND gaji.Pegawai_NIP = '$nip'
        ")->row();

		if (!$data['gaji']) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Gaji Tidak Ditemukan!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
			redirect('pegawai/dataGaji');
		}

		$this->load->view('pegawai/cetakSlip', $data);
	}
}

?>
