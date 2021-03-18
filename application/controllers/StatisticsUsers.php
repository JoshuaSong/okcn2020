<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatisticsUsers extends Base_Controller {

public function userdata()
	{
		print_r($this->session->userdata());
		echo $this->session->userdata('active_user')->id;
		
	}
	
	public function index()
	{
		$this->data['title'] = 'members';
		$this->data['subview'] = 'statisticsusers/main';
		$this->load->view('components/main', $this->data);
	}

	public function view($start=null,$end=null)
	{
		date_default_timezone_set('America/Los_Angeles');
		if($start==null)
		{
			$start = date("Y-m-d",strtotime("-30 day")); 
		}
		if($end==null)
		{
			$end = date("Y-m-d");
		}
		$this->data['start'] = $start;
		$this->data['end'] = $end;
		$this->data['totalvisitor'] = $this->gettototalvisitor($start,$end);
		$this->data['countrys'] = $this->getcountry($start,$end);
		$this->data['types'] = $this->gettype($start,$end);
		$this->data['title'] = 'Statistics Users';
		$this->data['subview'] = 'statisticsusers/main';
		$this->load->view('components/main', $this->data);
	}
	
	public function gettototalvisitor($start,$end)
	{
		$this->db->select('ip');
		$this->db->distinct('ip');
		$this->db->where('login_time >=', $start);
		$this->db->where('login_time <=', $end);
		$query = $this->db->get('login_user_time');
		//echo  $query->num_rows();
		return $query->num_rows();
	}

	public function getcountry($start,$end)
	{
		
		$this->db->select('timezone, COUNT(timezone) as total');
	  
		$this->db->group_by('users_main.timezone');
		$this->db->order_by('total','desc');
	
		$this->db->where('login_time >=', $start);
		$this->db->where('login_time <=', $end);
		$this->db->join('users_main','users_main.id =  login_user_time.login_user_id');
		$query = $this->db->get('login_user_time');
		$array = array();
		$u = 0;
		$i =0;
		foreach($query->result() as $row)
		{
			array_push($array, $row);
			

		}
		return $array;
	   // print_r($array);
 
	  
	}
	public function gettype($start,$end)
	{
		
		$this->db->select('os_type, COUNT(os_type) as total');
	  
		$this->db->group_by('os_type');
	   
		$this->db->where('login_time >=', $start);
		$this->db->where('login_time <=', $end);
		$this->db->join('users_main','users_main.id =  login_user_time.login_user_id');
		$query = $this->db->get('login_user_time');
		return $query->result();
	//    print_r($query->result());
	  
	}

}
