<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library(array("googlemaps"));
		$this->load->model('m_setting');
	}

	public function index()
	{
		$this->load->library('googlemaps');
        $config['center'] = '-2.464430, 119.592879';
        $config['zoom'] = '4';
        $this->googlemaps->initialize($config);

        $marker['position'] = '-2.464430, 119.592879';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);


							$map=$this->googlemaps->create_map();
							$setting=$this->m_setting->list_setting();
							$data = array(
							'title'    =>	'SISTIM MONITORING LAMPU JALAN UMUM',
							'title2'    =>	'Setting',
							'map'		=> $map,
                            				'setting'	=> $setting,                            
							'isi'	    =>	'admin/v_setting'
						);

			$this->load->view('admin/layout/v_wrapper', $data, FALSE);	
	}


	public function edit()
	{
		$setting=$this->m_setting->list_setting();
		$i=$this->input;
            	$data = array(
                        'id_setting' => $setting->id_setting,
                        'nama_wilayah' => $i->post('nama_wilayah'),
                        'latitude' => $i->post('latitude'),
                        'longitude' => $i->post('longitude'),
                        'zoom' => $i->post('zoom')
                         );
            $this->m_setting->edit($data);
            $this->session->set_flashdata('sukses', 'Website Berhasil Di Setting !!');
            redirect(base_url('setting'),'refresh');

	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */