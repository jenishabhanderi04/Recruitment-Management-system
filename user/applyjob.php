<?php
  session_start();
  $user_id = $_SESSION['user_id'];
    $jsrid = $_SESSION['jsrid'];
    $cemail = $_GET['cjpid'];
    echo $user_id;
    echo $jsrid;
    echo "        ".$cemail;
  $servername = "localhost";
          $username = "root";
          $password = "";
          $db = "jobs";

          $conn = mysqli_connect($servername,$username,$password,$db);
          if($conn)
          {
            echo"connected";
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $contactno= $_POST['contactno'];
                $qulification=$_POST['qulification'];
                $skills = $_POST['skills'];
                $resume = $_POST['resume'];


                $sql = " INSERT INTO `applyjob` ( `name`, `email`, `contactno`, `qulification`, `skills`, `resume`,`user_id`,`cemail`,`status`) VALUES ( '$name', '$email', '$contactno', '$qulification', '$skills', '$resume','$jsrid','$cemail','panding')";
                $result = mysqli_query($conn,$sql);

                if ($result)
                 {
                echo "inserted";
              
                }
                else
                {
                echo "not inserted";
                }


              }
          }
          else
           {
            die(mysqli_error($conn));
           }
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RRD</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <!-- NAVIGATION BAR -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">RRD</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
            //Show user dashboard link once logged in.
            //Todo: Check if Company logged in then show company dashboard? 
            if(isset($_SESSION['id_user'])) { 
              ?>
              <li><a href="user/dashboard.php">Dashboard</a></li>
              <!-- <li><a href="logout.php">Logout</a></li> -->
              
            <?php
            } else { 
              
              //Show Login Links if no one is logged in.
            ?>
              <li>
               <?php
                  //  session_start();
                    if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] !=true)
                    {
                        echo '<a href="login-company.php" class="logo logo-bg">login</a>';
                    }
                    else{
                        echo ' <a href="logoutu.php" class="logo logo-bg">logout</a>';
                         
                    }
                    
                    ?>  

              </li>
              <!-- <li><a href="../login.php">Login</a></li> -->
            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 well">
          <h2 class="text-center">Apply Job</h2>
            <form method="post" action="">
              <div class="form-group">
                <label for="jobsekername">JobSeeker Name</label>
                <input type="text" class="form-control" id="jobseekername" name="name" placeholder="JobSeeker Name" required="">
              </div>
              <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" required="">
              </div>
              <div class="form-group">
                <label for="contactno">Contact Number</label>
                <input type="number" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required="">
              </div>
              <div class="form-group">
                <label for="qulification">Qulification</label>
                <input type="text" class="form-control" id="qulification" name="qulification" placeholder="Qighest Qulification">
              </div>
              <div class="form-group">
                <label for="Skills">Skills</label>
                <input type="text" class="form-control" id="Skills" name="skills" placeholder="Skills">
              </div>
              <div class="form-group">
                <label for="resume">Resume</label>
                <input type="file" class="form-control" id="resume" name="resume" placeholder="Resume" required="">
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="submit">
              </div>

            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
      function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
    </script>

    <script>
      $("#country").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#state").find('option:not(:first)').remove();
        if(id != '') {
          $.post("state.php", {id: id}).done(function(data) {
            $("#state").append(data);
          });
          $('#stateDiv').show();
        } else {
          $('#stateDiv').hide();
          $('#cityDiv').hide();
        }
      });
    </script>

    <script>
      $("#state").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#city").find('option:not(:first)').remove();
        if(id != '') {
          $.post("city.php", {id: id}).done(function(data) {
            $("#city").append(data);
          });
          $('#cityDiv').show();
        } else {
          $('#cityDiv').hide();
        }
      });
    </script>
  </body>
</html>