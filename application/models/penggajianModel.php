<?php

class PenggajianModel extends CI_model
{
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function get_data_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function getPegawaiJabatan()
	{
		$this->db->select('pegawai.*, jabatan.Nama_Jabatan, jabatan.Bidang');
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'pegawai.Jabatan_ID = jabatan.ID_Jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');

		$this->db->select('pengguna.*, pegawai.Nama as Nama_Pegawai');
		$this->db->from('pengguna');
		$this->db->join('pegawai', 'pengguna.Pegawai_NIP = pegawai.NIP', 'left');
		$this->db->where('pengguna.Username', $username);
		$this->db->where('pengguna.Password', $password);
		$this->db->limit(1);
		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return FALSE;
		}
	}
}
?>
