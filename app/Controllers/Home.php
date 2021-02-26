<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {


    function __construct()
  	{
  		parent::__construct();
		$this->load->model('question_model','qmodel');
		$this->roles = $this->config->item('roles');
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

	public function index()
	{

		if(isset($_SESSION['user_logged'])==False)
  	 	{
  			$this->session->set_flashdata("error","Please login first to view this page.");
  	 		redirect("home/login","refresh");
  	 	}
		$data['questionInfo']=$this->qmodel->getQuestion();
		//print_r($data);
		//$this->load->view('view_home',$data);
		$this->load->view('admin_profile',$data);
	    //$this->load->view('profile',$data);
		
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

            	$this->session->set_flashdata("error_msg_download"," Fail to download record");

            }         
            
            
        }
    }

    public function login()
  	{

  		$this->form_validation->set_rules('student_id','Student ID','required');
  		$this->form_validation->set_rules('password','Password','required|min_length[5]');

  		if($this->form_validation->run()== True)
  		{

  			$user=$this->qmodel->login();

  			if($user){

  				$this->session->set_flashdata("success","You are logged in");

  				$_SESSION['user_logged']=True;
  				$_SESSION['student_id']=$user->student_id;


  			    redirect("user/profile","refresh");
  			}
			else{
  				$this->session->set_flashdata("error","No such account exists in database");
  			}

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
			$this->form_validation->set_rules('password','Password','required|min_length[5]');
			$this->form_validation->set_rules('password','Confirm Password','required|min_length[5]|matches[password]');
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

			if($finalResponse['success'])
			{
				$clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
				$result=$this->qmodel->register($clean);
				$token = $this->qmodel->insertToken($result);
				
				$qstring = $this->base64url_encode($token);                    
                $url = site_url() . 'main/complete/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>';

				if($result){
					$this->session->set_flashdata('success', 'Your account has been registered. Click this link to verify:' . $link);
					redirect("home/login");
				}
				else {
					$this->session->set_flashdata("error"," Fail to register new account");
				}
			}
			else
			{
				$this->session->set_flashdata("error"," Fail to register new account");
			}
		}
		else
		{
			$this->session->set_flashdata("error"," Fail to register new account");
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
}
