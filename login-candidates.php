<?php
 session_start();

// if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
//   header("Location: index.php");
//   exit();
// }
$login=false;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Job</b> Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Candidates Login</p>

    <form method="post">
       <div class="form-group has-feedback">
        <input type="email" name="emailid" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">I forgot my password</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="submit" name="submit">
        </div>
        <!-- /.col -->
      </div>
    </form>

    <br>

    <?php 
    //If User have successfully registered then show them this success message
    //Todo: Remove Success Message without reload?
    // if(isset($_SESSION['registerCompleted'])) {
      
    //   <div>
    //     <p id="successMessage" class="text-center">Check your email!</p>
    //   </div>
    // <?php
     // unset($_SESSION['registerCompleted']); }
    ?>   
    <?php 
    //If User Failed To log in then show error message.
    // if(isset($_SESSION['loginError'])) {
      ?>
      <!-- <div>
        <p class="text-center">Invalid Email/Password! Try Again!</p>
      </div> -->
    <?php
     // unset($_SESSION['loginError']); }
    ?>      

    <?php 
    //If User Failed To log in then show error message.
    // if(isset($_SESSION['userActivated'])) {
      ?>
      <!-- <div>
        <p class="text-center">Your Account Is Active. You Can Login</p>
      </div> -->
    <?php
     // unset($_SESSION['userActivated']); }
    ?>    

     <?php 
    //If User Failed To log in then show error message.
    // if(isset($_SESSION['loginActiveError'])) {
      ?>
      <!-- <div>
        <p class="text-center"><?php //echo $_SESSION['loginActiveError']; ?></p>
      </div> -->
    <?php
     // unset($_SESSION['loginActiveError']); }
    ?>   
  

    <?php
      $servername = "localhost";
$username = "root";
$password = "";
$db = "jobs";
 $con = mysqli_connect($servername,$username,$password,$db);

 if($con)
 {
          echo " connected";
             
}


 if (isset($_POST['submit'])) 
              {

                  $emailid = $_POST['emailid'];
                  $password=$_POST['password'];
                  // $code=$_POST['code'];
                 
                  // $hash = password_hash($password,PASSWORD_DEFAULT);

                  $sql = "select jsrid,emailid,password from joregister";
                  $result = mysqli_query($con,$sql);
                 while( $row = mysqli_fetch_assoc($result) )
                 {

                   
                          if($_POST['emailid'] === $row['emailid'] && $_POST['password'] === $row['password'])
                          {  
                              $login=true;
                             $_SESSION['login']=true;
                              $_SESSION['user_id']=$emailid;
                              $_SESSION['jsrid']=$row['jsrid'];
                            header('location:user/index.php');
                          }
                          else
                            echo "Invlid password";
                        }
                       
                   
             }







               
    ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<!-- iCheck -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">
      $(function() {
        $("#successMessage:visible").fadeOut(8000);
      });
    </script>
</body>
</html>
