<?php

/**
 * 
 */
class Broadcash_Model extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('tbl_terkirim')->result();
    }

    public function getDataBynisn($tanggal)
    {
        $query = $this->db->query('select pesan, tanggal from tbl_terkirm where id= "' . $tanggal . '"');
        return ($query->num_rows()) ? $query->result() : false;
    }

    /* 
        *@description mengambil data pada tbl angsuran dpp
    */
    public function getDataAngsuranBynisn($nisn)
    {
        return $this->db->get_where('tbl_terkirim', ['nisn' => $nisn])->result();
    }

    public function jumlahAngsuran($nisn)
    {
        $this->db->select_sum('nominal_bayar');
        return $this->db->get_where('tbl_terkirim', ['nisn' => $nisn])->row();
    }

    /*  
        hapus angsuran by no_transaksi
    */
    public function hapusAngsuran($no_transaksi)
    {
        return $this->db->delete('tbl_terkirim', ['no_transaksi' => $no_transaksi]);
    }

    public function insertData($tanggal, $angsuran)
    {
        foreach ($angsuran as $value) {
            $data = [
                'kelas' => $kelas,
                'nominal_bayar' => $nominal,
                'tanggal' => $tanggal,
                'angsuran' => $value,
            ];
            $this->db->insert('tbl_pesan', $data);
        }
    }
    public function deleteData($no_transaksi)
    {
        $this->db->query('SELECT * from tbl_terkirim where no_transaksi = "' . $no_transaksi . '"');
    }

    public function laporanPemasukanDPP($start = null, $end = null)
    {
        $this->db->select('*, tbl_siswa.nama_siswa');
        $this->db->from('tbl_terkirim');
        $this->db->join('tbl_siswa', 'tbl_terkirim.nisn = tbl_siswa.nisn');
        if ($start != null) {
            $this->db->where('tanggal >=', $start);
        }
        if ($end != null) {
            $this->db->where('tanggal <=', $end);
        }
        return $this->db->get()->result();
    }
}
