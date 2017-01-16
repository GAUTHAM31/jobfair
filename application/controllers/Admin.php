<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 	
*/
class Admin extends CI_Controller
{
	
	function __construct()
	{ 
		parent::__construct();
		$this->load->library('session'); 
		if(  !$this->id=$this->session->userdata('admin')  )
		{
			redirect("welcome/logout?msg=login again");
			die;
		}
		
		$this->load->model('admin_model');
		
		if(!$this->admin_model->validadmin() )
		{
			redirect($this->config->base_url()."welcome/logout?msg=User doesnot exist.Or Blocked Due to Multiple Failed Attempts.","refresh");
			die;
		} 
	}
	private function material($content=NULL,$data="")
	{
	$this->load->view('user/bootstrap/material-start');
	if($content!=NULL)
		$this->load->view('admin/bootstrap/material-blog-theme',['content'=>$content,'data'=>$data]);
	$this->load->view('user/bootstrap/material-end');
	}
	public function index()
	{  
		$this->material('admin/home',['jobs'=>$this->admin_model->alljobs()]);
	}
	public function closeall()
	{
		if($this->admin_model->close_reg())
		{
			redirect("admin?msg=registration closed","refresh");
			return;
		}
			redirect("admin?msg=registration not closed !. Action Failed","refresh");
	}
	public function openall()
	{
		if($this->admin_model->open_reg())
		{
			redirect("admin?msg=registration opend","refresh");
			return;
		}
			redirect("admin?msg=registration not opend !. Action Failed","refresh");
	}
	public function addcompany()
	{
		if($this->input->post('addcompany'))
		{
			$input=$this->input->post();
			if($this->admin_model->addcompany([
				'name'=>$input['name'],
				'seats'=>$input['seats']
				])) {	
			redirect("admin?msg=company added","refresh");
			return;
			}
		}
		redirect("admin?msg=company not added","refresh");
	}

}