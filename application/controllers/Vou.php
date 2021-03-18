<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vou extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		
				$this->db = $this->load->database('default', TRUE);
				$this->load->model('user_model');
		
		
	}
	public $starting = "0";
	public function index()
	{
		if($this->session->flashdata('starting'))
	{
		$stime=$this->session->flashdata('starting');
		
		$first=$this->getFirst($stime);
		$this->data['first']=$first;
		$this->data['starting']=$this->getSS($first->start_time,$stime);

		$this->data['playlist']=$this->getTimeline($first->tl_id);
		$this->data['channels']=$this->getChannels();
		$this->load->view('/includes/vou_onair_header',$this->data);
		$this->load->view('/vou/vou_body',$this->data);

	}
	else {
		$this->load->helper('url');
		redirect('http://okcnradio.org/vou/t');
		
	}
	}
	function table()
	{
		$this->load->view('/home/head_header');
	$this->load->view('/home/table');
	$this->load->view('/home/footer_foot');
	}
	
	function p($pid)
	{
		
		
		redirect('home/p/'.$pid); 
	//	$this->db->select('*');
	//	$this->db->limit(1);
     //   $this->db->from('program_list');
	//	$this->db->where('p_id',$pid);
	//	$this->db->join('channels', 'channels.c_id = program_list.channel_id','left');
	//	$this->db->join('actors', 'actors.a_id = program_list.program_actor_id','left');
	//	$this->db->join('timeline','timeline.program_id=program_list.p_id');
		//	$query = $this->db->get();
		//if ($query->num_rows()>0)
		//{
		
			//	$this->data['first']= $query->first_row();
			//	$this->data['channels']=$this->getChannels();
			//	$this->data['playlist']=$this->getTimeline($query->first_row()->tl_id);
		//		$this->data['playlist']=$this->getPlaylist($pid, $query->first_row()->program_date);
			//	$this->user_model->usertouch($pid);
		//		$this->load->view('/includes/vou_program_header',$this->data);
		//		$this->load->view('/vou/vou_body',$this->data);
			

		//}
		
	}
	function channel($cid)
	{
		$this->data['channels']=$this->getChannels();
		$this->data['cid']=$cid;
	
		$this->load->view('/vou/vou_channel_page',$this->data);
	}
	function papp($pid)
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
		
				$this->data['first']= $query->first_row();
				$this->data['channels']=$this->getChannels();
				$this->data['playlist']=$this->getPlaylist($pid, $query->first_row()->program_date);
				$this->load->view('/includes/vou_programapp_header',$this->data);
				$this->load->view('/vou/vou_body',$this->data);
			

		}
		
	}
	
	
		function t()
	{
	//	$this->user_model->usertouch(1);
		$this->load->view('vou/time');
		
	}
	
	function app($t)
	{
		$this->data['time']=$t;
		$this->load->view('/vou/app',$this->data);
	}
