<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Okcnadmin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
		
		
	}
	function timezon()
	{
		echo date_default_timezone_get();
		print_r(localtime());
	}
public function login()
{
	
		$this->load->view('/okcnadmin/login');
	
	
	
}
public function pushtest()
{
	echo "test";
}
public function userdata()
{
//	$this->session->unset_userdata('okcnadmin');

//$this->session->set_userdata('okcnadmin','modol');
	print_r($this->session->userdata());  
	echo $this->session->userdata('okcnadmin');  
}
public function logincheck()
{
	$username=$this->input->get('username');
	$password=$this->input->get('password');
	if($username=="okcnadmin"&&$password=="okcnradio0691"){
		$this->session->set_userdata('okcnadmin','modol');
		 redirect('/okcnadmin/index', 'refresh');
	}else{
		 redirect('/okcnadmin/login', 'refresh');
	}
	
	
}
	public function index()
	{
		//$this->load->view('/home/home');
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
	$this->load->view('/okcnadmin/admin_header');
	$this->load->view('/okcnadmin/blank');
	//$this->load->view('/home/footer_foot');
	}



        public function notifications()
	{
		//$this->load->view('/home/home');
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		$data['timezones'] = $this->getTimezone();
	$this->load->view('/okcnadmin/admin_header_upload');
	$this->load->view('/okcnadmin/notification',$data);
	//$this->load->view('/home/footer_foot');
	}


	public function getTimezone()
	{
		$this->db->select('timezone, COUNT(id) as total');
		$this->db->group_by('timezone');
		$this->db->order_by('total','desc');
		$query = $this->db->get('users_main');
		return $query->result();
	//	print_r($query->result());
	}
	public function getM()
	{
		$today = date("Y-m-d");
		$this->db->where('channel_id',51);
		$this->db->where('program_date',$today);
		$query = $this->db->get('program_list');

	return	$query->first_row()->program_title;
	}

