<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatisticsPrograms extends Base_Controller {


	
	public function index()
	{
		$this->data['title'] = 'members';
		$this->data['subview'] = 'statisticsprogram/main';
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
		$this->data['channelcounts'] = $this->getchannelcount($start,$end);
		
		$this->data['title'] = 'Statistics Programs';
		$this->data['subview'] = 'statisticsprogram/main';
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

	public function getchannelcount($start,$end)
        {
         

            $this->db->select('channels.channel_title, COUNT(channels.c_id) as total');
        //    $this->db->distinct('device_ip');
          
            $this->db->group_by('channels.c_id');
            $this->db->order_by('total','desc');
           $this->db->from('program_touch');
            $this->db->where('touch_time >=', $start);
            $this->db->where('touch_time <=', $end);
            $this->db->join('program_list','program_list.p_id = program_touch.program_id');
			$this->db->join('channels',' channels.c_id = program_list.channel_id');
            $query = $this->db->get();
           
            return $query->result();
         

        }

}
