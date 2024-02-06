<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model {

	public function lists()
	{
		$this->db->select('tbl_lokasi.*,COUNT(tbl_foto.id_lokasi) as total_foto');
		$this->db->from('tbl_lokasi');
		$this->db->join('tbl_foto', 'tbl_foto.id_lokasi = tbl_lokasi.id_lokasi', 'left');
		$this->db->group_by('tbl_lokasi.id_lokasi');
		$this->db->order_by('id_lokasi','desc');
		$query=$this->db->get();
		return $query->result();
	}	

	public function detail($id_lokasi)
	{
		$this->db->select('*');
		$this->db->from('tbl_lokasi');
		$this->db->where('id_lokasi', $id_lokasi);
		$query=$this->db->get();
		return $query->row();
	}

	public function detailfoto($id_foto)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_foto', $id_foto);
		$query=$this->db->get();
		return $query->row();
	}

	public function foto($id_lokasi)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_lokasi', $id_lokasi);
		$query=$this->db->get();
		return $query->result();

	}

	public function add($data)
	{
		$this->db->insert('tbl_foto', $data);
	}

	//hapus data kategori
	public function delete($data)
	{
		$this->db->where('id_foto', $data['id_foto']);
		$this->db->delete('tbl_foto',$data);
	}


}

/* End of file M_gallery.php */
/* Location: ./application/models/M_gallery.php */