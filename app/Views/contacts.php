<!doctype html>
<html lang="en">
  <head>
   <title>Contact Us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap1.min.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


   <style type="text/css">


    .navbar-nav{
      padding: 12px;
      margin-left: 5px;

   }
   .navbar-header{
       padding: 12px;
      margin-left: 2px;
      text-decoration-color: white;
   }

   .navbar-right{
      padding: 12px;
      margin-right: 5px;

   }

   .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
body{
    background: #DCDCDC;
  }
 
     
    
   </style>

   

</head>
<body>

  <header class="header-transparent" id="header-main">
 
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="<?php echo base_url();?>user/profile">FEPS KUPTM</a>
                </div>

                <ul class="nav navbar-nav ">
                  <li ><a href="<?php echo base_url();?>user/profile">Home</a></li>
                  <li ><a href="<?php echo base_url();?>home/contacts">Contacts</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right" > 

                  <?php 
                   if(isset($_SESSION['user_logged'])==False && isset($_SESSION['admin_logged'])==False)
                 { 
                ?>
                <li><a href="<?php echo base_url();?>home/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="<?php echo base_url();?>home/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
               <?php   }  ?>

                <?php  

                          if(isset($_SESSION['admin_logged']))
                          { ?>

                             <li class="active"><a href="<?php echo base_url();?>admin/profile"><span class="glyphicon glyphicon-log-in"></span> Account</a></li>
                              <li><a href="<?php echo base_url(); ?>home/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
              <?php   }  ?>

              <?php  

                          if(isset($_SESSION['user_logged']))
                          { ?>

                             <li class="active"><a href="<?php echo base_url();?>user/profile"><span class="glyphicon glyphicon-log-in"></span> Account</a></li>
                             <li><a href="<?php echo base_url(); ?>home/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
              <?php   }  ?>
               
              </ul>

              </div>
            </nav>
</header>

    <section class="slice slice-lg pb-lg-0 bg-gradient-primary" data-separator="rounded-left" data-separator-orientation="bottom" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="mb--100 position-relative" style="z-index: 1;">
                            <div class="pt-lg text-center">
 <br><br>
                               <div class="serv-mine white-box">
    <div class="wrapper white-box">
        <div class="container">
            <div class="contact-box">
                <h2 class="wrap-title" style="color: #2F4F4F;">Contact Us</h2>

        <div >
          <div id="result"></div><br>
        </div>
         <h5 style="font-size:130%;">If you want to contact or send questions of your department </h5>
          <h5 style="font-size:130%;">If you have futher questions, Email is a way to get in touch with us. Looking forward to seeing you in our inbox.</h5><br>
          <div>
            <h3 class="wrap-title" style="color: #2F4F4F;">Email Us</h3>
            <p style="font-size:130%;">support.mu@gmail.com</p>
          </div>
               
            </div>
        </div>
    </div>
       
      
       
       
        <div class="clearfix"></div>
      </div>
    </div>
    </div>
                               
                        </div>
                    </div>
                </div>
            </div>
        </section>

<br><br>


<div class="footer">
 <br>
  <div class="container">All rights reserved © FEPS KUPTM 2021.
   <br>
   </div>
</div>
 
</body>
</html>