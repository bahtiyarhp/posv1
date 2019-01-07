<?php 

class Detailtransaksi_model extends CI_Model{
        
    function insertdetailtransaksi($data){
        foreach ($data as $kolom) {
            $datainsert =array(
                'qty' => $kolom['tmp_qty'],
                'total'=> $kolom['tmp_total'],
                'barang_kodebarang'=> $kolom['tmp_kodebarang'],
                'transaksi_nonota'=> $kolom['tmp_nonota']
            );
            $this->db->insert('detailtransaksi', $datainsert);
        }
        

    }

    function selectdetailtransaksi(){
        $this->db->select('kodebarang,namabarang,hargajual,satuan,tmp_qty,satuan');
        $this->db->from('barang');
        $this->db->join('tmp_detailtransaksi', 'barang.kodebarang = tmp_detailtransaksi.tmp_kodebarang');
        $query = $this->db->get();
        return $query;
    }
    

    function deletedetailtrasaksi(){
        $this->db->empty_table('tmp_detailtransaksi');
    }

    function selectlaporandetail(){
        $this->db->select('namabarang,hargajual,satuan,qty,total,kodebarang');
        $this->db->from('detailtransaksi');
        $this->db->join('barang', 'barang.kodebarang = detailtransaksi.barang_kodebarang');
        $query = $this->db->get();
        return $query;
    }
}
?>