public function posttimezone()
{
	echo $this->input->post('timezone');
}


        public function postpush()
        {
		 $title = $this->input->post('title');
		 $tz = $this->input->post('timezone');
         $m = $this->input->post('message');
         $this->db->where('timezone',$tz);
         $query = $this->db->get('users_main');
           if ($query->num_rows()>0)
           {
               foreach ($query->result() as $row) {
                   if($row->os_type == "iOS")
                   {
                       $this->push_ios($title, $m, $row->token);
                   } else if($row->os_type == "Android")
                   {
                        $this->push_andriod($title, $m, $row->token);
                     
                   }
           }
        }
		}
		public function pushprayermeeting()
		{
			$title = '《월요기도 모임》';
			$m = '잠시후 시작됩니다.오전 10시(PST기준)';
			$tz = array('America/Los_Angeles','America/New_York','America/Chicago','America/Toronto','America/Edmonton');
			$this->db->where_in('timezone',$tz);
			$query = $this->db->get('users_main');
			foreach ($query->result() as $row) {
				if($row->os_type == "iOS")
				{
					$this->push_ios($title, $m, $row->token);
				//echo $row->os_type.$row->timezone;
				} else if($row->os_type == "Android")
				{
					 $this->push_andriod($title, $m, $row->token);
				//echo $row->os_type.$row->timezone;
				}
			}
		}


		public function automaticpushnotification($ctr,$cty)
        {
			
			$today = date("Y-m-d");
			$number = date('N', strtotime($today));
			if($number==1 || $number==2 || $number==3 || $number==4 || $number==5)
		{
		 $title = '북녁 성도들과 함께 하는 《정오의 기도》';
	     $m = $this->getM();
	   $tz = $ctr.'/'.$cty;
         $this->db->where('timezone',$tz);
         $query = $this->db->get('users_main');
           if ($query->num_rows()>0)
           {
               foreach ($query->result() as $row) {
                   if($row->os_type == "iOS")
                   {
                       $this->push_ios($title, $m, $row->token);
                   } else if($row->os_type == "Android")
                   {
                        $this->push_andriod($title, $m, $row->token);
                     
                   }
           }
		}
	}
		}
		


        function push_andriod($title,$message,$token)
        {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=AIzaSyATh27ZJbICQPaZUHHsjEQ0YWvkGJHqkQI',
            'Content-Type: application/json'
        );
        $res = array();
        $res['data']['title'] = $title;
        $res['data']['message'] = $message;   
        $res['data']['is_background'] = TRUE;  //
        $fields = array(
            'to' =>$token,
            'data' =>$res,
         //   'notification'=>array ('title'=>$title,'body'=>$message)
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
         echo 'Android======'.$result.'<br/>';

        
            
        }

        
        function push_ios($title,$message,$token)
{
	
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'src/pushcertp.pem');	
	$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
        $body['aps'] = array( 'alert' => array( 'title' => $title,'body' => $message),
			'sound' => 'bell.caf', 'badge'=> 1);
	$payload = json_encode($body);
	$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
	$result = fwrite($fp, $msg, strlen($msg));
    if ($result)
       echo 'iOS========='.$result.$token.'<br/>';
	fclose($fp);
}
		
 
function okcn_push_ios()
{
	$token = 'f90507597c7aeb96fe38990ed907b5d8c9ada57a19fc57688dd85c966810b2c7';
	$ctx = stream_context_create();
	stream_context_set_option($ctx, 'ssl', 'local_cert', 'src/pushcertp.pem');	
	$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
        $body['aps'] = array( 'alert' => array( 'title' => 'title','body' => 'message'),
			'sound' => 'bell.caf', 'badge'=> 1);
	$payload = json_encode($body);
	$msg = chr(0) . pack('n', 32) . pack('H*', $token) . pack('n', strlen($payload)) . $payload;
	$result = fwrite($fp, $msg, strlen($msg));
    if ($result)
       echo 'iOS========='.$result.$token.'<br/>';
	fclose($fp);
}
function waw_push_ios()
{
  
  
$deviceToken = 'a6efb3b6e613102d54d6c9428e9ffe69443b3158bf4f00a0d24d01ac6e2916d6'; //  iPad 5s Gold prod  13afadae6c1f81d0326f6b3b17530cb289be9b6014d10da66e96a6232f5386f9
$passphrase = 'dolos626';
$message = 'Hello Push Notification';
$ctx = stream_context_create();
stream_context_set_option($ctx, 'ssl', 'local_cert', 'src/wawpem.pem'); // Pem file to generated // openssl pkcs12 -in pushcert.p12 -out pushcert.pem -nodes -clcerts // .p12 private key generated from Apple Developer Account
stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
$fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx); // production
// $fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx); // developement

  echo "<p>Connection Open</p>";
    if(!$fp){
        echo "<p>Failed to connect!<br />Error Number: " . $err . " <br />Code: " . $errstrn . "</p>";
        return;
    } else {
        echo "<p>Sending notification!</p>";    
    }


$body['aps'] = array('alert' => $message,'sound' => 'default','extra1'=>'10','extra2'=>'value');
$payload = json_encode($body);
$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
//var_dump($msg)
$result = fwrite($fp, $msg, strlen($msg));
  if (!$result)
            echo '<p>Message not delivered ' . PHP_EOL . '!</p>';
        else
            echo '<p>Message successfully delivered ' . PHP_EOL . $result.'!</p>';
