<?php
session_start();
?>
<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/Exception.php');
    require('PHPMailer/src/SMTP.php');

$servername = "localhost";
$username ="root";
$password = "";
$db = "jobs";

$conn = mysqli_connect($servername,$username,$password,$db);
 
 if(!$conn)
 {
  echo" not connected ";
 }
 else
 {
  echo"connected";

  if (isset($_POST['submit'])) {
                $coname = $_POST['coname'];
                $_SESSION['coname']=$coname;

                $headofficecity = $_POST['headofficecity'];
                 $_SESSION['headofficecity']=$headofficecity;

                $contactno = $_POST['contactno'];
                $_SESSION['contactno']=$contactno;

                $website = $_POST['website'];
                $_SESSION['website']=$website;

                $companytype = $_POST['companytype'];
                $_SESSION['companytype']=$companytype;

                $emailid = $_POST['emailid'];
                $_SESSION['emailid']=$emailid;

                $password = $_POST['password'];
                // $hash = password_hash($password,PASSWORD_DEFAULT);
                $confirmpassword = $_POST['confirmpassword'];
               // $hash1 = password_hash($confirmpassword,PASSWORD_DEFAULT);
               

        
              
           $otp = rand(100000, 999999);

                $mail = new PHPMailer(true);

                try {

                    //Server settings

                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'rajjobportals@gmail.com';
                    $mail->Password   = 'quodaqzhfgvaqmth';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;


                    //Recipients
                    $mail->setFrom('rajjobportals@gmail.com', 'Recrutment Management');
                    $mail->addAddress($emailid);     //Add a recipient

                    $mail->isHTML(true);
                    //$msg=file_get_contents("beefree-wbrjvkqo22s.php");

                    $mail->Subject = 'Sign Up Verification';

                    $mail->Body    = "Thanks For Registering! <br> Here is the One Time Password for  " . $otp;

                    $mail->MsgHTML = ('h');



                    $mail->send();
                $sql = " INSERT INTO `coregister` ( `coname`, `headofficecity`, `contactno`, `website`, `companytype`, `emailid`,`password`,`confirmpassword`,`otp`) VALUES ( '$coname', '$headofficecity', '$contactno', '$website', '$companytype', '$emailid','$password',' $confirmpassword','$otp')";
                $result = mysqli_query($conn,$sql);
                
          
                if ($result)
                 {
                echo "inserted";
                header('location:otpc.php');
                }
                else
                {
                echo "not inserted";
                }
               
                if ($result) {
                        $showsuccess = "Otp Sent to your Email!";
                    }
                } 
                catch (Exception $e)
                 {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }        
       }
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
              <li><a href="logout.php">Logout</a></li>
            <?php
            } else { 
              //Show Login Links if no one is logged in.
            ?>
              
              <li><a href="login.php">Login</a></li>
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
          <h2 class="text-center">Company Register</h2>
            <form method="post" action="">
              <div class="form-group">
                <label for="companyname">Company Name</label>
                <input type="text" class="form-control" id="companyname" name="coname" placeholder="Company Name" required="">
              </div>
              <div class="form-group">
                <label for="headofficecity">Head Office City</label>
                <input type="text" class="form-control" id="headofficecity" name="headofficecity" placeholder="Head Office City" required="">
              </div>
              <div class="form-group">
                <label for="contactno">Contact Number</label>
                <input type="number" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" minlength="10" maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required="">
              </div>
              <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" name="website" placeholder="Website">
              </div>
              <div class="form-group">
                <label for="companytype">Company Type</label>
                <input type="text" class="form-control" id="companytype" name="companytype" placeholder="Company Type">
              </div>
              <div class="form-group">
                <label for="email">Company Email Address</label>
                <input type="email" class="form-control" id="email" name="emailid" placeholder="Email" required="">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="password" required="">
              </div>
              <div class="form-group">
                <label for="confrimpassword">Confirm Password</label>
                <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="confrim password" required="">
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-success" name="submit" value="submit">
              </div>
              <?php 
              //If Company already registered with this email then show error message.
              if(isset($_SESSION['registerError'])) {
                ?>
                <div>
                  <p class="text-center">Email Already Exists! Choose A Different Email!</p>
                </div>
              <?php
               unset($_SESSION['registerError']); }
              ?>     
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

