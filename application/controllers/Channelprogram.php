<?php
require_once('application/libraries/S3.php');
defined('BASEPATH') OR exit('No direct script access allowed');

class Channelprogram extends Base_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
            $this->load->library('session');
        $this->config->load('s3', TRUE);
    }
    public function uploadview()
    {
        $this->load->view('channelprogram/upload');
    }
    public function upload($filename)
    {
    
        $filesCount = count($_FILES['files']['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['file']['name']     = $_FILES['files']['name'][$i];
            $_FILES['file']['type']     = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['files']['error'][$i];
            $_FILES['file']['size']     = $_FILES['files']['size'][$i];

            $dir = dirname($_FILES["file"]["tmp_name"]);
            $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["file"]["name"];

            $s3_config = $this->config->item('s3');
            $file = pathinfo($destination);
		    $s3_file = 'images/'.$filename;
            $mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $destination);
            rename($_FILES["file"]["tmp_name"], $destination);
         
            S3::setAuth($s3_config['access_key'],  $s3_config['secret_key']);
            $saved = S3::putObjectFile($destination,$s3_config['bucket_name'],$s3_config['folder_name'].$s3_file, S3::ACL_PUBLIC_READ, array(), $mime_type );
            if ($saved) {
		   echo $s3_config['folder_name'].$s3_file;
		}
      
        }     
    }
public function uploadAmazone($folder,$cid,$filename)
{
    if (!is_dir( $folder.'/'.$cid)) 
    {
        mkdir( $folder.'/'.$cid, 0777, TRUE);
    }
    $newfilename = $cid.'/'.$filename;
    $config['upload_path'] = $folder.'/'.$cid;
	$config['allowed_types'] = '*';
    $config['file_name'] = $filename;
    $this->load->library('upload', $config);
    if ($this->upload->do_upload())
    {
        echo  $newfilename;
    }
  
}
    public function uploadAudio($cid)
    {
      
        $dir = dirname($_FILES["userfile"]["tmp_name"]);
        $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["userfile"]["name"];
        rename($_FILES["userfile"]["tmp_name"], $destination);
        $mime_type = $_FILES["userfile"]["type"];
      
        $s3_config = $this->config->item('s3');
        $file = pathinfo($destination);
        $extentions = $file['extension'];
        $s3_file = $s3_config['folder_name'].$cid.'/'.time().$extentions;
        S3::setAuth($s3_config['access_key'],  $s3_config['secret_key']);
        $saved = S3::putObjectFile($destination,$s3_config['bucket_name'],$s3_file, S3::ACL_PUBLIC_READ, array(), $mime_type );
        if ($saved) {
           echo "https://cdsaws.s3-us-west-2.amazonaws.com/".$s3_file;
        }
       
      
    }
    public function uploadAudioFromAdnroid($cid)
    {
       
        $dir = dirname($_FILES["userfile"]["tmp_name"]);
        $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["userfile"]["name"];
        rename($_FILES["userfile"]["tmp_name"], $destination);
        $mime_type = $_FILES["userfile"]["type"];
        $s3_config = $this->config->item('s3');
        $file = pathinfo($destination);
        $s3_file = $s3_config['folder_name'].$cid.'/js_'.time().'.'.$file['extension']; 
        S3::setAuth($s3_config['access_key'],  $s3_config['secret_key']);
        $saved = S3::putObjectFile($destination,$s3_config['bucket_name'],$s3_file, S3::ACL_PUBLIC_READ, array(), $mime_type );
        if ($saved) {
           echo "https://cdsaws.s3-us-west-2.amazonaws.com/".$s3_file;
        }
    }
    public function uploadImage2Amazone($filename)
    {
       
        $dir = dirname($_FILES["userfile"]["tmp_name"]);
        $destination = $dir . DIRECTORY_SEPARATOR . $_FILES["userfile"]["name"];
        rename($_FILES["userfile"]["tmp_name"], $destination);
        $mime_type = $_FILES["userfile"]["type"];
        $s3_config = $this->config->item('s3');
        $file = pathinfo($destination);
        $s3_file = $s3_config['folder_name'].'images/'.$filename;
        S3::setAuth($s3_config['access_key'],  $s3_config['secret_key']);
        $saved = S3::putObjectFile($destination,$s3_config['bucket_name'],$s3_file, S3::ACL_PUBLIC_READ, array(), $mime_type );
        if ($saved) {
           echo "https://cdsaws.s3-us-west-2.amazonaws.com/".$s3_file;
        }
    }
    public function index($cid=null,$tid=null,$limit=null)
    {
         if($cid == null) $cid = 0;
         if($tid == null) $tid = 0;
          if($limit == null) $limit = 0;
         $this->data['cid'] = $cid;
         $this->data['tid'] = $tid;
          $this->data['limit'] = $limit;
         $this->data['title'] = '  Program';
         $this->data['cats'] = $this->getAllCategory();
         $this->data['themes'] = $this->getAllTheme();
         $this->data['channels'] = $this->getChannels($cid,$tid,$limit);
         $this->data['subview'] = 'channelprogram/main';
	 $this->load->view('components/main', $this->data);
     }
     public function program($chid,$limit)
    {
        header('Access-Control-Allow-Origin: *');
       
         $this->data['title'] =' Program';
          $this->data['limit'] = $limit;
         $this->data['channel'] = $this->getChannelByCid($chid);
         $this->data['programs'] = $this->getProgram($chid,$limit);
         $this->data['subview'] = 'channelprogram/program';
	 $this->load->view('components/main', $this->data);
     }
     
     public function all()
    {
        header('Access-Control-Allow-Origin: *');
       
         $this->data['title'] ='All  Programs';
         $this->data['programs'] = $this->getAllProgram();
         $this->data['subview'] = 'channelprogram/all';
	     $this->load->view('components/main', $this->data);
     }
     
     
      public function edit($chid,$pid)
    {
 
       
         $this->data['title'] = 'Program Edit';
         $this->data['channel'] = $this->getChannelByCid($chid);
         $this->data['program'] = $this->getprogramByPid($pid);
         $this->data['actors'] = $this->db->order_by('actor_name')->get('actors')->result();
        
         $this->data['subview'] = 'channelprogram/form';
	 $this->load->view('components/main', $this->data);
     }
     
       public function addprogram($chid,$actor=null,$date = null)
    {
        header('Access-Control-Allow-Origin: *');
         $this->data['title'] = 'Program Add';
         $this->data['channel'] = $this->getChannelByCid($chid);
         $this->data['actors'] = $this->db->order_by('actor_name')->get('actors')->result();
       
         $this->data['subview'] = 'channelprogram/form';
         if($date != null) $this->data['date'] = $date;
         if($actor != null) $this->data['actor'] = $actor;
	 $this->load->view('components/main', $this->data);
     }
     
    
     public function getProgram($chid,$limit)
     {
        
           $this->db->where('channel_id',$chid);
         
           $this->db->order_by('p_id','desc');
          
           if($limit != 0)
           {
               $this->db->limit($limit);
           }
           $query = $this->db->get('program_list');
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
     }
     public function getAllProgram()
     {
        
           $this->db->order_by('p_id','desc');
           $this->db->limit(200);
           $this->db->from('program_list');
           $this->db->join('channels', 'program_list.channel_id = channels.c_id', 'left');
           $query = $this->db->get();
           if($query->num_rows() > 0)
           {
               return $query->result();
           }
     }
     public function getProgramChangename()
     {
           $this->db->order_by('Id','asc');
          $this->db->where('Id >',14600);
        //  $this->db->limit(100);
           $query = $this->db->get('program_list');
           if($query->num_rows() > 0)
           {
           
               foreach($query->result() as $row)
               {
                   if(strpos($row->file, '/u/a/program/') !== false)
                   {
                       $newname = str_replace('/u/a/program/','http://gbcus.s3.amazonaws.com/files/',$row->file);
                       $data['file'] = $newname;
                       $this->db->where('Id', $row->Id);
                       $this->db->update('program_list', $data);
                       echo $newname.'<br/>';
                   }
               }
           }
     }
    
	public function getAllCategory()
	{
		$cat = $this->db->where('type',1)->get('categorychannel')->result();
		return $cat;
	}
        public function getAllTheme()
	{	
		$cat = $this->db->get('theme_list')->result();
		return $cat;
	}
         public function getAllpresenter()
	{	
		$cat = $this->db->get('presenter_list')->result();
		return $cat;
	}
        
          public function getChannels($cid,$tid,$limit)
	{	
               if($this->session->userdata('active_user')->role !=1)
           {
               $carray = $this->getuserchannels();
                $this->db->where_in('channel_list.Id',$carray);
           }
              $this->db->select('channel_list.*, categorychannel.name as cname,theme_list.name as tname,presenter_list.name as pname');
               if($cid != 0)
            {
                $this->db->where('channel_list.category',$cid);
            }
             if($tid != 0)
            {
                $this->db->where('channel_list.theme',$tid);
            }
            
              $this->db->from('channel_list');
                if($limit != 0)
           {
               $this->db->limit($limit);
           }
          
              $this->db->where('channel_list.status',0);
              $this->db->join('presenter_list', 'presenter_list.Id = channel_list.presenter');
              $this->db->join('categorychannel', 'categorychannel.Id = channel_list.category');
              $this->db->join('theme_list', 'theme_list.Id = channel_list.theme');
	      $query = $this->db->get()->result();
              $array = array();
              foreach($query as $row)
              {
                 // $row->program = $this->getfirstprogram($row->Id);
                  array_push($array,$row);
              }
		return $array;
	}
        public function getuserchannels()
        {
            $this->db->where('user',$this->session->userdata('active_user')->id);
             $query = $this->db->get('user_channel');
             if($query->num_rows() >0)
             {
                  $array = array();
              foreach($query->result() as $row)
              {
                 
                  array_push($array,$row->channel);
              }
		return $array;
             } else {
                 return [0];
                 
             }
        }
          public function getChannelByCid($cid)
	{	
              $this->db->select('channels.*,category.*');
              $this->db->where('c_id',$cid);
              $this->db->from('channels');
              $this->db->join('category', 'category.category_id = channels.ctg_id', 'left');
	      $query = $this->db->get();
              return $query->first_row();
             
	}
        
        public function getfirstprogram($cid)
        {
           $this->db->select('file,name,addtime');
           $this->db->where('channel',$cid);
           $this->db->limit(1);
           $this->db->order_by('addtime','desc');
           $query = $this->db->get('program_list');
           if($query->num_rows() > 0)
           {
               return $query->first_row();
           }
        }
          public function getprogramByPid($pid)
        {
           
           $this->db->where('p_id',$pid);
           $this->db->limit(1);
           $query = $this->db->get('program_list');
           if($query->num_rows() > 0)
           {
               return $query->first_row();
           }
        }
        public function getUSprogramByPid($pid)
        {
           
           $this->usdb->where('Id',$pid);
           $this->usdb->limit(1);
           $query = $this->usdb->get('program_list');
           if($query->num_rows() > 0)
           {
               return $query->first_row();
           }
        }


        public function form()
	{
		$data['index'] = $this->input->post('index');
                $data['cats'] = $this->getAllCategory();
                $data['themes'] = $this->getAllTheme();
                $data['presenters'] = $this->getAllpresenter();
		$this->load->view('cchannels/form', $data);
		
	}	
	
    public function data()
	{
        $this->load->library('datagrid');
        header('Content-Type: application/json');
	echo json_encode($this->getJson($this->input->post()));
	}
        
    public function getJson($input)
    {
       $select = 'program_list.*,channel_list.name as cname,presenter_list.name as pname';
       $replace_field  = [['old_name' => 'name', 'new_name' => 'program_list.name']];
       $param = [
            'input'=> $input,
            'select'=> $select,
            'table'=> 'program_list',
            'replace_field' => $replace_field
        ];

        $data = $this->datagrid->query($param, function($data) use ($input) {
           
              return $data->join('channel_list', 'channel_list.Id = program_list.channel', 'left')->order_by('program_list.addtime','desc')
                      ->join('presenter_list', 'presenter_list.Id = program_list.presenter', 'left');;
            });

        return $data;
    }


    public function validate()
	{
		$rules = [
			[
				'field' => 'name',
				'label' => 'Title',
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

	

	public function action()
	{
		if (!$this->input->post('Id')) {
			            $data['program_title'] = $this->input->post('name');
                        $data['program_url'] = $this->input->post('file');                     
                        $data['program_date'] = $this->input->post('program_date');
                                                                 
                         $data['channel_id'] = $this->input->post('cid');
                         $data['program_actor_id'] = $this->input->post('program_actor_id');
                         $data['program_info'] 	= $this->input->post('program_info');
                         $this->db->insert('program_list', $data); 
                         header('Content-Type: application/json');
    	                 echo json_encode('success');
		} else {
            $data['program_title'] = $this->input->post('name');
            $data['program_url'] = $this->input->post('file');                     
            $data['program_date'] = $this->input->post('program_date');
            $data['program_info'] 	= $this->input->post('program_info');                                        
             $data['channel_id'] = $this->input->post('cid');
             $data['program_actor_id'] = $this->input->post('program_actor_id');
                         
                         $this->db->where('p_id', $this->input->post('Id'));
                         $this->db->update('program_list', $data); 


                       
                         header('Content-Type: application/json');
                           echo json_encode('success');
		}
	}


	



	public function delete()
	{
		$this->db->where('p_id', $this->input->post('id'));
        $this->db->delete('program_list');
        
       
                header('Content-Type: application/json');
    	echo json_encode('success');
	}

}
