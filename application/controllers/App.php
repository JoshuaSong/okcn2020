<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->CI = & get_instance();
    $this->load->helper('url');
    $this->load->model('okcn_model');
    $this->load->model('Aws_model');
  }
  public function iospolicy()
  {
    $this->load->view('/app/iospolicy');
  }
  
  public function gettimezone()
  {
    if($this->session->userdata('user_time_zone'))
    {
      date_default_timezone_set($this->session->userdata('user_time_zone'));
    }
    echo date_default_timezone_get();
  }
  public function index()
{
  
    $data['topsliders'] = $this->getslider(1);
    $data['sliders'] = $this->getslider(2);
    $data['today'] = $this->gettodaytimeline();
    $data['todayprayer']=$this->gettodayprayer();
    $data['todayvideo']= $this->gettodayvideo();

    $this->load->view('app/home',$data);

 
 
}
public function home_b()
{

  
    $data['topsliders'] = $this->getslider(1);
    $data['sliders'] = $this->getslider(2);
    $data['today'] = $this->gettodaytimeline();
    $data['todayprayer']=$this->gettodayprayer();
    $data['todayvideo']= $this->gettodayvideo();

    $this->load->view('app/app_tab_home',$data);

 
}
public function home($uid=null)
{
  if($uid != null)
  {
    $memberq = $this->db->limit(1)->where('users_id',$uid)->get('members_main');
    $query = $this->db->limit(1)->where('id',$uid)->get('users_main');
    if($query->num_rows()>0)
    {
      $user = $query->first_row();
      $data['user'] =  $user;
     
      date_default_timezone_set($user->timezone);
      $this->session->set_userdata('user_time_zone', $user->timezone); 
      $this->session->set_userdata('user_login_id', $user->id);
    }
    
   
    if($memberq->num_rows()>0)
    {
      $data['member'] = $memberq->first_row();
    }
   
  }
  $data['todayvideo']= $this->gettodayvideo();
    $data['banners'] = $this->getbanner();
    $data['today'] = $this->gettodaytimeline();
    $data['todayprayer']=$this->gettodayprayer();
   

    $this->load->view('app/app_tab_home',$data);

 
}

public function homemore()
{
  $data['todayvideo']= $this->gettodayvideo();
  $this->load->view('app/app_tab_home_more',$data);

}
public function share($uid=null)
{
  if($uid != null)
  {
   // $memberq = $this->db->limit(1)->where('users_id',$uid)->get('members_main');
    $query = $this->db->limit(1)->where('id',$uid)->get('users_main');
    if($query->num_rows()>0)
    {
    $data['user'] = $query->first_row();
    }
   // if($memberq->num_rows()>0)
   // {
  //    $data['member'] = $memberq->first_row();
   // }
   
  }
  $data['comments'] = $this->getcomments();
  $this->load->view('app/app_tab_share',$data);

}
public function morechannelprogram($cid,$pid,$pcount)
{
  $data['count'] =intval($pcount) - 1;
  $data['program'] =  $this->getMoreChannelProgram($cid,$pid,$pcount);
  $this->load->view('app/app_more_channelprogram',$data);
}
public function morecomment($uid,$cmid)
{
  if($uid != null)
  {
    $memberq = $this->db->limit(1)->where('users_id',$uid)->get('members_main');
    $query = $this->db->limit(1)->where('id',$uid)->get('users_main');
    $data['user'] = $query->first_row();
    if($memberq->num_rows()>0)
    {
      $data['member'] = $memberq->first_row();
    }
   
  }
  $data['comments'] =  $this->getcommentsfrom($cmid);
  $this->load->view('app/app_more_comment',$data);
}

public function bible()
{
 

  $this->load->view('app/app_tab_bible');

}



