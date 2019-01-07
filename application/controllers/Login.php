<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->load->helper('form');
		$this->load->view('login_page');
	}

	public function gethomepage()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$this->load->model('login_model');
		$data = $this->login_model->cekdata("login",$where)->result_array();
		$cek = $this->login_model->cekdata("login",$where)->num_rows();

		foreach ($data as $kolom ) {
			$username = $kolom['username'];
			$hakakses = $kolom['hak'];
		}

		if($cek > 0){
			if ($hakakses=="admin") {
				redirect(site_url("dashboard"));
			}else {
				redirect(site_url("pos"));
			}
			
		}else{
			redirect(site_url("login"));
		}

	}
}