fclose($fp);
}    
        
        
        
        
        
        public function timetable()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
            $this->load->view('/okcnadmin/admin_header');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('timetable');
			$crud->order_by('week_day');
			
			
			$crud->set_subject('편성표');
			$crud->unset_export()->unset_print()->unset_read();	
			$crud->set_relation('cid','channels','channel_title');
			$crud->set_relation('week_day','week', 'week');
			$output = $crud->render();
		  $this->load->view('/okcnadmin/gc_common',(array)$output);
	}
	public function timetable_today()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
			$tz="America/Los_Angeles";
	        date_default_timezone_set($tz);
			 $datetime = new DateTime();
			$week=date("w");
            $this->load->view('/okcnadmin/admin_header');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('timetable');
			$crud->where('week_day',$week);
			$crud->order_by('start_time');	
			$crud->set_subject('오늘의 프로그램 편성');
			$crud->unset_export()->unset_print()->unset_read()->unset_edit()->unset_delete();	
			
			$crud->set_relation('week_day','week', 'week');
			$crud->callback_column('start_time',array($this,'getdatetime'));
			$crud->callback_column('end_time',array($this,'getdatetime'));
			$crud->callback_column('cid',array($this,'get_today_program'));
			$output = $crud->render();
			$data['canpublish']=$this->checkList($datetime);
			$data['published']=$this->checkPublish($datetime);
			
			$data['publish_url']=$datetime->format('Y_m_d_H:i:s');
			$output->data=$data;
		  $this->load->view('/okcnadmin/gc_twomorrow',(array)$output);
		
	}
	public function today_publish()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
			$tz="America/Los_Angeles";
	        date_default_timezone_set($tz);
			
			$week=date("w");
            $this->load->view('/okcnadmin/admin_header');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('timeline');
			$crud->where('start_time >=',date('Y-m-d'));
			$crud->order_by('start_time');	
			$crud->set_relation('program_id','program_list', 'program_title');
			$crud->set_subject('오늘의 프로그램 송출');
			$crud->unset_export()->unset_print()->unset_read()->unset_edit()->unset_delete();	
			
			$output = $crud->render();
		  $this->load->view('/okcnadmin/gc_no_search',(array)$output);
	}
	public function publish12($pdate)
	{
		 $date = DateTime::createFromFormat('Y_m_d_H:i:s', $pdate);
		 $onlydate=$date->format('Y-m-d');
	//	 $date5 = $date->modify('-5 day')->format('Y-m-d');
	//	 echo $date5;
		 $w= $date->format("w");
		  $data['publish']=array();
		 for( $i = 0; $i<16; $i++ ){
		 $this->db->where('week_day',$w);
			
		 $query= $this->db->get('timetable');
		 if ($query->num_rows()>0)
		 {
			foreach ($query->result() as $row) {
				$time=$this->getdatetimeForLoop($row->start_time,$i*1.5);
				$datetime=$onlydate.' '.$time.':00';
				$pid=$this->getProgramID($row->cid, $onlydate);
			    $insertdata['start_time']=$datetime;
	            $insertdata['program_id']=$pid;			
	            $this->db->insert('timeline',$insertdata);
				
				$program=$this->getProgramByID($pid);
				array_push( $data['publish'], array('time'=>$datetime, 'program'=>'《'.$program->channel_title.'》'.$program->program_title));
			}
		
	
	     }
		 }
		$date5 = $date->modify('-5 day')->format('Y-m-d');
		$this->db->where('start_time <', $date5);
		$this->db->delete('timeline'); 
		 $this->load->view('/okcnadmin/admin_header');
		$this->load->view('/okcnadmin/publish', $data);
	}
	function getProgramID($cid,$date)
	{
		$this->db->from('program_list');
		$this->db->where('channel_id',$cid);
		$this->db->where('program_date',$date);
		 $this->db->limit(1);
		 $query= $this->db->get();
		  if ($query->num_rows()>0)
		  {
		  	
		  	return $query->first_row()->p_id ;
		  }else
		  	{
		  		return FALSE;
		  	}
		
	}
	function getProgramByID($pid)
	{
		$this->db->from('program_list');
		$this->db->where('p_id',$pid);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->limit(1);
		 $query= $this->db->get();
		 if ($query->num_rows()>0)
		  {
		  	return $query->first_row();
		  }
		
	}
