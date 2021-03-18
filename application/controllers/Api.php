<?php

/**
 * Appteve mobile
 */
class Api extends CI_Controller
{

	function __construct($module_name =null)
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);
	}
	public function userdata()
	{
		print_r($this->session->userdata);
	}
	public function pt()
	{
		
		$data = array(
		'pt_user_id'=>0,
		'program_id'=>$this->input->post('pid'),
		'device_id'=>$this->input->post('did'),
		'touch_time' => date('Y-m-d H:i:s'));
                
                
	//	$this->db->insert('program_touch', $data);
		
		
	}
	public function pt_android()
	{
		$uid = $this->input->post('user_id');
		$pid = $this->input->post('pid');
		if($this->checkTouched($uid,$pid))
		{
			$data = array(
				'pt_user_id'=>$uid,
				'program_id'=>$pid,
				'device_id'=>$this->input->post('did'),
				'touch_time' => date('Y-m-d H:i:s'));
						
						
				$this->db->insert('program_touch', $data);
		}
		

	}
	public function checkTouched($uid,$pid)
	{
      $this->db->where('pt_user_id',$uid);
	  $this->db->where('program_id',$pid);
	  $this->db->limit(1);
	  $query= $this->db->get('program_touch');
	  if($query->num_rows()>0)
	  {
		  return false;
	  }else{
		  return true;
	  }
	}
	public function bt_android($vid,$bid,$cid,$uid)
	{
		
		
		$data['vid'] = $vid;
		$data['bid'] = $bid;
		$data['cid'] = $cid;
		$data['user_id'] = $uid;
		$this->db->insert('bible_touch', $data);
	}
        
        public function androidLogin()
	{
    //6999a4c90ddb261e3075198be1afb79f 
	//https://ipstack.com/     vou.@gmail.com
	


       $token = $this->input->post('rid');
       $did = $this->input->post('did');
       if(isset($did) && isset($token)){
       $token = isset($token) ? $token : '';
       $ip = $this->input->ip_address();
       $this->db->where('device_id',$did);
       $this->db->limit(1);
  
     $query = $this->db->get('users_main');
     if($query->num_rows() > 0)
     {
          $uid = $query->first_row()->id;
          if($query->first_row()->token != $token)
          {
              $this->db->set('token', $token);
              $this->db->where('id', $uid);
              $this->db->update('users_main');               
          }
     } else {
     
      // $url = 'http://api.ipstack.com/'.$ip.'?access_key=6999a4c90ddb261e3075198be1afb79f';
     //  $json = file_get_contents($url);
    //   $dec = (Array)json_decode($json);
		$data = array(
		'os_type'=>'Android',
		'token'=>$token,
		'device_id'=>$did,
        'timezone'=>$this->input->post('tid'),
        'user_ip'=> $ip);
            //    'country'=> $dec['country_name'],
            //    'region_name'=> $dec['region_name'],
            //    'city'=> $dec['city'],
            //    'zip_code'=> $dec['zip']);
	$this->db->insert('users_main', $data);
        $uid = $this->db->insert_id();
		
	 } 
        
         
	
         $data1=array(
        'ip' =>$ip,
        'timezone'=>$this->input->post('tid'),
        'user_id'=> $uid);
        $this->db->insert('users_main_login', $data1); 
       
	}
	}
        
        
        
        
        public function iosLogin()
        {
        $ip = $this->input->ip_address();
        $token = $this->input->post('token');
        $did = $this->input->post('did');
       if(isset($did)){ 
          $token = isset($token) ? $token : '';
       $this->db->where('device_id',$did);
       $this->db->limit(1);
       $query = $this->db->get('users_main');
         if($query->num_rows() > 0)
         {
          $uid = $query->first_row()->id;
          if($query->first_row()->token != $token)
          {
              $this->db->set('token', $token);
              $this->db->where('id', $uid);
              $this->db->update('users_main');               
          }
          
         } 
         
         
         else {
			$city = "https://208753:R450ssQTMZHtc5cb@geoip.maxmind.com/geoip/v2.1/city/".$ip;
			$file=file_get_contents($city);
			$arr = json_decode($file, true);
			if(isset($arr))
			{
			 $data['os_type'] = 'iOS';
			 $data['device_id'] = $did;
			 $data['user_ip'] = $ip;
			 $data['city'] = $arr['city']['names']['en'];
			 $data['country'] = $arr['country']['names']['en']; 
			 $data['country_code'] = $arr['country']['iso_code']; 
			 $data['zip_code'] = $arr['postal']['code']; 
			 $data['region_name'] = $arr['subdivisions'][0]['names']['en'];
			 $data['network'] = $arr['traits']['autonomous_system_organization'];
			 $data['timezone'] = $this->input->post('tz');
			 $this->db->insert('users_main', $data);
			
			 $uid = $this->db->insert_id();
			}   
      //   $url = 'http://api.ipstack.com/'.$ip.'?access_key=6999a4c90ddb261e3075198be1afb79f';
     //    $json = file_get_contents($url);
     //    $dec = (Array)json_decode($json);
	////	$data = array(
	//	'os_type'=>'iOS',
	//	'token'=>$token,
	//	'device_id'=>$did,
    //    'timezone'=>$this->input->post('tz'),
     //   'user_ip'=> $ip);
           //     'country'=> $dec['country_name'],
           //     'region_name'=> $dec['region_name'],
          //      'city'=> $dec['city'],
          //      'zip_code'=> $dec['zip']);
	//$this->db->insert('users_main', $data);
     //   $uid = $this->db->insert_id();
     }
        $data1=array(
        'ip' =>$ip,
        'timezone'=>$this->input->post('tz'),
        'user_id'=> $uid);
        $this->db->insert('users_main_login', $data1); 
        }
        }
        
        public function pt_ios()
	{
		
		$data = array(
		'pt_user_id'=>1,
		'program_id'=>$this->input->post('pid'),
		'device_id'=>$this->input->post('did'),
		'touch_time' => date('Y-m-d H:i:s'));
		$this->db->insert('program_touch', $data);
		
		
	}
	
	function categorys()
	{
		
		
		$this->db->order_by('order');	
		$query = $this->db->get('category');
	
	    $json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
	function category()
	{
		
		$this->db->select('c_id as cid, channel_title as category_name, channel_poster as category_image');

		$this->db->order_by('order_id');
		$query = $this->db->get('channels');
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
	function banner()
	{
		$this->db->order_by('order');	
		$query = $this->db->get('banners');
	
	    $json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
		
	}
        function banner_ios()
	{
		$this->db->order_by('order');	
		$query = $this->db->get('banners');
	
	    $json=str_replace('\\/', '/', json_encode($query->result()));
		echo $json;
		
		
	}
	function categorybycid($cid)
	{
		
		$this->db->select('c_id as cid, channel_title as category_name, channel_poster as category_image, image');
		if($cid ==2)
		{
			$this->db->where_in('ctg_id',[2,3]);	
		} else if($cid ==1)
		{
			$this->db->where_in('ctg_id',[1,6]);	
		} else if($cid ==8)
		{
			$this->db->where_in('ctg_id',[8,7]);	
		} else if($cid !=100)
		{
			$this->db->where('ctg_id',$cid);		
		}
		
		$this->db->from('channels');
		$this->db->where('ctg_id >',0);
        $this->db->join('category', 'category.category_id = channels.ctg_id');
		$this->db->order_by('order_id');
		$query = $this->db->get();
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
        
        
        
	function videos()
	{
		
		$this->db->select('video_id as cid, video_name as category_name, image as category_image, youtube_link');
		
		$this->db->from('videos');
		$this->db->order_by('order');
		$query = $this->db->get();
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
        function video_ios()
	{
		
		$this->db->select('video_id as cid, video_name as category_name, image as category_image, youtube_link');
		
		$this->db->from('videos');
		$this->db->order_by('order');
                $this->db->limit(1);
		$query = $this->db->get();
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo $json;
		
	}
        
        
	function categorygroup1()
	{
		$group1=array(1,7,8);
		
		$this->db->select('ctg_id as ctg,c_id as cid, channel_title as category_name, channel_poster as category_image');
		
			$this->db->where_in('ctg_id',$group1);		
		
//$this->db->order_by('ctg_id');
		$this->db->order_by('order_id');
		$query = $this->db->get('channels');
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
	function categorygroup2()
	{
		$group1=array(2,3,4,5);
		
		$this->db->select('ctg_id as ctg,c_id as cid, channel_title as category_name, channel_poster as category_image');
		
			$this->db->where_in('ctg_id',$group1);		
		
//$this->db->order_by('ctg_id');
		$this->db->order_by('order_id');
		$query = $this->db->get('channels');
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
	function channels($id)
	{
		
		$this->db->select('c_id as cid, channel_title as category_name, channel_poster as category_image');
		
		$this->db->where('ctg_id',$id);	
		$this->db->order_by('order_id');
		$query = $this->db->get('channels');
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
	function todaychannels()
	{
		$tz="America/Los_Angeles";
	        date_default_timezone_set($tz);
			$datetime = new DateTime();
			$week=date("w");
			$this->db->select('c_id as cid, channel_title as category_name, channel_poster as category_image');
			$this->db->from('timetable');
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time');	
		$this->db->join('channels', 'channels.c_id = timetable.cid');
		
		
		$this->db->order_by('order_id');
		$query = $this->db->get();
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
		
	}
	
	function latest()
	{
		//$date = date('y-m-d h:i:s', time());
		
		$this->db->select('radio.cat_id as cid, category.name as category_name, category.file as category_image,
		radio.id as id, radio.name as radio_name, category.file as radio_image, radio.radio_url as radio_url');
	    $this->db->from('radio');
		//$this->db->where('date <',$date);
		$this->db->limit(1);
		//$this->db->order_by('date','desc');
		$this->db->join('category', 'category.id = radio.cat_id');
		$this->db->where('radio.cat_id',93);
		$query = $this->db->get();
		
		$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
	}
	function catlist($cid)
	{
		$tz="Asia/Jerusalem";
	        date_default_timezone_set($tz);
		$date = date('y-m-d h:i:s', time());
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_date','desc');
		$this->db->where('program_date <',$date);
		$this->db->limit(50);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$this->db->where('channels.c_id',$cid);
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$i=0;
			$n=$query->num_rows();
			foreach ($query->result() as $row) {
				$j=$n - $i;
				$row->radio_name='('.$j.'회)'.$row->radio_name.'('.$row->actor_name.')';
				$data[]=$row;
				$i++;
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
	function catlist20($cid,$date)
	{
		if($cid == 10000)
		{
			$this->bydatelist50($date);
		}else if($cid == 58)
		{
			$this->songshuffle();

		}else
		{
		 $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
	    if((int)$dateTime->format('G') < 5)
		{
			 $dateTime = date_modify($dateTime,'-1 day');
		}
		$dateTime = $dateTime->format('Y-m-d H:i:s');
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image, program_list.program_actor_id,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_date','desc');
		$this->db->where('program_date <',$dateTime);
		//$this->db->limit(200);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$this->db->where('channels.c_id',$cid);
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$i=0;
			$n=$query->num_rows();
			foreach ($query->result() as $row) {
				$j=$n - $i;
				if($row->program_actor_id != 54){
					$row->radio_name='('.$j.'회)'.$row->radio_name.'('.$row->actor_name.')';
			//	$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
				}
				$data[]=$row;
				$i++;
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
	}

	function songshuffle()
	{
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image, program_list.program_actor_id,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_list.id','random');
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$this->db->where_in('channels.c_id',[43,56,45]);
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$i=0;
			$n=$query->num_rows();
			foreach ($query->result() as $row) {
				$j=$n - $i;
				if($row->program_actor_id != 54){
				$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
				}
				$data[]=$row;
				$i++;
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}

	function bydatelist50($date)
	{
		 $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
	    if((int)$dateTime->format('G') < 5)
		{
			 $dateTime = date_modify($dateTime,'-1 day');
		}
		$array=array();
	
		for( $i=0;$i<30; $i++)
		{
			$dateTime = date_modify($dateTime,'- 1 day');
		
			$w = $dateTime->format("W");
		
		//	$obj = (object) array('program_date' => $dateTime->format('Y-m-d'));
			$data[]=$this->bydatelistoneday($dateTime->format('Y-m-d'));
		}

		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';


	}
	function bydatelistoneday($date)
	{
		
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_date','desc');
		$this->db->where('program_date',$date);
		$this->db->limit(1);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$row = $query->first_row();
			$datetime = new DateTime($row->program_date);
			$week = $this->getweekko($datetime->format("w"));
			$row->program_date =  $row->program_date.'('.$week.')';
			//print_r( $row);
			return $row;
		//	$i=0;
		//	$n=$query->num_rows();
		//	foreach ($query->result() as $row) {
		//		$j=$n - $i;
		//		$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
		//		$data[]=$row;
		//		$i++;
		//	}
			
		}
	//	return $data;
		//$json=str_replace('\\/', '/', json_encode($data));
	//	echo '{"Json":'.$json.'}';
	}
	function getweekko($week)
	{
		switch($week){
			case 0:
				return '일';
			break;
			case 1:
				return '월';
			break;
			case 2:
				return '화';
			break;
			case 3:
				return '수';
			break;
			case 4:
			return '목';
			case 5:
				return '금';
			break;
			case 6:
				return '토';
			break;
		break;

		}
	}
	


function catlistbydate($cid,$data,$today)
	{
		if($cid == 58)
		{
			$this->songshuffle();
		} else{
		 $dateToday = datetime::createfromformat('Y-m-d_H:i:s',$today);
	    if((int)$dateToday->format('G') < 5)
		{
			 $dateToday = date_modify($dateToday,'-1 day');
		}
		$dateToday = $dateToday->format('Y-m-d H:i:s');
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_date');
		$this->db->where('program_date <',$dateToday);
		$this->db->where('program_date >=',$data);
	
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		if($cid != 10000)
		{
			$this->db->where('channels.c_id',$cid);
		}
	
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$i=0;
			$n=$query->num_rows();
			foreach ($query->result() as $row) {
				$j=$n - $i;
				$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
				$data[]=$row;
				$i++;
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
	}



	function programlistbydate($data,$today)
	{
		 $dateToday = datetime::createfromformat('Y-m-d_H:i:s',$today);
	    if((int)$dateToday->format('G') < 5)
		{
			 $dateToday = date_modify($dateToday,'-1 day');
		}
		$dateToday = $dateToday->format('Y-m-d H:i:s');
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_date');
		$this->db->where('program_date <',$dateToday);
		$this->db->where('program_date >=',$data);
	
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
	
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$i=0;
			$n=$query->num_rows();
			foreach ($query->result() as $row) {
				$j=$n - $i;
				$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
				$data[]=$row;
				$i++;
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}



function catlistreverse($cid)
	{
		$tz="Asia/Jerusalem";
	        date_default_timezone_set($tz);
		$date = date('y-m-d h:i:s', time());
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_date');
		$this->db->where('program_date <',$date);
	//	$this->db->limit(1);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$this->db->where('channels.c_id',$cid);
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$i=1;
			foreach ($query->result() as $row) {
				$row->radio_name='('.$i.'회)'.$row->radio_name.'('.$row->actor_name.')';
				$data[]=$row;
				$i++;
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
function list24praise()
	{
		
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date');
	    $this->db->from('program_list');
		$this->db->order_by('program_date','desc');
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('category', 'category.category_id = channels.ctg_id');
		//$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$this->db->where('category.category_id',6);
		$query = $this->db->get();
		
		$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
	}

function getcomments()
{
	$this->db->select('user_name as category_name, contents as radio_name,  create_time as program_date');
	$this->db->order_by('create_time','desc');
	$this->db->limit(50);
	$query = $this->db->get('comments');
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo '{"Json":'.$json.'}';
	
}
function postcomments()
{
$tz="Asia/Jerusalem";
date_default_timezone_set($tz);
$data = array('user_id'=>1,
'user_name'=>$this->input->post('user_name'),
'contents' => $this->input->post('comment'),
'create_time'=>date("Y-m-d H:i:s"));
$this->db->insert('comments', $data);

}


function oneprogramSelected($cid,$pid)
	{
		
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,program_list.program_actor_id,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
		$this->db->from('program_list');
		$this->db->where('channel_id',$cid);
		$this->db->where('p_id >=',$pid);
		$this->db->order_by('p_id');
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
			
				if($row->program_actor_id != 54)
				{
					$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
				}
				
				$data[]=$row;
			}	
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}

	public function oneprogramSelected_ios($cid,$pid)
	{
	   
	 
	$this->db->select('program_list.p_id as id, channels.channel_poster as file,channels.c_id as cid,
	program_list.program_title as track_name, program_list.program_url as track_file,program_list.program_date as program_date,actor_name');
		$this->db->from('program_list');
	
		$this->db->where('channel_id',$cid);
		$this->db->where('p_id >=',$pid);
		$this->db->order_by('p_id');

	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
	
	$query = $this->db->get();
	$data=array();
	if ($query->num_rows()>0)
	{
		
		foreach ($query->result() as $row) {
			$row->track_name='('.$row->program_date.')'.$row->track_name.'('.$row->actor_name.')';
			$data[]=$row;
			
		}
		
	}
	$json=str_replace('\\/', '/', json_encode($data));
	echo $json;
		
		
	}
	function oneprogramdate($date)
	{
		if($this->session->userdata('user_time_zone'))
		{
		  date_default_timezone_set($this->session->userdata('user_time_zone'));
		}
		$now = new DateTime();
	
		$this->db->where('program_date <',date_format($now,"Y-m-d"));
		$this->db->where('program_date >=',$date);
		
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,program_list.program_actor_id,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
		$this->db->from('program_list');
		$this->db->order_by('program_date');
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
			
				if($row->program_actor_id != 54)
				{
					$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
				}
				
				$data[]=$row;
			}	
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
	function oneprogramdatetest($date)
	{
		if($this->session->userdata('user_time_zone'))
		{
		  date_default_timezone_set($this->session->userdata('user_time_zone'));
		}
		$now = new DateTime();
	
		$this->db->where('program_date <',date_format($now,"Y-m-d"));
		$this->db->where('program_date >=',$date);
		
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,program_list.program_actor_id,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
		$this->db->from('program_list');
		$this->db->order_by('program_date');
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
			
				if($row->program_actor_id != 54)
				{
					$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
				}
				
				$data[]=$row;
			}	
		}
		print_r($data);
	//	$json=str_replace('\\/', '/', json_encode($data));
	//	echo '{"Json":'.$json.'}';
	}
	function oneprogramdateios($date)
	{
		if($this->session->userdata('user_time_zone'))
		{
		  date_default_timezone_set($this->session->userdata('user_time_zone'));
		}
		$now = new DateTime();
	
		$this->db->where('program_date <',date_format($now,"Y-m-d"));
		$this->db->where('program_date >=',$date);
		$this->db->select('program_list.p_id as id, channels.channel_poster as file,channels.c_id as cid,
	program_list.program_title as track_name, program_list.program_url as track_file,program_list.program_date as program_date,actor_name');
		$this->db->from('program_list');
		$this->db->order_by('program_date');
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
				
		foreach ($query->result() as $row) {
			$row->track_name='('.$row->program_date.')'.$row->track_name.'('.$row->actor_name.')';
			$data[]=$row;
			
		}
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo $json;
	}




	function getBibleAudio($vid,$bid,$cid)
	{
		$urlhead= "https://cdsaws.s3-us-west-2.amazonaws.com/vou/bible/";
	$v = $this->db->limit(1)->where('id',$vid)->get('bible_version');
	$version = $v->first_row();
	$b = $this->db->limit(1)->where('book_id',$bid)->where('lang',$version->book_lang)->get('bible_book');
	$book = $b->first_row();
	$data=array();

	for ($x = intval($cid); $x <= intval($book->count); $x++) {
		$row=array();
		$row["cid"] = $bid;
		$row["id"] = $x;
		$row["category_name"] = $version->name;
		$row["radio_image"] = $book->image;
		$row["program_date"] = date("Y-m-d");
		$row["radio_name"] = $book->name.' '.$x;
		$row["radio_url"] = $urlhead.$version->lang.'/'.$version->audio.'/'.$bid.'-'.$x.'.mp3';
		$data[]=$row;
		
	  }

	  $json=str_replace('\\/', '/', json_encode($data));
	  echo '{"Json":'.$json.'}';
	}
	function getBibleAudioios($vid,$bid,$cid)
	{
		$urlhead= "https://cdsaws.s3-us-west-2.amazonaws.com/vou/bible/";
	$v = $this->db->limit(1)->where('id',$vid)->get('bible_version');
	$version = $v->first_row();
	$b = $this->db->limit(1)->where('book_id',$bid)->where('lang',$version->book_lang)->get('bible_book');
	$book = $b->first_row();
	$data=array();

	for ($x = intval($cid); $x <= intval($book->count); $x++) {
		$row=array();
		$row["cid"] = $bid;
		$row["id"] = (string)$x;
	//	$row["category_name"] = $version->name;
		$row["file"] = $book->image;
		$row["program_date"] = date("Y-m-d");
		$row["track_name"] = $book->name.' '.$x;
		$row["track_file"] = $urlhead.$version->lang.'/'.$version->audio.'/'.$bid.'-'.$x.'.mp3';
		$data[]=$row;
		
	  }

	  $json=str_replace('\\/', '/', json_encode($data));
	  echo $json;
	}

function oneprogram($pid)
	{
		
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,program_list.program_actor_id,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		
		$this->db->where('p_id',$pid);
		$this->db->limit(1);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			$row=$query->first_row();
			if($row->program_actor_id != 54)
			{
				$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
			}
			
			$data[]=$row;
			
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
	public function todayFirstID()
	{
		$tz="Asia/Jerusalem";
	        date_default_timezone_set($tz);
			$datetime = new DateTime();
			$week=date("w");
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time');	
           $query=$this->db->get('timetable');
		   if ($query->num_rows()>0)	   
	       {
	       	$data=$this->get_today_program($query->first_row()->cid);
	       	if($data!='none')
			{
				//$json=str_replace('\\/', '/', json_encode($data));
		        //echo '{"Json":'.$json.'}';
				echo $data->id;
			}else{
				echo "1";
			}
	      
	       	
	       	}   
	
	}
	public function today()
	{
		
			$tz="Asia/Jerusalem";
	        date_default_timezone_set($tz);
			$datetime = new DateTime();
			$week=date("w");
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time');	
           $query=$this->db->get('timetable');
	if ($query->num_rows()>0)
	{
		$data=array();
		foreach ($query->result() as $row) {
			//$row->program=$this->get_today_program($row->cid);
			if($this->get_today_program($row->cid)!='none')
			{
				$data[]=$this->get_today_program($row->cid);
			}
			
		}
		//print_r($data);
	}
	$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
        
        
        function channels_ios($id)
	{
		$this->db->select('c_id as id, channel_title as name, channel_poster as url_covercat');
		$this->db->where('ctg_id',$id);	
		$this->db->order_by('order_id');
		$query = $this->db->get('channels');
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo $json;
		
	}
        function allchannels_ios()
	{
		$this->db->select('c_id as id, channel_title as name, channel_poster as url_covercat');
		$this->db->order_by('order_id');
		$query = $this->db->get('channels');
	
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo $json;
		
	}
        
        public function today_ios($date)
	{
		
               $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
	 if((int)$dateTime->format('G') < 5)
		{
			 $dateTime = date_modify($dateTime,'-1 day');
		}
		//	$tz="Asia/Jerusalem";
	       // date_default_timezone_set($tz);
			
                         $week = $dateTime->format("w");
			
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time');	
           $query=$this->db->get('timetable');
	if ($query->num_rows()>0)
	{
           
		$data=array();
		foreach ($query->result() as $row) {
       
			if($this->get_today_program_ios($row->cid,$dateTime) != 'none')
			{
				$data[]=$this->get_today_program_ios($row->cid,$dateTime);
			}
			
		}
		
	}
	$json=str_replace('\\/', '/', json_encode($data));
		echo $json;
	}
        
        public function live_ios()
        {
            $dateTime = date("Y-m-d");
           
            $week = date('w');
       //     echo $week;
            $this->db->where('week_day',$week);
	    $this->db->order_by('start_time');	
           $query=$this->db->get('timetable');
	if ($query->num_rows()>0)
	{
           
		$data=array();
		foreach ($query->result() as $row) {
       
			if($this->get_today_program_ios($row->cid,$dateTime) != 'none')
			{
				$data[]=$this->get_today_program_ios($row->cid,$dateTime);
			}
			
		}
		
	}
	$json=str_replace('\\/', '/', json_encode($data));
		echo $json;
        }
        
        
        
        
        
        public function ios_cat_podcast($cid,$date)
        {
            if($cid==12)
            {
                $this->today_ios($date);
            }else
            {
          //  $tz="Asia/Jerusalem";
	       // date_default_timezone_set($tz);
		//$date = date('y-m-d h:i:s', time());
                
                $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
                
		$this->db->select('program_list.p_id as id, channels.channel_poster as file,channels.c_id as cid,
		program_list.program_title as track_name, program_list.program_url as track_file,program_list.program_date as program_date,actor_name');
	        $this->db->from('program_list');
		$this->db->order_by('program_date','desc');
		$this->db->where('program_date <=',$dateTime->format('Y-m-d'));
		$this->db->limit(20);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$this->db->where('channels.c_id',$cid);
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			
			foreach ($query->result() as $row) {
				$row->track_name='('.$row->program_date.')'.$row->track_name.'('.$row->actor_name.')';
				$data[]=$row;
				
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo $json;
            }
            
        }
 public function ios_cat_oneprogram($pid)
        {
           
         
		$this->db->select('program_list.p_id as id, channels.channel_poster as file,channels.c_id as cid,
		program_list.program_title as track_name, program_list.program_url as track_file,program_list.program_date as program_date,actor_name');
	        $this->db->from('program_list');
		
		
		$this->db->limit(1);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		$this->db->where('program_list.p_id',$pid);
		$query = $this->db->get();
		$data=array();
		if ($query->num_rows()>0)
		{
			
			foreach ($query->result() as $row) {
				$row->track_name='('.$row->program_date.')'.$row->track_name.'('.$row->actor_name.')';
				$data[]=$row;
				
			}
			
		}
		$json=str_replace('\\/', '/', json_encode($data));
		echo $json;
            
            
        }
        
        public function get_praise_ios()
        {
            $this->db->where('category_id',6);
            $query = $this->db->get('category');
            $data=$query->result();
            $json=str_replace('\\/', '/', json_encode($data));
		echo $json;
        }
        
        function getcomments_ios()
{
	//$this->db->select('user_name as category_name, contents as radio_name,  create_time as program_date');
	$this->db->order_by('create_time','desc');
	$this->db->limit(50);
	$query = $this->db->get('comments');
	$json=str_replace('\\/', '/', json_encode($query->result()));
		echo $json;
	
}
        
        function postcomments_ios()
{
$tz="Asia/Jerusalem";
date_default_timezone_set($tz);
$data = array('user_id'=>1,
'user_name'=>$this->input->post('user_name'),
'contents' => $this->input->post('comment'),
'create_time'=>date("Y-m-d H:i:s"));
$this->db->insert('comments', $data);

}
        
        
    public function todayByDate($date)
	{
	
     $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
	 if((int)$dateTime->format('G') < 5)
		{
			 $dateTime = date_modify($dateTime,'-1 day');
		}
	 $week = $dateTime->format("w");
	 $this->db->where('week_day',$week);
	 $this->db->order_by('start_time');	
     $query=$this->db->get('timetable');
	if ($query->num_rows()>0)
	{
		$data=array();
		foreach ($query->result() as $row) {
			//$row->program=$this->get_today_program($row->cid);
			if($this->get_theday_program($row->cid,$dateTime)!='none')
			{
				$data[]=$this->get_theday_program($row->cid,$dateTime);
			}
			
		}
		//print_r($data);
	}
	$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
	
	
	
	
	public function oneday($date)
	{
		 $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
		
		if((int)$dateTime->format('G') < 5)
		{
			 $dateTime = date_modify($dateTime,'-1 day');
		}
		
		
		 echo $dateTime->format('Y-m-d_H:i:s');
	}



public function todayreverse()
	{
		
			$tz="Asia/Jerusalem";
	        date_default_timezone_set($tz);
			$datetime = new DateTime();
			$week=date("w");
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time','desc');	
           $query=$this->db->get('timetable');
	if ($query->num_rows()>0)
	{
		$data=array();
		foreach ($query->result() as $row) {
			//$row->program=$this->get_today_program($row->cid);
			if($this->get_today_program($row->cid)!='none')
			{
				$data[]=$this->get_today_program($row->cid);
			}
			
		}
		//print_r($data);
	}
	$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}
	
	public function todayreverseByDate($date)
	{
		
			 $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
	    if((int)$dateTime->format('G') < 5)
		{
			 $dateTime = date_modify($dateTime,'-1 day');
		}
	       $week = $dateTime->format("w");
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time','desc');	
           $query=$this->db->get('timetable');
	if ($query->num_rows()>0)
	{
		$data=array();
		foreach ($query->result() as $row) {
			//$row->program=$this->get_today_program($row->cid);
			if($this->get_theday_program($row->cid,$dateTime)!='none')
			{
				$data[]=$this->get_theday_program($row->cid,$dateTime);
			}
			
			
		}
		//print_r($data);
	}
	$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
	}

public function thedaybefore($day)
{
		
		
		// echo date('Y-m-d',$date);
		// echo date('w',$date);
		$tz="Asia/Jerusalem";
	    date_default_timezone_set($tz);
		$date =strtotime(date('Y-m-d'));
		$date = strtotime("-".$day." day", $date);
		//echo $date;
		//echo date('Y-m-d',$date);
			$week=date('w',$date);
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time');	
           $query=$this->db->get('timetable');
	if ($query->num_rows()>0)
	{
		$data=array();
		foreach ($query->result() as $row) {
				$data[]=$this->get_thedaybefore_program($row->cid,date('Y-m-d',$date));
		}
	
	}
	$json=str_replace('\\/', '/', json_encode($data));
		echo '{"Json":'.$json.'}';
}
public function get_thedaybefore_program($cid,$date)
{
	
	$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	
	$this->db->from('program_list');
   	$this->db->where('program_date',$date);
	$this->db->where('channel_id',$cid);
	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
	$this->db->limit(1);
	$query=$this->db->get();
	if ($query->num_rows()>0)
	{
		$data=array();
		$row=$query->first_row();
		$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
		return $row;
	//print_r($row);
	}
	
	
}
 function get_today_program_ios($value,$datetime)
   {
   	//date_default_timezone_set("Asia/Jerusalem");
	$this->db->select('program_list.p_id as id, channels.channel_poster as file,channels.c_id as cid,
		program_list.program_title as track_name, program_list.program_url as track_file,program_list.program_date as program_date,actor_name');
	
	$this->db->from('program_list');
   	$this->db->where('program_date',$datetime->format('Y-m-d'));
	$this->db->where('channel_id',$value);
	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
	$this->db->limit(1);
	$query=$this->db->get();
	if ($query->num_rows()>0)
	{
		$data=array();
		$row=$query->first_row();
		$row->track_name=$row->track_name.'('.$row->actor_name.')';
		//$c=$this->count($query->first_row()->p_id);
		return $row;
	//	"《".$query->first_row()->channel_title.$query->first_row()->program_date."》".$query->first_row()->program_title."(".$c.")<br/><audio controls><source src='" .  $query->first_row()->program_url . "' type='audio/mp3'></audio>";
	}else{
		return 'none';
	}
	
   }


	 function get_today_program($value)
   {
   	date_default_timezone_set("Asia/Jerusalem");
	$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	
	$this->db->from('program_list');
   	$this->db->where('program_date',date('Y-m-d'));
	$this->db->where('channel_id',$value);
	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
	$this->db->limit(1);
	$query=$this->db->get();
	if ($query->num_rows()>0)
	{
		$data=array();
		$row=$query->first_row();
		$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
		//$c=$this->count($query->first_row()->p_id);
		return $row;
	//	"《".$query->first_row()->channel_title.$query->first_row()->program_date."》".$query->first_row()->program_title."(".$c.")<br/><audio controls><source src='" .  $query->first_row()->program_url . "' type='audio/mp3'></audio>";
	}else{
		return 'none';
	}
	
   }
function get_theday_program($cid,$date)
   {
   	date_default_timezone_set("Asia/Jerusalem");
	$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	
	$this->db->from('program_list');
   	$this->db->where('program_date',$date->format('Y-m-d'));
	$this->db->where('channel_id',$cid);
	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
	$this->db->limit(1);
	$query=$this->db->get();
	if ($query->num_rows()>0)
	{
		$data=array();
		$row=$query->first_row();
		$row->radio_name=$row->radio_name.'('.$row->actor_name.')';
		//$c=$this->count($query->first_row()->p_id);
		return $row;
	//	"《".$query->first_row()->channel_title.$query->first_row()->program_date."》".$query->first_row()->program_title."(".$c.")<br/><audio controls><source src='" .  $query->first_row()->program_url . "' type='audio/mp3'></audio>";
	}else{
		return 'none';
	}
	
   }
	
}
?>