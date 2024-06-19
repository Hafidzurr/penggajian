<?php

class DataPengguna extends CI_Controller
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
	}
	public function index()
	{
		$data['title'] = "Data Pengguna";
		$data['pengguna'] = $this->penggajianModel->get_data('pengguna')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataPengguna', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Pengguna";
		$data['pegawai'] = $this->penggajianModel->get_data('pegawai')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataPengguna', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambahData();
		} else {
			$username = $this->input->post('Username');
			$password = $this->input->post('Password');
			$role = $this->input->post('Role');
			$nip = $this->input->post('Pegawai_NIP');

			// Validasi apakah NIP ada di tabel pegawai
			$pegawai = $this->penggajianModel->get_data_where('pegawai', array('NIP' => $nip))->row();
			if (!$pegawai) {
				$data['title'] = "Tambah Data Pengguna";
				$data['error'] = "NIP Pegawai tidak ditemukan!";
				$data['pegawai'] = $this->penggajianModel->get_data('pegawai')->result();
				$this->load->view('templates_admin/header', $data);
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/tambahDataPengguna', $data);
				$this->load->view('templates_admin/footer');
				return;
			}

			$data = array(
				'Username' => $username,
				'Password' => $password,
				'Role' => $role,
				'Pegawai_NIP' => $nip,
			);

			$this->penggajianModel->insert_data($data, 'pengguna');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Ditambahkan!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('admin/dataPengguna');
		}
	}

	public function updateData($id)
	{
		$where = array('ID_Pengguna' => $id);
		$data['pengguna'] = $this->db->query("SELECT * FROM pengguna WHERE ID_Pengguna= '$id'")->result();
		$data['title'] = "Update Data Pengguna";
		$data['pegawai'] = $this->penggajianModel->get_data('pegawai')->result();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataPengguna', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->updateData($this->input->post('ID_Pengguna'));
		} else {
			$id = $this->input->post('ID_Pengguna');
			$username = $this->input->post('Username');
			$password = $this->input->post('Password');
			$role = $this->input->post('Role');
			$nip = $this->input->post('Pegawai_NIP');

			// Validasi apakah NIP ada di tabel pegawai
			$pegawai = $this->penggajianModel->get_data_where('pegawai', array('NIP' => $nip))->row();
			if (!$pegawai) {
				$data['title'] = "Update Data Pengguna";
				$data['error'] = "NIP Pegawai tidak ditemukan!";
				$data['pengguna'] = $this->db->query("SELECT * FROM pengguna WHERE ID_Pengguna= '$id'")->result();
				$data['pegawai'] = $this->penggajianModel->get_data('pegawai')->result();
				$this->load->view('templates_admin/header', $data);
				$this->load->view('templates_admin/sidebar');
				$this->load->view('admin/updateDataPengguna', $data);
				$this->load->view('templates_admin/footer');
				return;
			}

			$data = array(
				'Username' => $username,
				'Password' => $password,
				'Role' => $role,
				'Pegawai_NIP' => $nip,
			);

			$where = array(
				'ID_Pengguna' => $id
			);

			$this->penggajianModel->update_data('pengguna', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil Diupdate!</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
			redirect('admin/dataPengguna');
		}
	}

	public function deleteData($id)
	{
		$where = array('ID_Pengguna' => $id);
		$this->penggajianModel->delete_data($where, 'pengguna');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Data Berhasil Dihapus!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
		redirect('admin/DataPengguna');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('Username', 'username', 'required');
		$this->form_validation->set_rules('Password', 'password', 'required');
		$this->form_validation->set_rules('Role', 'role', 'required');
		$this->form_validation->set_rules('Pegawai_NIP', 'nip', 'required');
	}
}
?>
