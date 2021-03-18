<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends Base_Controller {

public function userdata()
	{
		print_r($this->session->userdata());
		echo $this->session->userdata('active_user')->id;
		
	}
	
	public function index()
	{
		$this->data['title'] = 'Comment';
		$this->data['subview'] = 'comment/main';
		$this->load->view('components/main', $this->data);
	}

	

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('comment/form', $data);
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
       $replace_field  = [['old_name' => 'name']];
       $param = [
            'input'=> $input,
            'select'=> $select,
			'table'=> 'comments',
			'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
			$data = $data->order_by('cm_id','desc');
              return $data;
            });

        return $data;
    }


	

    public function validate()
	{
		$rules = [
			[
				'field' => 'contents',
				'label' => 'contents',
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
		if (!$this->input->post('cm_id')) {
			$this->create();
		} else {
			$this->update();
		}
	}

	

	public function create()
	{
		$data['user_name'] = $this->input->post('user_name');
        $data['contents'] = $this->input->post('contents');
      
      
		$this->db->insert('comments', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['user_name'] = $this->input->post('user_name');
        $data['contents'] = $this->input->post('contents');
		$this->db->where('cm_id', $this->input->post('cm_id'));
		$this->db->update('comments', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function delete()
	{
		$this->db->where('cm_id', $this->input->post('cm_id'));
		$this->db->delete('comments');
	}

}
