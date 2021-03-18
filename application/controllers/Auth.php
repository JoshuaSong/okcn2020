<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
		parent::__construct();
                $this->load->database();
		$this->load->library('session');
                $this->load->library('form_validation');
                 
                $this->load->helper('url');

		
	}

	public function userdata()
	{
		
		print_r($this->session->userdata()) ;
//	$json_a = json_decode($this->session->userdata('active_user')->image,true);
	
//	echo $json_a[0]['file_thumbnail'];
	}
	
	public function login()
	{
		$data['title'] = 'Login';
		$data['subview'] = 'login/main';
		$this->load->view('components/layout', $data);
	}

	

	public function login_attempt()
	{
		$rules = [
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			]
		];

		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()) {
			
			
                         $mail 	= $this->input->post('email');
      $pass	= MD5($this->input->post('password'));
      $this->db->select('Id as id,name,email,role');
      $this->db->where('email',$mail);
      $this->db->where('password',$pass);    
       $query = $this->db->get('user_list');
       if ($query->num_rows() > 0){
		 $attempt = $query->first_row();
                 $attempt->group_id = str_replace(',','',$attempt->role);
      //  $attempt->id;
     //   $attempt->isAdmin = $this->checkAdmin($uid);
        $this->session->set_userdata('active_user', $attempt);
				header("Content-type:application/json");
				echo json_encode(['status' => 'success']);
				
			} else {
                            header("Content-type:application/json");
				echo json_encode(['password' => 'Wrong email or password']);
                        }
                       
			}
		
	}



	public function logout() {
		$this->session->unset_userdata('active_user');
		redirect('auth/login');
	}
}
