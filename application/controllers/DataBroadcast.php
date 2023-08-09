<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BroadcashController extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
		if (!$this->session->has_userdata('id_user')) {
			redirect('Login');
		}
		if ($this->session->userdata('level') == 'siswa') {
			show_404();
		}

        
		$this->load->library('form_validation');
        $this->load->model('Broadcash_Model');
    }

    public function index() {
        
        $data['broadcast'] = $this->Broadcash_Model->getAllData();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('broadcashSPP/index', $data);
		$this->load->view('templates/footer');
    }


    public function insert_pesan() {
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('broadcashSPP/index');
        } else {
            // Mendapatkan data NISN dari tabel tbl_siswa
            $nisn = $this->db->select('nisn')->get('tbl_siswa')->row()->nisn;

            // Mendapatkan tanggal saat ini
            $tanggal = date('Y-m-d H:i:s');

            // Data yang akan diinsert
            $data = array(
                'nisn' => $nisn,
                'pesan' => $this->input->post('pesan'),
                'tanggal' => $tanggal
            );

            // Melakukan insert data pada tabel tbl_pesan
            $this->db->insert('tbl_pesan', $data);

            echo "Pesan berhasil dikirim!";
        }
    }
}
?>
