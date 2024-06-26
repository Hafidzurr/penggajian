<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Form Login";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('formLogin');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->penggajianModel->cek_login($username, $password);

			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong>Username atau Password Salah!</strong> 
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>');
				redirect('welcome');
			} else {
				$this->session->set_userdata('Role', $cek->Role);
				$this->session->set_userdata('Nama_Pegawai', $cek->Nama_Pegawai);
				$this->session->set_userdata('ID_Pengguna', $cek->ID_Pengguna);
				$this->session->set_userdata('Pegawai_NIP', $cek->Pegawai_NIP);





				switch ($cek->Role) {
					case 'admin':
						redirect('admin/dashboard');
						break;
					case 'HRD':
						redirect('hrd/dashboard');
						break;
					case 'pegawai':
						redirect('pegawai/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
?>
