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
	private function preparepassword($uname,$password)
	{

		if($q=$this->db->get_where('admin',['uname'=>$uname]))
		{
			if($q->num_rows()==1)
			{
				$salt=$q->result_array()[0]['salt'];
				return sha1($password.$salt);
			}
		}
		return false;
	}
	public function loginadmin($input)
	{
		$input['password']=sha1($input['password']);
		$password=$this->preparepassword($input['uname'],$input['password']);
		 
		if($q=$this->db->get_where('admin',[
				'uname'=>$input['uname'],
				'password'=>$password
				]))
		{

			if($q->num_rows()==1)
			{
				return $this->db->update( 'admin',['ip'=>$this->input->ip_address(),'date'=>date("Y-m-d")],['uname'=>$input['uname']] ) ;		
			}

		} 
		return false;
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
	public function alljobs()
	{
		return $this->db->get('jobs')->result_array();
	}
	public function addcompany($data)
	{
		return $this->db->insert('jobs',[
			'title'=>$data['name'],
			'maxseats'=>$data['seats']
			]);
	}
}