public function profile($uid)
{
  $memberq = $this->db->limit(1)->where('users_id',$uid)->get('members_main');
  if($memberq->num_rows() > 0)
  {
    redirect('/app/member/'.$uid); 
  }else{
    $query = $this->db->limit(1)->where('id',$uid)->get('users_main');
    $data['user'] = $query->first_row();
    $data['recent'] = $this->getRecentPrograms();
    $this->load->view('app/app_tab_profile',$data);
  
  }

}
public function member($uid)
{
  $memberq = $this->db->limit(1)->where('users_id',$uid)->get('members_main');
  $query = $this->db->limit(1)->where('id',$uid)->get('users_main');
  $data['user'] = $query->first_row();
  if($memberq->num_rows()>0)
  {
    $data['member'] = $memberq->first_row();
  }
  $data['recent'] = $this->getRecentPrograms();
  $data['messages'] = $this->getMessages($memberq->first_row()->id);
  $this->load->view('app/app_tab_member',$data);

}

public function channeltab($cid)
{
  $data['channel'] = $this->getChannelByChannelID($cid);
  $data['programs'] = $this->getProgramsByChannelID($cid);
  $this->load->view('app/app_tab_channel',$data);
}
public function dateprogramtab($date)
{
  $data['programs'] = $this->getProgramsByDate($date);
  $this->load->view('app/app_tab_date_program.php',$data);
}

public function channel($cid)
{
  $data['channel'] = $this->getChannelByChannelID($cid);
  $data['programs'] = $this->getProgramsByChannelID($cid);
  $this->load->view('app/channel_page',$data);
}

public function biblebooklist($lang,$ot,$nt)
{
$data['booklist'] = $this->getBibleBook($lang,$ot,$nt);
  $this->load->view('app/biblebook_page',$data);
}
public function biblebooklistweb($lang,$ot,$nt)
{
$data['booklist'] = $this->getBibleBook($lang,$ot,$nt);
  $this->load->view('app/biblebook_page_web',$data);
}
public function bibleversionlist()
{
  $data['versions'] = $this->getBibleVersion();

  $this->load->view('app/bibleversion_page',$data);
}
public function bibleversionlistweb()
{
  $data['versions'] = $this->getBibleVersion();

  $this->load->view('app/bibleversion_page_web',$data);
}
public function prayer($pid)
{
  $data['prayer'] = $this->gettodayprayerByPid($pid);
  $data['participate'] = $this->getParticipateByPid($pid);
 
  $this->load->view('app/prayer_page',$data);
}

public function prayertab($uid,$pid)
{
  $query = $this->db->limit(1)->where('id',$uid)->get('users_main');
  $user = $query->first_row();
  $data['user'] =  $user;
  
  $data['prayer'] = $this->gettodayprayerByPid($pid);
  $data['participate'] = $this->getParticipateByPid($pid);
  $data['music'] = $this->getPrayerMusic();
 
  $this->load->view('app/app_tab_prayer',$data);
}
public function index1()
{
 // echo "index";
 $data['topsliders'] = $this->getslider(1);
 $data['sliders'] = $this->getslider(2);
  $data['today'] = $this->gettodaytimeline();
  $this->load->view('app/index2',$data);
}


public function tabviewshare()
{
  $data['comments'] = $this->getcomments();
  $this->load->view('app/tabview_share',$data);

}

public function tabviewbible()
{

  $this->load->view('app/tabview_bible');

}
public function tabviewmember()
{
  $data['recent'] = $this->getRecentPrograms();
  $this->load->view('app/tabview_member',$data);

}
public function tabviewplay($cID = null, $programID = null)
{
  $data['recent'] = $this->getRecentPrograms();
  $this->load->view('app/tabview_play',$data);

}

public function tabviewsettings()
{
  $data['recent'] = $this->getRecentPrograms();
  $this->load->view('app/tabview_settings',$data);

}

public function namepage()
{
  $this->load->view('app/name_page');
}


public function newmemberpage()
{
  $this->load->view('app/newmember_page');
}

public function memberidpage()
{
  $this->load->view('app/memberid_page');
}



