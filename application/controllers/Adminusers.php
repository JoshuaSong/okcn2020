<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminusers extends Base_Controller {

	public function userdata()
	{
		print_r($this->session->userdata());
		echo $this->session->userdata('active_user')->name;
		
	}
	public function index()
	{
		$this->data['title'] = '  Admin Users';
                $this->data['adminusers'] = $this->getalladminusers();
		$this->data['subview'] = 'adminusers/main';
		$this->load->view('components/main', $this->data);
	}

	  public function adduser()
    {
          
         $this->data['title'] = '  Add Admin Users ';
         $this->data['groups'] = $this->db->get('mng_role')->result();
    
         $this->data['subview'] = 'adminusers/form';
	 $this->load->view('components/main', $this->data);
     }
      public function edituser($uid)
    {
          
         $this->data['title'] = '  Edit Admin Users';
          $this->data['user'] = $this->db->where('Id',$uid)->get('user_list')->first_row();
         $this->data['groups'] = $this->db->get('mng_role')->result();
    
         $this->data['subview'] = 'adminusers/form';
	 $this->load->view('components/main', $this->data);
     }
        public function authuser($uid)
    {
          
         $this->data['title'] = '设定用户权限';
          $this->data['user'] = $this->db->where('Id',$uid)->get('user_list')->first_row();
          $this->data['userchannels'] = $this->getuserchannels($uid);
        
     $this->data['allchannels'] = $this->getallchannels();
         $this->data['subview'] = 'adminusers/auth';
	 $this->load->view('components/main', $this->data);
     }
      public function validate()
	{
		$rules = [
                   
			[
				'field' => 'name',
				'label' => '姓名',
				'rules' => 'required'
			],
			[
				'field' => 'email',
				'label' => '电邮',
				'rules' => 'required|valid_email'
			],
		
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			]
		];

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()) {
			header("Content-type:application/json");
			echo json_encode('success');
		} else {
			header("Content-type:application/json");
			echo json_encode($this->form_validation->get_all_errors());
		}
	}
        public function getalladminusers()
        {
            $array=array();
            $query=$this->db->get('user_list')->result();
            foreach($query as $row)
            {
                $row->rolename = $this->getrolename($row->role);
                array_push($array, $row);
            }
             return $array;
         
        }
        public function getallchannels()
        {
              $categorys = $this->db->get('categorychannel')->result();
              $array=array();
              foreach ($categorys as $category)
              {
                   $category->channels = $this->getchannelsbycid($category->Id);
                           array_push($array, $category);
              }
              return $array;
        }
        public function getchannelsbycid($cid)
        {
             $this->db->select('channel_list.Id,channel_list.name as chname,presenter_list.name as pname');
             $this->db->from('channel_list');
             $this->db->where('channel_list.category',$cid);
                $this->db->where('channel_list.status',0);
             $this->db->order_by('channel_list.name');
              $this->db->join('presenter_list', 'presenter_list.Id = channel_list.presenter');
            $query =  $this->db->get();
            return $query->result();

        }
        public function getuserchannels($uid)
        {
              $array=array();
             $query = $this->db->where('user',$uid)->get('user_channel');
             if($query->num_rows()>0)
             {
                 foreach ($query->result() as $row)
              {
                 array_push($array, $row->channel);
             }
             return $array; 
             }
            
        }
        
        public function getrolename($str)
        {
           $pieces = explode(",", $str); 
           $returnstr=" ";
             foreach($pieces as $item)
             {
                 $this->db->where('Id',$item);
                 $this->db->limit(1);
                 $query=$this->db->get('mng_role');
                 if($query->num_rows() >0)
                 {
                      $returnstr =  '['.$query->first_row()->name.']'.$returnstr;
                 }
                 
             }
           return $returnstr;
        }

	
	
	

	public function action()
	{
		if (!$this->input->post('id')) {
			$this->create();
		} else {
			$this->update();
		}
	}


	public function create()
	{
		$data['name'] 		= $this->input->post('name');
             
		$data['email']   	= $this->input->post('email');
		$data['password']   = MD5($this->input->post('password'));
		
		$data['role']   = $this->input->post('role');
		$this->db->insert('user_list', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}

	
	public function update()
	{
		$data['name'] 		= $this->input->post('name');
              
		$data['email']   	= $this->input->post('email');
              
		
		
		$data['role']   = $this->input->post('role');
		$this->db->where('Id', $this->input->post('id'));
		$this->db->update('user_list', $data); 

		header('Content-Type: application/json');
    	echo json_encode('success');
	}


	public function delete()
	{
		$this->db->where('Id', $this->input->post('id'));
		$this->db->delete('user_list');
	}
        public function userchannelaction()
        {
            $this->db->where('user', $this->input->post('user_id'));
		$this->db->delete('user_channel');

		foreach ($this->input->post('arr_id') as $id) {
			$data['user'] = $this->input->post('user_id');
			$data['channel'] = $id;
			$this->db->insert('user_channel', $data);
		}
        }

}
