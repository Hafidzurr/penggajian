<?php

class PegawaiModel extends CI_Model
{
	public function get_all_pegawai()
	{
		$this->db->select('pegawai.*, jabatan.Nama_Jabatan, jabatan.Bidang');
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'pegawai.Jabatan_ID = jabatan.ID_Jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_filtered_pegawai($bulan, $tahun)
	{
		$this->db->select('pegawai.*, jabatan.Nama_Jabatan, jabatan.Bidang');
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'pegawai.Jabatan_ID = jabatan.ID_Jabatan');
		if ($bulan) {
			$this->db->where('MONTH(pegawai.Tanggal_Masuk)', $bulan);
		}
		if ($tahun) {
			$this->db->where('YEAR(pegawai.Tanggal_Masuk)', $tahun);
		}
		$query = $this->db->get();
		return $query->result();
	}
}
?>
