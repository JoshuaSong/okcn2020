<?php

class Okcn_model extends CI_Model {

   public function __construct() {
        parent::__construct();
		 $this->db = $this->load->database('default', TRUE);
	}
	
	
	public function getChannelByCat($cid)
	{
	  $this->db->where('ctg_id',$cid);
	  $this->db->order_by('order_id');
	  $query = $this->db->get('channels');
	  return $query->result();
	
	}
	public function getChannelByCatArray($arraycid)
	{
	  $this->db->where_in('ctg_id',$arraycid);
	  $this->db->order_by('order_id');
	  $query = $this->db->get('channels');
	  return $query->result();
	
	}
	public function getChannelByChannelID($cid)
	{
	  $this->db->where('c_id',$cid);
	  $this->db->limit(1);
	
	  $query = $this->db->get('channels');
	  return $query->first_row();
	
	}
	public function getProgramsByChannelID($cid)
	{
	  date_default_timezone_set('America/Los_Angeles');
	  $now = new DateTime();
	  $this->db->where('channel_id',$cid);
	  $this->db->where('program_date <',date_format($now,"Y-m-d"));
	  $this->db->order_by('program_date','desc');
	  $query = $this->db->get('program_list');
	  return $query->result();
	
	}


	public function getslider($sid)
	
	{
		$this->db->where('sid',$sid);
		$this->db->order_by('order');
		$query =  $this->db->get('slider');
		if ($query->num_rows()>0)
		{
			return $query->result();
		}
	}



	public function getloginuserid()
	{
	
	  $ip = $this->input->ip_address();
	 
	  $q = $this->db->where('ip',$ip)->limit(1)->get('login_user');
	  if($q->num_rows() > 0)
	  {
		return $q->first_row()->id;
	  } 
	  else
	  
	  {
	  $city = "https://208753:R450ssQTMZHtc5cb@geoip.maxmind.com/geoip/v2.1/city/".$ip;
	  $file=file_get_contents($city);
	  $arr = json_decode($file, true);
	  if(isset($arr))
	  {
		$data['device_id'] = $this->input->post('did');
		$data['device_type'] = $this->input->post('type');
	  
	   $data['ip'] = $ip;
	  
	   if(isset($arr['country']))
	   {
		$data['country'] = $arr['country']['names']['en'];
	   }
	
	   if(isset($arr['city']))
	   {
		$data['city'] = $arr['city']['names']['en'];
	   }
	   
	
	   if(isset($arr['subdivisions']))
	   {
		$data['subdivisions'] = $arr['subdivisions'][0]['names']['en'];
	
	   }
		
	   if(isset($arr['traits']['autonomous_system_organization']))
	   {
		$data['network'] = $arr['traits']['autonomous_system_organization'];
	   }
	   
	   if(isset($arr['location']))
	   {
		$data['time_zone'] = $arr['location']['time_zone'];
	   }
	   
	   
	  
		$this->db->insert('login_user', $data);
		$this->usdb = $this->load->database('second', TRUE);
		$this->usdb->insert('login_user', $data);
	
		return $this->db->insert_id();
	  }
	  }
		
	}  
	
	
	



	

}
