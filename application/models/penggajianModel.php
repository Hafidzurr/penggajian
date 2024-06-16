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


}
?>
