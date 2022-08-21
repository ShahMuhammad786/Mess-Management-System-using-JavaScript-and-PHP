<?php
 
  $link = mysqli_connect("localhost", "root", "", "mms");
 
  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  /*For insertion.*/
     
    $sql = "INSERT INTO units (cmsid,name) SELECT cmsid,name from users";
    if(mysqli_query($link, $sql)){
      header('Location: units.php');
    }       
    /*Units insertions*/
    $curDay = date('l');
    $sql = "SELECT * FROM menue where day='$curDay'";
    $query_run = mysqli_query($link, $sql);
    $bf="";
    $ln="";
    $dn="";
    if($query_run){
      foreach ($query_run as $row) {
        $bf= $row['breakfast'];
        $ln= $row['lunch'];
        $dn= $row['Dinner'];
      }
    }
    $units=0;

    $sql1 = "SELECT units FROM elements WHERE element='$bf'";
    $sql2 = "SELECT units FROM elements WHERE element='$ln'";
    $sql3 = "SELECT units FROM elements WHERE element='$dn'";
    $query_run = mysqli_query($link, $sql1);
    if($query_run){
      foreach ($query_run as $row) {
        $units=$row['units'];
      }
    }
    $query_run = mysqli_query($link, $sql2);
    if($query_run){
      foreach ($query_run as $row) {
        $units=$units+$row['units'];
      }
    }
    $query_run = mysqli_query($link, $sql3);
    if($query_run){
      foreach ($query_run as $row) {
        $units=$units+$row['units'];
      }
    }

    $total_units =+ $units ;
    $col = "d".date('d');
    $sql = "UPDATE units SET $col='$units'";
    if(mysqli_query($link, $sql)){
      // $units=0;
    }  
    
    /*** Total data insertions ***/
    // $sql = "SELECT paid, helperCharges FROM payments";
    // $sql = "UPDATE units SET u.totalpaid=p.paid , u.helper=p.helperCharges
    // FROM units u JOIN payments p ON u.cmsid=p.cmsid";
    // mysqli_query($link, $sql);


  /*For Updation*/
  if(isset($_POST['updatedata'])){
      $cms = $_POST['cmsid'];
      $name = $_POST['name'];
      $d1 = $_POST['1d'];
      $d2 = $_POST['2d'];
      $d3 = $_POST['3d'];
      $d4 = $_POST['4d'];
      $d5 = $_POST['5d'];
      $d6 = $_POST['6d'];
      $d7 = $_POST['7d'];
      $d8 = $_POST['8d'];
      $d9 = $_POST['9d'];
      $d10 = $_POST['10d'];
      $d11 = $_POST['11d'];
      $d12 = $_POST['12d'];
      $d13 = $_POST['13d'];
      $d14 = $_POST['14d'];
      $d15 = $_POST['15d'];
      $d16 = $_POST['16d'];
      $d17 = $_POST['17d'];
      $d18 = $_POST['18d'];
      $d19 = $_POST['19d'];
      $d20 = $_POST['20d'];
      $d21 = $_POST['21d'];
      $d22 = $_POST['22d'];
      $d23 = $_POST['23d'];
      $d24 = $_POST['24d'];
      $d25 = $_POST['25d'];
      $d26 = $_POST['26d'];
      $d27 = $_POST['27d'];
      $d28 = $_POST['28d'];
      $d29 = $_POST['29d'];
      $d30 = $_POST['30d'];
      $d31 = $_POST['31d'];
      $totalunits = $_POST['totalunits'];      
      $totalpaid = $_POST['totalpaid'];
      $helper = $_POST['helper'];
      $totalcharges = $_POST['totalcharges'];
      $remaining = $_POST['remaining'];


      $sql = "update units set d1='$d1', d2='$d2', d3='$d3', d4='$d4', d5='$d5', d6='$d6', d7='$d7', d8='$d8', d9='$d9', d10='$10', d11='$d11', d12='$12', d13='$13', d14='$d14', d15='$d15', d16='$d16', d17='$d17', d18='$d18', d19='$d19', d20='$d20', d21='$d21', d22='$d22', d23='$d23', d24='$d24', d25='$d25', d26='$d26', d27='$d27', d28='$d28', d29='$d29', d30='$d30', d31='$d31', totalunits='$totalunits', totalpaid='$totalpaid', helper='$helper', total='totalcharges' , remaining='$remaining' where cmsid='$cms'";
      $query_run = mysqli_query($link, $sql);

      if($query_run){
        header('Location: units.php');
      }
  }


  /*For Deletion*/
  if(isset($_POST['deletedata'])){
      $cms = $_POST['cmsid'];

      $sql = "delete from units where cmsid='$cms'";
      $query_run = mysqli_query($link, $sql);

      if($query_run){
        header('Location: units.php');
      }
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
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-primary  shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.php" class="navbar-brand font-weight-bold text-uppercase text-dark">Mess Management System - SIBAU</a>
        <a href="index.html" class="text-dark text-uppercase">Home</a>/Units
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          
           <?php include('commonhead.php'); ?>
          
<!--************* BODY ******************-->
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-2">
          <!-- <div class="home-bgd"></div> -->
          

<!-- ###########################################################################
######################################################################################## -->
<!-- ####################################################################################### -->
          <!-- Edit popup model -->
          <div class="modal fade" id="editmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Unit's Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">                  
                      <div class="row">
                        <div class="col">
                          <input type="text" name="cmsid" id="cms" class="form-control" placeholder="CMS ID" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="text" name="name" id="name" class="form-control" placeholder="Name" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="1d" id="1" class="form-control" placeholder="1" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="2d" id="2" class="form-control" placeholder="2" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="3d" id="3" class="form-control" placeholder="3" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="4d" id="4" class="form-control" placeholder="4" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="5d" id="5" class="form-control" placeholder="5" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="6d" id="6" class="form-control" placeholder="6" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="7d" id="7" class="form-control" placeholder="7" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="8d" id="8" class="form-control" placeholder="8" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="9d" id="9" class="form-control" placeholder="9" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="10d" id="10" class="form-control" placeholder="10" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="11d" id="11" class="form-control" placeholder="11" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="12d" id="12" class="form-control" placeholder="12" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="13d" id="13" class="form-control" placeholder="13" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="14d" id="14" class="form-control" placeholder="14" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="15d" id="15" class="form-control" placeholder="15" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="16d" id="16" class="form-control" placeholder="16" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="17d" id="17" class="form-control" placeholder="17" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="18d" id="8" class="form-control" placeholder="18" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="19d" id="19" class="form-control" placeholder="19" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="20d" id="20" class="form-control" placeholder="20" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="21d" id="21" class="form-control" placeholder="21" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="22d" id="22" class="form-control" placeholder="22" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="23d" id="23" class="form-control" placeholder="23" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="24d" id="24" class="form-control" placeholder="24" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="25d" id="25" class="form-control" placeholder="25" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="26d" id="26" class="form-control" placeholder="26" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="27d" id="27" class="form-control" placeholder="27" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="28d" id="28" class="form-control" placeholder="28" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="29d" id="29" class="form-control" placeholder="29" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="30d" id="30" class="form-control" placeholder="30" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="31d" id="31" class="form-control" placeholder="31" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="totalunits" id="totalunits" class="form-control" placeholder="total units" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="totalpaid" id="totalpaid" class="form-control" placeholder="total paid" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="helper" id="helper" class="form-control" placeholder="helper charges" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="totalcharges" id="totalcharges" class="form-control" placeholder="total charges" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="number" name="remaining" id="remaining" class="form-control" placeholder="Remaining Charges" >
                        </div>
                      </div><br>                      

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <input type="submit" value="Update Data" name="updatedata" class="btn btn-success">
                    </div>
                </form>  

              </div>
            </div>
          </div>

<!-- ######################################################################################## -->


<!-- ####################################################################################### -->
          <!-- DELETE popup model -->
          <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="background-color: lightgray; height: 350px;">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Unit's Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">                  
                      <div class="row">
                        <div class="col">
                          <input type="text" name="cmsid" id="delcms" class="form-control" placeholder="Day" >
                        </div>
                      </div><br>
                      <h2>Do you want to delete this data ? </h2>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                      <input type="submit" value="Yes!! Delete it." name="deletedata" class="btn btn-success">
                    </div>
                </form>  

              </div>
            </div>
          </div>

<!-- ######################################################################################## -->



          <section>
            <div class="container">
              <div class="jumbotron">                  
                  <div class="card" >
                    <div class="card-body">
                      <h6 style="float: right; padding-right: 400px;">Unit's Data Manipulation</h6>
                     <br><br>

                    <?php
                        $link = mysqli_connect("localhost", "root", "", "mms");                   
                        // Check connection
                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }

                        $sql = "select * from units";
                        $query_run = mysqli_query($link, $sql);
                    ?> 
                      <table class="table table-dark table-hover table-responsive " id="datatableid">
                        <thead>
                          <tr>
                            <th scope="col" >CMS ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">1</th>
                            <th scope="col">2</th>
                            <th scope="col">3</th>
                            <th scope="col">4</th> 
                            <th scope="col">5</th>
                            <th scope="col">6</th>
                            <th scope="col">7</th>
                            <th scope="col">8</th>
                            <th scope="col">9</th>
                            <th scope="col">10</th>
                            <th scope="col">11</th>
                            <th scope="col">12</th> 
                            <th scope="col">13</th>
                            <th scope="col">14</th>
                            <th scope="col">15</th>
                            <th scope="col">16</th>
                            <th scope="col">17</th>
                            <th scope="col">18</th>
                            <th scope="col">19</th>
                            <th scope="col">20</th> 
                            <th scope="col">21</th>
                            <th scope="col">22</th>
                            <th scope="col">23</th>
                            <th scope="col">24</th>
                            <th scope="col">25</th>
                            <th scope="col">26</th>
                            <th scope="col">27</th>
                            <th scope="col">28</th> 
                            <th scope="col">29</th>
                            <th scope="col">30</th>
                             <th scope="col">31</th>
                            <th scope="col">Total Units</th>
                            <th scope="col">Total Paid</th>
                            <th scope="col">Helper Charges</th>
                            <th scope="col">Total Charges</th>
                            <th scope="col">Remaining Charges</th>              
                            <th scope="col">Edit Actions</th>
                            <th scope="col">Remove Actions</th>
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
                              <td><?php echo $row['cmsid']; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['d1']; ?></td>
                              <td><?php echo $row['d2']; ?></td>
                              <td><?php echo $row['d3']; ?></td>
                              <td><?php echo $row['d4']; ?></td>
                              <td><?php echo $row['d5']; ?></td>
                              <td><?php echo $row['d6']; ?></td>
                              <td><?php echo $row['d7']; ?></td>
                              <td><?php echo $row['d8']; ?></td>
                              <td><?php echo $row['d9']; ?></td>
                              <td><?php echo $row['d10']; ?></td>
                              <td><?php echo $row['d11']; ?></td>
                              <td><?php echo $row['d12']; ?></td>
                              <td><?php echo $row['d13']; ?></td>
                              <td><?php echo $row['d14']; ?></td>
                              <td><?php echo $row['d15']; ?></td>
                              <td><?php echo $row['d16']; ?></td>
                              <td><?php echo $row['d17']; ?></td>
                              <td><?php echo $row['d18']; ?></td>
                              <td><?php echo $row['d19']; ?></td>
                              <td><?php echo $row['d20']; ?></td>                         
                              <td><?php echo $row['d21']; ?></td>
                              <td><?php echo $row['d22']; ?></td>
                              <td><?php echo $row['d23']; ?></td>
                              <td><?php echo $row['d24']; ?></td>
                              <td><?php echo $row['d25']; ?></td>
                              <td><?php echo $row['d26']; ?></td>
                              <td><?php echo $row['d27']; ?></td>
                              <td><?php echo $row['d28']; ?></td>
                              <td><?php echo $row['d29']; ?></td>
                              <td><?php echo $row['d30']; ?></td>
                              <td><?php echo $row['d31']; ?></td>
                              <td><?php echo $row['totalunits']; ?></td>
                              <td><?php echo $row['totalpaid']; ?></td>
                              <td><?php echo $row['helper']; ?></td>
                              <td><?php echo $row['total']; ?></td>
                              <td><?php echo $row['remaining']; ?></td>
                              <td>
                                <button type="button" class="btn btn-success editbtn"> Edit</button>    
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger deletebtn"> Remove</button>    
                              </td>
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
            </div>    
          </section>

