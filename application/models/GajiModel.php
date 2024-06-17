<?php

class GajiModel extends CI_Model
{
	public function get_data($table)
	{
		if ($table == 'pegawai') {
			$this->db->select('pegawai.*, jabatan.Nama_Jabatan, jabatan.Gaji_Pokok, jabatan.Persentase_Bonus');
			$this->db->from('pegawai');
			$this->db->join('jabatan', 'pegawai.Jabatan_ID = jabatan.ID_Jabatan');
			$query = $this->db->get();
			return $query->result();
		} else {
			return $this->db->get($table)->result();
		}
	}

	public function get_data_where($table, $where)
	{
		return $this->db->get_where($table, $where)->result();
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

	public function getGajiPegawai()
	{
		$this->db->select('gaji.*, pegawai.Nama as Nama_Pegawai, jabatan.Nama_Jabatan');
		$this->db->from('gaji');
		$this->db->join('pegawai', 'gaji.Pegawai_NIP = pegawai.NIP');
		$this->db->join('jabatan', 'pegawai.Jabatan_ID = jabatan.ID_Jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	public function getGajiByDate($bulan, $tahun)
	{
		$this->db->select('gaji.*, pegawai.Nama as Nama_Pegawai, jabatan.Nama_Jabatan');
		$this->db->from('gaji');
		$this->db->join('pegawai', 'gaji.Pegawai_NIP = pegawai.NIP');
		$this->db->join('jabatan', 'pegawai.Jabatan_ID = jabatan.ID_Jabatan');
		if ($bulan && $tahun) {
			$this->db->where('MONTH(gaji.Tanggal_Gajian)', $bulan);
			$this->db->where('YEAR(gaji.Tanggal_Gajian)', $tahun);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function getSlipGajiByNIP($nip)
	{
		$this->db->select('gaji.*, pegawai.Nama as Nama_Pegawai,jabatan.Bidang, jabatan.Nama_Jabatan, pegawai.NIP, jabatan.Gaji_Pokok');
		$this->db->from('gaji');
		$this->db->join('pegawai', 'gaji.Pegawai_NIP = pegawai.NIP');
		$this->db->join('jabatan', 'pegawai.Jabatan_ID = jabatan.ID_Jabatan');
		$this->db->where('pegawai.NIP', $nip);
		$query = $this->db->get();
		return $query->row();
	}
}
?>
