<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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
	
	function __construct() {
        parent::__construct();
        $this->load->library('Fpdf181');
    }
    
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('admin/laporan_page');
		$this->load->view('footer');
	}
	
	
	public function getnota(){
                $inv ='INV000004';
                $pdf = new FPDF('p','mm',array(55,100));
                $pdf->SetMargins(2,6,3);
                // membuat halaman baru
                $pdf->AddPage();
                // setting jenis font yang akan digunakan
                $pdf->SetFont('Arial','',8);
                // mencetak string
                $pdf->Cell(50,2,'"TOKO XXXXX"',0,1,'C');
                $pdf->SetFont('Arial','',8);
                // mencetak string
                $pdf->Cell(50,7,'Jl Kaliurang No 5A',0,1,'C');
                $pdf->Cell(50,3,'NOTA PENJUALAN',0,1,'C');
                $pdf->SetFont('Arial','',9);
        

                $pdf->SetFont('Arial','',8);
                $pdf->Cell(60,4,'NO NOTA',0,1,'L');
                $pdf->Cell(60,4,'NAMA',0,1,'L');
                // Memberikan space kebawah agar tidak terlalu rapat
                $pdf->Cell(10,2,'',0,1);

                $this->load->model('transaksi_model');
                
                // get transaksi nota
                $datainv = $this->transaksi_model->selectinv($inv)->result_array();
                foreach ($datainv as $row ) {
                        $pdf->Cell(60,4,$row['nonota'],0,1,'L');
                        $pdf->Cell(60,4,$row['namapelanggan'],0,1,'L');
                        $pdf->Cell(60,4,$row['tanggal'],0,1,'L');
                        $pdf->Cell(60,4,$row['totalpembelian'],0,1,'L');
                        $pdf->Cell(60,4,$row['bayar'],0,1,'L');
                        $pdf->Cell(60,4,$row['kembali'],0,1,'L');

                        
                }

                // get transaksi nota detail
                $this->load->model('detailtransaksi_model');
                $datadetailinv = $this->detailtransaksi_model->selectdetailinv()->result_array();
                $i =1;       
                foreach ($datadetailinv as $kolom) {

                        $pdf->SetFont('Arial','',8);
                        $pdf->Cell(15,4,$kolom['kodebarang'].' - ',0,0,'');
                        $pdf->Cell(35,4,$kolom['namabarang'],0,0);
                        $pdf->Ln();
                        $pdf->Cell(18,4,$kolom['qty'].' '.$kolom['satuan'].'  x',0,0,'R');
                        $pdf->Cell(12,4,$kolom['hargajual'],0,0,'R');
                        
                        $pdf->Cell(20,4,'= '.$kolom['total'],0,1,'R');
                        $i++;
                }
                $pdf->Output();

	}
}
