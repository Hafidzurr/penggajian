<?php

class SlipGaji extends CI_Controller
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
		$this->load->model('GajiModel');
	}

	public function index()
	{
		$data['title'] = "Generate Slip Gaji";
		$data['pegawai'] = $this->GajiModel->get_data('pegawai');

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/generateSlipGaji', $data);
		$this->load->view('templates_admin/footer');
	}

	public function generate()
	{
		$nip = $this->input->post('Pegawai_NIP');
		$data['title'] = "Slip Gaji Pegawai";
		$data['gaji'] = $this->GajiModel->getSlipGajiByNIP($nip);

		if (!$data['gaji']) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data gaji untuk pegawai ini tidak ditemukan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
			redirect('admin/SlipGaji');
		} else {
			$this->load->view('templates_admin/header', $data);
			$this->load->view('admin/slipGaji', $data);
			$this->load->view('templates_admin/footer');
		}
	}
}
?>
