<?php
 
  $link = mysqli_connect("localhost", "root", "", "mms");
 
  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  /*For insertion.*/
  if(isset($_POST['insertdata'])){

      $scms = $_POST['cms'];
      $sname = $_POST['name'];
      $shostel = $_POST['hostel'];
      $sroom = $_POST['room'];
      $swano = $_POST['wano'];
     
      $sql = "INSERT INTO users (cmsid, name, hostel,room, whatsapp) VALUES ('$scms', '$sname',
       '$shostel', '$sroom', '$swano')";

      if(mysqli_query($link, $sql)){
          header('Location: user.php');
      }       
      
  }

  /*For Updation*/
  if(isset($_POST['updatedata'])){
      $scms = $_POST['cms'];
      $sname = $_POST['name'];
      $shostel = $_POST['hostel'];
      $sroom = $_POST['room'];
      $swano = $_POST['wano'];

      $sql = "update users set cmsid='$scms', name='$sname', hostel='$shostel', room='$sroom', whatsapp='$swano' where cmsid='$scms'";
      $query_run = mysqli_query($link, $sql);

      if($query_run){
        header('Location: user.php');
      }
  }


  /*For Deletion*/
  if(isset($_POST['deletedata'])){
      $scms = $_POST['cms'];

      $sql = "delete from users where cmsid='$scms'";
      $query_run = mysqli_query($link, $sql);

      if($query_run){
        header('Location: user.php');
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
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-primary shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.php" class="navbar-brand font-weight-bold text-uppercase text-dark">Mess Management System - SIBAU</a>
        <a href="index.html" class="text-dark text-uppercase">Home</a>/user
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          
           <?php include('commonhead.php'); ?>
          
<!--************* BODY ******************-->
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-2">
          <!-- <div class="home-bgd"></div> -->
          

<!-- ###########################################################################
######################################################################################## -->
          <br>
          <!-- Add Data Model -->
          <div class="modal fade" id="usermodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">                  
                      <div class="row">
                        <div class="col">
                          <input type="text" name="cms" class="form-control" placeholder="CMS ID" aria-label="cms" >
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="text" name="name" class="form-control" placeholder="Name" aria-label="name">
                        </div>
                      </div><br>
                      
                      <div class="row">  
                        <div class="col">
                          <input type="number" name="hostel" class="form-control" placeholder="Hostel No" aria-label="hostel">
                        </div>
                      </div><br>

                      <div class="row">
                        <div class="col">
                          <input type="number" name="room" class="form-control" placeholder="Room No" aria-label="room">
                        </div>
                      </div><br>

                       <div class="row">
                        <div class="col">
                          <input type="text" name="wano" class="form-control" placeholder="WhatsApp No" aria-label="WhatsApp">
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <input type="submit" value="Save Data" name="insertdata" class="btn btn-success">
                    </div>
                </form>  

              </div>
            </div>
          </div>


<!-- ####################################################################################### -->
          <!-- Edit popup model -->
          <div class="modal fade" id="editmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">                  
                      <div class="row">
                        <div class="col">
                          <input type="text" name="cms" id="upid" class="form-control" placeholder="CMS ID" aria-label="cms">
                        </div>
                      </div><br>

                      <div class="row">  
                        <div class="col">
                          <input type="text" name="name" id="upname" class="form-control" placeholder="Name">                    
                        </div>  
                      </div><br>
                      
                      <div class="row">  
                        <div class="col">
                          <input type="number" name="hostel" id="uphstl" class="form-control" placeholder="Hostel No" >
                        </div>
                      </div><br>

                      <div class="row">
                        <div class="col">                          
                          <input type="number" name="room" id="uproom" class="form-control" placeholder="Room No" >
                        </div>
                      </div><br>

                       <div class="row">
                        <div class="col">
                          <input type="text" name="wano" id="upwan" class="form-control" placeholder="WhatsApp No">                        
                        </div>
                      </div>

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
                  <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">                  
                      <div class="row">
                        <div class="col">
                          <input type="text" name="cms" id="delid" class="form-control" placeholder="CMS ID" aria-label="cms">
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
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal"      data-bs-target="#usermodel">
                        Add Data
                     </button><h6 style="float: right; padding-right: 400px;">User's Data Manipulation</h6>
                     <br><br>

                    <?php
                        $link = mysqli_connect("localhost", "root", "", "mms");                   
                        // Check connection
                        if($link === false){
                            die("ERROR: Could not connect. " . mysqli_connect_error());
                        }

                        $sql = "select * from users";
                        $query_run = mysqli_query($link, $sql);
                    ?> 
                      <table class="table table-dark table-hover table-responsive" id="datatableid">
                        <thead>
                          <tr>
                            <th scope="col">CMS-ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Hostel No</th>
                            <th scope="col">Room No</th>
                            <th scope="col">WhatsApp No</th>
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
                              <td><?php echo $row['hostel']; ?></td>
                              <td><?php echo $row['room']; ?></td>
                              <td><?php echo $row['whatsapp']; ?></td>
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

            $('#delid').val(data[0]);
            
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

            $('#upid').val(data[0]);
            $('#upname').val(data[1]);
            $('#uphstl').val(data[2]);
            $('#uproom').val(data[3]);
            $('#upwan').val(data[4]);

        });
      
      });
    
    </script>

  </body>
</html>