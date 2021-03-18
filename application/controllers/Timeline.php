<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timeline extends Base_Controller {

    public function index($week=null)
    {
        date_default_timezone_set('America/Los_Angeles');
        if($week == null) 
        {
            $now = new DateTime();
            $week =$now->format('N') % 7;
           
        }
        $this->data['date'] = $this->getDayDate($week);
            $this->data['title'] = 'OKCN-timeline';
            $this->data['week'] = $week;
          
            $this->data['timeline'] = $this->gettimeline($week);
            $this->data['subview'] = 'timeline/main';
	    $this->load->view('components/main', $this->data);
	}

	function getDayDate($w)
	{
        date_default_timezone_set('America/Los_Angeles');
        $tw = date('w');
        if($tw == $w)
        {
            return date('Y-m-d', strtotime("now"));
        }
        if($tw > $w)
        {
            return date('Y-m-d', strtotime('-'.($tw-$w).' days'));
        }
        if($tw < $w)
        {
            return date('Y-m-d', strtotime('+'.($w-$tw).' days'));
        }
       
	}

	
        
        public function addtimeline($week)
    {
         $this->data['week'] = $week;
         $this->data['title'] = 'OKCN-Timeline';
       
         $this->data['channel_list'] = $this->db->order_by('channel_title')->get('channels')->result();
         $this->data['subview'] = 'timeline/form';
	 $this->load->view('components/main', $this->data);
     }
      
        public function edittimeline($tid,$week)
    {
               $this->data['week'] = $week;
         $this->data['title'] = 'OKCN-Timeline';
       
         $this->data['channel_list'] = $this->db->order_by('channel_title')->get('channels')->result();
        $this->data['timeline'] = $this->gettimelinbytid($tid);
         $this->data['subview'] = 'timeline/form';
	 $this->load->view('components/main', $this->data);
     }
     
     public function gettimelinbytid($tid)
     {
        $this->db->select('timetable.*,channels.*');
           $this->db->where('Id',$tid);
            $this->db->from('timetable');
            $this->db->join('channels', 'channels.c_id = timetable.cid'); 
           $this->db->limit(1);
           $query = $this->db->get();
           $timeline = $query->first_row();
         
          
         
           return  $timeline;
     }
     public function gettimeline($week)
     {
        $date = $this->getDayDate($week);
         $week = $week  % 7;
      
        $this->db->select('timetable.*,channels.*');
        $this->db->where('week_day',$week);
       
        $this->db->order_by('start_time');
        $this->db->from('timetable');
       
		 $this->db->join('channels', 'channels.c_id = timetable.cid'); 
		
        
           $query = $this->db->get();
          
           if($query->num_rows() > 0)
           {
               $array =array();
           
               foreach ($query->result() as $row)
               {
             
               
                   $row->file = $this->getfirstprogrambyDate($date,$row->cid);
                
                   array_push($array, $row);
               }
               return $query->result();
           }
     }

     public function getfirstprogrambyDate($date,$cid)
	 {
         
            $q = $this->db->where('channel_id',$cid)->where('program_date',$date)->limit(1)->order_by('p_id','desc')->get('program_list');
            if($q->num_rows() >0 )
		{
            return $q->first_row();
        }
         else 
         {
            
            return 'none';
         }
	

	 }
     
     
	 public function getfirstprogramby($cid,$pid)
	 {
         if($pid == "0")
         {
            $q = $this->db->where('channel',$cid)->limit(1)->order_by('addtime','desc')->get('program_list');
            return $q->first_row();
         }
         else 
         {
            $q = $this->db->where('Id',$pid)->limit(1)->get('program_list');
            return $q->first_row();
         }
	

	 }

     function getdatetime($time)
   {

   $h = floor ($time / 3600);
   if(strlen($h)==1)
   {
       $h = '0'.$h;
   }
   $m = ($time % 3600)/60;
   if(strlen($m)==1)
   {
    $m = '0'.$m;
   }
   return  $h.':'.$m; 
  
 
   }


	public function getAllCategory()
	{
		$cat = $this->db->get('gbc_category')->result();
		return $cat;
	}
        public function getAllTheme()
	{	$this->db->order_by('start_time');
		$cat = $this->db->get('gbc_theme')->result();
                $array =array();
                foreach ($cat as $row)
                {
                    $st = $this->getdatetime($row->start_time);
                    $et = $this->getdatetime($row->end_time);
                 $row->val = $row->Id.':'.$st.':'.$et;  
                 $row->time = $st.'--'.$et;
                 array_push($array, $row);
                }
		return $array;
	}
        public function getChannelByTheme($tid)
        {
            $this->db->where('theme',$tid);
            $cat = $this->db->get('channel_list')->result();
            foreach($cat as $row)
            {
                echo ' <option value="'.$row->Id.'">'.$row->name.'</option>';
              
            }
		}



		public function getChannelByCategory($cid)
        {
            $this->db->where('category',$cid);
            $cat = $this->db->get('channel_list')->result();
            foreach($cat as $row)
            {
                echo ' <option value="'.$row->Id.'">'.$row->name.'</option>';
              
            }
        }
        public function getProgramsByChannel($cid)
        {
            echo ' <option value="0">(最新节目)</option>';
            $this->db->where('channel',$cid);
            $cat = $this->db->get('program_list')->result();
           
            foreach($cat as $row)
            {
                echo ' <option value="'.$row->Id.'">'.$row->name.'</option>';
              
            }
        }
          
         public function getAllpresenter()
	{	
		$cat = $this->db->get('presenter_list')->result();
		return $cat;
	}
         public function getChanneName($cid)
	{	
             $this->db->where('Id',$cid);
             $this->db->limit(1);
	     $cat = $this->db->get('channel_list');
		return $cat->first_row()->name;
	}



	
   
        
   
	

	public function action()
	{
		if (!$this->input->post('Id')) {
			$this->create();
		} else {
			$this->update();
		}
    }

	public function create()
	{
    
            $data['week_day'] = $this->input->post('optradio');
            $data['cid'] =  $this->input->post('channel');       
            $data['start_time'] = $this->input->post('start_time');
            $data['end_time'] = $this->input->post('end_time');
			$this->db->insert('timetable', $data); 
	    	header('Content-Type: application/json');
    	    echo json_encode($this->input->post('optradio'));
	}

	public function update()
	{
	
        $data['week_day'] = $this->input->post('optradio');
        $data['cid'] =  $this->input->post('channel');       
        $data['start_time'] = $this->input->post('start_time');
        $data['end_time'] = $this->input->post('end_time');

		$this->db->where('Id', $this->input->post('Id'));
		$this->db->update('timetable', $data); 

		header('Content-Type: application/json');
    	echo json_encode($this->input->post('optradio'));
	}



	public function delete()
	{
		$this->db->where('Id', $this->input->post('tid'));
		$this->db->delete('timetable');
              
	}

}
