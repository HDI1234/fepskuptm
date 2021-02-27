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

        <h5>Hello <span><?php echo $full_name; ?></span>. Your email address is <span><?php echo $email;?></span></h5>
   </div><br><br>

   

   <form action="<?php echo base_url();?>home/complete/token/<?php echo $token; ?>" method="post">


      <div class="form-group">
                                <label class="col-md-2" id="la_id1">New Password</label>

                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Must be more than 5 characters">
                                </div><br>
      </div><br>

      <div class="form-group">
                                <label class="col-md-2" id="la_id1">Confirm New Password</label>

                                <div class="col-md-10">
                                    <input type="password" class="form-control" name="passwordConf" id="passwordConf" placeholder="Must be the same as above">
                                </div><br>
      </div><br>
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" >
   <div class="text-center mb-3">
   <br> <br>
                                <button  type="submit" name="Complete" class="btn btn-block btn-primary">Update Password</button>
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