<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

   /*
	Gets information about a particular user
	*/
	function user_login($timezone,$pid)
	{
		$uid=0;
		
		if($this->session->userdata('user_id'))
		{
			$uid=$this->session->userdata('user_id');
		}
		$name="";
		if($this->session->userdata('user_name'))
		{
			$name=$this->session->userdata('user_name');
		}
		$ip=$this->input->ip_address();
			if($ip!=$this->session->userdata('ip'))
			{
				$this->getip2session($ip);
			}
		$data = array(
			'user_id' => $uid,
			'user_name'=>$name,
			'ip'=> $this->session->userdata('ip'),
			'user_agent'=>$this->session->userdata('user_agent'),
			'country'=>$this->session->userdata('country'),
			'state'=>$this->session->userdata('state'),
			'region'=>$this->session->userdata('region'),
			'city'=>$this->session->userdata('city'),
			'timezone'=>$timezone,
			'last_login' => date('Y-m-d H:i:s'),
			'program_id'=>$pid);
			$this->db->insert('users_login', $data);
	}
	function usertouch($pid)
	{
				$uid="";
		$this->load->library('session');
		if($this->session->has_userdata('user_id'))
		{
			$uid=$this->session->userdata('user_id');
			$ip=$this->input->ip_address();
			if($ip!=$this->session->userdata('ip'))
			{
				$this->getip2session($ip);
			}
		}
		else {
			//$uid=$this->random_string(20);
			$url="http://members.eprayerapp.com/mauth/site_userinsert/okcnradio-web";
	        $uid=file_get_contents($url);
			$this->session->set_userdata('user_id', $uid);
			$ip=$this->input->ip_address();
			$this->getip2session($ip);
		}
		$uname="";
		if($this->session->has_userdata('user_name'))
		{
			$uname=$this->session->userdata('user_name');
		}
		$data = array(
			'user_id' => $uid,
			'user_name'=>$uname,
			'ip'=> $this->session->userdata('ip'),
			'user_agent'=>$this->session->userdata('user_agent'),
			'country'=>$this->session->userdata('country'),
			'state'=>$this->session->userdata('state'),
			'region'=>$this->session->userdata('region'),
			'city'=>$this->session->userdata('city'),
			'last_login' => date('Y-m-d H:i:s'),
			'program_id'=>$pid);
			$this->db->insert('users_login', $data);
	}

function appusertouch($pid,$timezone)
	{
		$uid="";
		$this->load->library('session');
		if($this->session->has_userdata('user_id'))
		{
			$uid=$this->session->userdata('user_id');
			$ip=$this->input->ip_address();
			if($ip!=$this->session->userdata('ip'))
			{
				$this->getip2session($ip);
			}
		}
		else {
			//$uid=$this->random_string(20);
			$url="http://members.eprayerapp.com/mauth/site_userinsert/okcnradio-androidApp";
	        $uid=file_get_contents($url);
			$this->session->set_userdata('user_id', $uid);
			$ip=$this->input->ip_address();
			$this->getip2session($ip);
		}
		$uname="";
		if($this->session->has_userdata('user_name'))
		{
			$uname=$this->session->userdata('user_name');
		}
		$data = array(
			'user_id' => $uid,
			'user_name'=>$uname,
			'ip'=> $this->session->userdata('ip'),
			'user_agent'=>$this->session->userdata('user_agent'),
			'country'=>$this->session->userdata('country'),
			'state'=>$this->session->userdata('state'),
			'region'=>$this->session->userdata('region'),
			'city'=>$this->session->userdata('city'),
			'timezone'=>$timezone,
			'last_login' => date('Y-m-d H:i:s'),
			'program_id'=>$pid);
			$this->db->insert('users_login', $data);
	}
	function iosAppTouch($pid,$timezone,$token)
	{
		$uid="";
		$this->load->library('session');
		if($this->session->has_userdata('user_id'))
		{
			$uid=$this->session->userdata('user_id');
			$ip=$this->input->ip_address();
			if($ip!=$this->session->userdata('ip'))
			{
				$this->getip2session($ip);
			}
		}
		else {
			//$uid=$this->random_string(20);
			$url="http://members.eprayerapp.com/mauth/site_userinsert/okcnradio-iosApp";
	        $uid=file_get_contents($url);
			$this->session->set_userdata('user_id', $uid);
			$ip=$this->input->ip_address();
			$this->getip2session($ip);
		}
		$uname="";
		if($this->session->has_userdata('realname'))
		{
			$uname=$this->session->userdata('realname');
		}
		$data = array(
			'user_id' => $uid,
			'user_name'=>$uname,
			'ip'=> $this->session->userdata('ip'),
			'user_agent'=>$this->session->userdata('user_agent'),
			'country'=>$this->session->userdata('country'),
			'state'=>$this->session->userdata('state'),
			'region'=>$this->session->userdata('region'),
			'city'=>$this->session->userdata('city'),
			'timezone'=>$timezone,
			'last_login' => date('Y-m-d H:i:s'),
			'program_id'=>$pid);
			$this->db->insert('users_login', $data);
		$data=array(
		'user_id' => $uid,
		'token'=>$token,
		'timezone'=>$timezone,
		'created' => date('Y-m-d H:i:s')
		);
		$this->db->insert('users_ios_token', $data);
	}
	function countlikeandtouch($pid)
	{
		$this->db->where('program_id', $pid);
		$this->db->from('program_touch');
		$count_touch=$this->db->count_all_results();
		$this->db->where('program_id', $pid);
		$this->db->from('program_like');
		$count_like=$this->db->count_all_results();
		return $count_touch+$count_like;
		
	}
	function getip2session($ip)
	{
		$query = 'https://geoip.maxmind.com/f?l=zO5Rp72CTq6v&i='.$ip;
		$file=file_get_contents($query);
		 if(!empty($file))
		          {
		            $pieces=explode(',',$file);
					$this->session->set_userdata('ip', $ip);
					$this->session->set_userdata('country', $pieces[0]); 
					$this->session->set_userdata('state', $pieces[1]); 
					$this->session->set_userdata('city', $pieces[2]); 
					$this->session->set_userdata('region', $pieces[3]); 
				  }
	}
	
	function random_string($length) 
	{
       $key = '';
       $keys = array_merge(range(0, 9), range('a', 'z'),range('A','Z'));

       for ($i = 0; $i < $length; $i++) 
        {
        $key .= $keys[array_rand($keys)];
        }
       return $key;
    }

}