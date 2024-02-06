<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
    }

    //menampilka seluruh Data Lampu
    public function tampildata()
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi');
		$query=$this->db->get();
		return $query->result();
	}
    

    //tambah Data Lampu
     public function tambah($data)
     {
       $this->db->insert('tbl_lokasi',$data);
     }

      //hapus Data Lampu
     public function delete($data)
     {
       $this->db->where('id',$data['id']);
       $this->db->delete('tbl_lokasi',$data);
     }

     public function ajax1()
     {
        $this->db->select('*');
         $this->db->from('tbl_lokasi');
         $this->db->where('id_lokasi','1');
         $query=$this->db->get();
         return $query->result(); 
   }
   public function ajax2()
     {
        $this->db->select('*');
         $this->db->from('tbl_lokasi');
         $this->db->where('id_lokasi','2');
         $query=$this->db->get();
         return $query->result(); 
   }
   public function ajax3()
     {
        $this->db->select('*');
         $this->db->from('tbl_lokasi');
         $this->db->where('id_lokasi','3');
         $query=$this->db->get();
         return $query->result(); 
   }	
    public function detail1()
    {
        $this->db->select('*');
        $this->db->from('tbl_lokasi');
        $this->db->where('id_lokasi', 1);
        $query=$this->db->get();
        return $query->row();
    }
    public function detail2()
    {
        $this->db->select('*');
        $this->db->from('tbl_lokasi');
        $this->db->where('id_lokasi', 2);
        $query=$this->db->get();
        return $query->row();
    }
    public function detail3()
    {
        $this->db->select('*');
        $this->db->from('tbl_lokasi');
        $this->db->where('id_lokasi', 3);
        $query=$this->db->get();
        return $query->row();
    }
    function save($datasensor)
	{
		$this->db->insert('sensor', $datasensor);
		return TRUE;
	}
    
    public function update($data)
    {
        $this->db->where('id_lokasi', $data['id_lokasi']);
        $this->db->update('tbl_lokasi',$data);
    }

}

/* End of file M_gis.php */

