<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Base_Controller {

public function userdata()
	{
		print_r($this->session->userdata());
		echo $this->session->userdata('active_user')->id;
		
	}
	
	public function index()
	{
		$this->data['title'] = 'message';
		$this->data['subview'] = 'message/main';
		$this->load->view('components/main', $this->data);
	}

	

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('message/form', $data);
	}

	
	public function data()
	{
        $this->load->library('datagrid');
        header('Content-Type: application/json');
	    echo json_encode($this->getJson($this->input->post()));
	}
        
    public function getJson($input)
    {
       $select = 'message.id,contents,create_time,message.status,fromuser.user_name as fromusername,touser.user_name as tousername';
       $replace_field  = [['old_name' => 'name']];
       $param = [
            'input'=> $input,
            'select'=> $select,
			'table'=> 'message',
			'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
			$data = $data->join('members_main as tomember', 'tomember.id = message.to_member_id', 'left')->order_by('message.id','desc');
			$data = $data->join('users_main as touser', 'touser.id = tomember.users_id', 'left');
			$data = $data->join('members_main as frommember', 'frommember.id = message.from_member_id', 'left');
			$data = $data->join('users_main as fromuser', 'fromuser.id = frommember.users_id', 'left');
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
      
      
		$this->db->insert('message', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['status'] = $this->input->post('status');
        $data['contents'] = $this->input->post('contents');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('message', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('message');
	}

}
