<?php 

class Tmp_model extends CI_Model{
        
    function insertdetailtransaksi($data){
        $datainsert =array(
            'tmp_nonota'=> $data['nonota'],
            'tmp_kodebarang'=> $data['idbarang'],
            'tmp_qty'=> $data['kuantitas'],
            'tmp_total' => $data['kuantitas']*$data['hargabarang']
        );
        $this->db->insert('tmp_detailtransaksi', $datainsert);

    }

    function selectdetailtransaksi(){
        $this->db->select('kodebarang,namabarang,hargajual,satuan,tmp_qty,satuan');
        $this->db->from('barang');
        $this->db->join('tmp_detailtransaksi', 'barang.kodebarang = tmp_detailtransaksi.tmp_kodebarang');
        $query = $this->db->get();
        return $query;
    }

    function selecttmpdetailtransaksi(){
        $this->db->select('*');
        $this->db->from('tmp_detailtransaksi');
        $query = $this->db->get();
        return $query;
    }
    

    function deletebarangwhere($data){
        $this->db->where('tmp_kodebarang' , $data['kodebarang']);
        $this->db->delete('tmp_detailtransaksi');
    }
}
?>