<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

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
		
		// script untuk mengenerate no nota otomatis
		$this->load->model('transaksi_model');
		$datajumlah = $this->transaksi_model->selectnota()->num_rows();
		$dataarray = $this->transaksi_model->selectnota()->result_array();
		if ($datajumlah > 0) {
			foreach ($dataarray as $kolom) {
				$value2 = $kolom['nonota'];
			}
			$value2 = substr($value2, -6);
			$value2 = (int) $value2 + 1;
			$value2 = "INV" . sprintf('%06s', $value2);
			$value = $value2;
		} else {
			$value2 = "INV000001";
			$value = $value2;
		}
		$data['nonota']=$value;


		$this->load->model('tmp_model');
		$data['detailtransaksi'] = $this->tmp_model->selectdetailtransaksi()->result_array();

	//	var_dump($data['detailtransaksi']);
		//load view pos page
		$this->load->view('user/pos_page',$data);
	}

	public function selectbarang()
	{
		// load data dari database untuk proses autocomplete
		$data = $this->input->get('term');
		$this->load->model('barang_model');
		$dataarray = $this->barang_model->selectbaranglike($data)->result_array();
		foreach ($dataarray as $kolom) {
			$dataajax[] = array('id'=>$kolom['kodebarang'],'label'=>$kolom['kodebarang'].' - '.$kolom['namabarang'],'value'=>$kolom['namabarang'],'harga'=>$kolom['hargajual']);
		}
		echo json_encode($dataajax);
	}

	public function tambahbarang(){
		$data =array(
            'nonota'=> $this->input->post('nonota'),
            'idbarang'=> $this->input->post('idbarang'),
			'kuantitas'=> $this->input->post('kuantitas'),
			'hargabarang'=> $this->input->post('hargabarang')
        );
		$this->load->model('tmp_model');
		$this->tmp_model->insertdetailtransaksi($data);
		redirect(site_url("pos"));
	}

	public function hapusbarangwhere(){
		$data =array(
            'kodebarang'=> $this->input->post('kodebarang')
        );
		$this->load->model('tmp_model');
		$this->tmp_model->deletebarangwhere($data);
		redirect(site_url("pos"));

	}

	public function tambahtransaksi(){
		$data =array(
            'totalpembelian'=> $this->input->post('total1'),
            'bayar'=> $this->input->post('bayar1'),
			'kembali'=> $this->input->post('kembali1'),
			'nonota'=> $this->input->post('nonota1'),
            'tanggal'=> $this->input->post('tanggal1')
		);

		$this->load->model('transaksi_model');
		$this->transaksi_model->inserttransaksi($data);
		
		$this->load->model('tmp_model');
		$data_tmp= $this->tmp_model->selecttmpdetailtransaksi()->result_array();

		$this->load->model('detailtransaksi_model');
		$this->detailtransaksi_model->insertdetailtransaksi($data_tmp);
		$this->detailtransaksi_model->deletedetailtrasaksi();


		redirect(site_url("pos"));
	//	echo "transaksi beres";
	}
	
}