<!-- ###########################################################################
######################################################################################## -->
           
        
          
          
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
    <script>
      $(document).ready(function() {
        $('#datatableid').DataTable();
      });
    </script>



    <!-- DELETE POPUT SCRIPT -->
    <script>
      $(document).ready(function(){
        
        $('.deletebtn').on('click', function(){

          $('#deletemodal').modal('show');

             $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get(); 

            console.log(data);

            $('#delcms').val(data[0]);
            
        });
      
      });
    
    </script>


    <!-- EDIT POPUP SCRIPT -->
    <script>
      $(document).ready(function(){
        
        $('.editbtn').on('click', function(){

          $('#editmodel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function(){
              return $(this).text();
            }).get(); 

            console.log(data);

            $('#cms').val(data[0]);
            $('#name').val(data[1]);
            $('#1').val(data[2]);
            $('#2').val(data[3]);
            $('#3').val(data[4]);
            $('#4').val(data[5]);
            $('#5').val(data[6]);
            $('#6').val(data[7]);
            $('#7').val(data[8]);
            $('#8').val(data[9]);
            $('#9').val(data[10]);
            $('#10').val(data[11]);
            $('#11').val(data[12]);
            $('#12').val(data[13]);
            $('#13').val(data[14]);
            $('#14').val(data[15]);
            $('#15').val(data[16]);
            $('#16').val(data[17]);
            $('#17').val(data[18]);
            $('#18').val(data[19]);
            $('#19').val(data[20]);
            $('#20').val(data[21]);
            $('#21').val(data[22]);
            $('#22').val(data[23]);
            $('#23').val(data[24]);
            $('#24').val(data[25]);
            $('#25').val(data[26]);
            $('#26').val(data[27]);
            $('#27').val(data[28]);
            $('#28').val(data[29]);
            $('#29').val(data[30]);
            $('#30').val(data[31]);
            $('#31').val(data[32]);
            $('#totalunits').val(data[33]);
            $('#totalpaid').val(data[34]);
            $('#helper').val(data[35]);
            $('#totalcharges').val(data[36]);
            $('#remaining').val(data[37]);

        });
      
      });
    
    </script>

  </body>
</html>