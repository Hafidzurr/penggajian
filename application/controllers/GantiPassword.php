<?php

class gantiPassword extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Ganti Password";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('formGantiPassword', $data);
		$this->load->view('templates_admin/footer');

	}

	public function gantiPasswordAksi()
	{
		$passBaru = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');

		$this->form_validation->set_rules('passBaru', 'password baru', 'required|matches[ulangPass]');

		$this->form_validation->set_rules('ulangPass', 'ulangi password', 'required');

		if ($this->form_validation->run() != FALSE) {
			$data = array('password' => $passBaru);
			$id = array('ID_Pengguna' => $this->session->userdata('ID_Pengguna'));

			$this->penggajianModel->update_data('pengguna', $data, $id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Password Berhasil Diubah!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('welcome');
		} else {
			$data['title'] = "Ganti Password";
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('formGantiPassword', $data);
			$this->load->view('templates_admin/footer');
		}



	}
}

?>
