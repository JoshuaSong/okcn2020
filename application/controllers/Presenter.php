<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presenter extends Base_Controller {


	
	public function index()
	{
		$this->data['title'] = 'Presenter';
              
		$this->data['subview'] = 'presenter/main';
		$this->load->view('components/main', $this->data);
	}

	

	public function form()
	{
		$data['index'] = $this->input->post('index');
               
		$this->load->view('presenter/form', $data);
	}

	

	public function data()
	{
        header('Content-Type: application/json');
        $this->load->model('group_m');
		echo json_encode($this->getJson($this->input->post()));
	}

	public function getJson($input)
    {
       $select = '*';
       $replace_field  = [['old_name' => 'name']];
       $param = [
            'input'=> $input,
            'select'=> $select,
			'table'=> 'actors',
			'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
			$data = $data->order_by('actor_name');
              return $data;
            });

        return $data;
    }


    public function validate()
	{
		$rules = [
			[
				'field' => 'actor_name',
				'label' => '이름',
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
		if (!$this->input->post('a_id')) {
			$this->create();
		} else {
			$this->update();
		}
	}

	

	public function create()
	{
	$data['actor_name'] = $this->input->post('actor_name');
       
		$this->db->insert('actors', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['actor_name'] = $this->input->post('actor_name');
              
		$this->db->where('a_id', $this->input->post('a_id'));
	
		$this->db->update('actors', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function delete()
	{
		$this->db->where('Id', $this->input->post('id'));
		$this->db->delete('presenter_list');
	}

}
