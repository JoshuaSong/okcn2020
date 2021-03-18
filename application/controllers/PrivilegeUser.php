<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrivilegeUser extends Base_Controller {

	/**
     * Privilege Settings
     *
     * @access 	public
     * @param 	
     * @return 	view
     */
	
	public function index()
	{
		$this->load->model('menu_m');
		$this->load->model('group_m');
		
		$this->data['title'] = 'Privilege';
		$this->data['subview'] = 'privilegeUser/main';
		$this->data['menus'] = $this->menu_m->all();
		$this->data['groups'] = $this->db->order_by("Id")->get('mng_role')->result();

		$this->load->view('components/main', $this->data);
	}

	

	public function load()
	{
		$this->load->model('privilege_m');
		$privileges = $this->privilege_m->get_privilege($this->input->post('group_id'));
		header("Content-type:application/json");
		echo json_encode($privileges);
	}

	/**
     * Save Privilege Of Selected Group
     *
     * @access 	public
     * @param 	
     * @return 	json(array)
     */

	public function action()
	{
		$this->db->where('group_id', $this->input->post('group_id'));
		$this->db->delete('privileges_list');

		foreach ($this->input->post('arr_id') as $id) {
			$data['group_id'] = $this->input->post('group_id');
			$data['menu_id'] = $id;
			$this->db->insert('privileges_list', $data);
		}
	}

}
