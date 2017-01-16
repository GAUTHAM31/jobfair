<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 	user login purpose
*/
class User extends CI_Controller
{
	private $id;
	function __construct()
	{
		parent::__construct();
		$this->load->library('session'); 
		if(  !$this->id=$this->session->userdata('id')  )
		{
			redirect("welcome/logout?msg=login again");
			die;
		}
		$this->load->model('public_model');	
		if($this->public_model->closed())
		{
			show_error('Registration Cloed!', 401,'Sorry !');
			die;
		}
		$this->load->model('user_model');
		
		if(!$this->user_model->userexist($this->id))
		{
			redirect($this->config->base_url()."welcome/logout?msg=User doesnot exist.Or Blocked Due to Multiple Failed Attempts.","refresh");
			die;
		} 
	}

	private function material($content=NULL,$data="")
 	{
		$this->load->view('user/bootstrap/material-start');
		if($content!=NULL)
			$this->load->view('user/bootstrap/material-blog-theme',['content'=>$content,'data'=>$data]);
		$this->load->view('user/bootstrap/material-end');
 	}
 	private function jobs()
 	{
 		$job=$this->user_model->getalljobs();
 		$jobs=[];
 		foreach ($job as $key => $value) {
 			$jobs[$value['id']]=$value['title'];
 		}
 		return $jobs;
 	}
	public function index(){

		$data=[
			'options'=>$this->user_model->useroptions($this->id),
			'jobtitle'=>$this->jobs(),
			'userdata'=>$this->user_model->userdatas($this->id)
			];
		$this->material("user/listofoptions",$data);
	}
	public function printout(){

		$this->material("public/login");
	}
}