function getdatetimeForLoop($value,$i)
   {
   	$time=$value;
   	if(strlen($time)==1)
	{
		$time="000".$time;
	}
	if(strlen($time)==2)
	{
		$time="00".$time;
	}
	if(strlen($time)==3)
	{
		$time="0".$time;
	}
   	$timestr=substr_replace($time, ':', 2, 0);
	$timestamp = strtotime($timestr) + 60*60*$i;
	$datetime = date('H:i', $timestamp);
	//$datetime=new DateTime($timestr);
	return $datetime;

   }
		
	
	 
	 public function timetable_twomorrow()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
			$tz="America/Los_Angeles";
	        date_default_timezone_set($tz);
	        $datetime = new DateTime('tomorrow');
			$week=$datetime->format("w");
            $this->load->view('/okcnadmin/admin_header');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('timetable');
			$crud->where('week_day',$week);
			$crud->order_by('start_time');	
			$crud->set_subject('내일의 프로그램 편성');
			$crud->unset_export()->unset_print()->unset_read()->unset_edit()->unset_delete();	
			
			$crud->set_relation('week_day','week', 'week');
			$crud->callback_column('start_time',array($this,'getdatetime'));
			$crud->callback_column('end_time',array($this,'getdatetime'));
			$crud->callback_column('cid',array($this,'get_tomorrow_program'));
			$output = $crud->render();
			$data['canpublish']=$this->checkList($datetime);
			$data['published']=$this->checkPublish($datetime);
			
			$data['publish_url']=$datetime->format('Y_m_d_H:i:s');
			
			$output->data=$data;
			//$output['publish']="publishing";
		  $this->load->view('/okcnadmin/gc_twomorrow',(array)$output);
	}

