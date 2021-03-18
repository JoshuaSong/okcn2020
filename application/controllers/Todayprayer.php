<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todayprayer extends Base_Controller {
	function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->config->load('s3', TRUE);
    }


public function userdata()
	{
		print_r($this->session->userdata());
		echo $this->session->userdata('active_user')->id;
		
	}
	
	public function index()
	{
		$this->data['title'] = 'Today Prayer';
		$this->data['subview'] = 'todayprayer/main';
		$this->load->view('components/main', $this->data);
	}

	

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('todayprayer/form', $data);
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
       $replace_field  = [];
       $param = [
            'input'=> $input,
            'select'=> $select,
            'table'=> 'today_prayer'
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
			$data = $data->order_by('id','desc');
              return $data;
            });

        return $data;
    }


	

    public function validate()
	{
		$rules = [
			[
				'field' => 'prayer_image',
				'label' => 'prayer_image',
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
		$data['prayer_title'] = $this->input->post('prayer_title');
		$data['prayer_image'] = $this->input->post('prayer_image');
		$data['prayer_info'] = $this->input->post('prayer_info');
		$data['prayer_cont'] = $this->input->post('prayer_cont');
		$data['prayer_date'] = $this->input->post('prayer_date');
      
		$this->db->insert('today_prayer', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['prayer_title'] = $this->input->post('prayer_title');
		$data['prayer_image'] = $this->input->post('prayer_image');
		$data['prayer_info'] = $this->input->post('prayer_info');
		$data['prayer_cont'] = $this->input->post('prayer_cont');
      
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('today_prayer', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('today_prayer');
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
        $s3_file = $s3_config['folder_name'].'image/prayer_'.$time.'.'.$file['extension'];      
        S3::setAuth($s3_config['access_key'],  $s3_config['secret_key']);
        $saved = S3::putObjectFile($destination,$s3_config['bucket_name'],$s3_file, S3::ACL_PUBLIC_READ, array(), $mime_type );
        if ($saved) 
        {
           echo  "https://cdsaws.s3-us-west-2.amazonaws.com/".$s3_file;
        }
    }


}
