<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 	
*/
class Admin_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function validadmin()
	{
		
		$q=$this->db->get_where('admin',['ip'=>$this->input->ip_address()]);
		if($q->num_rows()==1)
			return true;
		return false;
	}
	public function loginadmin()
	{
		return $this->db->update('admin',['ip'=>$this->input->ip_address(),'date'=>date("Y-m-d")],['id'=>1]);
	}
	public function admin_data()
	{
		return $this->db->get_where('admin',['id'=>1])->result_array()[0];
	}
	public function close_reg()
	{
		return $this->db->update('admin',['closed'=>1],['id'=>1]);
	}
	public function open_reg()
	{
		return $this->db->update('admin',['closed'=>0],['id'=>1]);
	}
	public function addcompany($data)
	{
		return $this->db->insert('jobs',[
			'title'=>$data['name'],
			'maxseats'=>$data['seats']
			]);
	}
}