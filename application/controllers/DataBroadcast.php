<?php

/**
 * 
 */
class DataBroadcast extends CI_Controller
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

		$this->load->model('Broadcast_Model');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('broadcashSPP/index', $data);
		$this->load->view('templates/footer');
	}

}
