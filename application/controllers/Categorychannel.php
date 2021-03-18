<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorychannel extends Base_Controller {

public function userdata()
	{
		print_r($this->session->userdata());
		echo $this->session->userdata('active_user')->id;
		
	}
	
	public function index()
	{
		$this->data['title'] = 'Group';
		$this->data['subview'] = 'categorychannel/main';
		$this->load->view('components/main', $this->data);
	}

	

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('categorychannel/form', $data);
	}

	

	public function data()
	{
        header('Content-Type: application/json');
        $this->load->model('group_m');
		echo json_encode($this->group_m->getJsonCategory($this->input->post()));
	}

	

    public function validate()
	{
		$rules = [
			[
				'field' => 'category_name',
				'label' => '타이틀',
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
		if (!$this->input->post('category_id')) {
			$this->create();
		} else {
			$this->update();
		}
	}

	

	public function create()
	{
		$data['category_name'] = $this->input->post('category_name');
        $data['english_name'] = $this->input->post('english_name');
        $data['order'] =  $this->input->post('order');     
      
		$this->db->insert('category', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['category_name'] = $this->input->post('category_name');
        $data['english_name'] = $this->input->post('english_name');
        $data['order'] =  $this->input->post('order');     
		$this->db->where('category_id', $this->input->post('category_id'));
		$this->db->update('category', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function delete()
	{
		$this->db->where('category_id', $this->input->post('id'));
		$this->db->delete('category');
	}

}
