<?php if(isset($_SESSION['user_logged']))
{ ?>

    <?php redirect("home/login","refresh"); ?>

<?php   }  ?>
<html lang="en">
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

 <title>Admin's account</title>  
 
</head>
<body>

  <header class="header-transparent" id="header-main">
 
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand">FEPS KUPTM</a>
                </div>

                <ul class="nav navbar-nav ">
                  <li ><a href="<?php echo base_url();?>user/admin_profile">Home</a></li>
                  <li><a href="<?php echo base_url();?>home/contacts">Contacts</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right" >
                <li><a href="<?php echo base_url(); ?>home/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
               
              </ul>

              </div>
            </nav>
</header>

   
<div class="container">
 <centre>
  <?php 


          if($this->session->flashdata('success_admin'))
          {

        ?>

        <div class="alert alert-success">
              
              <?php echo $this->session->flashdata('success_admin'); ?>

        </div>

     <?php   
          }
      ?>


      <?php 


          if($this->session->flashdata('error_adLoginFirst'))
          {

        ?>

        <div class="alert alert-error">
              
              <?php echo $this->session->flashdata('error_adLoginFirst'); ?>

        </div>

     <?php   
          }
      ?>
       <?php 


          if($this->session->flashdata('error_admin'))
          {

        ?>

        <div class="alert alert-error">
              
              <?php echo $this->session->flashdata('error_admin'); ?>

        </div>

     <?php   
          }
      ?>


       <?php 


          if($this->session->flashdata('error_msg_download'))
          {

        ?>

        <div class="alert alert-error">
              
              <?php echo $this->session->flashdata('error_msg_download'); ?>

        </div>

     <?php   
          }
      ?>
</centre>

     <h3 align="left" style="color: #2F4F4F;">   Hello, <?php echo $_SESSION['username'].'!'; ?> </h3>
     <centre><h1 style="color: #8B4513;">FEPS KUPTM</h1></centre> 

     


   <a class="btn btn-primary" href="<?php echo base_url();?>home/add"> Add new</a>
   <br> <br>


     <div class="form-group">
      <div class="input-group">
      <span class="input-group-addon ">Search</span> 
        <input type="text" name="search" id="search" placeholder="Enter Keywords For Search" class="form-control"> 
        
      </div>
             
     </div>
    <br> 


    <div id="result">


            
    </div>
    
      
   <br> 
    <table class="table" border="3px">
    <thead>
      <tr>
        <th><a href="<?php echo base_url('home/searchOrderByTitle'); ?>">Title</th>
        <th><a href="<?php echo base_url('home/searchOrderByCourse'); ?>">Course Code</th>
        <th><a href="<?php echo base_url('home/searchOrderByFaculty'); ?>">Faculty</th>
        <th><a href="<?php echo base_url('home/searchOrderByType'); ?>">Type</th>
        <th><a href="<?php echo base_url('home/searchOrderByYear'); ?>">Year</th>
        <th>File</th>
        <th>Modify</th>
      </tr>
    </thead>
    <tbody>


      <?php 


        if($questionInfo){
          foreach ($questionInfo as $qtn) {

      ?>


      <tr>
        <td><?php echo $qtn->title; ?></td>
        <td><?php echo $qtn->course; ?></td>
        <td><?php echo $qtn->faculty; ?></td>
        <td><?php echo $qtn->type; ?></td>
        <td><?php echo $qtn->year; ?></td>
        <td><a class="btn btn-info" href="<?php echo base_url('home/download/'.$qtn->paper_id); ?>"> Download</a></td>
        <td> <a class="btn btn-info" href="<?php echo base_url('home/edit/'.$qtn->paper_id); ?>"> Edit</a>
             <a class="btn btn-danger" href="<?php echo base_url('home/delete/'.$qtn->paper_id); ?>" onclick="return confirm('Do you want to delete this record?');"> Delete</a>
        </td>
      </tr>
      <?php 

    }
      }

      ?>

    </tbody>
  </table>

</div><br><br>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
 <script type="text/javascript">
   
    $(document).ready(function(){
  
  //  load_data();

    function load_data(query)
  {         
        $.ajax({
                
                url:"<?php echo base_url();?>home/searchData",
                method:"POST",
                data:{query:query},
                success: function(data)
                {
                    $('#result').html(data);
                }

               })
 }


      $('#search').keyup(function(){

        var search=$(this).val();

        if(search!='')
        {
            load_data(search);
        }
        else
        {
            // load_data();
             $('#result').html("");
        }


      });
     

    });



 </script>
 <div class="footer">
 <br>
  <div class="container">All rights reserved © KUPTM 2021.
   <br>
   </div>
</div>
</body>
</html>