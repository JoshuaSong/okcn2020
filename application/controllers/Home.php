<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class home extends  CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		 $CI =& get_instance();

		 $CI->db = $CI->load->database('default', TRUE);
		
	}

	public $starting = "0";

	public function userdata()
	{
		print_r($this->session->userdata());   
	}
public function logout()
{
	foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
}
	public function index()
	{
		if($this->session->userdata('user_login_id'))
		{
			$this->logintime();
		}
		else{
			$this->webLogin();
		}
	    
	
		$data['today']=$this->todaychannels();
		$data['banner']=$this->getWebBanner();
		//$data['date']=$this->bydatelist50($stime);
	    
	    $data['category']=$this->getCategory();	
	  //  $data['channel']=$this->getAllChannels();
		$data['thumbnails']=$this->get36Channel();
		$data['videos'] = $this->gettodayvideo();
		$this->load->view('web/home2021',$data);
	//	$this->load->view('web/new',$data);
	}
	public function home2021()
	{

	    
	
		$data['today']=$this->todaychannels();
		$data['banner']=$this->getWebBanner();
		//$data['date']=$this->bydatelist50($stime);
	    
	    $data['category']=$this->getCategory();	
	  //  $data['channel']=$this->getAllChannels();
		$data['thumbnails']=$this->get36Channel();
		$data['videos'] = $this->gettodayvideo();
		$this->load->view('web/home2021',$data);
	}


	public function oldprogram()
	{
		$data['banner']=$this->getWebBanner();
	    $data['category']=$this->getCategory();	  
		$data['thumbnails']=$this->getOldChannel();
	    
		$this->load->view('web/oldprogram',$data);
	}


	public function getAllVideos()
	{
		$this->db->order_by('order');
		$query = $this->db->get('videos');
		return $query->result();

	}

