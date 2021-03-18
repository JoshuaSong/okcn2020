<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends Base_Controller {

public function userdata()
	{
		print_r($this->session->userdata());
		echo $this->session->userdata('active_user')->id;
		
	}
	
	public function index()
	{
		$this->data['title'] = 'members';
		$this->data['subview'] = 'members/main';
		$this->load->view('components/main', $this->data);
	}

	

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('members/form', $data);
	}
	public function messageform()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('members/messageform', $data);
	}
	
	public function data()
	{
        $this->load->library('datagrid');
        header('Content-Type: application/json');
	    echo json_encode($this->getJson($this->input->post()));
	}
        
    public function getJson($input)
    {
       $select = 'members_main.id,users_id,phone,email, members_main.created_on,image, members_main.status,user_name,region_name,city';
       $replace_field  = [['old_name' => 'name']];
       $param = [
            'input'=> $input,
            'select'=> $select,
			'table'=> 'members_main',
			'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
			$data = $data->order_by('members_main.id','desc');
			$data = $data->join('users_main', 'users_main.id = members_main.users_id', 'left');
			
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
		if (!$this->input->post('id')) {
			$this->create();
		} else {
			$this->update();
		}
	}

	

	public function create()
	{
		$data['to_member_id'] = 0;
		$data['from_member_id'] = 1;
		$data['status'] = $this->input->post('status');
        $data['contents'] = $this->input->post('contents');
      
      
		$this->db->insert('members_main', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['status'] = $this->input->post('status');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('members_main', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	public function sendmessagetomember()
	{
		$data['to_member_id'] = $this->input->post('id');
		$data['from_member_id'] = 1;
	//	$data['status'] = $this->input->post('status');
        $data['contents'] = $this->input->post('contents');
      
      
		$this->db->insert('message', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('members');
	}

}
