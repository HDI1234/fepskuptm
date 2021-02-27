<!doctype html>
<html lang="en">
  <head>

  <script src='https://www.google.com/recaptcha/api.js'></script>

   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets//css/bootstrap1.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
  
   

    <title>FEPS KUPTM KL</title>

    <style type="text/css">
      body {
     background-color: white;
    }
    #divMain {
      padding-left: 350px;
      padding-top: 120px;
      padding-right: 10px;
    }
    #la_id1{
      padding-left: 2px;
      padding-top: 8px;
    }
    #la_id2{
      padding-left: 10px;
      padding-top: 8px;
    }
    </style>


  </head>
  <body>

    <br>


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

       <?php  

          if(isset($_SESSION['error']))
          { ?>

            <div class="alert alert-danger">
              
              <?php echo $_SESSION['error']; ?>

            </div>

       <?php   }  ?>


      <?php  echo validation_errors('<div class="alert alert-danger">','</div>') ?>

      <centre><img src="<?php echo base_url(); ?>assets//images/logo.png" alt="Logo KUPTM"  class="img-fluid"></centre>

   <div class="text-center mb-5">

                            <h6 class="h3">Forgot Password</h6>
   </div><br><br>

   

   <form action="<?php echo base_url();?>home/forgot" method="post">


      <div class="form-group">
                                <label class="col-md-2" id="la_id1">Student Email</label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Student Email">
                                </div><br>
      </div><br>

   <div class="text-center mb-3">
   <br> <br>
                                <button  type="submit" name="btn_reset" class="btn btn-block btn-primary">Reset Password</button>
    </div>
  </form>
     </div>
       </div>
     </div>
   </div>
   
 <script type="text/javascript" src="<?php echo base_url(); ?>assets//js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets//js/bootstrap.min.js"></script>

  </body>
</html>