<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends Base_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('datagrid');
		$this->load->library('session');
		//$this->pid = 0;
	}
	
	public function index()
	{
		$this->session->set_userdata('pid',0);
		$this->data['title'] = 'Menus';
		$this->data['subview'] = 'menus/main';
		$this->load->view('components/main', $this->data);
		
	}

	public function sub($pid)
	{
		$this->session->set_userdata('pid', $pid);
		
		$this->data['title'] = 'Menus';
		$this->data['subMenuTitle'] = $this->getTitlebyID($pid);
		$this->data['subview'] = 'menus/main';		
		$this->load->view('components/main', $this->data);
	}
	
	public function getTitlebyID($id)
	{
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get('menus');
		if ($query->num_rows()>0)
		{
		 return $query->first_row()->title;
		}
	}

	public function form()
	{
		$data['index'] = $this->input->post('index');
		$this->load->view('menus/form', $data);
		
	}




	public function data()
	{
		
        header('Content-Type: application/json');
		echo json_encode($this->getJson($this->input->post()));
	}
    public function getJson($input)
    {
        $replace_field  = [
      
			];
        $param = [
            'input'=> $input,
            'select'=> '*',
            'table'=> 'menus',
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
        	//if($this->pid==0)
		//	{
		//		 return $data->order_by('parent_id')->order_by('id');
		//	}else{
				 return $data->where('parent_id',$this->session->userdata('pid'))->order_by('order');
		//	}
           
        });

        return $data;
    }

    public function validate()
	{
		$rules = [ [
				'field' => 'title',
				'label' => 'Title',
				'rules' => 'required'
			]];

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

	/**
     * Create a New Product
     *
     * @access 	public
     * @param 	
     * @return 	json(string)
     */

	public function create()
	{
		$data['title'] 	= $this->input->post('title');
		$data['icon']   = $this->input->post('icon');
		$data['link']   = $this->input->post('link');
		$data['order']   = $this->input->post('order');
		$data['parent_id'] 	= $this->session->userdata('pid');
		$data['is_have_child'] 	= 0;
		$this->db->insert('menus', $data); 
		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	public function update()
	{
		$data['title'] 	= $this->input->post('title');
		$data['icon']   = $this->input->post('icon');
		$data['link']   = $this->input->post('link');
		$data['order']   = $this->input->post('order');
		$data['parent_id'] 	= $this->session->userdata('pid');
		$data['is_have_child'] 	=  $this->input->post('is_have_child');
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('menus', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}



	public function delete()
	{
		$this->db->where('menu_id',$this->input->post('id'));
		$this->db->delete('privileges_list');
		$this->db->where('id', $this->input->post('id'));
		$this->db->delete('menus');
		
               
	}

}
