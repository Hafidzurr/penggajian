<?php

class dataPegawai extends CI_Controller
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
		$data['title'] = "Data Pegawai";
		$data['pegawai'] = $this->penggajianModel->getPegawaiJabatan();

		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/dataPegawai', $data);
		$this->load->view('templates_hrd/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Pegawai";
		$data['jabatan'] = $this->penggajianModel->get_data('jabatan')->result();

		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/tambahDataPegawai', $data);
		$this->load->view('templates_hrd/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$nip = $this->input->post('NIP');
			$nama = $this->input->post('Nama');
			$alamat = $this->input->post('Alamat');
			$tanggal_lahir = $this->input->post('Tanggal_Lahir');
			$tanggal_masuk = $this->input->post('Tanggal_Masuk');
			$jabatan_id = $this->input->post('Jabatan_ID');

			$data = array(
				'NIP' => $nip,
				'Nama' => $nama,
				'Alamat' => $alamat,
				'Tanggal_Lahir' => $tanggal_lahir,
				'Tanggal_Masuk' => $tanggal_masuk,
				'Jabatan_ID' => $jabatan_id
			);

			$this->penggajianModel->insert_data($data, 'pegawai');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
			redirect('hrd/dataPegawai');
		}
	}

	public function updateData($id)
	{
		$data['pegawai'] = $this->db->query("SELECT pegawai.*, jabatan.Bidang FROM pegawai JOIN jabatan ON pegawai.Jabatan_ID = jabatan.ID_Jabatan WHERE NIP= '$id'")->result();
		$data['jabatan'] = $this->penggajianModel->get_data('jabatan')->result();
		$data['title'] = "Update Data Pegawai";

		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/updateDataPegawai', $data);
		$this->load->view('templates_hrd/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->updateData($this->input->post('NIP'));
		} else {
			$nip = $this->input->post('NIP');
			$nama = $this->input->post('Nama');
			$alamat = $this->input->post('Alamat');
			$tanggal_lahir = $this->input->post('Tanggal_Lahir');
			$tanggal_masuk = $this->input->post('Tanggal_Masuk');
			$jabatan_id = $this->input->post('Jabatan_ID');

			$data = array(
				'NIP' => $nip,
				'Nama' => $nama,
				'Alamat' => $alamat,
				'Tanggal_Lahir' => $tanggal_lahir,
				'Tanggal_Masuk' => $tanggal_masuk,
				'Jabatan_ID' => $jabatan_id
			);

			$where = array('NIP' => $nip);

			$this->penggajianModel->update_data('pegawai', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diupdate!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
			redirect('hrd/dataPegawai');
		}
	}

	private function _rules()
	{
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('Nama', 'Nama', 'required');
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('Tanggal_Lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('Tanggal_Masuk', 'Tanggal Masuk', 'required');
		$this->form_validation->set_rules('Jabatan_ID', 'Jabatan', 'required');
	}

	public function deleteData($id)
	{
		// Hapus data terkait di tabel gaji terlebih dahulu
		$whereGaji = array('Pegawai_NIP' => $id);
		$this->penggajianModel->delete_data($whereGaji, 'gaji');

		// Hapus data terkait di tabel pengguna terlebih dahulu
		$wherePengguna = array('Pegawai_NIP' => $id);
		$this->penggajianModel->delete_data($wherePengguna, 'pengguna');

		// Hapus data pegawai
		$wherePegawai = array('NIP' => $id);
		$this->penggajianModel->delete_data($wherePegawai, 'pegawai');

		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
		redirect('hrd/dataPegawai');
	}
}

?>
