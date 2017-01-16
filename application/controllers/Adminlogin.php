<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 	
*/
class Adminlogin extends CI_Controller
{ 
	public function index(){
		if($id=$this->input->post())
		{
			$this->load->library('session');
			$this->load->model('admin_model');
			if($this->admin_model->loginadmin())
			{
				$this->session->set_userdata('admin',true);  
				redirect("admin","refresh");  
				return;
			}
			redirect("login","refresh");  
			return;
		}
		$this->load->view('bootstrap/material-start');
		$this->load->view('bootstrap/material-blog-theme',['content'=>'public/adminlogin','data'=>[]]);
		$this->load->view('bootstrap/material-end');
	}
}