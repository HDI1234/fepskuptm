<!doctype html>
<html lang="en">
  <head>

  <script src='https://www.google.com/recaptcha/api.js'></script>

   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap1.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
  
   

   <title>FEPS KUPTM KL</title>

<style type="text/css">
  body {
  padding-top:200px;
  background-color: white;
}
#divMain {
  padding-left: 350px;
  padding-right: 10px;
}
#la_id1{
  padding-left: 10px;
  padding-top: 8px;
}
#la_id2{
  padding-left: 10px;
  padding-top: 8px;
}
#logo-main{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 25%;
}
</style>


</head>
<body>

<br>

<img src="<?php echo base_url(); ?>images/logo.png" alt="Logo KUPTM" id="logo-main">
    <div class="container w-auto h-50 d-flex justify-content-center" id="divMain">
        <div class="col">
            <div class="d-flex justify-content-center">
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

   <div class="text-center mb-5">

                            <h6 class="h3">Update Password</h6>
   </div><br><br>

   

   <form action="<?php echo base_url();?>home/reset_password/token/<?php echo $token; ?>" method="post">


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

   <div class="text-center mb-3">
   <br> <br>
                                <button  type="submit" name="btn_change" class="btn btn-block btn-primary">Update Password</button>
    </div>
  </form>
     </div>
       </div>
     </div>
   </div>

 <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

  </body>
</html>