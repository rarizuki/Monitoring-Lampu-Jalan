<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model {

	public function list_setting()
	{
		$query=$this->db->get('tbl_setting');
		return $query->row();
	}

	public function edit($data)
    {
       $this->db->where('id_setting',$data['id_setting']);
       $this->db->update('tbl_setting',$data);
    }
	

}

/* End of file M_setting.php */
/* Location: ./application/models/M_setting.php */