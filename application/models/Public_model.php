<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 		
*/
class Public_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function closed()
	{
		$q=$this->db->get_where('admin',['id'=>1]);
		if($q->num_rows()!=1)
			return true;
		if($q->result_array()[0]['closed']==1)
			return true;
		return false;
	}
	function enc($password)
	{
		return sha1($password);
	}
	private function mix_salt($password='',$salt='53#Ab442_asd#')
	{ 
		return sha1($password.$salt);
	}
	public function make_salt($length=6)
	{ 
    		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}
	function applynows($input,$options)
	{
		$this->load->library('user_agent'); 

		if ($this->agent->is_browser())
		{
			$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
			$agent = $this->agent->robot();
			return false;
		}
		elseif ($this->agent->is_mobile())
		{
			$agent = $this->agent->mobile();
		}
		else
		{
			$agent = 'Unidentified User Agent';
		}

		$salt=$this->make_salt(12);
		$password=$this->mix_salt($input['password'],$salt);

		$personalinfo=[
	            	'fname'=>$input['fname'],
	            	'lname'=>$input['lname'],
	            	'dob'=>$input['dob'],
	            	'email'=>$input['email'],
	            	'password'=>$password, 
	            	'salt'=>$salt 
	            ];
	            if($this->db->insert('personalinfo',$personalinfo))
	            {

	            $id = $this->db->insert_id();
	            $i=0;
	            $batch=[];
	            foreach ($options as $key => $value) {
	            	$batch[$i++]=[
		            	'uid'=>$id,
		            	'useroption'=>$value,
		            	'date'=>date('Y-m-d'),
		            	'time'=>date("H:i:s"),
				'ip'=>$this->input->ip_address(),
				'browser'=>$agent,
				'platform'=>$this->agent->platform(),
		            	];
	            }
		           if($this->db->insert_batch('options',$batch))
				return true;
	            }

		return false;
	} 
	private function check_job_is_open($value)
	{
		return true;
	}
	private function max_seat_job($value)
	{
		if(!$q=$this->db->get_where('jobs',['id'=>$value]))
		{
			return 0;
		}
		if($q->num_rows()==1)
		{
			return $q->result_array()[0]['maxseats'];
		}
		return 0;
	}
	private function max_seat_options($value)
	{
		if(!$q=$this->db->get_where('options',['useroption'=>$value]))
		{
			return 0;
		}
		return $q->num_rows();
	}
	private function already_exist($value,$id)
	{

		if(!$q=$this->db->get_where('options',['useroption'=>$value,'uid'=>$id]))
		{
			return false;
		}
		if($q->num_rows()>=1)
		{
			return true;
		}
			return false;

	}

	function applynow($input,$options)
	{
		$this->load->library('user_agent'); 

		if ($this->agent->is_browser())
		{
			$agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot())
		{
			$agent = $this->agent->robot();
			return false;
		}
		elseif ($this->agent->is_mobile())
		{
			$agent = $this->agent->mobile();
		}
		else
		{
			$agent = 'Unidentified User Agent';
		}

		$salt=$this->make_salt(12);
		$password=$this->mix_salt($input['password'],$salt);

		$personalinfo=[
	            	'fname'=>$input['fname'],
	            	'lname'=>$input['lname'],
	            	'dob'=>$input['dob'],
	            	'email'=>$input['email'],
	            	'password'=>$password, 
	            	'salt'=>$salt 
	            ];


		$this->db->trans_begin();

	         $this->db->insert('personalinfo',$personalinfo);

	         $id = $this->db->insert_id();
	           
	            $i=0;
	            $failed=[];
	            foreach ($options as $key => $value) {
	            	if($this->check_job_is_open($value))
	            	{
	            		if($this->max_seat_job($value)>$this->max_seat_options($value))
	            		{
	            			if(!$this->already_exist($value,$id))
	            			{
	            				$this->db->insert('options',[
		            				'uid'=>$id,
				            		'useroption'=>$value,
					            	'date'=>date('Y-m-d'),
					            	'time'=>date("H:i:s"),
							'ip'=>$this->input->ip_address(),
							'browser'=>$agent,
							'platform'=>$this->agent->platform()
							]);
	            			}
	            			else{
	            				$status[$i]='applyed already';
	            				$failed[$i++]=$value;
	            			}
	            		}
	            		else{
	            			$status[$i]='seats full';
	            			$failed[$i++]=$value;
	            		}
	            	}
	            	else{
				$status[$i]='seats closed';
	            		$failed[$i++]=$value;
	            	}
	            }


		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    return false;
		}
		else
		{
		    $this->db->trans_commit();  
		    return ['failed'=>$failed,'status'=>$status];
		} 

		return false;

	           
	} 
	public function jobtitle($value)
	{
		if($q=$this->db->get_where('jobs',['id'=>$value]))
		{
			if($q->num_rows()==1)
				return $q->result_array()[0]['title'];
		}
		return false;
	}

	function login($uname,$pass)
	{

		$q_salt=$this->db->get_where('personalinfo',['email'=>$uname]);
		if($q_salt->num_rows()!=1)
		{
			return false;
		}
			$salt=$q_salt->result_array()[0]['salt'];
			$password=$this->mix_salt($pass,$salt);
			
		$q=$this->db->get_where('personalinfo',['email'=>$uname,'password'=>$password]);
		if($q->num_rows()==1)
		{
			return $q->result_array()[0];
		}
			return false;
	}
	public function getalljobs($orderby='id')
	{
		return $this->db->order_by($orderby)->get('jobs')->result_array();
	}
	public function userexist($email)
	{
		if($this->db->get_where('personalinfo',['email'=>$email])->num_rows()==1)
		{
			return true;
		}
		return false;
	}
}