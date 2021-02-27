<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//css/bootstrap1.min.css">


    <style type="text/css">

      body {
     background-color: white;
    }

     #divMain {
      padding-left: 345px;
      padding-top: 70px;
      padding-bottom: 70px;
     
    }
    #la_id1{
      padding-left: 3px;
      padding-top: 8px;
     
    }
    #la_id2{
      padding-left: 3px;
      padding-top: 8px;
    }
    #la_id3{
      padding-left: 3px;
      padding-top: 2px;
    }
    #la_id4{
      padding-left: 3px;
      padding-top: 8px;

      
    }
    #la_id5{
      padding-left: 3px;
      padding-top: 3px;
    }
    #la_id6{
      padding-left: 3px;
      padding-top: 8px;
    }
    #la_id7{
      padding-left: 3px;
      padding-top: 8px;
    }

    #capt_box{
      padding-left: 50px;
      padding-top: 8px;
    }
    
    </style>

    <title>Register account</title>
  </head>
  <body>
    
    <br><br>
     
    <main>

        <div class="container h-100vh d-flex align-items-center" id="divMain">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                      <span class="clearfix"></span>

      <?php  

          if(isset($_SESSION['success']))
          { ?>

            <div class="alert alert-success">
              
              <?php echo $_SESSION['success']; ?>

            </div>

       <?php   }  ?>


      <?php  echo validation_errors('<div class="alert alert-danger">','</div>') ?>


       <div class="text-center mb-5">

                        <div class="text-center mb-5">
                            <h6 class="h3">Create Account</h6>
                        </div>
       </div>

      <form action="<?php echo base_url();?>home/register" method="POST">



       <div class="form-group">
                                <label class="col-md-2" id="la_id1">Student ID</label>

                                <div class="col-md-10">
                                     <input type="text" class="form-control" name="student_id" id="student_id" placeholder="Student ID">
                                </div><br>
      </div><br>

      <div class="form-group">
                                <label class="col-md-2" id="la_id2">Full Name</label>

                                <div class="col-md-10">
                                     <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name">
                                </div><br>
      </div><br>

     <div class="form-group">
                                <label class="col-md-2" id="la_id5">Email</label>

                                <div class="col-md-10">
                                     <input type="email" class="form-control" name="email" id="email" placeholder="studentid@student.kuptm.edu.my">
                                </div><br>
      </div><br>

      <div class="form-group">
                                <label class="col-md-2" id="la_id6" for="course">Course</label>

                                <div class="col-md-10">
                                    <select class="form-control" id="course" name="course">
                                      <option value="ACCA">ACCA</option>
                                      <option value="CAT">CAT</option>
                                      <option value="BE101">BE101</option>
                                      <option value="BE201">BE201</option>
                                      <option value="BE202">BE202</option>
                                      <option value="FT001">FT001</option>
                                      <option value="CC101">CC101</option>
                                      <option value="CT205">CT205</option>
                                      <option value="CM201">CM201</option>
                                      <option value="CT203">CT203</option>
                                      <option value="CT204">CT204</option>
                                      <option value="AA102">AA102</option>
                                      <option value="AA201">AA201</option>
                                      <option value="FC001">FC001</option>
                                      <option value="AB201">AB201</option>
                                      <option value="AA103">AA103</option>
                                      <option value="AB401">AB401</option>
                                      <option value="AB202">AB202</option>
                                      <option value="AB301">AB301</option>
                                      <option value="BK201">BK201</option>
                                      <option value="AC201">AC201</option>
                                      <option value="BK101">BK101</option>
                                    </select>
                                </div><br>
      </div><br>

      <div class="form-group">
                                <label class="col-md-2" id="la_id6" for="faculty">Faculty</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="faculty" name="faculty">
                                      <option value="FEHA">Faculty of Education, Humanities, and Arts</option>
                                      <option value="FCOM">Faculty of Computing and Multimedia</option>
                                      <option value="FBASS">Faculty of Business, Accountancy, and Social Studies</option>
                                      <option value="IGS">Institute of Graduate Studies</option>
                                      <option value="IPS">Institute of Professional Studies</option>
                                    </select>
                                </div><br>
      </div><br>

          <div class="form-group">
            
          <div class="g-recaptcha" id="capt_box" data-sitekey="6LflGmYaAAAAAO8wS_BDuVY67YzaRR60XRiNMGqi"></div>
         </div>


     <div class="text-center mb-3">

                                  <button type="submit" name="btn_register" class="btn btn-block btn-primary">Create account</button>
    </div>

   <div class="text-center">
                                <span class="small d-sm-block d-md-inline">Already registered?</span>
                                <a href="<?php echo base_url();?>home/login" class="small font-weight-bold">Sign in</a>
     </div>


      </form>

      </div>
       </div>
     </div>
   </div><br><br>

 
</main>

   
<script type="text/javascript" src="<?php echo base_url(); ?>assets//js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets//js/bootstrap.min.js"></script>


  </body>
</html>