<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('public_model');	
		if($this->public_model->closed())
		{
			show_error('Registration Cloed!', 401,'Sorry !');
			die;
		}
	}
 	public function material($content=NULL,$data="")
 	{
		$this->load->view('bootstrap/material-start');
		if($content!=NULL)
			$this->load->view('bootstrap/material-blog-theme',['content'=>$content,'data'=>$data]);
		$this->load->view('bootstrap/material-end');
 	}

	 
	public function instructions()
	{
		$this->load->view('bootstrap/material-start');
		$this->load->view("public/home");
		$this->load->view('bootstrap/material-end');
	} 
	public function index()
	{
		$this->material("public/instructions");
	} 
	public function applynow()
	{
		
	$this->load->helper('form');
      	 $this->load->library('form_validation');
	if($this->input->post('apply'))
	{
 	$input=$this->input->post();
            $selectedoptions=[];
            $i=0;
           
            foreach ($input['selectedoptions'] as $key => $value) {
            	if($value>0)
	            	$selectedoptions[$i++]=$value;
            }

            $personalinfo=[
            	'fname'=>$input['fname'],
            	'lname'=>$input['lname'],
            	'dob'=>$input['dateofbirth'],
            	'email'=>$input['email'],
            	'phonenumber'=>$input['phonenumber'],
            	'password'=>$input['password'],
            	'repassword'=>$input['repassword'],
            	'password'=>$input['password']

	            ];
	if($this->public_model->userexist($personalinfo['email']))
	{
		 redirect('welcome/login?msg=User Already exist .Login To Account','refresh');
           		 return false;

	}
            if(($failed=$this->public_model->applynow($personalinfo,$selectedoptions))!=false)
            {

            	$failstatus="";
            	 if(is_array($failed))
            	 {

		        	foreach ($failed['status'] as $key => $value) {
		        		if(($jobtitle=$this->public_model->jobtitle($failed['failed'][$key])) !=false)
		        		{
		            		$failstatus.=" ".$jobtitle." [".$value."] ,";			
		        		}
		        	   }
            	 }
            	 if(strlen($failstatus)>1)
            	 {
	            	 $failstatus="Cant Register for some of the seats :  ".$failstatus;            	 	
            	 }
            	redirect('welcome/login?msg=Application Submitted .Login to check status. Check Your email . '.$failstatus,'refresh');
            	return false;
            }
            redirect('welcome/login?msg=Application Submission Error . Try Again','refresh');
            return false;

	}
		$data['options']=$this->public_model->getalljobs('title');
		$this->material("public/applynow",$data);
	}
	public function login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		if($this->input->post('login'))
		{
			$input=$this->input->post();

			if($session_data=$this->public_model->login($input['email'],$input['password']))
			{	
				$this->load->library('session');
				$this->session->set_userdata([
						'id'=>$session_data['id'],
						'name'=>$session_data['fname']." ".$session_data['lname'],
						'email'=>$session_data['email'] 
						]);

				redirect('user?msg=Login Success ','refresh');
			}
				redirect('welcome/login?msg=Login Failed ','refresh');

			return false;
		}
		$this->material("public/login");
	}
	public function logout(){
		$this->load->library('session');

		$user_data = $this->session->all_userdata(); 
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') 
			{
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();

		$msg=$this->input->get('msg');
		$rdir=($this->input->get('rdir'))?$this->input->get('rdir'):'welcome/login';
		redirect($rdir."?msg=".$msg,"refresh"); 
	}
	
}
