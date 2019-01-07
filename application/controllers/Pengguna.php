<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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
		// select pengguna
		//ambil data barang
		$this->load->model('pengguna_model');
		$data['datapengguna'] = $this->pengguna_model->selectpengguna("login")->result_array();
		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/pengguna_page',$data);
	//	$this->load->view('footer');
	}

	public function tambahpengguna(){
		$data =array(
            'username'=> $this->input->post('username'),
            'password'=> $this->input->post('password'),
            'alias'=> $this->input->post('alias'),
            'hak'=> $this->input->post('hak'),
        );
		$this->load->model('pengguna_model');
		$this->pengguna_model->insertpengguna($data);
		redirect(site_url("pengguna"));

	}

	public function hapuspengguna(){
		$data =array(
            'username'=> $this->input->post('username'),
        );
		$this->load->model('pengguna_model');
		$this->pengguna_model->deletepenggunawhere($data);
		redirect(site_url("pengguna"));

	}

	public function selectpengguna2(){
		$data =array(
            'username'=> $this->input->post('username'),
        );
		$this->load->model('pengguna_model');
		$result['results'] = $this->pengguna_model->selectpenggunawhere($data)->result_array();
		$this->load->view('admin/modal/modalpenggunahapus',$result);
	}
	
	public function selectpengguna(){
		$data =array(
            'username'=> $this->input->post('username'),
        );
		$this->load->model('pengguna_model');
		$result['results'] = $this->pengguna_model->selectpenggunawhere($data)->result_array();
		$this->load->view('admin/modal/modalpenggunarubah',$result);
	}

	public function ubahpengguna(){
		$data =array(
            'username'=> $this->input->post('username'),
            'password'=> $this->input->post('password'),
            'alias'=> $this->input->post('alias'),
            'hak'=> $this->input->post('hak')
        );
		$this->load->model('pengguna_model');
		$this->pengguna_model->updatepenggunawhere($data);
		redirect(site_url("pengguna"));

	}


}
