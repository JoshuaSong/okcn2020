<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vou_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

   /*
	Gets information about a particular user
	*/
	function getChannels()
	{
		$this->db->select('c_id, channel_title, channel_poster, COUNT(program_list.channel_id) AS count');
        $this->db->from('channels');
        $this->db->order_by('c_id');

		$this->db->join('program_list', 'channels.c_id = program_list.channel_id','left');
        $this->db->group_by('channels.channel_title');
		 
		$query = $this->db->get();
		if ($query->num_rows()>0)
		{
		$string="";
			foreach ($query->result() as $row)
			{
			$string .= "<li id='c".$row->c_id."' class='sb-close' poster='".$row->channel_poster."' onclick='menuclick(".$row->c_id.")' ><a href='#".$row->c_id."'>".$row->channel_title."  (".$row->count.")</a></li>";
				
			}
			return $string;
		}
	}
	
	function getTimeline($id)
	{
		$this->db->select('*');
		$this->db->limit(7);
        $this->db->from('timeline');
		$this->db->where('tl_id >=',$id);
        $this->db->join('program_list', 'program_list.p_id = timeline.program_id');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
        $query = $this->db->get();
		if ($query->num_rows()>0)
		{
			$string="[";
			foreach ($query->result() as $row)
			{
				
				$string .= "{title:'".$row->program_title."',";
				$string .= "mp3:'".$row->program_url."',";
				$string .= "artist:'".$row->actor_name."_".$row->start_time." ".$row->p_id."',";
				$string .= "poster:'".$row->channel_poster."'";
				$string .= "},";
			}
			rtrim($string, ",");
			$string .= "]";
			return $string;
	}
	}
	
	function getOnairPlaylistIos($id)
	{
		$this->db->select('*');
		$this->db->limit(7);
        $this->db->from('timeline');
		$this->db->where('tl_id >=',$id);
        $this->db->join('program_list', 'program_list.p_id = timeline.program_id');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
        $query = $this->db->get();
		if ($query->num_rows()>0)
		{
			$pidList="";
			$urlList="";
			$titleList="";
			$actorList="";
			$posterList="";
			$channelList="";
			$timeList="";
			foreach ($query->result() as $row)
			{
				$pidList=$pidList."'".$row->p_id."',";
				$urlList=$urlList."'".$row->program_url."',";
				$titleList=$titleList."'".$row->program_title."',";
				$actorList=$actorList."'".$row->actor_name."',";
				$posterList=$posterList."'".$row->channel_poster."',";
				$channelList=$channelList."'".$row->channel_title."',";
				$timeList=$timeList."'".$row->start_time."',";
			}
			$list=array();
			$list['pidList']=rtrim($pidList, ",");
			$list['urlList']=rtrim($urlList, ",");
			$list['titleList']=rtrim($titleList, ",");
			$list['actorList']=rtrim($actorList, ",");
			$list['posterList']=rtrim($posterList, ",");
			$list['channelList']=rtrim($channelList, ",");
			$list['timeList']=rtrim($timeList, ",");
			
			return $list;
	}	
		
		
	}
function getReplaylistIos($pid)
	{
	
		$this->db->limit(1);
		$this->db->where('p_id',$pid);
		$query = $this->db->get('program_list');
	//	$time= $query->first_row()->program_date;
		$cid=$query->first_row()->channel_id;
		
	//	$this->db->where('program_date',$time);
	    $this->db->where('channel_id',$cid);
		$this->db->where('p_id <=',$pid);
	    $this->db->limit(20);
		$this->db->order_by("p_id","desc");
		$this->db->from('program_list');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
        $query = $this->db->get();
		if ($query->num_rows()>0)
		{
			$pidList="";
			$urlList="";
			$titleList="";
			$actorList="";
			$posterList="";
			$channelList="";
			$timeList="";
			foreach ($query->result() as $row)
			{
				$pidList=$pidList."'".$row->p_id."',";
				$urlList=$urlList."'".$row->program_url."',";
				$titleList=$titleList."'".$row->program_title."',";
				$actorList=$actorList."'".$row->actor_name."',";
				$posterList=$posterList."'".$row->channel_poster."',";
				$channelList=$channelList."'".$row->channel_title."',";
				$timeList=$timeList."'".$row->program_date."',";
			}
			$list=array();
			$list['pidList']=rtrim($pidList, ",");
			$list['urlList']=rtrim($urlList, ",");
			$list['titleList']=rtrim($titleList, ",");
			$list['actorList']=rtrim($actorList, ",");
			$list['posterList']=rtrim($posterList, ",");
			$list['channelList']=rtrim($channelList, ",");
			$list['timeList']=rtrim($timeList, ",");
			
			return $list;
	}	
		
		
	}


