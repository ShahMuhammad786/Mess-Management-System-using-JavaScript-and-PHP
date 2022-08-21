<?php
 
  $link = mysqli_connect("localhost", "root", "", "mms");
 
  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  session_start();
  
  if(!isset($_SESSION['uname'])){
    header('Location: login.php');
  }

  $globalUname = $_SESSION['uname'];
  $globalPass = $_SESSION['pass'];

  if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header('Location: login.php');
  }


  /*** Getting things from database and show to the users. ***/
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

  /*Personal information of a user*/
  $cms="";
  $name="";
  $hostel=0;
  $room=0;
  $sql = "SELECT cmsid, name, hostel, room FROM users WHERE cmsid='$globalUname'";
  $query_run = mysqli_query($link, $sql);
  if($query_run){
    foreach ($query_run as $row ) {
      $cms = $row['cmsid'];
      $name = $row['name'];
      $hostel = $row['hostel'];
      $room = $row['room'];
    }
  }

  $required = 0;
  $helperCharges = 0;
  $paid = 0;
  $remaining = 0;
  $sql = "SELECT required, paid, helperCharges, remaining FROM payments WHERE cmsid='$globalUname'";
  $query_run = mysqli_query($link, $sql);
  if($query_run){
    foreach ($query_run as $row ) {
      $required = $row['required'];
      $paid = $row['paid'];
      $helperCharges = $row['helperCharges'];
      $remaining = $row['remaining'];
    }
  }


  /*Going to Admin*/
  if(isset($_POST['Admin'])){
    header('Location: AdminFrontEnd/login.php');
  }


  // Close connection
  mysqli_close($link);

?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mess Management System</title>
        
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/light-box.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/templatemo-style.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <!-- For floating whatsApp Button -->        
        <link rel="stylesheet" type="text/css" href="css/wa.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">

        <style>
          .internal:hover{
            background-color: red;
          }

        </style>

    </head>

