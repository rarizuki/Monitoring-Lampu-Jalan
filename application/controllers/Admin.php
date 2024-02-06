<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library(array("googlemaps"));
		$this->load->model("M_gis");
        $this->load->model('M_lokasi');
        $this->load->model('M_setting');
    }
    

    public function index()
    {
        $setting=$this->M_setting->list_setting();
            //tampilan awal view map
        $this->load->library("googlemaps");
        $config['center'] = "$setting->latitude,$setting->longitude";
        $config['zoom'] = "$setting->zoom";
        $this->googlemaps->initialize($config);
        //tampil semua data sekolah dari database 
        $lokasi = $this->M_lokasi->lists();
        foreach($lokasi as $key => $value) ://perulangan data
        $marker = array();
        $marker['animation'] = 'DROP';
        $marker['position'] = "$value->latitude, $value->longitude";
        $marker['infowindow_content'] = '<div class="media" style="width:400px;">';
        $marker['infowindow_content'] .= '<div class="media-left">';
        $marker['infowindow_content'] .= '<img src="'.base_url("assets/gambar_lokasi/{$value->gambar_lokasi}").'" class="media-object" style="width:150px">';
        $marker['infowindow_content'] .= '</div>';
        $marker['infowindow_content'] .= '<div class="media-body">';
        $marker['infowindow_content'] .= '<h4 class="media-object" style="color:black">&nbsp;'.$value->nama_lokasi.'</h4>';
        $marker['infowindow_content'] .= '<p style="color:black">&nbsp;STATUS LAMPU :'.$value->nama_kategori.'</p>';
        $marker['infowindow_content'] .= '<p style="color:black">&nbsp;ARUS DAYA :'.$value->arus.'A</p>';
        $marker['infowindow_content'] .= '</div>';
        $marker['infowindow_content'] .= '</div>';
        $marker['icon'] = base_url('assets/icon/'.$value->icon);
        $this->googlemaps->add_marker($marker);
        endforeach;
        //end perulangan data
        //tampilan data marker map
        $this->googlemaps->initialize($config);
        //menampilkan maker ke map
        
        $data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM ',
                        'title2'=>'Maps',
                        'isi'   =>  'admin/v_home',
                        'map' =>  $this->googlemaps->create_map()
    );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }

    public function listlokasi()
    {
        $lokasi = $this->m_gis->tampildata();
        $map=$this->googlemaps->create_map();
        $setting=$this->m_setting->list_setting();
        $data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
                        'isi'   =>  'v_list',                 
                        'lokasi'    =>  $lokasi,
                        'map'       =>  $map
                    );
        $this->load->view('layout/v_wrapper2', $data,false);
    }

    
}

/* End of file Admin.php */