function player($cid,$pid)
{
  $data['channel'] = $this->getProgramsByCPid($cid,$pid);
  $this->load->view('app/player_page',$data);
}
function playerios($cid,$pid)
{
  $data['channel'] = $this->getProgramsByCPid($cid,$pid);
  $this->load->view('app/player_page_ios',$data);
}

function bibleaudio($vid,$bid,$cid,$rate=null)
{
  $this->touchBible($vid,$bid,$cid);
  if($rate==null)
  {
    $rate = '1';
  }
  $data['rate'] = $rate;
  $data['channel'] = $this->getBibleByVBCid($vid,$bid,$cid);
  $this->load->view('app/bible_audio_page',$data);
}


function touchBible($vid,$bid,$cid)
{
  $data['vid'] = $vid;
  $data['bid'] = $bid;
  $data['cid'] = $cid;
  $data['user_id'] = $this->session->userdata('user_login_id');
  $this->db->insert('bible_touch', $data);

}


function getMessages($mid)
{
  $this->db->select('message.id,contents,create_time,to_member_id,from_member_id,fromuser.user_name as fromusername,touser.user_name as tousername');
$this->db->where('message.status',0);
$this->db->where('to_member_id',0);
$this->db->or_where('to_member_id',$mid);
$this->db->or_where('from_member_id',$mid);
$this->db->order_by('message.id','desc');
$this->db->from('message');
$this->db->join('members_main as tomember', 'tomember.id = message.to_member_id', 'left');
$this->db->join('users_main as touser', 'touser.id = tomember.users_id', 'left');
$this->db->join('members_main as frommember', 'frommember.id = message.from_member_id', 'left');
$this->db->join('users_main as fromuser', 'fromuser.id = frommember.users_id', 'left');

$query = $this->db->get();
return $query->result();
}



function getBibleByVBCid($vid,$bid,$cid){

  $v = $this->db->limit(1)->where('id',$vid)->get('bible_version');
	$version = $v->first_row();
	$b = $this->db->limit(1)->where('book_id',$bid)->where('lang',$version->book_lang)->get('bible_book');
	$book = $b->first_row();
	$row=array();
	

		$row["category_image"] = $book->image;
		$row["radio_name"] = $book->name.' '.$cid;
    $row["channel_name"] = $version->name;
    return $row;
		
}

