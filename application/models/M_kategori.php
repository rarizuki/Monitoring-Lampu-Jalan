<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	//menampilka seluruh Data Lampu
    public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->order_by('id_kategori', 'desc');
		$query=$this->db->get();
		return $query->result();
	}

	//detail
	  public function detail($id_kategori)
	  {
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori', $id_kategori);
		$query=$this->db->get();
		return $query->row();
	  }

	//add
     public function add($data)
     {
       $this->db->insert('tbl_kategori',$data);
     }

     //edit
     public function edit($data,$id)
     {
	return $this->db->update('tbl_kategori',$data,['id_kategori' => $id]);
//        $this->db->where('id_kategori',$data['id_kategori']);
//        $this->db->update('tbl_kategori',$data);
     }

     //hapus data kategori
	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('tbl_kategori',$data);
	}


}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */