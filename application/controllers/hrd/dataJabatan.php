<?php

class DataJabatan extends CI_Controller
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
		$data['title'] = "Data Jabatan";

		$data['jabatan'] = $this->penggajianModel->get_data('jabatan')->result();

		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/dataJabatan', $data);
		$this->load->view('templates_hrd/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Jabatan";
		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/tambahDataJabatan', $data);
		$this->load->view('templates_hrd/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$bidang = $this->input->post('Bidang');
			$nama_jabatan = $this->input->post('Nama_Jabatan');
			$gaji_pokok = $this->input->post('Gaji_Pokok');
			$persentase_bonus = $this->input->post('Persentase_Bonus');

			$data = array(

				'Bidang' => $bidang,
				'Nama_Jabatan' => $nama_jabatan,
				'Gaji_Pokok' => $gaji_pokok,
				'Persentase_Bonus' => $persentase_bonus,
			);

			$this->penggajianModel->insert_data($data, 'jabatan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Berhasil Ditambahkan!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('hrd/DataJabatan');
		}
	}


	public function updateData($id)
	{
		$where = array('ID_Jabatan' => $id);
		$data['jabatan'] = $this->db->query("SELECT * FROM jabatan WHERE ID_Jabatan= '$id'")->result();
		$data['title'] = "Update Data Jabatan";
		$this->load->view('templates_hrd/header', $data);
		$this->load->view('templates_hrd/sidebar');
		$this->load->view('hrd/updateDataJabatan', $data);
		$this->load->view('templates_hrd/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->updateData();
		} else {
			$id = $this->input->post('ID_Jabatan');
			$bidang = $this->input->post('Bidang');
			$nama_jabatan = $this->input->post('Nama_Jabatan');
			$gaji_pokok = $this->input->post('Gaji_Pokok');
			$persentase_bonus = $this->input->post('Persentase_Bonus');

			$data = array(

				'Bidang' => $bidang,
				'Nama_Jabatan' => $nama_jabatan,
				'Gaji_Pokok' => $gaji_pokok,
				'Persentase_Bonus' => $persentase_bonus,
			);

			$where = array(
				'ID_Jabatan' => $id
			);

			$this->penggajianModel->update_data('jabatan', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Data Berhasil Diupdate!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('hrd/DataJabatan');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('Bidang', 'bidang', 'required');
		$this->form_validation->set_rules('Nama_Jabatan', 'nama jabatan', 'required');
		$this->form_validation->set_rules('Gaji_Pokok', 'gaji pokok', 'required');
		$this->form_validation->set_rules('Persentase_Bonus', 'persentase bonus', 'required');
	}

	public function deleteData($id)
	{
		$where = array('ID_Jabatan' => $id);
		$this->penggajianModel->delete_data($where, 'jabatan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Berhasil Dihapus!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('hrd/DataJabatan');
	}
}

?>
