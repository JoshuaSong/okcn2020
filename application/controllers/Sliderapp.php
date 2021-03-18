<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliderapp extends Base_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
            $this->load->library('session');
        $this->config->load('s3', TRUE);
    }


    public function index()
    {
       
			$this->data['title'] = 'App Slider 앱 배너';
			
         
            $this->data['subview'] = 'sliderapp/main';
	    $this->load->view('components/main', $this->data);
	}
    


	public function form()
	{
		$data['index'] = $this->input->post('index');

             
		$this->load->view('sliderapp/form', $data);
		
	}	
	
    public function data()
	{
        $this->load->library('datagrid');
        header('Content-Type: application/json');
	    echo json_encode($this->getJson($this->input->post()));
	}
        
    public function getJson($input)
    {
       $select = '*';
       $replace_field  = [['old_name' => 'name', 'new_name' => 'banners_name']];
       $param = [
            'input'=> $input,
            'select'=> $select,
			'table'=> 'banners',
			'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
			$data = $data->order_by('order');
              return $data;
            });

        return $data;
    }


    public function validate()
	{
		$rules = [
			[
				'field' => 'banners_image',
				'label' => 'Image',
				'rules' => 'required'
			]
		];

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()) {
			header("Content-type:application/json");
			echo json_encode('success');
		} else {
			header("Content-type:application/json");
			echo json_encode($this->form_validation->get_all_errors());
		}
	}

	

	public function action()
	{
		if (!$this->input->post('id')) {
			$this->create();
		} else {
			$this->update();
		}
	}


	public function create()
	{
	
		$data['banners_name'] 	= $this->input->post('banners_name');
		$data['banner_title'] 	= $this->input->post('banner_title');
		$data['banners_image'] 	= $this->input->post('banners_image');
		$data['banners_link'] 	= $this->input->post('banners_link');
		$data['order'] 	= $this->input->post('order');			
		$this->db->insert('banners', $data); 
		header('Content-Type: application/json');
    	        echo json_encode('success');
	}

	public function update()
	{
	
		$data['banners_name'] 	= $this->input->post('banners_name');
		$data['banner_title'] 	= $this->input->post('banner_title');
		$data['banners_image'] 	= $this->input->post('banners_image');
		$data['banners_link'] 	= $this->input->post('banners_link');
		$data['order'] 	= $this->input->post('order');		

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('banners', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}



	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('banners');
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	public function uploadimage()
    {
      
    
	 $config['upload_path'] = './assets/uploads';
	 $config['allowed_types'] = 'gif|jpg|png|jpeg';
	 $this->load->library('upload', $config);
	 if ($this->upload->do_upload('userfile'))
	 {
		$img_data=$this->upload->data();
		$new_imgname='slider_'.time().$img_data['file_ext'];
		$new_imgpath=$img_data['file_path'].$new_imgname;
		rename($img_data['full_path'], $new_imgpath);
		echo $new_imgname;
	 }
    }

}
