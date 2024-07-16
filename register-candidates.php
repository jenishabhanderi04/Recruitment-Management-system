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
                $fname = $_POST['fname'];
                $_SESSION['fname']=$fname;

                $lname = $_POST['lname'];
                 $_SESSION['lname']=$lname;

                $emailid = $_POST['emailid'];
                $_SESSION['emailid']=$emailid;

                $aboutme = $_POST['aboutme'];
                $_SESSION['aboutme']=$aboutme;

                $dob = $_POST['dob'];
                $_SESSION['dob']=$dob;

                $age = $_POST['age'];
                $_SESSION['age']=$age;

                $passyear = $_POST['passyear'];
                $_SESSION['passyear']=$passyear;

                // $higheestqulification  = $_POST['higheestqulification'];
                // $_SESSION['higheestqulification']=$higheestqulification;

                $stream = $_POST['stream'];
                $_SESSION['stream']=$stream;

                $password = $_POST['password'];
                // $hash = password_hash($password,PASSWORD_DEFAULT);
                $confirmpass = $_POST['confirmpass'];
               // $hash1 = password_hash($confirmpassword,PASSWORD_DEFAULT);
               

                $contactno = $_POST['contactno'];
                $_SESSION['contactno']=$contactno;


                $address = $_POST['address'];
                $_SESSION['address']=$address;


                $city = $_POST['city'];
                $_SESSION['city']=$city;


                $state = $_POST['state'];
                $_SESSION['state']=$state;


                $skills = $_POST['skills'];
                $_SESSION['skills']=$skills;


                $designation = $_POST['designation'];
                $_SESSION['designation']=$designation;

              // $otp = $_POST['otp'];
                //$resume = $_POST['resume'];
                //  $_SESSION['resume']=$resume;   



        
            
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
                 $sql = " INSERT INTO `joregister` ( `fname`, `lname`, `emailid`, `aboutme`, `dob`, `age`,`passyear`, `stream`, `password`, `confirmpass`, `contactno`, `address`, `city`, `state`, `skills`, `designation`,`otp`) VALUES ( '$fname', '$lname', '$emailid', '$aboutme', '$dob', '$age','$passyear', '$stream', '$password', '$confirmpass', '$contactno', '$address', '$city', '$state', '$skills', '$designation','$otp');";

              
                $result = mysqli_query($conn,$sql);
                
      
                if ($result)
                 {
                echo "inserted";
                header('location:otpu.php');
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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RRD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RRD</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="jobs.php">Jobs</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="login.php">Login</a>
          </li>
          <li>
            <a href="sign-up.php">Sign Up</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="user/index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="company/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="logout.php">Logout</a>
          </li>
          <?php } ?>          
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">
          <h1 class="text-center margin-bottom-20">JobSeeker Registration</h1>
          <form method="post" id="registerCandidates"  >
            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="First Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="lname" name="lname" placeholder="Last Name *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="email" name="emailid" placeholder="Email *" required>
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *" required></textarea>
              </div>
              <div class="form-group">
                <label>Date Of Birth</label>
                <input class="form-control input-lg" type="date" id="dob" min="1960-01-01" max="1999-01-31" name="dob" placeholder="Date Of Birth">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="age" name="age" placeholder="Age" readonly>
              </div>
              <div class="form-group">
                <label>Passing Year</label>
                <input class="form-control input-lg" type="date" id="passyear" name="passyear" placeholder="Passing Year">
              </div>       
             <!--  <div class="form-group">
                <input class="form-control input-lg" type="text" id="qualification" name="higheestqulification  " placeholder="Highest Qualification">
              </div> -->
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="stream" name="stream" placeholder="Stream">
              </div>                    
              <div class="form-group checkbox">
                <label><input type="checkbox"> I accept terms & conditions</label>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="submit" class="btn btn-flat btn-success">
              </div>
                 

            </div>            
            <div class="col-md-6 latest-job ">
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password *" required>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="password" id="cpassword" name="confirmpass" placeholder="Confirm Password *" required>
              </div>
              <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                    Password Mismatch!! 
                  </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="contactno" name="contactno" minlength="10" maxlength="10" onkeypress="return validatePhone(event);" placeholder="Phone Number">
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="address" name="address" placeholder="Address"></textarea>
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="city" name="city" placeholder="City">
              </div>
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="state" name="state" placeholder="State">
              </div>
              <div class="form-group">
                <textarea class="form-control input-lg" rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea>
              </div>              
              <div class="form-group">
                <input class="form-control input-lg" type="text" id="designation" name="designation" placeholder="Designation">
              </div>

              <!-- <div class="form-group">
                <label style="color: red;">File Format PDF Only!</label>
                <input type="file" name="resume" class="btn btn-flat btn-danger" required>
              </div> -->
            </div>
          </form>
          
        </div>
      </div>
    </section>





  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2016-2017 <a href="learningfromscratch.online">Job Portal</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

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

<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();

    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }

    $('#age').val(age);
  });
</script>
<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>
</body>
</html>
