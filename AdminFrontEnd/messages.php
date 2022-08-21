<?php
 
  $link = mysqli_connect("localhost", "root", "", "mms");
 
  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  

  // Close connection
  mysqli_close($link);

?> 




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin-MMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-primary shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.php" class="navbar-brand font-weight-bold text-uppercase text-dark">Mess Management System - SIBAU</a>
        <a href="index.html" class="text-dark text-uppercase">Home</a>/messages
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          
           <?php include('commonhead.php'); ?>
          
<!--************* BODY ******************-->
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-2">
          <!-- <div class="home-bgd"></div> -->
          <br>
          <div class="card" style="margin:10px; padding: 10px;">
            l;k
          </div>

        </div> <!-- Body div closed -->

        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">SIBAU-CS Department&copy; 2020</p>
              </div>
              <div class="col-md-6 text-center text-md-right text-gray-400">
                <p class="mb-0">Design by <a href="#" class="external text-gray-400">CSAIN @SIBAU</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <!-- JAVA SCRIPTS -->

  </body>
</html>