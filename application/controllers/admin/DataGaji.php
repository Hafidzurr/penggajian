<?php

class DataGaji extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GajiModel'); // Pastikan model dimuat di constructor
	}

	public function index()
	{
		$data['title'] = "Data Gaji";
		$data['gaji'] = $this->GajiModel->getGajiPegawai();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataGaji', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Gaji";
		$data['pegawai'] = $this->GajiModel->get_data('pegawai');
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataGaji', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$nip = $this->input->post('Pegawai_NIP');
		$gajiPokok = (float) str_replace(['Rp.', '.'], '', $this->input->post('Gaji_Pokok'));
		$bonus = (float) str_replace(['Rp.', '.'], '', $this->input->post('Bonus'));
		$pph = (float) str_replace(['Rp.', '.'], '', $this->input->post('PPH_5'));
		$totalGaji = (float) str_replace(['Rp.', '.'], '', $this->input->post('Total_Gaji'));
		$bulan = $this->input->post('Bulan');
		$tahun = $this->input->post('Tahun');

		$data = array(
			'Pegawai_NIP' => $nip,
			'Gaji_Pokok' => $gajiPokok,
			'Bonus' => $bonus,
			'PPH_5' => $pph,
			'Total_Gaji' => $totalGaji,
			'Bulan' => $bulan,
			'Tahun' => $tahun
		);

		$this->penggajianModel->insert_data($data, 'gaji');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
		redirect('admin/dataGaji');
	}



	public function _rules()
	{
		$this->form_validation->set_rules('Pegawai_NIP', 'NIP Pegawai', 'required');
		$this->form_validation->set_rules('Gaji_Pokok', 'Gaji Pokok', 'required');
		$this->form_validation->set_rules('Bonus', 'Bonus', 'required');
		$this->form_validation->set_rules('PPH_5', 'PPH 5%', 'required');
		$this->form_validation->set_rules('Total_Gaji', 'Total Gaji', 'required');
		$this->form_validation->set_rules('Bulan', 'Bulan', 'required');
		$this->form_validation->set_rules('Tahun', 'Tahun', 'required');
	}
}
?>