<body>

        
        <header class="nav-down responsive-nav hidden-lg hidden-md">
            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <nav>
                    <ul class="nav navbar-nav">
                        <li><a href="#slide">Home</a></li>
                        <li><a href="#stat">Stats</a></li>
                        <li><a href="#menue">Menue</a></li>
                        <li><a href="#DBills">Daily Bills</a></li>
                        <li><a href="#MBills">Monthly Bills</a></li>
                        <li><a href="#other">Others</a></li>
                        <li><a href="#Abt">About</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        
        <div class="sidebar-navigation hidde-sm hidden-xs">
            <div class="logo" >   
              <a href="#foo" style=" background-color: #20B2AA; border-radius: 150px; border: 1px solid red;" class="internal">
                <img src="img/4.jpg" height="80" width="80" style="border-radius: 200px;"> 
                <h3><b>Developers</b> <br><h5> Students @SIBAU</h5></h3>
              </a>
            </div>

            <nav>
                <ul>
                    <li>
                        <a href="#slide">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#stat">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Stats
                        </a>
                    </li>
                    <li>
                        <a href="#menue">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Menue
                        </a>
                    </li>
                    <li>
                        <a href="#DBills">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Daily Bills
                        </a>
                    </li>
                    <li>
                        <a href="#MBills">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Monthly Bills
                        </a>
                    </li>
                    <li>
                        <a href="#other">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Others
                        </a>
                    </li>
                    <li>
                        <a href="#Abt">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#contact">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
            <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://web.whatsapp.com/" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>


        <div class="slider" id="slide">
             <div class="user" style="height: 140px;">   
                <form method="post">
                  <button id="logout" name="logout" style=" background-color: #20B2AA; border:1px solid red;">
                    <?php echo $globalUname;  ?><br>
                    Log out <i class="fa fa-sign-out"></i>                  
                  </button>
                </form>
                
                <form method="post"> 
                  <button style=" background-color: #20B2AA; border:1px solid red;" name="Admin">
                    Log in <br>                  
                    As Admin <i class="fa fa-sign-in"></i>
                    <br>                  
                  </button>    
                </form>
                
                <h2 style="text-align: center; padding: 50px;padding-left: 200px;  color: white; margin: 0px; "> <b>Welcome to Mess Management System-SIBAU</b>  
                </h2> 

                               
            </div> 

            <div class="Modern-Slider content-section" id="top">
                <!-- Item -->                
                <div class="item item-1">
                    <div class="img-fill">
                    <div class="image"></div>
                    <div class="info">
                        <div>
                          <h1>Mess Management<br>System</h1>
                          <p>This is the web based application made by Sukkur IBA university.<br>
                            CS Departments' Students .</p>
                          <div class="white-button button">
                              <a href="#Abt">About Us</a>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
                <!-- Item -->
                <div class="item item-2">
                    <div class="img-fill">
                        <div class="image"></div>
                        <div class="info">
                        <div>
                          <h1>Welcome to SIBA <br>MMS</h1>
                          <p>This is the Mess Management Application.
                         <br>Thank you for Joining us.</p>
                          
                          <div class="white-button button">
                              <a href="#contact">Contact Us</a>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
                <!-- Item -->
                <div class="item item-3">
                    <div class="img-fill">
                        <div class="image">
                            
                        </div>
                        <div class="info">
                        <div>
                          <h1>Sukkur IBA <br>University</h1>
                          <p>Sukkur IBA University is on of the best university of pakistan. <br>
                          If you want to know more about SIBAU, click on below button.</p>        
                          <div class="white-button button">
                              <a href="https://www.iba-suk.edu.pk/" target="_blank">Learn More</a>
                          </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- // Item -->
            </div>
        </div>

        <!-- Contents -->
   <!-- Statistics *************************************************************************-->
        <div class="page-content">
            <section id="stat" class="content-section">
                <div class="section-heading">
                    <h1>Mess<br><em>Statistics</em></h1>
                    <p>This is the all statistics  
                    <br>related to mess of a particular student.    </p>
                </div>
                <div class="section-content" >
                  <div style="background-color: #20B2AA; border:1px solid red; border-radius: 20px;">
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
                    <div id="chartContainer" style="height: 300px; width: 100%; "></div>
                    <br><hr>
                  </div>
                    

                    <!-- Other data related to stats -->
                    <h2>Other Stats</h2>
                    <div class="other-stats" style="background-color: #20B2AA; border:1px solid red; border-radius: 20px;">                                            
                         <table class="table table-dark" >
                            <tr >
                              <th style="background-color: #483D8B">CMS-ID</th>
                              <th style="background-color: #483D8B">Name</th>
                              <th style="background-color: #483D8B">Hostel No</th>
                              <th style="background-color: #483D8B">Room No</th>
                              <th style="background-color: #483D8B">Payment Required</th>
                              <th style="background-color: #483D8B">Helper Charges</th>
                              <th style="background-color: #483D8B">Paid</th>
                              <th style="background-color: #483D8B">Remaining</th>
                              <th style="background-color: #483D8B">Unit price</th>
                              <th style="background-color: #483D8B">Total Units</th>
                              <th style="background-color: #483D8B">Mess Status</th>                              
                            </tr>
                            <tr>
                              <td><?php echo $cms; ?></td>
                              <td><?php echo $name; ?></td>
                              <td><?php echo $hostel; ?></td>
                              <td><?php echo $room; ?></td>
                              <td><?php echo $required; ?></td>
                              <td><?php echo $helperCharges; ?></td>
                              <td><?php echo $paid; ?></td>
                              <td><?php echo $remaining; ?></td>
                              <td><?php echo $unit; ?></td>
                              <td>50</td>
                              <td style="background-color: green;">Running</td>                  
                            </tr>
                          </table><br><hr style="background-color: red; padding: 2px;"><hr style="background-color: red; padding: 2px;">

                          <!-- Elements in Menue -->
                          <?php
                        $link = mysqli_connect("localhost", "root", "", "mms");                   
                        // Check connection
                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }

                        $sql = "select * from elements";
                        $query_run = mysqli_query($link, $sql);
                    ?> 
                      <table class="table table-dark table-hover table-responsive" id="datatableid">
                        <thead>
                          <tr>
                            <th scope="col" style="background-color: #483D8B">Elements</th>
                            <th scope="col" style="background-color: #483D8B">Units</th>         
                            
                          </tr>
                        </thead>
                    <?php
                      if($query_run)
                      { 
                        foreach ($query_run as $row) 
                        {
                    ?>
                          <tbody>
                            <tr>
                              <td><?php echo $row['element']; ?></td>
                              <td><?php echo $row['units']; ?></td>                              
                              
                            </tr>                          
                          </tbody>
                    <?php
                        }                      
                      } 
                        mysqli_close($link);
                    ?>    
                      </table>
                    </div>
                    <br><br><br><br><br><hr style="background-color: red;
                                          height: 1px;">
                </div>
            </section>

 <!-- Menue ***********************************************************************-->
            <section id="menue" class="content-section">
                <div class="section-heading">
                    <h1>Mess<br><em>Menue</em></h1>
                    <p>This is the menue that is  
                    <br>provided by the mess management.</p>
                </div>
                <div class="section-content" >
                    <div class="masonry">
                        <div class="row">
                        <div class="other-stats" style="background-color: #20B2AA; border-radius: 20px; border: 1px solid red;">
                            <?php
                            $link = mysqli_connect("localhost", "root", "", "mms");                   
                            // Check connection
                            if($link === false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }

                            $sql = "select * from menue";
                            $query_run = mysqli_query($link, $sql);
                        ?> 
                          <table class="table table-dark table-hover table-responsive " id="datatableid">
                            <thead>
                              <tr>
                                <th scope="col" style="background-color: #483D8B;">Day</th>
                                <th scope="col" style="background-color: #483D8B;">Breakfast</th>
                                <th scope="col" style="background-color: #483D8B;">Lunch</th>
                                <th scope="col" style="background-color: #483D8B;">Dinner</th>
                               
                              </tr>
                            </thead>
                        <?php
                          if($query_run)
                          { 
                            foreach ($query_run as $row) 
                            {
                        ?>
                              <tbody>
                                <tr>
                                  <td><?php echo $row['day']; ?></td>
                                  <td><?php echo $row['breakfast']; ?></td>
                                  <td><?php echo $row['lunch']; ?></td>
                                  <td><?php echo $row['Dinner']; ?></td>
                                 
                                </tr>                          
                              </tbody>
                        <?php
                            }                      
                          } 
                            mysqli_close($link);
                        ?>    
                          </table>
                        </div>

                        </div>
                    </div>
                    <br><br><br><br><br><hr style="background-color: red;
                                          height: 1px;"><br><br>
                </div>            
            </section>

 <!-- Daily bills ********************************************************************-->
            <section id="DBills" class="content-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">                           
                            <h1>This is a <em>Daily</em> Mess expensive bills.</h1>
                            <p>This is the authentic bill from the cook and the 
                                mess manager.</p>
                        </div>
                        <div class="text-content">
                            <p>You can verify it from the cook and mess manager
                                as well by contecting to them.</p>
                        </div>
                        <form action="">
                            <label for="date">Select Date :</label>
                            <input type="Date" id="date" name="date" value="Date()">
                            <input type="submit" class="btn-success">
                        </form><br>
                        <div class="other-stats" style="border: 1px solid red ; border-radius: 20px; background-color: #20B2AA; padding: 20px;">
                            This will display the picture of the daily bills.
                        </div>
                        <div class="accent-button button" style=" border-radius: 200px;">
                            <a href="#">Download</a>
                        </div>
                    </div>
                </div>
            </section>

 <!-- Monthly Bills *******************************************************************-->
            <section id="MBills"  >
                <br><br><br><br><br><hr style="background-color: red;
                                          height: 1px;"><br><br><br><br>
                <div class="section-heading">
                    <h1>Monthly<br><em>Mess Expensive bills</em></h1>
                    <p>You can see the previous months' bills here
                    <br>by selecting the month.</p>
                </div>

                <div class="section-content" >
                    <div class="tabs-content">
                        <div class="wrapper">
                            <section>
                               <div class="mothly-bills" style="padding:20px;  border-radius: 20px;">
                                    <p>The latest month's bill will be shown here.</p>
                                   
                                   <div class="other-stats" style="border: 1px solid red ;  border-radius: 20px; text-align: center; margin: 10px; background-color: #20B2AA;" >
                                        This will display the file of the monthly bills.
                                    </div>
                                    <div class="accent-button button" >
                                        <br>
                                         <a href="#">Export to Exel and Download</a>
                                    </div>
                               </div>
                            </section> 
                        </div>
                    </div>
                </div> 
            </section>

<!-- Other Elements *******************************************************************-->
            <section id="other" style="padding: 50px;" >
                <br><br><br><br><br><hr style="background-color: red;
                    height: 1px;"><br><br><br><br>
                <div class="section-heading">
                    <h1>Other<br><em>Mess Options</em></h1>
                    <p>You can access other important mess options 
                    <br>by clicking the below button.</p>

                    <!-- Trigger/Open The Modal -->
                    <br><br><br>
                    <!-- <button id="myBtn">Open Modal</button> -->
                    <div class="popup-btn" >
                      <button id="myBtn1" style="border-radius: 200px; border: 2px solid red;">Payments</button>
                      <button id="myBtn2" style="border-radius: 200px; border: 2px solid red;">Mess Option</button>
                      <br>
                      <button id="myBtn3" style="border-radius: 200px; border: 2px solid red;">Dailly Bill History</button>
                    <button id="myBtn4" style="border-radius: 200px; border: 2px solid red;">Monthly Bill History</button>
                    </div>

                    <!-- The Payments -->
                    <div id="myModal1" class="modal">
                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>The Payments Option</h2>
                        <hr><br>
                        <div class="modal-content-2">
                          <form>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input type="number" class="form-control" id="inputEmail3" placeholder="Enter balance to pay">
                              </div>
                            </div>
                            <br>                            
                            <fieldset class="row mb-3">
                              <legend class="col-form-label col-sm-2 pt-0">Payment Methods</legend>
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                  <label class="form-check-label" for="gridRadios1">
                                    Jazz Cash
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                  <label class="form-check-label" for="gridRadios2">
                                    Easy Paisa
                                  </label>
                                </div>
                                <br>
                              </div>
                            </fieldset>                    
                            <button type="submit" class="btn btn-primary">Pay</button>
                          </form>
                          
                        </div>

                      </div>
                    </div>

                    <!-- The Mess Option -->
                    <div id="myModal2" class="modal">
                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">&times;</span>                        
                        <h2>The Mess Option</h2>
                        <hr>
                        <div style=" float: left; background-color: lightgray; padding: 20px; margin:20px; width: 90%; ">
                          <h4>Mess Off</h4><br>
                          <form>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputEmail3" placeholder="Enter Date ">
                              </div>
                            </div>
                            <select style="padding: 10px;">
                              <option selected>Open this select time</option>
                                <option value="1">Breakfast</option>
                                <option value="2">Lunch</option>
                                <option value="3">Dinner</option>
                              </select> <br> <br>                           
                                         
                            <button type="submit" class="btn btn-primary">Aprove it</button>
                          </form>

                        </div>

                        <div style="float: left; background-color: lightgray; padding: 20px; margin:20px; width: 90%; ">
                          <h4>Request Guest</h4><br>
                          <form>
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputEmail3" placeholder="Enter Date">
                              </div>
                            </div>
                            <select style="padding: 10px;">
                              <option selected>Open this select time</option>
                                <option value="1">Breakfast</option>
                                <option value="2">Lunch</option>
                                <option value="3">Dinner</option>
                              </select> <br> <br>                           
                                         
                            <button type="submit" class="btn btn-primary">Aprove it</button>
                          </form>

                        </div>                      
                      </div>
                    </div>

                    <!-- The Daily History -->
                    <div id="myModal3" class="modal">
                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">&times;</span>
                          <h2>The Daily Bills</h2>
                        <hr><br>
                        <div class="modal-content-2">
                          <form >                            
                            <b>Date:</b> 
                            <input type="Date" name="date">
                            <button>Show</button>
                              <div class="dlb">
                                The daily bill history will show here.
                              </div>

                          </form>  
                        </div>
                      </div>
                    </div>

                    <!-- The Monthly History -->
                    <div id="myModal4" class="modal" >
                      <!-- Modal content -->
                      <div class="modal-content">
                        <span class="close">&times;</span>
                            <h2>The Monthly Bills</h2>
                            <hr><br>
                            <div class="modal-content-2">
                              <form >                            
                                <b>Month:</b> 
                                <input type="month" name="date">
                                <button>Show</button>
                                  <div class="mlb">
                                    The monthly bills history will show here.
                                  </div>

                              </form>  
                        </div>
                      </div>
                    </div>

                </div>
                <br><br><br><hr style="background-color: red;
                height: 1px;"><br><br>
            </section>


<!-- About Us *****************************************************************-->
            
            <section class="content-section" id="Abt">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">                           
                            <h1>About<em>Us</em> </h1>
                            <p><b>The developers of this site are he students of
                                Sukkur IBA University</b></p>
                        </div>
                        <div class="text-content">                          
                            <img src="img/1.jpg" class="about" style="border-radius: 10px; margin:10px;">
                            <p style="margin:5px;"><br> This is <b>Mr. Wasid Khan</b>. He is the Student of Sukkur IBA University, Sindh. He is the student of computer science. And currenctly Studying in the 4th semester at SIBAU. He belongs to a district called 'Bannu' at Khyber PakhtoonKhwa. 
                              </p>
                            <br>
                            <img src="img/3.jpg" class="about-2" style="border-radius: 10px;margin:10px;"> 
                            <p><br><br><br><br>  This is <b>Mr. Shah Muhammad</b>. He is the Student of Sukkur IBA University, Sindh. He is the student of computer science. And currenctly Studying in the 4th semester at SIBAU. He belongs to a Faderally Administrated Trible Area (FATA), Orakzai Agency in Khyber PakhtoonKhwa. 
                                </p>
                            <br>
                        </div>                        
                    </div>                    
                </div>
            </section>

<!-- Contact us **********************************************************************-->
            <section id="contact" class="content-section">
                <div id="map">
                    <br><br><hr style="background-color: red;
                    height: 1px;" width="90%"><br><br>
                    <h1>Location on map</h1>
                
                  <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1570.1429946972564!2d68.81843311924233!3d27.7261236421809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3935d4af0e0f6721%3A0x6a57455ae708c7b!2sSukkur%20IBA%20University!5e1!3m2!1sen!2s!4v1607481860543!5m2!1sen!2s" width="100%" height="400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div id="contact-content">
                    <div class="section-heading">
                        <h1>Contact<br><em>Us</em></h1>
                        <p>You can contact us by filling the following form. 
                        <br>If you have any queries or any complaint related to Mess Management, you can contact.</p>
                        
                    </div>
                    <div class="section-content" style=" border-radius: 20px; background-color: #20B2AA; padding: 50px;">
                        <form id="contact" action="" method="post">
                            <div class="row" > 
                                <div class="col-md-4" >
                                  <fieldset >
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-4">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                  </fieldset>
                                </div>
                                 <div class="col-md-4">
                                  <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">
                                    Send Message Now</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="footer" id="foo">
                <p>Copyright &copy; 2020 SIBAU CS Department</p>
                
<!--*************** For whatsApp floating Button ***************************-->
                  <div class="nav-bottom">
                    <div class="popup-whatsapp fadeIn">
                        <div class="content-whatsapp -top"><button type="button" class="closePopup">
                        <i class="material-icons icon-font-color">close</i>
                        </button>
                        <p>Hello, 😊 need help?</p>
                        </div>
                        
                        <div class="content-whatsapp -bottom">
                          <input class="whats-input" id="whats-in" type="text" Placeholder="write message here..." />
                            <button class="send-msPopup" id="send-btn" type="button">
                            <i class="material-icons icon-font-color--black">send</i>
                            </button>                            
                        </div>
                    </div>

                    <button type="button" id="whats-openPopup" class="whatsapp-button">
                        <img class="icon-whatsapp" src="https://image.flaticon.com/icons/svg/134/134937.svg">
                    </button>
                    <div class="circle-anime"></div>
                  </div>

            </section>
        </div>



<!-- JS *****************************************************************-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <script>
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }
            
            lastScrollTop = st;
        }
    </script>

    <!-- for popup -->
    <script type="text/javascript">
      // Get the modal
      var modal1 = document.getElementById("myModal1");
      var modal2 = document.getElementById("myModal2");
      var modal3 = document.getElementById("myModal3");
      var modal4 = document.getElementById("myModal4");

      // Get the button that opens the modal
      var btn1 = document.getElementById("myBtn1");
      var btn2 = document.getElementById("myBtn2");
      var btn3 = document.getElementById("myBtn3");
      var btn4 = document.getElementById("myBtn4");

      // Get the <span> element that closes the modal
      var span1 = document.getElementsByClassName("close")[0];
      var span2 = document.getElementsByClassName("close")[1];
      var span3 = document.getElementsByClassName("close")[2];
      var span4 = document.getElementsByClassName("close")[3];

      // When the user clicks the button, open the modal 
      btn1.onclick = function() {modal1.style.display = "block";}
      btn2.onclick = function() {modal2.style.display = "block";}
      btn3.onclick = function() {modal3.style.display = "block";}
      btn4.onclick = function() {modal4.style.display = "block";}

      // When the user clicks on <span> (x), close the modal
      span1.onclick = function() {modal1.style.display = "none";}
      span2.onclick = function() {modal2.style.display = "none";}
      span3.onclick = function() {modal3.style.display = "none";}
      span4.onclick = function() {modal4.style.display = "none";}

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal1) {modal1.style.display = "none";}
        if (event.target == modal2) {modal2.style.display = "none";}
        if (event.target == modal3) {modal3.style.display = "none";}
        if (event.target == modal4) {modal4.style.display = "none";}
      }
      
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

    <!-- For WhatsApp Floating Button -->
      <script type="text/javascript">
        popupWhatsApp = () => {
            
            let btnClosePopup = document.querySelector('.closePopup');
            let btnOpenPopup = document.querySelector('.whatsapp-button');
            let popup = document.querySelector('.popup-whatsapp');
            let sendBtn = document.getElementById('send-btn');

            btnClosePopup.addEventListener("click",  () => {
              popup.classList.toggle('is-active-whatsapp-popup')
            })
            
            btnOpenPopup.addEventListener("click",  () => {
              popup.classList.toggle('is-active-whatsapp-popup')
               popup.style.animation = "fadeIn .6s 0.0s both";
            })
            
            sendBtn.addEventListener("click", () => {
            let msg = document.getElementById('whats-in').value;
            let relmsg = msg.replace(/ /g,"%20");
              //just change the numbers "1515551234567" for your number. Don't use +001-(555)1234567     
             window.open('https://wa.me/+923068502002?text='+relmsg, '_blank'); 
            
            });

            setTimeout(() => {
              popup.classList.toggle('is-active-whatsapp-popup');
            }, 3000);
          }

          popupWhatsApp();

      </script>
</body>
</html>