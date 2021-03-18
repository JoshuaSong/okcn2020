<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Youtubechannel extends Base_Controller {


	
	public function index()
	{
		$this->data['title'] = 'Youtube Channel';
		$this->data['subview'] = 'youtubechannel/main';
		$this->load->view('components/main', $this->data);
	}

	

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('youtubechannel/form', $data);
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
			'table'=> 'youtube_channel',
			'replace_field' => $replace_field
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
				'field' => 'channel_id',
				'label' => 'channel_id',
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
		$data['channel_title'] = $this->input->post('channel_title');
        $data['channel_id'] = $this->input->post('channel_id');
      
      
		$this->db->insert('youtube_channel', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function update()
	{
		$data['channel_title'] = $this->input->post('channel_title');
        $data['channel_id'] = $this->input->post('channel_id');
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('youtube_channel', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	

	public function delete()
	{
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('youtube_channel');
	}

}