function getFirstProgram($pid)
	{
		
		
		$this->db->where('p_id',$pid);
		$this->db->from('program_list');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
		 $query = $this->db->get();
		 if ($query->num_rows()>0)
		 {
		 	$row = $query->first_row();
		
			return $row;
		 }
		
		

	}	
	
	function getFirst($time)
	{
		
		$time1=$this->getFixedTime($time);
		$this->db->select('*');
		$this->db->limit(1);
	    $this->db->from('timeline');
		$this->db->where('start_time <',$time1);
		$this->db->order_by("start_time", "desc"); 
		$this->db->join('program_list', 'program_list.p_id = timeline.program_id');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
		 $query = $this->db->get();
		 if ($query->num_rows()>0)
		 {
		 	$row = $query->first_row();
		//	print_r($row);
		//	echo $row->channel_title;
			return $row;
		 }
		// echo $this->getSS($row->start_time, $time);
		

	}
	
	function getFixedTime($time)
	{
		$this->db->order_by("start_time", "desc"); 
		$this->db->where('start_time >',$time);
		$query=$this->db->get('timeline');
		 if ($query->num_rows()>0)
		 {
		 	return $time;
		 }
		 else {
			 $time1 = strtotime($time);
              return date('Y-m-d h:i:s',strtotime('-1 day',  $time1));
		 }
		

	}
	function getSS($time1,$time2)
	{
		$p1 = explode(":",$time1);
		$p2 = explode(":",$time2);
		return	($p2[1]-$p1[1])*60+($p2[2]-$p1[2]);
		
	}
		function getPlaylist($pid,$time)
	{
		$this->db->select('*');
        $this->db->from('program_list');
		$this->db->where('program_date',$time);
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
		 $query = $this->db->get();
		if ($query->num_rows()>0)
		{
		$first="";
		$string="";
		 foreach ($query->result() as $row)
			{
				if($row->p_id==$pid)
				{
					$first .= "{title:'".$row->program_title."',";
				$first .= "mp3:'".$row->program_url."',";
				$first .= "artist:'".$row->actor_name."_".$row->program_date." ".$row->p_id."',";
				$first .= "poster:'".$row->channel_poster."'";
				$first .= "},";
				}
				else{
				$string .= "{title:'".$row->program_title."',";
				$string .= "mp3:'".$row->program_url."',";
				$string .= "artist:'".$row->actor_name."_".$row->program_date." ".$row->p_id."',";
				$string .= "poster:'".$row->channel_poster."'";
				$string .= "},";
				}
				
			}
			return '['.$first.$string.']';
		}
		
	}
function getRePlaylist01($pid,$time)
	{
		$this->db->select('*');
        $this->db->from('program_list');
		$this->db->where('program_date',$time);
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
		 $query = $this->db->get();
		if ($query->num_rows()>0)
		{
		$first="";
		$string="";
		 foreach ($query->result() as $row)
			{
				if($row->p_id==$pid)
				{
					$first=$this->row2str($row);
				}
				else{
					$string=$string.$this->row2str($row);
				}
				
			}
			return '['.$first.$string.']';
		}
		
	}
	function getRePlaylistDate($pid,$time)
	{
		$this->db->select('*');
        $this->db->from('program_list');
		$this->db->where('program_date',$time);
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
		 $query = $this->db->get();
		if ($query->num_rows()>0)
		{
		$first="";
		$string="";
		 foreach ($query->result() as $row)
			{
				if($row->p_id==$pid)
				{
					$first=$this->row2str($row);
				}
				else{
					$string=$string.$this->row2str($row);
				}
				
			}
			return '['.$first.$string.']';
		}
		
	}
	function getRePlaylist($pid,$cid)
	{
		$this->db->select('*');
        $this->db->from('program_list');
		$this->db->where('p_id >=',$pid);
		$this->db->where('channel_id',$cid);
		$this->db->limit(20);
		$this->db->order_by("p_id");
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
		 $query = $this->db->get();
		if ($query->num_rows()>0)
		{
		$first="";
		$string="";
		 foreach ($query->result() as $row)
			{				
					$string=$string.$this->row2str($row);
			}
			
		}
		if($query->num_rows()<20)
		{
			$string=$string.$this->last_record_time($cid);
		}
		return '['.$string.']';
		
		
	}
	public function last_record_time($cid)
{
	$lastTime='';
	$this->db->from('program_list');
	$this->db->where('channel_id',$cid);
	$this->db->limit(1);
	$this->db->order_by("p_id","desc");
	 $query = $this->db->get();
	  if ($query->num_rows()>0)
	  {
	  $lastTime=$query->first_row()->program_date;
	  $this->db->from('program_list');
	  $this->db->where('program_date',$lastTime);
	  $this->db->join('channels', 'program_list.channel_id = channels.c_id');
		$this->db->join('actors', 'program_list.program_actor_id = actors.a_id');
	   $query = $this->db->get();
	   if ($query->num_rows()>0)
	   {
	   	$string="";
		 foreach ($query->result() as $row)
			{
					$string=$string.$this->row2str($row);
			}
			return $string;
	   }
	  }
   }   
	function getRePlaylistTest($pid,$cid)
	{
		
	}
	function row2str($row)
	{
		$str="";
		$str .= "{title:'".$row->program_title."',";
	//	$str .= "id:'".$row->p_id."',";
		$str .= "mp3:'".$row->program_url."',";
		$str .= "artist:'".$row->actor_name."',";
		$str .= "date:'".$row->program_date."',";
		$str .= "pid:'".$row->p_id."',";
		if($this->checkiliked($row->p_id))
					{
						$str .= "like:'true',";
					}else{
						$str .= "like:'false',";
					}
		$str .= "poster:'".$row->channel_poster."'";
		$str .= "},";
		
		return $str;
		
		
	}
	function checkiliked($pid)
	{
		$return=false;
			$this->db->limit(1);
			$this->db->where('program_id',$pid);
			$this->db->where('program_id',$pid);
			 $query = $this->db->get('program_like');
			  if ($query->num_rows()>0)
		 {
		 	$return=true;
			
		 }
			return $return;
	   
		
		
	}
	function commentindex()
	{
		
		$this->db->order_by('cm_id','DESC');
		$this->db->limit(50);
		$query=$this->db->get('comments');
		
		if ($query->num_rows() > 0)
		{
			$sb = "";
			
			foreach ($query->result() as $row)
			{
			
			
			$sb.='<span>'.mb_substr($row->contents, 0, 30).'...</span>';
			}
			
			return $sb;
 
		}
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
	
}