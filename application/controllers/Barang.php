<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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
		//ambil data barang
		$this->load->model('barang_model');
		$data['databarang'] = $this->barang_model->selectbarang("barang")->result_array();

		//load view data barang
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/barang_page',$data);
	//	$this->load->view('footer');
	}

	public function tambahbarang(){
		$data =array(
            'kodebarang'=> $this->input->post('kodebarang'),
            'namabarang'=> $this->input->post('namabarang'),
            'satuan'=> $this->input->post('satuan'),
			'hargabeli'=> $this->input->post('hargabeli'),
			'hargajual'=> $this->input->post('hargajual'),
            'stok'=> $this->input->post('stok')
        );
		$this->load->model('barang_model');
		$this->barang_model->insertbarang($data);
		redirect(site_url("barang"));

	}

	public function selectbarang2(){
		$data =array(
            'kodebarang'=> $this->input->post('kodebarang'),
        );
		$this->load->model('barang_model');
		$result['results'] = $this->barang_model->selectbarangwhere($data)->result_array();
		$this->load->view('admin/modal/modalbaranghapus',$result);
	}
	
	public function selectbarang(){
		$data =array(
            'kodebarang'=> $this->input->post('kodebarang'),
        );
		$this->load->model('barang_model');
		$result['results'] = $this->barang_model->selectbarangwhere($data)->result_array();
		$this->load->view('admin/modal/modalbarangrubah',$result);
	}


	public function ubahbarang(){
		$data =array(
            'kodebarang'=> $this->input->post('kodebarang'),
            'namabarang'=> $this->input->post('namabarang'),
            'satuan'=> $this->input->post('satuan'),
			'hargabeli'=> $this->input->post('hargabeli'),
			'hargajual'=> $this->input->post('hargajual'),
            'stok'=> $this->input->post('stok')
        );
		$this->load->model('barang_model');
		$this->barang_model->updatebarangwhere($data);
		redirect(site_url("barang"));

	}

	public function hapusbarang(){
		$data =array(
            'kodebarang'=> $this->input->post('kodebarang'),
        );
		$this->load->model('barang_model');
		$this->barang_model->deletebarangwhere($data);
		redirect(site_url("barang"));

	}
}