function apponair($time)
	{
		
		$first=$this->getFirst($time);
		$this->data['first']=$first;
		$this->data['starting']=$this->getSS($first->start_time,$time);

		$this->data['playlist']=$this->getTimeline($first->tl_id);
		$this->data['channels']=$this->getChannels();
	//	$this->user_model->usertouch(2);
		$this->load->view('/includes/vou_app_onair_header',$this->data);
		$this->load->view('/vou/vou_body',$this->data);
	}

	function test()
	{
		$this->db->select('*');
		$this->db->limit(1);
        $this->db->from('program_list');
		$this->db->where('p_id',170);
		$this->db->join('channels', 'channels.c_id = program_list.channel_id','left');
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id','left');
	//	$this->db->join('timeline','timeline.program_id=program_list.p_id');
			$query = $this->db->get();
		if ($query->num_rows()>0)
		{
		
				$this->data['first']= $query->first_row();
				$this->data['channels']=$this->getChannels();
			//	$this->data['playlist']=$this->getTimeline($query->first_row()->tl_id);
				$this->data['playlist']=$this->getPlaylist(170, $query->first_row()->program_date);
				
				$this->load->view('/includes/test_header',$this->data);
				$this->load->view('/vou/vou_body',$this->data);
			

		}
	}
	
	function testmypage()
	{
		$this->load->view('/vou/testmypage');
	}
	
	
	function g($post)
	{
	//	echo $post.'<br/>';
	//	$this->getFirst($post);
		
	//	print_r($this->getFirst($post));
		$this->load->helper('url');
		$this->session->set_flashdata('starting', $post);
		$next='http://okcnradio.org/vou';
		
		redirect($next,'refresh');
		
		
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
	function getfirststring($time)
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
			print_r($row);
		//	echo $row->channel_title;
		//	return $row;
		 }
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
	function getChannels()
	{
	//	$this->db->select('c_id, channel_title, channel_poster, COUNT(program_list.channel_id) AS count');
        $this->db->from('channels');
        $this->db->order_by('order_id');

	//	$this->db->join('program_list', 'channels.c_id = program_list.channel_id','left');
     //   $this->db->group_by('channels.channel_title');
		 
		$query = $this->db->get();
		if ($query->num_rows()>0)
		{
		$string="";
			foreach ($query->result() as $row)
			{
			$string .= "<li id='c".$row->c_id."' class='sb-close' poster='".$row->channel_poster."' onclick='menuclick(".$row->c_id.")' ><a href='#".$row->c_id."'>".$row->channel_title." </a></li>";
				
			}
			return $string;
		}
	}
	
	
	function c($cid)
	{
		$this->db->select('*');
        $this->db->from('channels');
		$this->db->where('c_id',$cid);
        $this->db->order_by('program_date','desc');

		$this->db->join('program_list', 'channels.c_id = program_list.channel_id','left');
		$this->db->where('program_date <=',date('Y-m-d'));
		$this->db->join('actors', 'actors.a_id = program_list.program_actor_id','left');

		 
		$query = $this->db->get();
		if ($query->num_rows()>0)
		{
			$this->data['channels']=$query->result();
			$this->load->view('vou/vou_channel',$this->data);
		
			

		}
	}
	
	function l()
	{
		
			$this->data['channels']=$this->getChannels();;
			$this->load->view('vou/list_channel',$this->data);
	
	}
	
	

	
	
	function fbshare()
	{
		$this->load->view('vou/fb');
	}
	
	
	function slider()
	{
		$this->load->view('vou/slider');
	}
	function playlist()
	{
		$this->load->view('vou/playlist');
	}
	function jm()
	{
		$this->load->view('vou/jm');
	}
	function jm1()
	{
		$this->load->view('vou/jm1');
	}
	function mmenu()
	{
		$this->load->view('vou/mmenu');
	}
	function slidebars()
	{
		$this->load->view('vou/slidebars');
	}
	function m()
	{
		$this->load->view('vou/site');
	}
	function init($init)
	{
		if($init=="time")
		{
			$this->load->view('vou/init');
			
		}
         else

		{
			$this->load->view('vou/site');
		} 
	}
	function gt($stating)
	{
		$this->load->view('vou/init');
		if($stating!="0")
		{
			$this->load->helper('url');
		$this->session->set_flashdata('starting', $stating);
		$next='http://okcnradio.org/vou';
		
		redirect($next,'refresh');
			
		}

		
		
		
		
	}
	function vv()
	{
	if($this->session->flashdata('starting'))
	{
		echo $this->session->flashdata('starting');
	}
	else {
		$this->load->helper('url');
		redirect('http://okcnradio.org/vou/v/0');
	}
	 
		
	}
	function db()
	{
		//$this->db->where('users_main_id',$uid);
	$this->db->limit(1);
	$query = $this->db->get('schedule');
	if ($query->num_rows()>0)
		{
			print_r($query->first_row('array')) ;
		}
	}
	function getSchedule($id)
	{
		$this->db->select('*');
		
        $this->db->from('schedule');
		$this->db->where('s_id >=',$id);
        $this->db->join('program_list', 'program_list.p_id = schedule.program_id');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
        $query = $this->db->get();
		if ($query->num_rows()>0)
		{
			$string="[";
			foreach ($query->result() as $row)
			{
				$string .= "{title:'".$row->program_title."',";
				$string .= "mp3:'".$row->program_url."',";
				$string .= "poster:'".$row->channel_poster."'";
				$string .= "},";
			}
			rtrim($string, ",");
			$string .= "]";
			return $string;
			//print_r($query->result_array('array'));
		//echo json_encode($query->result_array('array'));
		}

	}
	function getFirstItem($h,$m)
	{
	    	
		$this->db->select('*');
	    $this->db->from('schedule');
		$this->db->where("start_h",$h);
		$this->db->where("start_m <=",$m);
		$this->db->where("end_m >=",$m);
		//$this->db->or_where("start_m",$m);
		 $this->db->join('program_list', 'program_list.p_id = schedule.program_id');
		$this->db->join('channels', 'program_list.channel_id = channels.c_id');
		 $query = $this->db->get();
		 if ($query->num_rows()>0)
		 {
		 	$row = $query->first_row();
		//	print_r($row);
		//	echo $row->channel_title;
			return $row;
		 }
		

	}
	
	
	function getF($h,$m)
	{
	    	
		$first=$this->getFirstItem($h, $m);
		print_r($first);
		echo $first->start_m;

	}
	
	function getxls()
	{$this->load->library('phpexcel');
$this->load->library('PHPExcel/iofactory');

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setTitle("title")
                 ->setDescription("description");
	}
	function excel()
{
   $this->load->library('phpexcel');
   $this->load->library('PHPExcel/iofactory');

   $objPHPExcel = new PHPExcel();
   $objPHPExcel->getProperties()->setTitle("title")
                 ->setDescription("description");


   // Assign cell values
   $objPHPExcel->setActiveSheetIndex(0);
   $objPHPExcel->getActiveSheet()->setCellValue('A1', 'cell value here');

   // Save it as an excel 2003 file
   $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');

   $objWriter->save("nameoffile.xls");
}
	function live()
	{

		$this->data['channels']=$this->getChannels();
		$this->load->view('/includes/vou_live_header');
		$this->load->view('vou/live',$this->data);
	}

}
