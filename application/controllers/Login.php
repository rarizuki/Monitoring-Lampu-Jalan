<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->model('M_login');
    $this->load->library(array('googlemaps'));
    $this->load->model('m_setting');
}
    public function index()
    {
        
        $valid=$this->form_validation;
        $valid->set_rules('username','Username','required',array('required' => '%s Harus Diisi' ));
        $valid->set_rules('password','Password','required',array('required' => '%s Harus Diisi' ));

        if ($valid->run()) {
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            //prosess ke simple_login

            $this->simple_login->login($username,$password);

        }
        $setting=$this->m_setting->list_setting();
        $data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM' );
        $this->load->view('v_login', $data, FALSE);
    }

    public function logout()
    {
        $this->simple_login->logout();
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */