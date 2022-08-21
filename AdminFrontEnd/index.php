<?php
 
  $link = mysqli_connect("localhost", "root", "", "mms");
 
  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  $exp=0; $unt=0;
  $curDate = date('yy-m-d');
  // echo $curDate;
  $sql = "SELECT expenses,units FROM dailybills WHERE date='$curDate'";
  $query_run = mysqli_query($link, $sql);
  if($query_run){
    foreach ($query_run as $row) {
      $exp = $row['expenses'];
      $unt = $row['units'];
    }
  }
  if($unt==0){$unt=1;}
  $unit = $exp/$unt ;
  // echo " / ".$unt." ".$exp;
  
  /*Others than Graph*/
  $allUsers=0;
  $sql = "SELECT * FROM users";
  $query_run = mysqli_query($link, $sql);
  $allUsers = mysqli_num_rows($query_run);

  $sql = "SELECT sum(paid) as total FROM payments";
  $query_run = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($query_run);
  $totPaid = $row['total'];
  

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
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-primary shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.php" class="navbar-brand font-weight-bold text-uppercase text-dark">Mess Management System - SIBAU</a>
        <a href="" class="text-dark text-uppercase">Home</a> 
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          
         <?php include('commonhead.php'); ?>
<!--************* BODY ******************-->
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">          
          
                    
          <br>
          <section>
            <div class="row">
              <div class="col-lg-8">
                <div class="card mb-5 mb-lg-0">         
                  <div class="card-header">
                    <h2 class="h6 mb-0 text-uppercase">Unit Price Graph</h2>
                  </div>
                  <div class="card-body bg-primary">
                    
                    <script type="text/javascript">
                      window.onload = function () {
                        var chart = new CanvasJS.Chart("chartContainer",
                        {
                          title:{
                           text: "Daily Unit price graph"
                          },
                          axisX:{
                            title: "-------------Date-------------"
                          },
                          axisY:{
                            title: "-------Unit price-------"
                          },
                          data: [
                          {
                            markerType: "circle",  //"circle", "square", "cross", "none"
                            type: "line",
                            dataPoints: [
                              { x: new Date(2020,11,1), y: 20 },
                              { x: new Date(), y: <?php echo $unit; ?>},                                                                
                            ]
                          }
                          ]
                        });

                        chart.render();
                      }
                    </script>

                    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>

                  </div>
                </div>
              </div>

              <!-- Right  -->
              <div class="col-lg-4">
                <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                      <h6 class="mb-0">Daily Mess Expenses</h6><span class="text-gray"><?php echo $exp; ?></span>
                    </div>
                  </div>
                  <div class="icon bg-violet text-white">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                </div>

                <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                      <h6 class="mb-0">Payment Recieved</h6><span class="text-gray"><?php echo $totPaid; ?></span>
                    </div>
                  </div>
                  <div class="icon bg-green text-white">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                </div>

                <div class="bg-white shadow roundy px-4 py-3 d-flex align-items-center justify-content-between mb-4">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-blue"></div>
                    <div class="text">
                      <h6 class="mb-0">Current users</h6><span class="text-gray"><?php echo $allUsers; ?> Users</span>
                    </div>
                  </div>
                  <div class="icon bg-blue text-white">
                    <i class="fas fa-user-friends"></i>
                  </div>
                </div>

                <div class="card px-5 py-4">
                  <h2 class="mb-0 d-flex align-items-center"><span><?php echo $allUsers; ?></span><span class="dot bg-red d-inline-block ml-3"></span></h2><span class="text-muted">Active mess members</span>
                    <div class="om"><br><br>
                      <span>Total Expenses: </span><span> <?php echo $exp; ?></span><br><br>
                      <span>Total Units: </span><span> <?php echo $unt; ?></span>
                    </div>
                </div>

              </div>
            </div>
          </section>

          <!-- REsult SET -->
          <section class="py-5">
            <!-- <div class="row">
              <div class="col-lg-12">
                <br><hr><br>
                <div class="message card px-5 py-3 mb-4 ">
                  <img src="img/ftr2.gif">
                </div>
              </div>
            </div> -->

          </section>
        
        </div> <!-- Body div closed -->

        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-left text-primary">
                <p class="mb-2 mb-md-0">SIBAU-CS Department&copy; 2020</p>
              </div>
              <div class="col-md-6 text-center text-md-right text-gray-400">
                <p class="mb-0"><DATA></DATA>esign by <a href="#" class="external text-gray-400">CSAIN @SIBAU</a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

  </body>
</html>