public function gettodayvideo()
{
  $this->db->order_by('video_date','desc');
  $this->db->where('status',0);
  $this->db->limit(20);
  $query = $this->db->get('youtube_video');
  return $query->result();
  
}
	public function PrivacyPolicy()
	{
		$this->load->view('web/privacy_policy');
	}
	public function onechannel($cid)
	{   
	    //$this->session->set_userdata ( 'redirect', current_url ());
	    
	    $data['category']=$this->getCategory();	  
		
		$data['channels'] = $this->getOneChannel($cid);
		if ($cid == 58) {
			$data['programs']=$this->shufflechannel(); 
	} else {
		$data['programs']=$this->getProgramList($cid);
	}
	    $this->load->view('web/header');
	    $this->load->view('web/onechannel', $data);
	}

	public function datechannel($date) {
		//$stime = date("Y-m-d",$date);	
		

		$data['category']=$this->getCategory();	  
	    $data['programs']=$this->getProgramList(36);
		$data['channels'] = $this->getOneChannel(36);
		$data['todays'] = $this->bydatelistoneday($date);
		$data['current']=$this->bydateone($date);
	    
	    $this->load->view('web/header');
		$this->load->view('web/datechannel', $data);
		//print_r($data);
	} 

	public function todayprogram($time) 
	{
		$data['category']=$this->getCategory();	  
	    $data['programs']=$this->getProgramList($cid);
	    $data['channels'] = $this->getOneChannel($cid);

		$this->load->view('view/header');
		$this->load->view('view/onechannel', $data);
	}
	
	public function channel($cid)
	{
	    //$this->session->set_userdata ( 'redirect', current_url ());
	    
	    $data['category']=$this->getCategory();
	    $data['programs']=$this->getAllProgramList($cid);
	    $data['channels'] = $this->getOneChannel($cid);
	    
	    $this->load->view('web/header');
	    $this->load->view('web/onechannel', $data);
	}
	 
	public function getCategory()
	{
	    $data=array();
	    $query = $this->db->get('category');
	    foreach ($query->result() as $row) 
	    {
	       $row->channels = $this->getChannel($row->category_id);
	       array_push($data, $row);
	    }
	    //print_r($data);
	    return $data;
	}
	
	public function getChannel($ctg)
	{
		$this->db->where('ctg_id',$ctg);
		$this->db->order_by('order_id');
	    $query = $this->db->get('channels');
	    
	    //$this->db->join('program_list', 'channels.c_id = program_list.channel_id', 'left');
	    //$this->db->group_by('channels.channel_title');
	    
	    //print_r ($query->result());    
	    return $query->result();
	}
	public function get36Channel()
	{
		$this->db->limit(24);
		$this->db->order_by('order_id');

		
	    $query = $this->db->get('channels');       
	    
	    //$this->db->join('program_list', 'channels.c_id = program_list.channel_id', 'left');
	    //$this->db->group_by('channels.channel_title');
	    
	    //print_r ($query->result());    
	    return $query->result();
	}
	public function getOldChannel()
	{

		$this->db->order_by('order_id');

		$this->db->where('ctg_id',9);
	    $query = $this->db->get('channels');       
	    return $query->result();
	}
	
	public function getOneChannel($cid)
	{
		
		
	    $this->db->from('channels');
	    $this->db->where('c_id', $cid);
	    $this->db->limit(1);
	    
	    $query = $this->db->get();
	    
	   // print_r($query->result());
	    return $query->first_row();
	}
	
	
	
	public function getProgramList($cid)
	{
		$tz="Asia/Jerusalem";
			date_default_timezone_set($tz);
		$date = date('y-m-d h:i:s', time());

		$this->db->from('program_list');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->where('channel_id', $cid);
		$this->db->where('program_date <',$date);
	    $this->db->order_by("program_date", 'DESC');
	  //  $this->db->limit(30);
	    
	    $query = $this->db->get();
	    
	    //print_r($query->result());
	    return $query->result(); 
	}
	
	public function getAllProgramList($cid)
	{
	    $this->db->from('program_list');
		$this->db->where('channel_id', $cid);
		
	    $this->db->order_by('program_date', 'DESC');
	    
	    $query = $this->db->get();
	    
	    //print_r($query->result());
	    return $query->result();
	}
	
	
	function getSS($time1,$time2)
	{
	    $p1 = explode(":",$time1);
	    $p2 = explode(":",$time2);
	    return	($p2[1]-$p1[1])*60+($p2[2]-$p1[2]);
	    
	}

	
	
	function oldp($pid)
	{
	    
	    
	    
	    $this->db->select('*');
	    $this->db->limit(1);
	    $this->db->from('program_list');
	    $this->db->where('p_id',$pid);
	    $this->db->join('channels', 'channels.c_id = program_list.channel_id','left');
	    $this->db->join('actors', 'actors.a_id = program_list.program_actor_id','left');

	    $query = $this->db->get();
	    if ($query->num_rows()>0)
	    {
	        $data['category']=$this->getCategory();	
	        $data['channels']= $query->first_row();
	        $data['item']= $query->first_row();
	 
	        //	$this->user_model->usertouch($pid);
	        $this->load->view('/web/header');
	        $this->load->view('/web/program',$data);
	        
	        //print_r($query->result());
 	    }
	    
	}
	function getAllChannels()
	{
	    $this->db->select('c_id, channel_title, channel_poster,COUNT(program_list.channel_id) AS count');
	    $this->db->from('channels');
	    $this->db->order_by('order_id');
	    
	    $this->db->join('program_list', 'channels.c_id = program_list.channel_id','left'); 
	    $this->db->group_by('channels.channel_title');
	    
	    $query = $this->db->get();
	    
	    return $query->result();
	}

	function getBanner()
	{
		$this->db->from('banners');
		$this->db->order_by('order');

		$query = $this->db->get();

		//print_r($query->result());
		return $query->result();
	}
	function getWebBanner()
	{
		$this->db->from('web_banners');
		$this->db->order_by('order');

		$query = $this->db->get();

		//print_r($query->result());
		return $query->result();
	}

	function todaychannels()
	{
		$tz="America/Los_Angeles";
	        date_default_timezone_set($tz);
			$datetime = new DateTime();
			$week=date("w");
		//	$this->db->select('c_id as cid, channel_title as category_name, channel_poster as category_image');
			$this->db->from('timetable');
			$this->db->where('week_day',$week);
			$this->db->order_by('start_time');	
		  
		$query = $this->db->get();
		$array =  array();
		foreach($query->result() as $row)
	
		{
			$row->program = $this->get_today_program($row->cid);
			array_push($array, $row);
		}
		return $array;
		
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
	return $query->first_row();
	
	
   }
	
	function bydatelist50($date)
	{
		 $dateTime = datetime::createfromformat('Y-m-d_H:i:s',$date);
	    
		$array=array();
	
		/*
		for( $i=0;$i<30; $i++)
		{	
			$data[]=$this->bydatelistoneday($date);
		}
		**/

		$data[]=$this->bydatelistoneday($date);


		return $data;
		//print_r($data);
		//$json=str_replace('\\/', '/', json_encode($data));
		//echo '{"Json":'.$json.'}';
	}
	
	function bydatelistoneday($date)
	{
		
		$this->db->select('program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,program_list.program_date as program_date,actor_name');
	    $this->db->from('program_list');
		$this->db->order_by('program_date','desc');
		$this->db->where('program_date',$date);
		//$this->db->limit(1);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		
		$query = $this->db->get();
		$data=array();
		//print_r($query->result());
		return $query->result();
		if ($query->num_rows()>0)
		{
			return $query->result();
		}
	}

	function bydateone($date)
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
		//print_r($query->result());
		return $query->first_row();
	}
	function shufflechannel() 
	{
		$where = array('43', '45', '56');

		$this->db->from('program_list');
		$this->db->or_where_in('channel_id', $where);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->order_by('rand()');
		

		$query = $this->db->get();
		//print_r($query->result());
		return $query->result(); 
	}
	
	function newdatechannel($date)
	{
		$pieces = explode("_", $date);
		$data['banner']=$this->getWebBanner();
		$data['category']=$this->getCategory();	  
	    $data['programs']=$this->getProgramList(36);
		$data['channels'] = $this->getOneChannel(36);
		$data['todays'] = $this->bydatelistoneday($pieces[0]);
		$data['week']=$pieces[1];
	    
	 
		$this->load->view('web/newdatechannel', $data);
	}
	public function newonechannel($cid)
	{   
		if($this->session->userdata('user_login_id'))
		{
			$this->logintime();
		}
		else{
			$this->webLogin();
		}
	    $data['banner']=$this->getWebBanner();
	    $data['category']=$this->getCategory();	  
		
		$data['channels'] = $this->getOneChannel($cid);
		if ($cid == 58) {
			$data['programs']=$this->shufflechannel(); 
	    } else {
		    $data['programs']=$this->getProgramList($cid);
	    }
	   // $this->load->view('web/header');
	    $this->load->view('web/newonechannel', $data);
	}
	public function bible($vid=null,$bid=null,$cid=null)
	{   if($this->session->userdata('user_login_id'))
		{
			$this->logintime();
		}
		else{
			$this->webLogin();
		}
		
		if($vid == null)
		{
			$vid = '11';
		}
		if($bid == null)
		{
			$bid = '40';
		}
		if($cid == null)
		{
			$cid = '1';
		}
		$v = $this->db->limit(1)->where('id',$vid)->get('bible_version');
	    $version = $v->first_row();
	    $b = $this->db->limit(1)->where('book_id',$bid)->where('lang',$version->book_lang)->get('bible_book');
		$book = $b->first_row();
		$data['vid'] = $vid;
		$data['bid'] = $bid;
		$data['cid'] = $cid;
		$data['bbn'] = $book->name;
		$data['bvn'] = $version->name;
		$data['ot'] = $version->ot;
		$data['nt'] = $version->nt;
		$data['bvs'] = $version->lang.'/'.$version->initial.'/';
		$data['blang'] = $version->book_lang;
		$data['image'] = $book->image;
		$data['audios'] = $this->getBibleAudio($vid,$bid,$cid);
	    $this->load->view('web/bible-safari', $data);
	}
