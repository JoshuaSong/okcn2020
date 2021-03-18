<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends Base_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
            $this->load->library('session');
        $this->config->load('s3', TRUE);
    }


    public function index()
    {
       
			$this->data['title'] = 'Web Slider 웹사이트 상단 배너';
			
         
            $this->data['subview'] = 'slider/main';
	    $this->load->view('components/main', $this->data);
	}
    


	public function form()
	{
		$data['index'] = $this->input->post('index');

             
		$this->load->view('slider/form', $data);
		
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
			'table'=> 'web_banners',
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
		$this->db->insert('web_banners', $data); 
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
		$this->db->update('web_banners', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}



	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('web_banners');
	}

	public function uploadimage()
    {
      
     $time = time();
       
        $dir = dirname($_FILES["userfile"]["tmp_name"]);
        $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["userfile"]["name"];
        $file = pathinfo($destination);
        rename($_FILES["userfile"]["tmp_name"], $destination);
        $mime_type = $_FILES["userfile"]["type"];
        $s3_config = $this->config->item('s3');    
        $s3_file = $s3_config['folder_name'].'image/slider_'.$time.'.'.$file['extension'];      
        S3::setAuth($s3_config['access_key'],  $s3_config['secret_key']);
        $saved = S3::putObjectFile($destination,$s3_config['bucket_name'],$s3_file, S3::ACL_PUBLIC_READ, array(), $mime_type );
        if ($saved) 
        {
           echo  "https://cdsaws.s3-us-west-2.amazonaws.com/".$s3_file;
        }
    }

}
