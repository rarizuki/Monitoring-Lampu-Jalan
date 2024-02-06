<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

	

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->library(array("googlemaps"));
		$this->load->model("m_lokasi");
		$this->load->model('m_kategori');
		$this->load->model('m_setting');
		
	}

	// List all your items
	public function index()
	{
		$lokasi = $this->m_lokasi->lists();
		$map=$this->googlemaps->create_map();
		$setting=$this->m_setting->list_setting();
        	$data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
						'title2' => 'Data Lampu',
		                        'isi'	=>	'admin/lokasi/v_lists',					
						'lokasi'	=>	$lokasi,
						'map'		=>	$map
					);
		$this->load->view('admin/layout/v_wrapper', $data,false);
	}
	function data_lokasi(){
		$data=$this->m_lokasi->get_data();
		echo json_encode($data);
	}

	




	public function add()
	{
		$setting=$this->m_setting->list_setting();
		$this->load->library('googlemaps');
        $config['center'] = "$setting->latitude, $setting->longitude";
        $config['zoom'] = "$setting->zoom";
        $this->googlemaps->initialize($config);

        $marker['position'] = "$setting->latitude, $setting->longitude";
        $marker['draggable'] = true;
        $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);

		$map=$this->googlemaps->create_map();
		$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('latitude', 'Latitude','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('longitude', 'Longitude','required',
        array('required' => '%s Harus Diisi'));

        if ($this->form_validation->run()) {
        	$config['upload_path']   = './assets/gambar_lokasi/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 1500;
            $config['max_width']     = 5000;
            $config['max_height']    = 5000;
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('gambar_lokasi')) {
        		$data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
										'title2' 		=>	'Add Data Lampu',
										'kategori'		=>	$this->m_kategori->lists(),
										'error_upload'	=>	$this->upload->display_errors(),
										'map'		=>	$map,
										'isi'	 		=>	'admin/lokasi/v_add'
									);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/gambar_lokasi/'.$upload_data['uploads']['file_name'];
				//$config['new_image']     	= './assets/gambar_lokasi/thumbs/'.$upload_data['uploads']['file_name'];
				//$config['create_thumb'] 	= TRUE;
				//$config['maintain_ratio'] 	= TRUE;
				//$config['width']         	= 200;
				//$config['height']       	= 200;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
	            $data = array(
	            				'nama_lokasi'	=> $i->post('nama_lokasi'),
	            				'id_kategori'		=> $i->post('id_kategori'),
	                			'latitude'			=> $i->post('latitude'),
	                			'longitude'			=> $i->post('longitude'),
	                    		'gambar_lokasi'	=> $upload_data['uploads']['file_name'],                    		
	                        	);
	            $this->m_lokasi->add($data);
	            $this->session->set_flashdata('sukses',' Data Lampu Berhasil Ditambahkan !');
	            redirect('lokasi','refresh');
		}
	}

        $data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
									'title2' 		=>	'Add Data Lampu',
									'kategori'		=>	$this->m_kategori->lists(),
									'map'		=>	$map,
									'isi'	 		=>	'admin/lokasi/v_add'
								);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	//Delete one item
	public function delete($id_lokasi)
	{
		//hapus gambar
		
		$lokasi=$this->m_lokasi->detail($id_lokasi);
		if ($lokasi->icon != "") {
			unlink('./assets/gambar_lokasi/'.$lokasi->gambar_lokasi);
		}
		//===========================
		$data = array('id_lokasi' => $id_lokasi);
		$this->m_lokasi->delete($data);
		$this->session->set_flashdata('sukses','Data Berhasil Dihapus');
		redirect('lokasi','refresh');
	}

	//edit
	// public function edit($id_lokasi)
	// {
	// 	$setting=$this->m_setting->list_setting();
	// 	$lokasi=$this->m_lokasi->detail($id_lokasi);
	// 	$this->load->library('googlemaps');
        // $config['center'] = "$setting->latitude, $setting->longitude";
        // $config['zoom'] = "$setting->zoom";
        // $this->googlemaps->initialize($config);
        // $marker['position'] = "$setting->latitude, $setting->longitude";
        // $marker['draggable'] = true;
        // $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
        // $this->googlemaps->add_marker($marker);
	// 	$map=$this->googlemaps->create_map();
	// 	$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi','required',
        // array('required' => '%s Harus Diisi'));
        // $this->form_validation->set_rules('latitude', 'Latitude','required',
        // array('required' => '%s Harus Diisi'));
        // $this->form_validation->set_rules('longitude', 'Longitude','required',
        // array('required' => '%s Harus Diisi'));

        // if ($this->form_validation->run()) {
        // 	$config['upload_path']   = './assets/gambar_lokasi/';
        //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //     $config['max_size']      = 1500;
        //     $config['max_width']     = 5000;
        //     $config['max_height']    = 5000;
        //     $this->upload->initialize($config);
        //     if(! $this->upload->do_upload('gambar_lokasi') == FALSE) {
        // 		$data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
	// 									'title2' 		=>	'Edit Data Lampu',
	// 									'kategori'		=>	$this->m_kategori->lists(),
	// 									'error_upload'	=>	$this->upload->display_errors(),
	// 									'map'			=>	$map,
	// 									'lokasi'		=>  $lokasi,
	// 									'isi'	 		=>	'admin/lokasi/v_edit'
	// 							);
	// 			$this->load->view('admin/layout/v_wrapper', $data);
				
	// 		}else{
	// 			$upload_data        		= array('uploads' =>$this->upload->data());
	// 			$config['image_library']  	= 'gd2';
	// 			$config['source_image']   	= './assets/gambar_lokasi/'.$upload_data['uploads']['file_name'];
	// 			//$config['new_image']     	= './assets/gambar_lokasi/thumbs/'.$upload_data['uploads']['file_name'];
	// 			//$config['create_thumb'] 	= TRUE;
	// 			//$config['maintain_ratio'] 	= TRUE;
	// 			//$config['width']         	= 200;
	// 			//$config['height']       	= 200;
	// 			$this->load->library('image_lib', $config);
	// 			$this->image_lib->resize();
				
	// 			$i = $this->input;
	//             			$data = array(
	//             				'id_lokasi'		=>$id_lokasi,
	//             				'nama_lokasi'		=> $i->post('nama_lokasi'),
	//                 			'latitude'			=> $i->post('latitude'),
	//                 			'longitude'			=> $i->post('longitude'),
	//                     			'gambar_lokasi'	=> $gambar        		
	//                         	);
					
	//             $this->m_lokasi->edit($data);
	//             $this->session->set_flashdata('sukses',' Data Lampu Berhasil DiEdit !');
	//             //redirect('lokasi','refresh');
	// 	}
	// }

        // $data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
	// 								'title2' 		=>	'Edit Data Lampu',
	// 								'kategori'		=>	$this->m_kategori->lists(),
	// 								'map'			=>	$map,
	// 								'lokasi'		=>  $lokasi,
	// 								'isi'	 		=>	'admin/lokasi/v_edit'
	// 							);
	// 	$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	// }





	public function edit($id)
	{
		$setting=$this->m_setting->list_setting();
		$lokasi=$this->m_lokasi->detail($id);
		$this->load->library('googlemaps');
        $config['center'] = "$setting->latitude, $setting->longitude";
        $config['zoom'] = "$setting->zoom";
        $this->googlemaps->initialize($config);
        $marker['position'] = "$setting->latitude, $setting->longitude";
        $marker['draggable'] = true;
        $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);
		$map=$this->googlemaps->create_map();
		$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('latitude', 'Latitude','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('longitude', 'Longitude','required',
        array('required' => '%s Harus Diisi'));

        if ($this->form_validation->run()) {
		$data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
									'title2' 		=>	'Edit Data Lampu',
									'kategori'		=>	$this->m_kategori->lists(),
									'map'			=>	$map,
									'lokasi'		=>  $lokasi,
									'isi'	 		=>	'admin/lokasi/v_edit'
								);
		$this->load->view('admin/layout/v_wrapper', $data);
		$file_lama = $this->input->post('foto_lama');
		$file_baru = $_FILES["foto_baru"]['name'];
		$update_filebaru = '';