function getProgramsByCPid($cid,$pid)
{
  $this->db->select('program_list.p_id as pid, program_list.program_info as description, program_list.channel_id as cid,  channels.channel_poster as category_image,
  program_list.program_title as radio_name,channels.channel_title as channel_name, program_list.program_date');

  $this->db->from('program_list');
  $this->db->where('program_list.p_id', $pid);
  $this->db->limit(1);
  $this->db->join('channels', 'channels.c_id = program_list.channel_id');
  
  $query = $this->db->get();
  if ($query->num_rows() > 0) {
    return $query->first_row();
   
  }
}


public function getBibleBook($lang,$ot,$nt)
{
  if($ot==0 && $nt==1)
  {
    $this->db->where('book_id >',39);
  }
  if($ot==1 && $nt==0)
  {
    $this->db->where('book_id <',40);
  }
  $this->db->where('lang',$lang);
  $this->db->order_by('book_id');
  $q = $this->db->get('bible_book');
  return $q->result();

}

public function getbookname($bid,$lang)
{
  $this->db->where('lang',$lang);
  $this->db->where('book_id',$bid);
  $this->db->limit(1);
  $q = $this->db->get('bible_book');
 echo $q->first_row()->name;
 // print_r($q->result());
}

public function getBibleVersion()
{
  $this->db->order_by('order');
  $q = $this->db->get('bible_version_lang');
  
  $array = array();
  foreach($q->result() as $row)
  {
    $row->versions = $this->getBibleVersionByLang($row->lang);
    array_push($array,$row);
  }
  return $array;
 
}
public function getBibleVersionByLang($lang)
{
  $this->db->where('lang',$lang);
 
  $q = $this->db->get('bible_version');
  return $q->result();

}


public function userLogin($os,$did,$token)
{
 // if($this->checkuserLogin($did))
 if($this->session->userdata('user_login_id'))
  {
   
  $this->userLoginTimeInsert();
    
  } else 
  {
    $this->userLoginInsert($os,$did,$token);
  }
}
public function checkuserLogin($did)
{
  $this->db->where('device_id',$did);
  $this->db->limit(1);
  $q = $this->db->get('users_main');
  if($q->num_rows() > 0)
  {
    $userid = $q->first_row()->id;
    $this->session->set_userdata('user_login_id', $userid);
    return $userid;
  }else{
    return false;
  }

}
public function userLoginTimeInsert()
{
  $data['ip'] = $this->input->ip_address();

  $data['login_user_id'] = $this->session->userdata('user_login_id');
 
  $this->db->insert('login_user_time', $data);

}
public function userLoginInsert($os,$did,$token)
{
  $ip = $this->input->ip_address();
  $city = "https://208753:R450ssQTMZHtc5cb@geoip.maxmind.com/geoip/v2.1/city/".$ip;
  $file=file_get_contents($city);
  $arr = json_decode($file, true);
  if(isset($arr))
  {
    $data['os_type'] = $os;
   $data['device_id'] = $did;
   $data['token'] = $token;
   $data['user_ip'] = $this->input->ip_address();
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
   

   $loginedID = $this->checkuserLogin($did);
   if($loginedID)
   {
     $this->db->where('id',$loginedID);
     $this->db->update('users_main', $data);
     $this->session->set_userdata('user_login_id', $loginedID);
   }else{
    $this->db->insert('users_main', $data);
    $this->session->set_userdata('user_login_id', $this->db->insert_id());
   }
  
  }
 
  $this->session->set_userdata('user_time_zone', $arr['location']['time_zone']);
  $this->session->set_userdata('country', $arr['country']['iso_code']); 
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
    $row = $query->first_row();
    if($row->channel_info != null && $row->channel_info != "")
        {
          $row->summary = strip_tags($row->channel_info);
          preg_match_all( '@src="([^"]+)"@' , $row->channel_info, $match );
          $row->channel_info = array_pop($match);
          
        }
        $row->count = $this->getChannelProgramCount($cid);

        
        return $row;
	
	
  }
  
  public function getChannelProgramCount($cid)
  {
    $this->db->where('channel_id',$cid);
    $query = $this->db->get('program_list');
    return $query->num_rows();
  }
	public function getProgramsByChannelID($cid)
	{
    if($this->session->userdata('user_time_zone'))
    {
      date_default_timezone_set($this->session->userdata('user_time_zone'));
    }
	  $now = new DateTime();
	  $this->db->where('channel_id',$cid);
	  $this->db->where('program_date <=',date_format($now,"Y-m-d"));
    $this->db->order_by('program_date','desc');
    $this->db->limit(20);
	  $query = $this->db->get('program_list');
	  return $query->result();
	
  }
  public function getProgramsByDate($date)
	{
    if($this->session->userdata('user_time_zone'))
    {
      date_default_timezone_set($this->session->userdata('user_time_zone'));
    }
    $now = new DateTime();
    $this->db->select('program_date, channel_title, program_title');
    $this->db->where('program_date <',date_format($now,"Y-m-d"));
    $this->db->where('program_date >=',$date);
    $this->db->order_by('program_date');
    $this->db->from('program_list');
    $this->db->join('channels', 'channels.c_id = program_list.channel_id');
	  $query = $this->db->get();
	  return $query->result();
	
  }
  public function getMoreChannelProgram($cid,$pid)
	{
    $this->db->where('channel_id',$cid);
    $this->db->where('p_id <',$pid);
    $this->db->limit(20);
    $this->db->order_by('p_id','desc');
    $q = $this->db->get('program_list');
    return $q->result();
    
	
	}
  public function getRecentPrograms()
	{
    if($this->session->userdata('user_time_zone'))
    {
      date_default_timezone_set($this->session->userdata('user_time_zone'));
    }
	  $now = new DateTime();
	  
	  $this->db->where('program_date <',date_format($now,"Y-m-d"));
    $this->db->order_by('program_date','desc');
    $this->db->limit(10);
    $this->db->from('program_list');
    $this->db->join('channels', 'channels.c_id = program_list.channel_id');
	  $query = $this->db->get();
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

  public function getbanner()
	
	{
	
		$this->db->order_by('order');
		$query =  $this->db->get('banners');
		if ($query->num_rows()>0)
		{
			return $query->result();
		}
	}



public function userdata()
{
 // $this->session->sess_destroy();
//  foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
  print_r($this->session->userdata);
//  print_r($this->gbs_model->gethighlight(1));
}

public function logout()
{
 // $this->session->sess_destroy();
  foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
  print_r($this->session->userdata);
//  print_r($this->gbs_model->gethighlight(1));
}
public function catalog()
{
  $this->load->view('app/catalog');
}

public function gettodaytimeline()
{
  
  if($this->session->userdata('user_time_zone'))
  {
    date_default_timezone_set($this->session->userdata('user_time_zone'));
  }
      $now = new DateTime();
      $week =$now->format('N') % 7;
     


  $this->db->select('timetable.*,channels.*');
  $this->db->where('week_day',$week);
 
  $this->db->order_by('start_time');
  $this->db->from('timetable');
 
$this->db->join('channels', 'channels.c_id = timetable.cid'); 

  
     $query = $this->db->get();
    $array = array();
     if($query->num_rows() > 0)
     {
       foreach($query->result() as $row)
       {
        if($row->channel_info != null && $row->channel_info != "")
        {
          $row->summary = strip_tags($row->channel_info);
          preg_match_all( '@src="([^"]+)"@' , $row->channel_info, $match );
          $row->channel_info = array_pop($match);

        }
         $row->programs = $this->getProgramByChannelIddate($row->cid,date_format($now,"Y-m-d"));
         array_push($array,$row);
       }
        // print_r($array);
         return $array;
     }

}

public function getProgramByChannelIddate($cid,$time)
{
  $this->db->where('channel_id',$cid);
  $this->db->where('program_date',$time);
  $this->db->limit(1);
  $query = $this->db->get('program_list');	
  if($query->num_rows() > 0)
  {
     $row = $query->first_row();
     if($row->program_info != null && $row->program_info != "")
     {
      $row->summary = strip_tags($row->program_info);
      
      preg_match_all( '@src="([^"]+)"@' , $row->program_info, $match );

      $row->program_info = array_pop($match);
     }
     return $row;
     
  }
}
public function getcomments()
{
  $this->db->limit(10);
  $this->db->order_by('cm_id','desc');
  $this->db->from('comments');
  $this->db->join('members_main','comments.user_id = members_main.id');
  $q = $this->db->get();
  return $q->result();

}
public function getcommentsfrom($cmid)
{
  $this->db->where('cm_id <',$cmid);
  $this->db->limit(10);
  $this->db->order_by('cm_id','desc');
  $this->db->from('comments');
  $this->db->join('members_main','comments.user_id = members_main.id');
  $q = $this->db->get();
  return $q->result();
}
public function gettodayprayer()
{
  $this->db->order_by('prayer_date','desc');
  $this->db->limit(5);
  $query = $this->db->get('today_prayer');
  return $query->result();
  
}
public function gettodayprayerByPid($pid)
{
  $this->db->where('id',$pid);
  $this->db->limit(1);
  $query = $this->db->get('today_prayer');
  return $query->first_row();
  
}

public function getPrayerMusic()
{
   $this->db->where('channel_id',66);
  $this->db->limit(1);
  $this->db->order_by('p_id','RANDOM');
  $query = $this->db->get('program_list');
  return $query->first_row();
}
public function getParticipateByPid($pid)
{
  $this->db->select('prayer_userid,image,user_name');
  $this->db->where('today_prayer_id',$pid);
  $this->db->from('today_prayer_participate');
  $this->db->join('members_main','members_main.id = today_prayer_participate.prayer_mid');
  $this->db->join('users_main','users_main.id = today_prayer_participate.prayer_userid');
  $query = $this->db->get();
  if($query->num_rows()>0)
  {  $array=array();
    foreach($query->result() as $row)
  {
   $image = $row->image;
   if(!isset($image))
   {
     $row->image = 'avatar.jpg';
   }
    array_push($array,$row);
  }
    return $array;
  }else {
    return "none";
  }
}

public function addoneprayer()
{
  $uid =  $this->input->post('userid');
  $mid = 0;
  $memberq = $this->db->limit(1)->where('users_id',$uid)->get('members_main');

  if($memberq->num_rows()>0)
  {
    $mid = $memberq->first_row()->id;
    $data["prayer_mid"] = $mid;
  }
  $data["prayer_userid"] = $uid;
  $data["prayer_name"] = $this->input->post('username');
  $data["today_prayer_id"] = $this->input->post('tpid');
  $this->db->insert('today_prayer_participate', $data);
  $memberq1 = $this->db->limit(1)->where('id',$mid)->get('members_main');
  echo $memberq1->first_row()->image;
}


public function gettodayvideo()
{
  $this->db->order_by('video_date','desc');
  $this->db->where('status',0);
  $this->db->limit(20);
  $query = $this->db->get('youtube_video');
  return $query->result();
  
}




public function postusername($uid)
{
  $data['user_name'] = $this->input->post('user_name');
  $this->db->where('id',$uid);
  $this->db->update('users_main', $data);
 

  echo "done";

}


public function postemail($mid)
{
  $email = $this->input->post('email');
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "invalid";
  } else{
    $data['email'] = $email;
    $this->db->where('id',$mid);
    $this->db->update('members_main', $data);
   
  
    echo "done";
  }
  

}




////发送认证码

public function sendsms()
{
  $phone = $this->input->post('phone');
  $country =  $this->input->post('country');
  $sixdigit = mt_rand(100000, 999999);
  $this->session->set_flashdata('sixcode', $sixdigit);
  $this->session->set_userdata('tem_phone',  $phone);
  $this->session->set_userdata('country_code', $country);
 $number = $country.$phone;

  $message = 'OKCN Radio 에서 인증번호를 보냅니다.'.$sixdigit;
  $this->session->set_flashdata('sixcode', $sixdigit);
  $this->Aws_model->SendAwsSms($number, $message);
  echo 'done' ;

}
public function confirmcode($uid)
{
  if($this->session->flashdata('sixcode'))
  {
    
    if($this->session->flashdata('sixcode') == $this->input->post('code'))
    {
     $phone = $this->session->userdata('tem_phone');
     $country = $this->session->userdata('country_code');
     $this->session->set_userdata('phone', $phone);
     

      $data['users_id'] = $uid;
      $data['phone'] = $phone;
      $data['phone_code'] = $country; 
      $member = $this->checkUserByPhone($phone,$country);
      if($member == "none")
      {
        $this->db->insert('members_main', $data);
    
      }else
      {
        $mid = $member->id;
        $data['users_id'] = $uid;
        $this->db->where('id',$mid);
        $this->db->update('members_main', $data);

      }
      header("Content-type:application/json");
      echo json_encode(['status' => 'success', 'name' => $phone]);

    }else

    {
      $this->session->set_flashdata('sixcode', $this->session->flashdata('sixcode'));
      echo json_encode(['status' => 'wrongcode']);

    }

  }
  else{
    $this->session->set_flashdata('sixcode', $this->session->flashdata('sixcode'));
    echo json_encode(['status' => 'expired']);
  }
}


public function checkUserByPhone($phone,$country)
{
  $this->db->where('phone',$phone);
  $this->db->where('phone_code',$country);
  $this->db->limit(1);
  $query = $this->db->get('members_main');
  if($query->num_rows()>0)
  {
    return $query->first_row();
   
  }else{
    return "none";
  }
}
public function appLoginTest()
{
  $did = $this->input->post('did');
  echo $did;
}

public function appLogin()
{
  $ip = $this->input->ip_address();
  $did = $this->input->post('did');
  $os = $this->input->post('os');
  
 if (isset($did))
  {
     $this->db->where('device_id',$did);
     $this->db->limit(1);
      $query = $this->db->get('users_main');
      if($query->num_rows() > 0)
      {
        $uid = $query->first_row()->id;
        $data['ip'] = $ip;
        $data['login_user_id'] = $uid;
        $this->db->insert('login_user_time', $data);
        echo $uid;
       } else {
       //23.83.185.26
        $city = "https://208753:R450ssQTMZHtc5cb@geoip.maxmind.com/geoip/v2.1/city/".$ip;
        $file=file_get_contents($city);
        $arr = json_decode($file, true);
        if(isset($arr))
        {
         $data['os_type'] = $os;
         $data['device_id'] = $did;
         $data['user_ip'] = $ip;
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
        
         $this->db->insert('users_main', $data);
        
         $uid = $this->db->insert_id();
        }   
      
        echo $uid;
      }
     
}
}

public function appResigterToken()
{
  $token = $this->input->post('token');
  $did = $this->input->post('did');
  
  if (isset($did) && isset($token))
  {
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
     
}
}

public function androidLogin()
{
 


     $token = $this->input->post('rid');
     $did = $this->input->post('did');
     $uid = "";
  if(isset($did) && isset($token))
  {
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
   
        $city = "https://208753:R450ssQTMZHtc5cb@geoip.maxmind.com/geoip/v2.1/city/".$ip;
        $file=file_get_contents($city);
        $arr = json_decode($file, true);
        if(isset($arr))
        {
         $data['os_type'] = $os;
         $data['device_id'] = $did;
         $data['token'] = $token;
         $data['user_ip'] = $this->input->ip_address();
         $data['city'] = $arr['city']['names']['en'];
         $data['country'] = $arr['country']['names']['en']; 
         $data['country_code'] = $arr['country']['iso_code']; 
         $data['zip_code'] = $arr['postal']['code']; 
         $data['region_name'] = $arr['subdivisions'][0]['names']['en'];
         $data['network'] = $arr['traits']['autonomous_system_organization'];
         $data['timezone'] = $arr['location']['time_zone'];
        
         $this->db->insert('users_main', $data);
        
         $uid = $this->db->insert_id();
        }
       
        $this->session->set_userdata('user_time_zone', $arr['location']['time_zone']);
        $this->session->set_userdata('country', $arr['country']['iso_code']); 
        $this->session->set_userdata('user_login_id', $uid);
        echo $uid;
      }
     
}
}


