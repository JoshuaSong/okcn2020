<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Base_Controller {
	
	/**
     * Dashboard
     *
     * @access  public
     * @param   
     * @return  view
     */
	
	public function index($odate=null)
	{
     
       
		$this->data['title'] = 'Dashboard';
		$this->data['subview'] = 'dashboard/main';
		$this->load->view('components/main', $this->data);
	}
        public function getChannelTouch()
        {
            $this->db->from('channel_list_touch');
            $this->db->join('gbc_device_ip','gbc_divece_ip.id = channel_list_touch.divece_ip');
           $query = $this->db->get();
           print_r($query->result());
        }
        public function getcount($date)
        {
          
            $this->db->where('date_hour >=', $date.' 00:00:00');
            $this->db->where('date_hour <=', $date.' 23:59:00');
            $this->db->order_by('date_hour');
            $query = $this->db->get('gbc_touch_count');
            return $query->result();
         //  print_r($query->result());
        }
        public function getolddate()
        {
            $array = array();
            $datetime = new DateTime("now", new DateTimeZone('America/Los_Angeles') );
            $date =  $datetime->format("Y-m-d");
            for ($i = 0; $i <= 10; $i++) {

                $newdate = date('Y-m-d',strtotime('-1 day',strtotime($date)));
                array_push($array,$newdate);
                $date = $newdate;
            }

            return $array;

        }

        public function getchannelcount($date)
        {
            $time = $date.' 00:00:00';
            $time1 = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($time)));
            $time2 = date('Y-m-d H:i:s',strtotime('+31 hour',strtotime($time)));
            $this->db->select('channel_list.name, COUNT(channel) as total');
        //    $this->db->distinct('device_ip');
          
            $this->db->group_by('channel');
            $this->db->order_by('total','desc');
           $this->db->from('channel_list_touch');
            $this->db->where('channel_list_touch.created_on >=', $time1);
            $this->db->where('channel_list_touch.created_on <=', $time2);
            $this->db->join('channel_list','channel_list.Id = channel_list_touch.channel');
     
            $query = $this->db->get();
           
            return $query->result();
         

        }
        public function gettototalvisitor($date)
        {
            $time = $date.' 00:00:00';
            $time1 = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($time)));
            $time2 = date('Y-m-d H:i:s',strtotime('+31 hour',strtotime($time)));
            $this->db->select('device_ip');
            $this->db->distinct('device_ip');
            $this->db->where('channel_list_touch.created_on >=', $time1);
            $this->db->where('channel_list_touch.created_on <=', $time2);
            $query = $this->db->get('channel_list_touch');
            return $query->num_rows();
        }
      
        public function gettype($date)
        {
            $time = $date.' 00:00:00';
            
            $time1 = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($time)));
            $time2 = date('Y-m-d H:i:s',strtotime('+31 hour',strtotime($time)));
            $this->db->select('touch_type, COUNT(device_ip) as total');
          
            $this->db->group_by('touch_type');
           
            $this->db->where('channel_list_touch.created_on >=', $time1);
            $this->db->where('channel_list_touch.created_on <=', $time2);
            $query = $this->db->get('channel_list_touch');
            return $query->result();
          //  print_r($query->result());
          
        }
      
        public function getcountry($date)
        {
            $time = $date.' 00:00:00';
            
            $time1 = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($time)));
            $time2 = date('Y-m-d H:i:s',strtotime('+31 hour',strtotime($time)));
            $this->db->select('country, COUNT(country) as total');
          
            $this->db->group_by('gbc_device_ip.country');
            $this->db->order_by('total','desc');
            $this->db->limit(7);
            $this->db->where('channel_list_touch.created_on >=', $time1);
            $this->db->where('channel_list_touch.created_on <=', $time2);
            $this->db->join('gbc_device_ip','gbc_device_ip.id = channel_list_touch.device_ip');
            $query = $this->db->get('channel_list_touch');
            $array = array();
            $u = 0;
            $i =0;
            foreach($query->result() as $row)
            {
                if($row->country != "US" && $row->country != "United States")
                {
                    array_push($array, $row);
                }
                else 
                {
                    $u = $u + $row->total;
                    $i++;
                    if($i == 2)
                    {
                        $row->total = $u;
                        array_push($array, $row);
                    }
                }

            }
            return $array;
           // print_r($array);
     
          
        }
        public function getstate($date)
        {
            $time = $date.' 00:00:00';
            
            $time1 = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($time)));
            $time2 = date('Y-m-d H:i:s',strtotime('+31 hour',strtotime($time)));
            $this->db->select('region_name, COUNT(region_name) as total');
          
            $this->db->group_by('gbc_device_ip.region_name');
            $this->db->order_by('total','desc');
            $this->db->limit(7);
            $this->db->where('channel_list_touch.created_on >=', $time1);
            $this->db->where('channel_list_touch.created_on <=', $time2);
         
            $this->db->join('gbc_device_ip','gbc_device_ip.id = channel_list_touch.device_ip');
            $query = $this->db->get('channel_list_touch');
          
            print_r($query->result());
           // print_r($array);
     
          
        }

        public function gettime()
        {
            $date = new DateTime("now", new DateTimeZone('America/Los_Angeles') );
            $time = $date->format("Y-m-d").' 00:00:00';
            $time = date('Y-m-d H:i:s',strtotime('+7 hour',strtotime($time)));
            for ($i = 0; $i <= 23; $i++) {
             
            
           $newdate = date('Y-m-d H:i:s',strtotime('+1 hour',strtotime($time)));
           
            echo '('.$i.')'.$newdate;
         
            $this->db->select('touch_type, COUNT(touch_type) as total');
            $this->db->group_by('touch_type'); 
            $this->db->order_by('id');
            $this->db->where('created_on >=', $time);
            $this->db->where('created_on <=', $newdate);
            $query = $this->db->get('channel_list_touch');
            print_r($query->result());
            echo '<br>';

            $time = $newdate;
           
        }
        }
        function gethour()
        {
            $date = new DateTime("now", new DateTimeZone('America/Los_Angeles') );
            $datehour = $date->format("Y-m-d H:00:00");

            $this->db->where('date_hour',$datehour);
            $this->db->limit(1);
            $query = $this->db->get('gbc_touch_count');
           if($query->num_rows() > 0)
           {
               $id = $query->first_row()->id;
               $this->db->set('web_live', 'web_live+1', FALSE);
               $this->db->where('id', $id);
               $this->db->update('gbc_touch_count');
           }
           else
           {

            $data['date_hour'] = $date->format("Y-m-d H:00:00");
            $data['web_live'] = 1;     
            $this->db->insert('gbc_touch_count', $data); 
          
           }

           
          
        }

}
