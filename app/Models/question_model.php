<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class question_model extends CI_Model {

	public $status;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();        
        $this->status = $this->config->item('status');
    }    

   
	public function getQuestion()
	{
		$query=$this->db->get('paper');
		if($query->num_rows() > 0)
		{
			$this->db->order_by('paper_id','DESC');
			return $query->result();
		}else{

			return false;

		}
		
	}

	public function searchOrderByTitle()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('title','ASC');
		$query=$this->db->get();
		return $query->result();

	}
	public function searchOrderByCourse()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('course','ASC');
		$query=$this->db->get();
		return $query->result();

	}
	public function searchOrderByFaculty()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('faculty','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}
	public function searchOrderByType()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('type','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}
	public function searchOrderByYear()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('year','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}
	
	public function searchOrderById()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('paper_id','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}
	public function searchOrderByClassTest()
	{


		$this->db->select("*");
		$this->db->from("paper");
		$this->db->where('type','Class Test');
		//$this->db->order_by('title','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}

	public function searchOrderByMidterm()
	{


		$this->db->select("*");
		$this->db->from("paper");
		$this->db->where('type','Midterm');

		//$this->db->order_by('title','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}

	public function searchOrderByFinal()
	{


		$this->db->select("*");
		$this->db->from("paper");
        $this->db->where('type','Final');
		//$this->db->order_by('title','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}

	public function searchOrderByAscYear()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('year','ASC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}
	public function searchOrderByDesYear()
	{


		$this->db->select("*");
		$this->db->from("paper");

		$this->db->order_by('year','DESC');
		$query=$this->db->get();
		return $query->result();

		//return $this->db->get();

	}

	public function submit($filename)
	{

		$field=array('title'=>$this->input->post('title'),
					 'course'=>$this->input->post('course'),
					 'faculty'=>$this->input->post('faculty'),
					 'type'=>$this->input->post('type'),
					 'year'=>$this->input->post('year'),
					 'file_name'=>$filename
					);


		$this->db->insert('paper',$field);

		if($this->db->affected_rows()>0){

			return true;
		}
		else
		{
			return false;
		}
	}

	public function getQuestionById($id)
	{
		$this->db->where('paper_id',$id);
		$query=$this->db->get('paper');
		if($query->num_rows() > 0)
		{
			//$this->db->order_by('paper_id','DESC');
			return $query->row();
		}else{

			return false;

		}
		
	}
	

	public function update($filename)
	{


		$id=$this->input->post('text_hidden');
		

		$field=array('title'=>$this->input->post('title'),
					 'course'=>$this->input->post('course'),
					 'faculty'=>$this->input->post('faculty'),
					 'type'=>$this->input->post('type'),
					 'year'=>$this->input->post('year'),
					 'file_name'=>$filename
					);

		
		$this->db->where('paper_id',$id);
		$this->db->update('paper',$field);

		if($this->db->affected_rows()>0){

			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete($id)
	{

		$this->db->where('paper_id',$id);
		$this->db->delete('paper');

		if($this->db->affected_rows()>0){

			return true;
		}
		else
		{
			return false;
		}
	}

	public function search($query)
	{


		$this->db->select("*");
		$this->db->from("paper");


		if($query!='')
		{
			$this->db->like('title',$query);
			$this->db->or_like('course',$query);
			$this->db->or_like('faculty',$query);
			$this->db->or_like('type',$query);
			$this->db->or_like('year',$query);
			$this->db->or_like('file_name',$query);
		}

		$this->db->order_by('paper_id','DESC');

		return $this->db->get();

	}


	 function getDownloadRows($id){
       

        $this->db->where('paper_id',$id);
		$query=$this->db->get('paper');
		if($query->num_rows() > 0)
		{
			return $query->row();
		}else{

			return false;

		}
    }

    public function login()
    {

    		$student_id=$this->input->post('student_id');
  			$password=md5($this->input->post('password'));


  			$this->db->select('*');
  			$this->db->from('student');
  			$this->db->where(array('student_id'=>$student_id,'password'=>$password));

  			$query=$this->db->get();

  			$user=$query->row();

  			if($user=$query->row()){
  				
			return $user=$query->row();

		    }else{
			return false;
		   }


    }

	public function checkLogin($post)
    {
        $this->load->library('password');       
        $this->db->select('*');
        $this->db->where('student_id', $post['student_id']);
        $query = $this->db->get('student');
        $userInfo = $query->row();
        
        if(!$this->password->validate_password($post['password'], $userInfo->password)){
            error_log('Unsuccessful login attempt('.$post['student_id'].')');
            return false; 
        }
        
        $this->updateLoginTime($userInfo->student_id);
        
        unset($userInfo->password);
        return $userInfo; 
    }
    
    public function updateLoginTime($id)
    {
        $this->db->where('student_id', $id);
        $this->db->update('student', array('last_login' => date('Y-m-d h:i:s A')));
        return;
    }

     public function admin_login()
    {

    		$username=$this->input->post('username');
  			$password=md5($this->input->post('password'));


  			$this->db->select('*');
  			$this->db->from('admin');
  			$this->db->where(array('username'=>$username,'password'=>$password));

  			$query=$this->db->get();

  			$user=$query->row();

  			if($user=$query->row()){
  				
			return $user=$query->row();

		    }else{

			return false;
		   }

    }

   public function register()
    {

    	$data=array(
			'student_id'=>$_POST['student_id'],
			'full_name'=>$_POST['full_name'],
			'password'=>'',
			'email'=>$_POST['email'],
			'course'=>$_POST['course'],
			'faculty'=>$_POST['faculty'],
			'last_login'=> '',
			'status'=>$this->status[0]
  			);

  		$this->db->insert('student',$data);

		if($this->db->affected_rows()>0){

			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
    }

	public function insertToken($user_id)
    {   
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );

        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }

	public function getPassword($student_id){

		$this->db->select("email");
		$this->db->from("student");
		$this->db->where('student_id',$student_id);
		$query=$this->db->get();
		return $query->result();

	}

	public function updateUserInfo($post)
    {
        $data = array(
               'password' => $post['password'],
               'last_login' => date('Y-m-d h:i:s A'), 
               'status' => $this->status[1]
            );
        $this->db->where('id', $post['user_id']);
        $this->db->update('student', $data); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updateUserInfo('.$post['user_id'].')');
            return false;
        }
        
        $user_info = $this->getUserInfo($post['user_id']); 
        return $user_info; 
    }

	public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);      
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.user_id' => $uid), 1);      
        
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }

	public function getUserInfo($id)
    {
        $q = $this->db->get_where('student', array('id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no student found getUserInfo('.$id.')');
            return false;
        }
    }
	
	public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('student', array('email' => $email), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$email.')');
            return false;
        }
    }
    
    public function updatePassword($post)
    {   
        $this->db->where('id', $post['user_id']);
        $this->db->update('student', array('password' => $post['password'])); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    }
	
	public function isDuplicate($email)
    {     
        $this->db->get_where('student', array('email' => $email), 1);
        return $this->db->affected_rows() > 0 ? TRUE : FALSE;         
    }

}
