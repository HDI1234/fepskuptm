<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

  	 public function __construct()
  	 {

  	 	parent:: __construct();

   
      $this->load->model('question_model','qmodel');
  	 }


   public function index()
  {


    if(isset($_SESSION['admin_logged'])==False)
      {


        $this->session->set_flashdata("error","Please login first to view this page!!");
      //    redirect("home/login","refresh");
      }

    $data['questionInfo']=$this->qmodel->getQuestion();
    //print_r($data);
    $this->load->view('admin_profile',$data);

    //

      
    
  }



     public function admin_login()
    {

      $this->form_validation->set_rules('username','Username','required');
      $this->form_validation->set_rules('password','Password','required|min_length[5]');

      if($this->form_validation->run()== True)
      {

        $admin=$this->qmodel->admin_login();
        
        if($admin){

          $this->session->set_flashdata("success","You are logged in");

          $_SESSION['admin_logged']=True;
          $_SESSION['username']=$admin->username;

           redirect("admin/profile","refresh");


        }else{

          $this->session->set_flashdata("error","No such account exists in database");

        }

      }

      $this->load->view('admin_login');
    }
  	

  		public function profile()
  		{



  		if(isset($_SESSION['admin_logged'])==False)
  	 	{

  			$this->session->set_flashdata("error","Please login first to view this page.");
  	 		redirect("admin/admin_login","refresh");
  	 	}
       //index();

      $data['questionInfo']=$this->qmodel->getQuestion();
    //print_r($data);
      $this->load->view('admin_profile',$data);


  			//$this->load->view('admin_profile');
  		}





 }


?>