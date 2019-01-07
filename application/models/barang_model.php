<?php 

class Barang_model extends CI_Model{
    
    function sel ($table,$where){		
        $query = $this->db->get_where($table,$where);
        return $query;
    }
    

    function selectbarang($table){
        $this->db->select('*');
        $this->db->from($table);
        $query=$this->db->get();
        return $query;
    }
    
    function insertbarang($data){
        $datainsert =array(
            'kodebarang'=> $data['kodebarang'],
            'namabarang'=> $data['namabarang'],
            'hargajual'=> $data['hargajual'],
            'hargabeli'=> $data['hargabeli'],
            'satuan'=> $data['satuan'],
            'stok'=> $data['stok']
        );
        $this->db->insert('barang', $datainsert);
    }

    function selectbarangwhere($data){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('kodebarang',$data['kodebarang']);
        $query=$this->db->get();
        return $query;   
    }

    function selectbaranglike($data){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->like('namabarang',$data);
        $query=$this->db->get();
        return $query;   
    }


    function updatebarangwhere($data){
        $dataupdate =array(
            'namabarang'=> $data['namabarang'],
            'hargabeli'=> $data['hargabeli'],
            'hargajual'=> $data['hargajual'],
            'satuan'=> $data['satuan'],
            'stok'=> $data['stok'],
        );

        $this->db->where('kodebarang',$data['kodebarang']);
        $this->db->update('barang', $dataupdate);
    }

    function deletebarangwhere($data){
        $this->db->where('kodebarang' , $data['kodebarang']);
        $this->db->delete('barang');
    }
}
?>