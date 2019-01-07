<?php 

class Login_model extends CI_Model{
    
    function cekdata($table,$where){		
        $query = $this->db->get_where($table,$where);
        return $query;
    }
    

    function cekdata1($table,$where){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('author','David');
        $this->db->order_by('id', 'DESC');
        $query=$this->db->get();		
        $query = $this->db->get_where($table,$where);
        return $query;
	}
}

?>