<?php 

class Transaksi_model extends CI_Model{
    
    function selectnota(){
        $this->db->select('nonota');
        $this->db->from('transaksi');
        $this->db->order_by('nonota', 'DESC');
        $this->db->limit(1);
        $query=$this->db->get();		
        return $query;
    }

    function inserttransaksi($data){
        $datainsert =array(
            'nonota'=> $data['nonota'],
       //     'namapelanggan'=> $data['namapelanggan'],
            'tanggal'=> $data['tanggal'],
            'totalpembelian'=> $data['totalpembelian'],
            'bayar'=> $data['bayar'],
            'kembali'=> $data['kembali']
        );
        $this->db->insert('transaksi', $datainsert);
    }

    function selectinv($nonota){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('nonota', $nonota);
        $query = $this->db->get();
        return $query;
    }
    
}
?>