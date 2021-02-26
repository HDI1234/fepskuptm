<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public $status; 

    function __construct()
  	{
  		parent::__construct();
		$this->load->model('question_model','qmodel');
		$this->load->library('form_validation');    
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->status = $this->config->item('status');
  	}

	public function index()
	{

		if(isset($_SESSION['user_logged'])==False)
  	 	{
  			$this->session->set_flashdata("error","Please login first to view this page.");
  	 		redirect("home/login","refresh");
  	 	}

		$data['questionInfo']=$this->qmodel->getQuestion();

		$this->load->view('login',$data);
	}

	public function submit()
	{

		$config['upload_path'] = 'uploads/files/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
		
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file')) 
		{
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin_profile', $error);
        } 
		else 
		{
			$filename = $this->upload->file_name;
            $result=$this->qmodel->submit($filename);

            redirect(base_url('admin/profile'));
        }
		
		
	}

	public function searchOrderById()
	{
		$data['questionInfo']=$this->qmodel->searchOrderById();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('admin_profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}

	public function searchOrderByTitle()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByTitle();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('admin_profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByCourse()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByCourse();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('admin_profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByFaculty()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByFaculty();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('admin_profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByType()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByType();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('admin_profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByYear()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByYear();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('admin_profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}


	public function searchOrderByDesYear()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByDesYear();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByAscYear()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByAscYear();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByFinal()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByFinal();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByMidterm()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByMidterm();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}
	public function searchOrderByClassTest()
	{
		$data['questionInfo']=$this->qmodel->searchOrderByClassTest();
		//print_r($data);
		//$this->load->view('search_view/title_view_home',$data);
		$this->load->view('profile',$data);
		//redirect(base_url('home/index'));
		//
		
	}


	public function add()
	{
		
		$this->load->view('addQuestion');
		
	}
	public function contacts()
	{
		
		$this->load->view('contacts');
		
	}

	public function edit($id)
	{

		$data['editQn']=$this->qmodel->getQuestionById($id);
		
		$this->load->view('editQuestion',$data);
		
	}

	public function update()
	{

		$result=$this->qmodel->update();


		if($result){
			
			$this->session->set_flashdata("success"," Record updated successfully ");

		}else{

			$this->session->set_flashdata("error"," Fail to update record");
		}

		redirect(base_url('admin/profile'));
	}
	
	public function delete($id)
	{

		$result=$this->qmodel->delete($id);

		if($result){
			
			$this->session->set_flashdata("success"," Record deleted successfully");

		}else{

			$this->session->set_flashdata("error"," Fail to delete record");
		}

		redirect(base_url('admin/profile'));
	}
	
	public function searchData()
	{

			$output='';
			$query='';

			if($this->input->post('query'))
			{
				$query=$this->input->post('query');

			}
		    $data=$this->qmodel->search($query);

		    $output.='
			
			<div class="table-responsive">

			<table class="table table-bordered table-striped">

			  <tr>
				
				<th>Title</th>
		        <th>Code</th>
		        <th>Dept</th>
		        <th>Type</th>
		        <th>Year</th>
		        <th>File</th>
		        <th>File download </th>

			  </tr>

			

			</div>

		    ';

		if($data->num_rows()>0){

			foreach ($data->result() as $row) {


				$output .= '
				
				 <tr>
				
				<td>'.$row->title.'</td>
		        <td>'.$row->course.'</td>
		        <td>'.$row->faculty.'</td>
		        <td>'.$row->type.'</td>
		        <td>'.$row->year.'</td>
		        <td>'.$row->file_name.'</td>
		        <td><a class="btn btn-info" href='.base_url('home/download/'.$row->paper_id).'> Download</a></td>
		        

			   </tr>



				';
				
			}
		}
		else
		{
			$output .='

			<tr colspan ="7">
				
				<td>
					No data found
				</td>

			</tr>

			';
		}

       $output .= '</table>';

       echo $output;
	}

	public function download($id){
        if(!empty($id)){
           
            $this->load->helper('download');
            
            
            $fileInfo = $this->qmodel->getDownloadRows($id);
            
           
            $file = 'uploads/files/'.$fileInfo->file_name;

            if(!empty($file))
            {
             force_download($file, NULL);
            } 
            else{

            	$this->session->set_flashdata("error"," Fail to download record");

            }         
            
            
        }
    }

    public function login()
  	{

  		$this->form_validation->set_rules('student_id','Student ID','required');
  		$this->form_validation->set_rules('password','Password','required|min_length[5]');

  		if($this->form_validation->run()== True)
  		{

			$post = $this->input->post(NULL,TRUE);  
			$clean = $this->security->xss_clean($post);
			
			$userInfo = $this->qmodel->checkLogin($clean);
			
			if(!$userInfo){
				$this->session->set_flashdata('error', 'The login was unsuccessful');
				redirect("home/login","refresh");
			}                
			else{
				$_SESSION['user_logged']=True;
  				$_SESSION['student_id']= $userInfo->student_id;
			}

			redirect("user/profile","refresh");

  		}

  		$this->load->view('login');
  	}

  	public function logout()
  	{
  		unset($_SESSION);
  		session_destroy();
  		redirect("home/login","refresh");
  	}

  	public function register()
  	{
		
		if(isset($_POST['btn_register'])){
			$this->form_validation->set_rules('student_id','Student ID','required');
			$this->form_validation->set_rules('full_name','Full Name','required');
			$this->form_validation->set_rules('email','Email','required|valid_email|callback_email_check');
			$this->form_validation->set_rules('course','Course','required');
			$this->form_validation->set_rules('faculty','Faculty','required');
		}

		$captcha_response = trim($this->input->post('g-recaptcha-response'));

		if($captcha_response != '' && $this->form_validation->run()== True)
		{
			$keySecret = '6LflGmYaAAAAAP-xbEaXMFZeXLwp83aMvhnMIpAh';

			$check = array(
				'secret'		=>	$keySecret,
				'response'		=>	$this->input->post('g-recaptcha-response')
			);

			$startProcess = curl_init();

			curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

			curl_setopt($startProcess, CURLOPT_POST, true);

			curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

			curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

			$receiveData = curl_exec($startProcess);

			$finalResponse = json_decode($receiveData, true);

			if($finalResponse['success'] && !$this->qmodel->isDuplicate($this->input->post('email')))
			{
				$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
				$result=$this->qmodel->register($clean);
				$token = $this->qmodel->insertToken($result);
				
				$qstring = $this->base64url_encode($token);                    
                $url = base_url() . 'home/complete/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>';
				$email = $this->input->post('email');

				if($result){

					$this->session->set_flashdata('success', 'Your account has been registered. Check your email to verify account.');

					$this->load->library('email');
					$this->email->from('hasanaldaniel@gmail.com', 'KUPTM FEPS');
					$this->email->to($email);
					$this->email->subject('Account Verification');
					$this->email->message('Click this link to verify account: ' . $link);
					$this->email->set_newline("\r\n");
					$this->email->send();

					redirect("home/login");
				}
				else {
					$this->session->set_flashdata("error"," Fail to register new account");
				}
			}
			else
			{
				$this->session->set_flashdata("error"," Fail to register new account. Email already existed.");
			}
		}
		else
		{
			$this->session->set_flashdata("error"," Fail to register new account. Fail to verify Captcha.");
		}

  		$this->load->view('register');
  	}
	
	function email_check($str)
	{
		if (stristr($str,'@student.kuptm.edu.my') !== false) 
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('email_check','{field} must be @student.kuptm.edu.my.');
			return FALSE;
		}
	}

	public function base64url_encode($data) { 
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
  
	public function base64url_decode($data) { 
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	}

	
	public function complete()
	{                                   
		$token = base64_decode($this->uri->segment(4));       
		$cleanToken = $this->security->xss_clean($token);
		
		$user_info = $this->qmodel->isTokenValid($cleanToken); //either false or array();           
		
		if(!$user_info){
			$this->session->set_flashdata('error', 'Token is invalid or expired');
			redirect(base_url().'home/login');
		}            
		$data = array(
			'full_name'=> $user_info->full_name, 
			'email'=>$user_info->email, 
			'user_id'=>$user_info->id, 
			'token'=>$this->base64url_encode($token)
		);
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passwordConf', 'Password Confirmation', 'required|matches[password]');              
		
		if ($this->form_validation->run() == FALSE) {  
			$this->session->set_flashdata('error', 'Sampai sini dah'); 
			$this->load->view('completeReg', $data);
		}else{
			
			$this->load->library('password');                 
			$post = $this->input->post(NULL, TRUE);
			
			$cleanPost = $this->security->xss_clean($post);
			
			$hashed = $this->password->create_hash($cleanPost['password']);
			echo $cleanPost['password'];                
			$cleanPost['password'] = $hashed;
			echo $cleanPost['password'];
			unset($cleanPost['passwordConf']);
			$userInfo = $this->qmodel->updateUserInfo($cleanPost);
			
			if(!$userInfo){
				$this->session->set_flashdata('error', 'There was a problem updating your record');
				redirect(base_url().'home/login');
			}
			
			unset($userInfo->password);
			
			foreach($userInfo as $key=>$val){
				$this->session->set_userdata($key, $val);
			}
			redirect(base_url().'home/');
			
		}
	}

	public function forgot()
	{
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
		
		if($this->form_validation->run() == FALSE) {
			$this->load->view('forgetPassword');
		}else{
			$email = $this->input->post('email');  
			$clean = $this->security->xss_clean($email);
			$userInfo = $this->qmodel->getUserInfoByEmail($clean);
			
			if(!$userInfo){
				$this->session->set_flashdata('error', 'We cant find your email address');
				redirect(base_url().'home/login');
			}   
			
			if($userInfo->status != $this->status[1]){ //if status is not approved
				$this->session->set_flashdata('error', 'Your account is not in approved status');
				redirect(base_url().'home/login');
			}
			
			//build token 
			
			$token = $this->qmodel->insertToken($userInfo->id);                        
			$qstring = $this->base64url_encode($token);                  
			$url = base_url() . 'home/reset_password/token/' . $qstring;
			$link = '<a href="' . $url . '">' . $url . '</a>'; 
			
			$message = '';                     
			$message .= '<strong>A password reset has been requested for this email account</strong><br>';
			$message .= '<strong>Please click:</strong> ' . $link;             

			$this->load->library('email');
			$this->email->from('hasanaldaniel@gmail.com', 'KUPTM FEPS');
			$this->email->to($email);
			$this->email->subject('Reset Password');
			$this->email->message($message);
			$this->email->set_newline("\r\n");
			if($this->email->send()){
				$this->session->set_flashdata('success', 'Check your email to recover your account.');
				redirect("home/login","refresh");
			}
			
			redirect("home/login","refresh");
			
		}
		
	}

	public function reset_password()
	{
		$token = $this->base64url_decode($this->uri->segment(4));                  
		$cleanToken = $this->security->xss_clean($token);
		
		$user_info = $this->qmodel->isTokenValid($cleanToken); //either false or array();               
		
		if(!$user_info){
			$this->session->set_flashdata('error', 'Token is invalid or expired');
			redirect(base_url().'home/login');
		}            
		$data = array(
			'full_name'=> $user_info->full_name, 
			'email'=>$user_info->email, 
			//'student_id'=>$user_info->student_id, 
			'token'=>$this->base64url_encode($token)
		);
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('passwordConf', 'Password Confirmation', 'required|matches[password]');              
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('resetPassword', $data);
		}else{
							
			$this->load->library('password');                 
			$post = $this->input->post(NULL, TRUE);                
			$cleanPost = $this->security->xss_clean($post);                
			$hashed = $this->password->create_hash($cleanPost['password']);                
			$cleanPost['password'] = $hashed;
			$cleanPost['user_id'] = $user_info->id;
			unset($cleanPost['passwordConf']);                
			if(!$this->qmodel->updatePassword($cleanPost)){
				$this->session->set_flashdata('error', 'There was a problem updating your password');
			}else{
				$this->session->set_flashdata('success', 'Your password has been updated. You may now login');
			}
			redirect(base_url().'home/login');                
		}
	}
}
