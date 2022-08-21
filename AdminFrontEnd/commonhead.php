<!-- Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">



          <!--************** User Info **********************-->
          <li class="nav-item dropdown ml-auto">
            <a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
              <img src="img/2.jpg" alt="Shah Muhammad" style="max-width: 2.5rem; " class="img-fluid rounded-circle shadow">
            </a>
            <div aria-labelledby="userInfo" class="dropdown-menu">
              <a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family">Shah Muhammad</strong><small>Web Developer</small>
              </a>
              <!-- <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">Settings</a>
              <a href="#" class="dropdown-item">Activity log</a>
              <div class="dropdown-divider"></div> -->
              <a href="login.php" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>

<!-- ********************** HEADER ****************************** -->
    </header>
    <div class="d-flex align-items-stretch bg-dark">
      <div id="sidebar" class="sidebar py-3 ">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled " >
              <li class="sidebar-list-item">
                <a href="index.php" class="sidebar-link text-muted active rounded-pill" style="margin: 5px;"><i class="fas fa-home mr-3" ></i><span>Home</span>
                </a>
              </li>
              <li class="sidebar-list-item rounded-pill" style="margin:5px; background-color: lightgray;">
                <a href="user.php" class="sidebar-link text-dark "><i class="fas fa-users mr-3" ></i><span>Users</span>
                </a>
              </li>
              <li class="sidebar-list-item rounded-pill" style="margin:5px; background-color: lightgray;">
                <a href="menue.php" class="sidebar-link text-dark"><i class="fas fa-utensils mr-3 "></i><span>Menue</span>
                </a>
              </li>
              <li class="sidebar-list-item rounded-pill" style="margin:5px; background-color: lightgray;">
                <a href="elements.php" class="sidebar-link text-dark"><i class="fas fa-bars mr-3"></i><span>Elements</span>
                </a>                
              </li>
              <li class="sidebar-list-item rounded-pill" style="margin:5px; background-color: lightgray;">
                <a href="bills.php" class="sidebar-link text-dark"><i class="fas fa-clipboard mr-3"></i><span>Bills </span>
                </a>
              </li>
              <li class="sidebar-list-item rounded-pill" style="margin:5px; background-color: lightgray;">
                <a href="units.php" class="sidebar-link text-dark"><i class="fas fa-coins mr-3"></i><span>Units </span>                  
                </a>
              </li>
        </ul>

        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">EXTRAS</div>
        <ul class="sidebar-menu list-unstyled">
              <li class="sidebar-list-item rounded-pill" style="margin:5px; background-color: lightgray;">
                <a href="payments.php" class="sidebar-link text-dark"><i class="fas fa-money-check-alt mr-3"></i><span>Payments</span>
                </a>
              </li>
              <li class="sidebar-list-item rounded-pill" style="margin:5px; background-color: lightgray;" >
                <a href="#" class="sidebar-link text-dark"><i class="fas fa-envelope-open-text mr-3"></i><span>Message</span>
                </a>
              </li>
        </ul>
      </div>

    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
