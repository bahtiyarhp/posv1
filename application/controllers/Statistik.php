<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/statistik_page');
		$this->load->view('footer');
	}


	public function gettransaksi()
	{
		//get nomor inventori
		$nomorinv = $this->input->post('nomorinv');
		
		// get data inventori
		$this->load->model('transaksi_model');
		$data['inventori'] = $this->transaksi_model->selectinv($nomorinv)->result_array();
		
		//get data detail inventori
		$this->load->model('detailtransaksi_model');
		$data['detailinventori'] = $this->detailtransaksi_model->selectdetailinv($nomorinv)->result_array();
				
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/transaksi_page',$data);
		$this->load->view('footer');
	}
}
