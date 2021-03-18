<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cchannels extends Base_Controller {

   


    public function index($cid=null)
    {
		if($cid == null) $cid = 0;
        $this->session->set_userdata('cid',$cid);
        
            $this->data['title'] = 'Channel';
            $this->data['cats'] = $this->getAllCategory();
           
            $this->data['subview'] = 'cchannels/main';
	    $this->load->view('components/main', $this->data);
	}
    
	public function getAllCategory()
	{
		$cat = $this->db->get('category')->result();
		return $cat;
	}
   


	public function form()
	{
		$data['index'] = $this->input->post('index');
		$data['cats'] = $this->getAllCategory();
		$data['actors'] = $this->db->order_by('actor_name')->get('actors')->result();
		$this->load->view('cchannels/form', $data);
		
	}	
	
    public function data()
	{
        $this->load->library('datagrid');
        header('Content-Type: application/json');
	echo json_encode($this->getJson($this->input->post()));
	}
        
    public function getJson($input)
    {
       $select = 'channels.*, category.*';
       $replace_field  = [['old_name' => 'name', 'new_name' => 'channels.channel_title']];
       $param = [
            'input'=> $input,
            'select'=> $select,
            'table'=> 'channels',
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
            $data = $data->join('category', 'category.category_id = channels.ctg_id', 'left')->order_by('order_id');
			if($this->session->userdata('cid') != 0)
            {
                $data = $data->where('channels.c_id',$this->session->userdata('cid'));
            }
              return $data;
            });

        return $data;
    }
public function testdata($input)
{
	$select = 'channel_list.*,presenter_list.name as pname';
	$replace_field  = [['old_name' => 'name', 'new_name' => 'channel_list.name']];
	$param = [
		 'input'=> $input,
		 'select'=> $select,
		 'table'=> 'channel_list',
		 'replace_field' => $replace_field
	 ];

	 $data = $this->datagrid->query($param, function($data) use ($input) {
		 $data = $data->join('presenter_list', 'presenter_list.Id = channel_list.presenter', 'left');
		 
		   return $data;
		 });

	 print_r($data);
}

    public function validate()
	{
		$rules = [
			[
				'field' => 'channel_title',
				'label' => 'Title',
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
		if (!$this->input->post('c_id')) {
			$this->create();
		} else {
			$this->update();
		}
	}


	public function create()
	{
		$data['channel_title'] 	= $this->input->post('channel_title');
        $data['channel_poster'] 	= $this->input->post('titleimage');
        $data['status'] 	= $this->input->post('status');
		$data['ctg_id'] 	= $this->input->post('ctg_id');
		$data['order_id'] 	= $this->input->post('order_id');
		$data['actor_id'] 	= $this->input->post('actor_id');
		$data['channel_info'] 	= $this->input->post('channel_info');
		$this->db->insert('channels', $data); 

		

		header('Content-Type: application/json');
    	        echo json_encode('success');
	}

	public function update()
	{
		$data['channel_title'] 	= $this->input->post('channel_title');
        $data['channel_poster'] 	= $this->input->post('titleimage');
        $data['status'] 	= $this->input->post('status');
		$data['ctg_id'] 	= $this->input->post('ctg_id');
		$data['order_id'] 	= $this->input->post('order_id');
		$data['actor_id'] 	= $this->input->post('actor_id');
		$data['channel_info'] 	= $this->input->post('channel_info');
		$this->db->where('c_id', $this->input->post('c_id'));
		$this->db->update('channels', $data); 


		header('Content-Type: application/json');
    	echo json_encode('success');
	}



	public function delete()
	{
		$this->db->where('c_id', $this->input->post('id'));
		$this->db->delete('channels');

	}

}
