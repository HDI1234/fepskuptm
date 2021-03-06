<!DOCTYPE html>
<html>
<head>
  <title>Edit Question</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css"> 
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">

  -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap1.min.css">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
  #search {
    padding-left: 10px;
    padding-right: 10px;
  }
  #inputDiv{
    padding-left: 25px;
    padding-right: 25px;
    padding-top: 25px;
  }
  #result{
    padding-left: 25px;
    padding-right: 25px;
    padding-top: 25px;
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
                  <a class="navbar-brand">FEPS KUPTM</a>
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
                   if(isset($_SESSION['admin_logged'])==True)
                 { 
                ?>
               <li class="active"><a href="<?php echo base_url();?>admin/profile"><span class="glyphicon glyphicon-log-in"></span> Account</a></li>
                <li><a href="<?php echo base_url(); ?>home/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
               <?php   }  ?>
               
              </ul>

              </div>
            </nav>
</header>
  <br><br>

   
<div class="container">
     
     <center><h1 style="color: #8B4513;">Edit Question</h1></center> 
      <a class="btn btn-default " href="<?php echo base_url();?>admin/profile">Back</a>
      <br> <br>

 
       <form action="<?php echo base_url();?>home/update" method="POST" class="form-horizontal">

      <input type="hidden" name="text_hidden" value="<?php echo $editQn->paper_id; ?>">
     <!-- <h5><?php //echo $editQn->paper_id; ?></h5>
     -->


      <div class="form-group">
                                <label class="col-md-2">Title</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value="<?php echo $editQn->title; ?>" name="title" id="title" placeholder="Ex: Data Structure" required>
                                </div>
      </div>





      <div class="form-group">
                                <label class="col-md-2">Course Code</label>
                                <div class="col-md-10">
                                    <input type="text" value="<?php echo $editQn->course; ?>" class="form-control" name="code" id="code" placeholder="Ex:  CSE 340" required>
                                </div>
      </div>



      <div class="form-group">
                                <label class="col-md-2">Department</label>
                                <div class="col-md-10">
                                    <input type="text" value="<?php echo $editQn->faculty; ?>" class="form-control" name="dept" id="dept" placeholder="Ex: CSE" required>
                                </div>
      </div>



    <div class="form-group">
                                <label class="col-md-2">Question Type</label>
                                <div class="col-md-10">
                                    
                                    <select name="type" id="type" class="form-control">
                                       <?php 

                                         if($editQn->type=="Midterm")
                                         {
                                          ?> 
                                              <option selected value="Midterm">Midterm</option>
                                                <option value="Final">Final</option>

                                        <?php     
                                         }

                                      ?>
                                       <?php 

                                         if($editQn->type=="Final")
                                         {
                                          ?> 
                                              <option selected value="Final">Final</option>
                                               <option value="Midterm">Midterm</option>

                                        <?php     
                                         }

                                      ?>

                                    </select>

                                </div>
    </div>


     <div class="form-group">
                                <label class="col-md-2">Exam Year</label>
                                <div class="col-md-10">
                                    <input value="<?php echo $editQn->year; ?>" type="text" class="form-control" name="year" id="year" placeholder="Ex: 2019" required>
                                </div>
      </div>



      <div class="form-group">
                                <label class="col-md-2">Upload File</label>
                                <div class="col-md-10">

                                    <input type="file" value="<?php echo $editQn->file_name; ?>" class="form-control" name="file" id="file" placeholder="Open File">
                                </div>
      </div>



      <div class="form-group">
                                <div class="col-md-10">
                                    <button type="submit" name="update" class="btn btn-primary ">Update</button>
                                </div>
                                
       </div>
       <br><br>

      </form><br>

<div class="footer">
 <br>
  <div class="container">All rights reserved © FEPS KUPTM 2021.

   <br>
   </div>
</div>

</body>
</html>