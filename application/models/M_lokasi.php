<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lokasi extends CI_Model {

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori=tbl_lokasi.id_kategori','LEFT');
		$this->db->order_by('id_lokasi','asc');
		$query=$this->db->get();
		return $query->result();
  }	
  public function get_data(){
	$hasil=$this->db->query("SELECT * FROM tbl_lokasi");
        return $hasil->result();
  }
  public function get_id($id_lokasi)
	{
		$q = $this->db->query("SELECT * FROM tbl_lokasi
								WHERE tbl_lokasi.id_lokasi = '$id_lokasi' ");	
		return $q->result();
	}

	//add
     public function add($data)
     {
       $this->db->insert('tbl_lokasi',$data);
     }

     public function detail($id_lokasi)
     {
     	$this->db->select('*');
        $this->db->from('tbl_lokasi');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_lokasi.id_kategori', 'left');
        $this->db->where('id_lokasi', $id_lokasi);
        $query=$this->db->get();
        return $query->row();
     }

     //edit
     public function edit($data,$id)
     {
	return $this->db->update('tbl_lokasi',$data,['id_lokasi' => $id]);
//        $this->db->where('id_lokasi',$data['id_lokasi']);
//        $this->db->update('tbl_lokasi',$data);
     }

     //hapus data sekolah
	public function delete($data)
	{
		$this->db->where('id_lokasi', $data['id_lokasi']);
		$this->db->delete('tbl_lokasi',$data);
  }
  public function ambildataperintah(){
		$this->db->select('*');
		$this->db->from('tbl_lokasi');
		$query = $this->db->get();
			return $query->result();
		
	}

}

/* End of file M_lokasi.php */
/* Location: ./application/models/M_lokasi.php */