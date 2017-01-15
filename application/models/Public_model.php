<?php 
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
	            if($this->db->insert('personalinfo',$personalinfo))
	            {

	            $id = $this->db->insert_id();
	            $i=0;
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
}