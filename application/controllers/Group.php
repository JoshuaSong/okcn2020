<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends Base_Controller {


	
	public function index()
	{
		$this->data['title'] = 'Group';
		$this->data['subview'] = 'group/main';
		$this->load->view('components/main', $this->data);
	}

	public function listmenu()
	{
		print_r($this->data['list_menu']);
	}

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('group/form', $data);
	}

	

	public function data()
	{
        header('Content-Type: application/json');
        $this->load->model('group_m');
		echo json_encode($this->group_m->getJson($this->input->post()));
	}

	

    public function validate()
	{
		$rules = [
			[
				'field' => 'name',
				'label' => '角色名称',
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
		if (!$this->input->post('Id')) {
			$this->create();
		} else {
			$this->update();
		}
	}

	

	public function create()
	{
		$data['name'] = $this->input->post('name');
                $data['remark'] = $this->input->post('remark');
		$this->db->insert('mng_role', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['name'] = $this->input->post('name');
                $data['remark'] = $this->input->post('remark');
		$this->db->where('Id', $this->input->post('Id'));
		$this->db->update('mng_role', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function delete()
	{
		$this->db->where('Id', $this->input->post('id'));
		$this->db->delete('mng_role');
	}

}