function getbible()
{
 $array =  json_decode(file_get_contents('http://jswaw.com/home/getbible'));
 foreach($array as $row)
 {
   $q = $this->db->where('book_id',$row->order)->where('lang','tw')->limit(1)->get('bible_book');
   $data['image']= $row->image;
   $this->db->where('id',$q->first_row()->id);
   $this->db->update('bible_book',$data);

 

 }
 
}
public function upload_image($uid)
        {
                $config['upload_path']          = './images/profile';
                $config['allowed_types']        = 'gif|jpg|jpeg|png|JPG|JPEG|PNG|GIF';
                $config['max_size']             = 9000;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;
                $new_name = $uid.'_'.time();
                $config['file_name'] = $new_name;
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                   // $error = array('error' => $this->upload->display_errors());
                   echo $this->upload->display_errors();
          
                }
                else
                {
                    $this->do_resize($this->upload->data('file_name'),$this->upload->data('image_type'));
                    $data['image']= $this->upload->data('file_name');
                    $this->db->where('users_id',$uid);
                    $this->db->update('members_main',$data);
                    echo $this->upload->data('file_name');
                   
                
                 
                }
        }
        public function do_resize($filename,$image_type)
        {
           $this->load->library('image_lib');
            $source_path =  'images/profile/'.$filename;
            $target_path =  'images/thumb/'.$filename;
            if($image_type!='png'){
                
                 $imgdata = exif_read_data('images/profile/'.$filename, 'IFD0');
               //  print_r($imgdata);
            }
           
            $data = getimagesize($source_path);
            $width = $data[0];
            $height = $data[1];
        if ($width < $height) {
             $c_width = $width;
             $c_height = $width;
             $x_axis = 0;
             $y_axis = (($height / 2) - ( $c_height / 2));
        }
        else {
            
            $c_width = $height;
            $c_height = $height;
            $y_axis = 0;
            $x_axis = (($width / 2) - ( $c_width / 2));
          
        }
        
            $config_manip = array(
        
                'image_library' => 'gd2',
                'source_image' => $source_path,
                'new_image' => $target_path,
                'master_dim' => 'auto',
                'maintain_ratio' => FALSE,
                'width' =>  $c_width,
                'height' =>  $c_height,
                'x_axis' =>   $x_axis,
                'y_axis' =>   $y_axis
                
            );
          
            $this->image_lib->initialize($config_manip);
        
            $this->load->library('image_lib', $config_manip);
        
        
            if (!$this->image_lib->crop()) {
               //  $error = $this->image_lib->display_errors();
                
               
            }else{
                 $this->image_lib->clear();
                 unset($config_manip);
                 
                  if($image_type!='png' && is_array($imgdata) ){
                      if(array_key_exists('Orientation',$imgdata)){
                  $config=array();
        
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = 'images/thumb/'.$filename;
        
        
                        switch($imgdata['Orientation']) {
                            case 3:
                                $config['rotation_angle']='180';
                                break;
                            case 6:
                                $config['rotation_angle']='270';
                                break;
                            case 8:
                                $config['rotation_angle']='90';
                                break;
                        }
        
                        $this->image_lib->initialize($config); 
                        $this->image_lib->rotate();
                  }
                  }
        
            $config_rs = array(
        
                'image_library' => 'gd2',
                'source_image' => 'images/thumb/'.$filename,
                'new_image' => 'images/thumb_150/'.$filename,
                'maintain_ratio' => TRUE,
                'width' => 150,
                'height' => 150
            );
            $this->image_lib->initialize($config_rs);
            $this->load->library('image_lib', $config_rs);
        
        
            if (!$this->image_lib->resize()) {
              //  $error = $this->image_lib->display_errors();
                die();
            }
            }
        }

        function messagefromapp($mid)
        {
          $data['to_member_id'] = $this->input->post('tomember');
          $data['from_member_id'] = $mid;
          $data['contents'] = $this->input->post('message');
            
            
          $this->db->insert('message', $data); 
          header('Content-Type: application/json');
          echo json_encode('success');
        }

        function commentfromapp($uid)
        {
          $memberq = $this->db->limit(1)->where('users_id',$uid)->get('members_main');
          if($memberq->num_rows()>0)
          {
            $data['user_id'] = $memberq->first_row()->id;
          }
          else
          {
            $data['user_id'] = 1;
          }
          $data['contents'] = $this->input->post('message');
          $data['user_name'] = $this->input->post('username');
          $this->db->insert('comments', $data); 
          header('Content-Type: application/json');
          echo json_encode('success');

        }

        function bydatelistoneday($date)
	{
		
		$this->db->select('program_date,program_list.channel_id as cid, channels.channel_title as category_name, channels.channel_poster as category_image,
		program_list.p_id as id, program_list.program_title as radio_name, channels.channel_poster as radio_image, program_list.program_url as radio_url,actor_name');
      $this->db->from('program_list');
   
		$this->db->order_by('program_date','desc');
		$this->db->where('program_date >',$date);
	
		$this->db->join('channels', 'channels.c_id = program_list.channel_id');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id');
		
		$query = $this->db->get();
		$data=array();
		print_r($query->result());

	}

}
