<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 	
*/
class Adminlogin extends CI_Controller
{ 
	public function index(){
		if($input=$this->input->post())
		{
			$this->load->library('session');
			$this->load->model('admin_model');
			
			if($this->admin_model->loginadmin(['uname'=>$input['uname'] ,'password'=>$input['password'] ])==true)
			{
				$this->session->set_userdata('admin',true);  
				redirect("admin","refresh");  
				return;
			} 
			redirect("adminlogin?msg=Error during login","refresh");  
			return;
		}
		$this->load->view('bootstrap/material-start');
		$this->load->view('bootstrap/material-blog-theme',['content'=>'public/adminlogin','data'=>[]]);
		$this->load->view('bootstrap/material-end');
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
		$rdir=($this->input->get('rdir'))?$this->input->get('rdir'):'login';
		redirect($rdir."?msg=".$msg,"refresh"); 
	}
}