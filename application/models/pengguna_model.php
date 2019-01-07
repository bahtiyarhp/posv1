<?php 

class Pengguna_model extends CI_Model{
    
    function sel ($table,$where){		
        $query = $this->db->get_where($table,$where);
        return $query;
    }
    

    function selectpengguna($table){
        $this->db->select('*');
        $this->db->from($table);
        $query=$this->db->get();
        return $query;
    }
    
    function insertpengguna($data){
        $datainsert =array(
            'username'=> $data['username'],
            'password'=> $data['password'],
            'alias'=> $data['alias'],
            'hak'=> $data['hak'],
        );

        $this->db->insert('login', $datainsert);
    }

    function selectpenggunawhere($data){
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('username',$data['username']);
        $query=$this->db->get();
        return $query;   
    }
    
    function deletepenggunawhere($data){
        $this->db->where('username' , $data['username']);
        $this->db->delete('login');
    }


    function updatepenggunawhere($data){


        $dataupdate =array(
            'password'=> $data['password'],
            'alias'=> $data['alias'],
            'hak'=> $data['hak'],
        );

        $this->db->where('username',$data['username']);
        $this->db->update('login', $dataupdate);
    }

    

}

?>