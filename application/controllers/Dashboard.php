<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library(array("googlemaps"));
		$this->load->model("M_gis");
        $this->load->model('M_lokasi');
        $this->load->model('M_dashboard');
        $this->load->model('M_setting');
    }
    

    public function index()
    {
        $lokasi1=$this->M_dashboard->detail1();
        $lokasi2=$this->M_dashboard->detail2();
        $lokasi3=$this->M_dashboard->detail3();
        $data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM ',
                        'title2'=>'dashboard',
                        'isi'   =>  'admin/v_dashboard',
                        'lokasi1'		=>  $lokasi1,
                        'lokasi2'       =>  $lokasi2,
                        'lokasi3'       =>  $lokasi3,
                        'map' =>  $this->googlemaps->create_map()
    );
        $this->load->view('admin/layout/v_wrapper', $data, FALSE);
    }
    function data_detail1(){
		$data=$this->M_dashboard->detail1();
		echo json_encode($data);
	}
    public function ajax1(){
		$data=$this->M_dashboard->ajax1();
        foreach($data as $value)
		{
            echo $value->arus;
            echo "&nbsp;A";
      }
	}
    public function ajax2(){
		$data=$this->M_dashboard->ajax2();
        foreach($data as $value)
		{
            echo $value->arus;
            echo "&nbsp;A";
      }
	}
    public function ajax3(){
		$data=$this->M_dashboard->ajax3();
        foreach($data as $value)
		{
            echo $value->arus ;
            echo "&nbsp;A";
      }
	}
    function data_detail2(){
		$data=$this->M_dashboard->detail2();
		echo json_encode($data);
	}
    function data_detail3(){
		$data=$this->M_dashboard->detail3();
		echo json_encode($data);
	}

    

    public function sensor(){
		$this->load->model('m_dashboard');
		if (isset($_GET['data'])) {
			$ampere = $this->input->get('data');
            $lokasi = $this->M_lokasi->lists();
			$data = array('id_lokasi' => '1',
                            'arus' => $ampere
                        );
			$this->m_dashboard->update($data);
		}else{
			echo "Variabel data tidak terdefinisi";
		}
        
	}
    public function sensor_lampu(){
		$this->load->model('m_dashboard');
		if (isset($_GET['data'])) {
			$ampere = $this->input->get('data');
            $lokasi = $this->M_lokasi->lists();
			$data = array('id_lokasi' => '2',
                            'arus' => $ampere
                        );
			$this->m_dashboard->update($data);
		}else{
			echo "Variabel data tidak terdefinisi";
		}
    }
    public function sensor_data(){
		$this->load->model('m_dashboard');
		if (isset($_GET['data'])) {
			$ampere = $this->input->get('data');
            $lokasi = $this->M_lokasi->lists();
			$data = array('id_lokasi' => '3',
                            'arus' => $ampere
                        );
			$this->m_dashboard->update($data);
		}else{
			echo "Variabel data tidak terdefinisi";
		}
    }
}

/* End of file Dashboard.php */

