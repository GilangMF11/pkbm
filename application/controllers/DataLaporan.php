
<?php

/**
 * 
 */
class DataLaporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('id_user')) {
            redirect('Login');
        }
        if ($this->session->userdata('level') == 'siswa') {
            show_404();
        }

        $this->load->model('DPPSiswa_Model');
        $this->load->model('Jurusan_Model');
        $this->load->model('Kelas_Model');
        $this->load->model('DataPembayaranDPP_Model');
        $this->load->model('DataPembayaranSPP_Model');
        $this->load->model('TahunAjaran_Model');
        $this->load->library('form_validation');
    }
    function index()
    {
        $kelas = $this->input->get('kelas');
        $kelas = ($this->input->get('kelas') == 'lihat_semua') ? null : $kelas;
        $tahun_awal = $this->input->get('tahun_awal');
        // $tahun_akhir = $this->input->get('tahun_akhir');


        $data = [
            'dataSiswa' => $this->DPPSiswa_Model->getAllDataJoinDataSiswa_Kelas($kelas, $tahun_awal),
            'dataTahunAjaran' => $this->TahunAjaran_Model->getAllData(),
            'dataAngsuran' => $this->DataPembayaranDPP_Model->getAllData(),
            'kelas' => $this->Kelas_Model->getAllData()
        ];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('laporandpp/index', $data);
        $this->load->view('templates/footer');
    }

    public function export($kelas = null, $tahun_awal = null)
    {
        $kelas = ($kelas == 'lihat_semua') ? null : $kelas;
        $data = [
            'dataSiswa' => $this->DPPSiswa_Model->getAllDataJoinDataSiswa_Kelas($kelas, $tahun_awal),
            'dataAngsuran' => $this->DataPembayaranDPP_Model->getAllData(),
            'tahun_awal' => $this->TahunAjaran_Model->detail_data($tahun_awal)['tahun_ajaran'],
            // 'tahun_akhir' => $this->TahunAjaran_Model->detail_data($tahun_akhir)['tahun_ajaran'],
            'kelas' => $this->Kelas_Model->detail_data($kelas)['kode_kelas'],
        ];
        $this->load->view('laporandpp/export', $data);
    }

    public function riwayatpembayaran($nisn)
	{
        if ($this->session->userdata('level') == 'siswa') {
            if ($this->session->userdata('id_user') != $nisn) {
                show_404();
            }
        }
		$result = $this->DataPembayaranSPP_Model->getDataSIswaJoinJenisSPPByNISN($nisn);
		$data = [
			'nisn' => $nisn,
			'nama_siswa' => $result->nama_siswa,
			'dataSiswa' => $this->Siswa_Model->detail_data($nisn),
			'ganjil' => [7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'],
			'genap' => [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni'],
			'tahunAjaran' => $this->DataPembayaranSPP_Model->getTagihanSPP($result->kode_ta, $result->tahun_keluar),
			'pembayaran' => $this->DataPembayaranSPP_Model->DetailDataPembayaranSPP($nisn)
		];

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('Siswa/index', $data);
		$this->load->view('templates/footer');
	}
}