function checkList($date)
	{
		
		$w = $date->format("w");
		$onlydate=$date->format('Y-m-d');
		$this->db->where('week_day',$w);
		$query= $this->db->get('timetable');
		if ($query->num_rows()>0)
		{
			$return=false;
			foreach ($query->result() as $row) {
				 $program=$this->getProgramForCheck($row->cid, $onlydate);
				 if($program)
			 {
			 	$return=true;
			 }
				 else
				 	{
				 		return false;
				 	}
			}
			return $return;
		}
		  
	}
	function checkPublish($date)
	{
		
		
		$onlydate=$date->format('Y-m-d');
		$this->db->where('start_time',$onlydate);
		$query= $this->db->get('timeline');
		if ($query->num_rows()>0)
		{
			return true;
		}else
			{
				return false;
			}
		  
	}
	
	
	function getProgramForCheck($cid,$date)
	{
		$this->db->from('program_list');
		$this->db->where('channel_id',$cid);
		$this->db->where('program_date',$date);
		 $this->db->limit(1);
		 $query= $this->db->get();
		  if ($query->num_rows()>0)
		  {
		  	return true ;
		  }else
		  	{
		  		return FALSE;
		  	}
	}
	 
	  function getdatetime($value)
   {
   	$time=$value;
   	if(strlen($time)==1)
	{
		$time="000".$time;
	}
	if(strlen($time)==2)
	{
		$time="00".$time;
	}
	if(strlen($time)==3)
	{
		$time="0".$time;
	}
   	$timestr=substr_replace($time, ':', 2, 0);
	$datetime=new DateTime($timestr);
	return $datetime->format('H:i');

   }
   function get_today_program($value)
   {
   	date_default_timezone_set("America/Los_Angeles");
	$this->db->from('program_list');
   	$this->db->where('program_date',date('Y-m-d'));
	$this->db->where('channel_id',$value);
	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->limit(1);
	$query=$this->db->get();
	if ($query->num_rows()>0)
	{
		$c=$this->count($query->first_row()->p_id);
		return "《".$query->first_row()->channel_title.$query->first_row()->program_date."》".$query->first_row()->program_title."(".$c.")<br/><audio controls><source src='" .  $query->first_row()->program_url . "' type='audio/mp3'></audio>";
	}else{
		return 'none';
	}
	
   }
	 function get_tomorrow_program($value)
   {
   	date_default_timezone_set("America/Los_Angeles");
	$datetime = new DateTime('tomorrow');
	$this->db->from('program_list');
   	$this->db->where('program_date',$datetime->format('Y-m-d'));
	//$this->db->order_by('program_date', 'desc');
	$this->db->where('channel_id',$value);
	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->limit(1);
	$query=$this->db->get();
	if ($query->num_rows()>0)
	{
		$c=$this->count($query->first_row()->p_id);
		return "《".$query->first_row()->channel_title.$query->first_row()->program_date."》".$query->first_row()->program_title."(".$c.")<br/><audio controls><source src='" .  $query->first_row()->program_url . "' type='audio/mp3'></audio>";
	}else{
		return 'none';
	}
	
   }
    function get_date_program($value)
   {
   
	$this->db->from('program_list');
   	$this->db->where('program_date',$this->session->flashdata('datetime'));
	//$this->db->order_by('program_date', 'desc');
	$this->db->where('channel_id',$value);
	$this->db->join('channels', 'channels.c_id = program_list.channel_id');
	$this->db->limit(1);
	$query=$this->db->get();
	if ($query->num_rows()>0)
	{
		$c=$this->count($query->first_row()->p_id);
		return "《".$query->first_row()->channel_title.$query->first_row()->program_date."》".$query->first_row()->program_title."(".$c.")<br/><audio controls><source src='" .  $query->first_row()->program_url . "' type='audio/mp3'></audio>";
	}else{
		return 'none';
	}
	
   }
	
	
	public function channel()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('channels')
			->columns('channel_title','channel_poster','order_id','ctg_id')->fields('channel_title','channel_poster','order_id','ctg_id');
			$crud->display_as('channel_title','채널')->display_as('channel_poster','이미지')->display_as('order_id','순서')->display_as('ctg_id','카테고리');
			$crud->set_relation('ctg_id','category','category_name');
			$crud->order_by('order_id');
			$crud->set_subject('전체 채널');
			$crud->unset_export()->unset_print()->unset_read();		
			$crud->callback_column('channel_poster',array($this,'image'));
			
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/gc_common',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function category()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('category');
			//->columns('channel_title','channel_poster','order_id')->fields('channel_title','channel_poster','order_id');
			//$crud->display_as('channel_title','')->display_as('channel_poster','이미지')->display_as('order_id','순서');
			//$crud->order_by('order_id');
			$crud->set_subject('카테고리');
			 $crud->set_field_upload('image','assets/uploads/');
			$crud->unset_export()->unset_print()->unset_read();		
			//$crud->callback_column('channel_poster',array($this,'image'));
			
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/gc_common',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function videos()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('videos');
			//->columns('channel_title','channel_poster','order_id')->fields('channel_title','channel_poster','order_id');
			//$crud->display_as('channel_title','')->display_as('channel_poster','이미지')->display_as('order_id','순서');
			//$crud->order_by('order_id');
			$crud->set_subject('영상 LIVE');
			 $crud->set_field_upload('image','assets/uploads/');
			$crud->unset_export()->unset_print()->unset_read();		
			//$crud->callback_column('channel_poster',array($this,'image'));
			
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/gc_common',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
        public function comment()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('comments');
			$crud->columns('user_name','contents','create_time');
			//$crud->display_as('channel_title','')->display_as('channel_poster','이미지')->display_as('order_id','순서');
			$crud->order_by('cm_id','desc');
			$crud->set_subject('Comments');
			// $crud->set_field_upload('image','assets/uploads/');
			$crud->unset_export()->unset_print()->unset_read();		
			//$crud->callback_column('channel_poster',array($this,'image'));
			
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/gc_common',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function banner()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('banners');
			//->columns('channel_title','channel_poster','order_id')->fields('channel_title','channel_poster','order_id');
			//$crud->display_as('channel_title','')->display_as('channel_poster','이미지')->display_as('order_id','순서');
			//$crud->order_by('order_id');
			$crud->set_subject('Banner');
			 $crud->set_field_upload('banners_image','assets/uploads/');
			$crud->unset_export()->unset_print()->unset_read();		
			//$crud->callback_column('channel_poster',array($this,'image'));
			
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/gc_common',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	public function webbanner()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('web_banners');
			//->columns('channel_title','channel_poster','order_id')->fields('channel_title','channel_poster','order_id');
			//$crud->display_as('channel_title','')->display_as('channel_poster','이미지')->display_as('order_id','순서');
			//$crud->order_by('order_id');
			$crud->set_subject('Web Banner(2000×764)');
			 $crud->set_field_upload('banners_image','assets/uploads/');
			$crud->unset_export()->unset_print()->unset_read();		
			//$crud->callback_column('channel_poster',array($this,'image'));
			
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/gc_common',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}



	public function image($value)
	{
		return "<img style='height:40px' src='" . $value . "' />";
	}
	public function programs()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('program_list')
			->columns('program_date','channel_id','program_title','program_url','program_length');
			$crud->display_as('channel_id','채널')->display_as('program_actor_id','진행자')->display_as('program_title','프로그램')
			->display_as('program_date','프로그램 날자')->display_as('program_length','진행 시간')->display_as('program_url','오디오파일');
			$crud->order_by('p_id','desc');
			$crud->where('program_date >','2017-05-01');
			$crud->set_relation('channel_id','channels','channel_title');
			$crud->set_relation('program_actor_id','actors','actor_name');
			$crud->set_subject('전체 프로그램 리스트');
			$crud->unset_export()->unset_print()->unset_read();
		
			$crud->fields('channel_id','program_actor_id','program_length','program_title','program_date','program_url');
			$crud->field_type('program_length','dropdown', array('15' => '15', '30' => '30', '60' => '60'));
			$crud->callback_column('program_url',array($this,'audio'));
			$crud->callback_column('program_title',array($this,'name_count'));
			 $crud->callback_after_insert(array($this,'something_after_insert'));
			 $crud->set_lang_string('insert_success_message','프로그램 업데이트 완성 <br/>잠간 기다려 주세요!
		 <script type="text/javascript"> window.location = "/okcnadmin/redirect_to_url"; </script>
		 <div style="display:none">');
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/programs',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function p()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('program_list')
			->columns('program_date','channel_id','program_title','program_url','program_length');
			$crud->display_as('channel_id','채널')->display_as('program_actor_id','진행자')->display_as('program_title','프로그램')
			->display_as('program_date','프로그램 날자')->display_as('program_length','진행 시간')->display_as('program_url','오디오파일');
			$crud->order_by('p_id','desc');
			$crud->where('program_date >','2018-01-15');
			$crud->set_relation('channel_id','channels','channel_title');
			$crud->set_relation('program_actor_id','actors','actor_name');
			$crud->set_subject('전체 프로그램 리스트');
			
		
			$crud->fields('channel_id','program_actor_id','program_length','program_title','program_date','program_url');
			$crud->field_type('program_length','dropdown', array('15' => '15', '30' => '30', '60' => '60'));
			$crud->callback_column('program_url',array($this,'audio'));
			$crud->callback_column('program_title',array($this,'name_count'));
			 $crud->callback_after_insert(array($this,'something_after_insert'));
			 $crud->set_lang_string('insert_success_message','프로그램 업데이트 완성 <br/>잠간 기다려 주세요!
		 <script type="text/javascript"> window.location = "/okcnadmin/redirect_to_url"; </script>
		 <div style="display:none">');
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/programs',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

function something_after_insert($post_array, $primary_key) 
    {
     //   $this->session->set_flashdata('last_pk', $primary_key);
	//	$this->session->set_userdata('pk', $primary_key);
		$this->session->set_userdata('pdate', $post_array['program_date']);
        return true;
    }
	
	function redirect_to_url() 
{
    redirect(base_url('okcnadmin/program_date/'.$this->session->userdata('pdate')),'refresh');
}
function program_date($d,$m,$y)
{
	if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
			
	    $datetime = DateTime::createFromFormat('d/m/Y', $d.'/'.$m.'/'.$y);
		$this->session->set_flashdata('datetime', $datetime->format("Y-m-d"));
		if($this->checkList($datetime)&&!$this->checkPublish($datetime))
		{
			redirect('/okcnadmin/publish12/'.$datetime->format('Y_m_d_H:i:s'), 'refresh');
		}else{
			
			$week=$datetime->format("w");
            $this->load->view('/okcnadmin/admin_header');
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('timetable');
			
			$crud->where('week_day',$week);
			$crud->order_by('start_time');	
			$crud->set_subject($datetime->format("Y-m-d").'프로그램 편성');
			$crud->unset_export()->unset_print()->unset_read()->unset_edit()->unset_delete();	
			
			$crud->set_relation('week_day','week', 'week');
			
			$crud->callback_column('start_time',array($this,'getdatetime'));
			$crud->callback_column('end_time',array($this,'getdatetime'));
			$crud->callback_column('cid',array($this,'get_date_program'));
			$output = $crud->render();
			$data['canpublish']=$this->checkList($datetime);
			$data['published']=$this->checkPublish($datetime);
			
			$data['publish_url']=$datetime->format('Y_m_d_H:i:s');
			
			$output->data=$data;
			//$output['publish']="publishing";
		  $this->load->view('/okcnadmin/gc_twomorrow',(array)$output);
		}
		
}
  function program_today()
  {
  	date_default_timezone_set("America/Los_Angeles");
	if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('program_list')
			->columns('program_date','channel_id','program_title','program_url','program_length');
			$crud->display_as('channel_id','채널')->display_as('program_actor_id','진행자')->display_as('program_title','프로그램')
			->display_as('program_date','프로그램 날자')->display_as('program_length','진행 시간')->display_as('program_url','오디오파일');
			$crud->order_by('p_id','desc');
			$crud->where('program_date',date('Y-m-d'));
			$crud->set_relation('channel_id','channels','channel_title');
			$crud->set_relation('program_actor_id','actors','actor_name');
			$crud->set_subject('오늘 프로그램 리스트');
			$crud->unset_export()->unset_print()->unset_read()->unset_delete();
		
			$crud->fields('channel_id','program_actor_id','program_length','program_title','program_date','program_url');
			$crud->field_type('program_length','dropdown', array('15' => '15', '30' => '30', '60' => '60'));
			$crud->callback_column('program_url',array($this,'audio'));
			$crud->callback_column('program_title',array($this,'name_count'));
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/programs',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
  	
  }
 function program_tomorrow()
  {
  	date_default_timezone_set("America/Los_Angeles");
	$datetime = new DateTime('tomorrow');
	if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		 $this->load->view('/okcnadmin/admin_header');
		try{
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('program_list')
			->columns('program_date','channel_id','program_title','program_url','program_length');
			$crud->display_as('channel_id','채널')->display_as('program_actor_id','진행자')->display_as('program_title','프로그램')
			->display_as('program_date','프로그램 날자')->display_as('program_length','진행 시간')->display_as('program_url','오디오파일');
			$crud->order_by('p_id','desc');
			$crud->where('program_date', $datetime->format('Y-m-d'));
			$crud->set_relation('channel_id','channels','channel_title');
			$crud->set_relation('program_actor_id','actors','actor_name');
			$crud->set_subject('내일 프로그램 리스트');
			$crud->unset_export()->unset_print()->unset_read()->unset_delete();
		
			$crud->fields('channel_id','program_actor_id','program_length','program_title','program_date','program_url');
			$crud->field_type('program_length','dropdown', array('15' => '15', '30' => '30', '60' => '60'));
			$crud->callback_column('program_url',array($this,'audio'));
			$crud->callback_column('program_title',array($this,'name_count'));
			$output = $crud->render();
         
          $this->load->view('/okcnadmin/programs',(array)$output);
			

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
  	
  }

function audio($value)
{

	return "<audio controls><source src='" . $value . "' type='audio/mp3'></audio>";
}
function name_count($value,$row)
{
	return $value.'('.$this->count($row->p_id).')';
}
function count($pid)
{
	
	$this->db->where('program_id',$pid);
	$q = $this->db->get('program_touch');
	return $q->num_rows();
}
	public function channels()
	{
		if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('channels');
			$crud->set_subject('channels');
		

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
public function upload($md=null)
{
	if($this->session->userdata('okcnadmin')!='modol')
		{
			redirect('/okcnadmin/login', 'refresh');
		}
require_once(APPPATH.'libraries/S3.php');
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJHJ762GWZKG26TMA');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');
if($md==null)
{
	$date=new DateTime();
	
	$path="vou/".$date->format('Y').'_'.(string)$date->format('n')."/";
}else
	{
		$path="vou/".$md."/";
	}
S3::setAuth(awsAccessKey, awsSecretKey);
$bucket = 'cdsaws';

//$path = 'vou/2016_1/'; 
$lifetime = 3600; 
$maxFileSize = (1024 * 1024 * 100); // 100 MB
$metaHeaders = array();
$requestHeaders = array('Content-Type' => 'audio/mp3');
$data['params'] = S3::getHttpUploadPostParams( $bucket,$path,S3::ACL_PUBLIC_READ,$lifetime,$maxFileSize,
    'http://okcnradio.org/okcnadmin/programs/add', $metaHeaders,$requestHeaders,false);
$data['uploadURL'] = 'https://' . $bucket . '.s3.amazonaws.com/';
$data['path']=$path;
 $this->load->view('/okcnadmin/admin_header_upload');
$this->load->view('/okcnadmin/upload',$data);
	
}
public function s3()
{
	require_once(APPPATH.'libraries/S3.php');
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJHJ762GWZKG26TMA');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');
S3::setAuth(awsAccessKey, awsSecretKey);
//print_r(S3::getBucket('cdsaws'));
print_r(S3::getBucket('cdsaws','bc/금요기도회'));
}

public function programinfo()
{
	echo "<audio controls=''><source src='https://s3-us-west-2.amazonaws.com/cdsaws/".$this->input->get('key')."'";
	echo "type='audio/mp3'></audio>";

}
	
	function sendGCM() {


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array (
            'registration_ids' => array (
                   "fJUjLrcwrV0:APA91bHhPNmPhvYEqit_pQmL9FVbA4kcS7nn7r0ikJ9SonAgHVd9lsoGiFq3Y2ryYdzfxK4cCR5BbP1XhyLeUoJ6bxZpRfMmiX5KIjAavthoRnwxzIOA7fYEPdS7N4pzNZ2jgvfKYMa1"
            ),
            'data' => array (
                    "message" => "하나님을 예배하는 방송 《통일의 소리》방송입니다.","title"=>"통일의 소리","uname"=>"《통일의 소리》방송"
            )
    );
    $fields = json_encode ( $fields );
//echo $fields;
    $headers = array (
            'Authorization: key=AIzaSyATh27ZJbICQPaZUHHsjEQ0YWvkGJHqkQI',
            'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    if ($result === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    echo $result;
    curl_close ( $ch );
}
 function sendnt()
 {
    $url = "https://fcm.googleapis.com/fcm/send";
    $token = "dNAb6F_YoIs:APA91bEd7q0sCrIJgQRW3Viu0ikAjn7Dx5Is5I_h1DE5CO6D4APNzKM-KB12h_OV_TNZm9AsGBlPxZN5FvQecoeZGLKGfwDKHGZcBAgTpZ2wOlhgwooTCbTSKz417vIN8IfqWkg348LI";
    $serverKey = 'AIzaSyATh27ZJbICQPaZUHHsjEQ0YWvkGJHqkQI';
    $title = "Notification title";
    $body = "Hello I am from Your php server";
    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'icon'=> 'okcnlogo', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'data' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
   // curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);
 }

}
