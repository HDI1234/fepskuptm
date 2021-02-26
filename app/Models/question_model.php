<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class question_model extends CI_Model {

   
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
	

	public function update()
	{


		$id=$this->input->post('text_hidden');
		

		$field=array('title'=>$this->input->post('title'),
					 'course'=>$this->input->post('code'),
					 'faculty'=>$this->input->post('dept'),
					 'type'=>$this->input->post('type'),
					 'year'=>$this->input->post('year'),
					 'file_name'=>$this->input->post('file')
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
			'password'=>md5($_POST['password']),
			'email'=>$_POST['email'],
			'course'=>$_POST['course'],
			'faculty'=>$_POST['faculty']
  			);

  		$this->db->insert('student',$data);

		if($this->db->affected_rows()>0){

			return true;
		}
		else
		{
			return false;
		}
    }

	public function sendEmail($to_email)
    {
		$this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		$this->email->from('hasanaldaniel@gmail.com', 'FEPS KUPTM');
		$this->email->to($to_email);

		$this->email->subject('Verify Your Email Address');
		$this->email->message('Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://localhost/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />FEPS KUPTM Team');

        return $this->email->send();
    }
    
    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('user', $data);
    }

}