public function  logintest($ip)
{
	$city = "https://208753:R450ssQTMZHtc5cb@geoip.maxmind.com/geoip/v2.1/city/".$ip;
	$file=file_get_contents($city);
	print_r(json_decode($file, true));
}

	public function webLogin()
	{
	$this->load->library('user_agent');
	if($this->agent->platform() != 'Unknown Platform')
	{
	$ip = $this->input->ip_address();
	//$ip = "23.83.185.26";
	$city = "https://208753:R450ssQTMZHtc5cb@geoip.maxmind.com/geoip/v2.1/city/".$ip;
	$file=file_get_contents($city);
	$arr = json_decode($file, true);
	if(isset($arr) )
		{
	
			if (array_key_exists('subdivisions', $arr)) {
				$data['region_name'] =$arr['subdivisions'][0]['names']['en'];
			}
			if (array_key_exists('city', $arr)) {
				$data['city'] = $arr['city']['names']['en'];
			}
			if (array_key_exists('postal', $arr)) {
				$data['zip_code'] = $arr['postal']['code']; 
			}
			if (array_key_exists('location', $arr)) {
				$data['timezone'] = $arr['location']['time_zone']; 
			}
			if (array_key_exists('country', $arr)) {
				$data['country'] = $arr['country']['names']['en']; 
 		        $data['country_code'] = $arr['country']['iso_code']; 
			}
			if (array_key_exists('traits', $arr)) {
				$data['network'] = $arr['traits']['autonomous_system_organization'];
			
			}


		 $data['os_type'] = 'Web';
		 $data['device_id'] =  $this->agent->platform().'-'.$this->agent->browser();
		 $data['user_ip'] = $ip;


		 $this->db->insert('users_main', $data);		
		 $uid = $this->db->insert_id();
		 $this->session->set_userdata('user_login_id', $uid);
		 $this->logintime();
	}
	
	}
	}
	
	public function logintime()
	{
		$data['ip'] = $this->input->ip_address();
        $data['login_user_id'] = $this->session->userdata('user_login_id');
        $this->db->insert('login_user_time', $data);
	}
	



	public function bible4safari($vid=null,$bid=null,$cid=null)
	{   
		if($vid == null)
		{
			$vid = '11';
		}
		if($bid == null)
		{
			$bid = '40';
		}
		if($cid == null)
		{
			$cid = '1';
		}
		$v = $this->db->limit(1)->where('id',$vid)->get('bible_version');
	    $version = $v->first_row();
	    $b = $this->db->limit(1)->where('book_id',$bid)->where('lang',$version->book_lang)->get('bible_book');
		$book = $b->first_row();
		$data['vid'] = $vid;
		$data['bid'] = $bid;
		$data['cid'] = $cid;
		$data['bbn'] = $book->name;
		$data['bvn'] = $version->name;
		$data['ot'] = $version->ot;
		$data['nt'] = $version->nt;
		$data['bvs'] = $version->lang.'/'.$version->initial.'/';
		$data['blang'] = $version->book_lang;
		$data['image'] = $book->image;
		$data['audios'] = $this->getBibleAudio($vid,$bid,$cid);
	    $this->load->view('web/bible-safari', $data);
	}
	function getBibleAudio($vid,$bid,$cid)
	{
		$urlhead= "https://cdsaws.s3-us-west-2.amazonaws.com/vou/bible/";
	$v = $this->db->limit(1)->where('id',$vid)->get('bible_version');
	$version = $v->first_row();
	$b = $this->db->limit(1)->where('book_id',$bid)->where('lang',$version->book_lang)->get('bible_book');
	$book = $b->first_row();
	$data=array();

	for ($x = 1; $x <= intval($book->count); $x++) {
		$row=array();
		$row["mp3"] = $urlhead.$version->lang.'/'.$version->audio.'/'.$bid.'-'.$x.'.mp3';
		array_push($data,$row);
		
	  }

	 return $data;
	}

	function touchBible($vid,$bid,$cid)
	{
		
			$data['vid'] = $vid;
		$data['bid'] = $bid;
		$data['cid'] = $cid;
		$data['user_id'] = $this->session->userdata('user_login_id');
		$this->db->insert('bible_touch', $data);
		

	}

	function p($pid)
	{
	    
	    if($this->session->userdata('user_login_id'))
		{
			$this->logintime();
		}
		else{
			$this->webLogin();
		}
	    
	    
	    $this->db->select('*');
	    $this->db->limit(1);
	    $this->db->from('program_list');
	    $this->db->where('p_id',$pid);
	    $this->db->join('channels', 'channels.c_id = program_list.channel_id','left');
	    $this->db->join('actors', 'actors.a_id = program_list.program_actor_id','left');
	  
	    $query = $this->db->get();
	    if ($query->num_rows()>0)
	    {
		//	$data['banner']=$this->getWebBanner();
	        $data['category']=$this->getCategory();	
			
	        $data['programs']= $query->first_row();
	 
	      
			$this->load->view('/web/newprogramcopy',$data);
	        
	        //print_r($query->result());
 	    }
	    
	}
	public function programtouch($pid)
	{
		$this->load->library('user_agent');
		$data = array(
		'pt_user_id'=>$this->session->userdata('user_login_id'),
		'program_id'=>$pid,
		'device_id'=>$this->agent->platform().'-'.$this->agent->browser(),
		'touch_time' => date('Y-m-d H:i:s'));
		$this->db->insert('program_touch', $data);
		
	}
	function pcopy($pid)
	{
	    
	    
	    
	    $this->db->select('*');
	    $this->db->limit(1);
	    $this->db->from('program_list');
	    $this->db->where('p_id',$pid);
	    $this->db->join('channels', 'channels.c_id = program_list.channel_id','left');
	    $this->db->join('actors', 'actors.a_id = program_list.program_actor_id','left');
	  
	    $query = $this->db->get();
	    if ($query->num_rows()>0)
	    {
		//	$data['banner']=$this->getWebBanner();
	        $data['category']=$this->getCategory();	
			
	        $data['programs']= $query->first_row();
	 
	      
	        $this->load->view('/web/newprogramcopy',$data);
	        
	        //print_r($query->result());
 	    }
	    
	}
	function donation()
	{
		$data['banner']=$this->getWebBanner();
		$data['category']=$this->getCategory();	  
		$this->load->view('web/donation',$data);
	}
	function about()
	{
		$data['banner']=$this->getWebBanner();
		$data['category']=$this->getCategory();	  
		$this->load->view('web/about',$data);

	}
}
?>