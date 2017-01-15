<?php 
/**
* 
*/
class User_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	public function userexist($id)
	{
		return ($this->db->get_where('personalinfo',['id'=>$id])->num_rows()==1);	
	}
	public function useroptions($id)
	{
		$q=$this->db->get_where('options',[
			'uid'=>$id
			]);
		if($q->num_rows()>0)
		{
			return $q->result_array();
		}
		return false;
	}
	public function getjobtitle($id)
	{
		return $this->db->get_where('jobs',['id'=>$id])->result_array()[0];
	}
	public function getalljobs()
	{
		return $this->db->get('jobs')->result_array();
	}
	public function userdatas($id)
	{
		if($q=$this->db->get_where('personalinfo',['id'=>$id]))
		{
			if($q->num_rows()==1)
			{
				return $q->result_array()[0];
			}
		}
		return false;
	}
}