if(!empty($file_baru)){
    $config['upload_path']   = './assets/gambar_lokasi/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['file_name'] = $file_baru;
    $this->upload->initialize($config);
    if($this->upload->do_upload('foto_baru')){
        // Hapus foto lama jika ada
        if(!empty($file_lama) && file_exists("./assets/gambar_lokasi/".$file_lama)){
            unlink("./assets/gambar_lokasi/".$file_lama);
        }
        $update_filebaru = $file_baru; // Simpan nama file baru
    }
    else{
        echo $this->upload->display_errors(); // Tampilkan pesan error jika upload gagal
    }
}
else{
    $update_filebaru = $file_lama;
}

		$data = [
			'id_lokasi'      => $id,
			'nama_lokasi'    => $this->input->post('nama_lokasi'),
			'latitude'       => $this->input->post('latitude'),
			'longitude'      => $this->input->post('longitude'),
			'gambar_lokasi'  => $update_filebaru         
		];
            
            
		$model_lokasi = new m_lokasi;
		$res = $model_lokasi->edit($data, $id);
	            $this->session->set_flashdata('sukses',' Data Lampu Berhasil DiEdit !');
	            redirect('lokasi','refresh');
		}
		$data = array('title' => 'SISTIM MONITORING LAMPU JALAN UMUM',
									'title2' 		=>	'Edit Data Lampu',
									'kategori'		=>	$this->m_kategori->lists(),
									'map'			=>	$map,
									'lokasi'		=>  $lokasi,
									'isi'	 		=>	'admin/lokasi/v_edit'
								);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

        
	


	public function bacaperintah(){
		$this->load->model('m_lokasi');

		$data = $this->m_lokasi->ambildataperintah();

		foreach ($data as $key => $value) {
			if ($value->id_kategori == 0){
				echo "OFF";
			}
			if ($value->id_kategori == 1){
				echo "ON";
			}
			
		}
	}
	public function lampu2(){
		$this->load->model('m_lokasi');

		$data = $this->m_lokasi->ambildataperintah();

		foreach ($data as $key => $value) {
			if ($value->id_kategori == 2){
				echo "MATI";
			}
			if ($value->id_kategori == 3){
				echo "NYALA";
			}
			
			
		}
	}
	public function lampu3(){
		$this->load->model('m_lokasi');

		$data = $this->m_lokasi->ambildataperintah();

		foreach ($data as $key => $value) {
			if ($value->id_kategori == 4){
				echo "HIDUP";
			}
			if ($value->id_kategori == 5){
				echo "PADAM";
			}
			
			
		}
	}
	public function edit_on($id_lokasi)
    {

        $data = $this->m_lokasi->get_id($id_lokasi);

        if ($data == 0) {
            $data = array(
                'id_kategori'    => 1,
            );
		}else {
            $data = array(
                'id_kategori'    => 1,
               
            );
        }
		

            $this->db->where('id_lokasi', $id_lokasi);
            $this->db->update('tbl_lokasi', $data);

			$this->session->set_flashdata('sukses',' Lampu Berhasil Dinyalakan !');
			redirect('lokasi','refresh');
	}
	public function edit_nyala($id_lokasi)
    {

        $data = $this->m_lokasi->get_id($id_lokasi);

        if ($data == 2) {
            $data = array(
                'id_kategori'    => 3,
            );
		}else {
            $data = array(
                'id_kategori'    => 3,
               
            );
        }
		

            $this->db->where('id_lokasi', $id_lokasi);
            $this->db->update('tbl_lokasi', $data);

			$this->session->set_flashdata('sukses',' Lampu Berhasil Dinyalakan !');
			redirect('lokasi','refresh');
	}
	public function edit_hidup($id_lokasi)
    {

        $data = $this->m_lokasi->get_id($id_lokasi);

        if ($data == 4) {
            $data = array(
                'id_kategori'    => 5,
            );
		}else {
            $data = array(
                'id_kategori'    => 5,
               
            );
        }
		

            $this->db->where('id_lokasi', $id_lokasi);
            $this->db->update('tbl_lokasi', $data);

			$this->session->set_flashdata('sukses',' Lampu Berhasil Dinyalakan !');
			redirect('lokasi','refresh');
	}
	public function edit_off($id_lokasi)
    {

        $data = $this->m_lokasi->get_id($id_lokasi);

        if ($data == 1) {
            $data = array(
                'id_kategori'    => 0,
            );
		}else {
            $data = array(
                'id_kategori'    => 0,
               
            );
        }
		

            $this->db->where('id_lokasi', $id_lokasi);
            $this->db->update('tbl_lokasi', $data);

			$this->session->set_flashdata('sukses',' Lampu Berhasil Dimatikan !');
			redirect('lokasi','refresh');
	}
	public function edit_mati($id_lokasi)
    {

        $data = $this->m_lokasi->get_id($id_lokasi);

        if ($data == 3) {
            $data = array(
                'id_kategori'    => 2,
            );
		}else {
            $data = array(
                'id_kategori'    => 2,
               
            );
        }
		

            $this->db->where('id_lokasi', $id_lokasi);
            $this->db->update('tbl_lokasi', $data);

			$this->session->set_flashdata('sukses',' Lampu Berhasil Dimatikan !');
			redirect('lokasi','refresh');
	}
	public function edit_padam($id_lokasi)
    {

        $data = $this->m_lokasi->get_id($id_lokasi);

        if ($data == 5) {
            $data = array(
                'id_kategori'    => 4,
            );
		}else {
            $data = array(
                'id_kategori'    => 4,
               
            );
        }
		

            $this->db->where('id_lokasi', $id_lokasi);
            $this->db->update('tbl_lokasi', $data);

			$this->session->set_flashdata('sukses',' Lampu Berhasil Dimatikan !');
			redirect('lokasi','refresh');
	}
	

}


