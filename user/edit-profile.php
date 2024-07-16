<?php

//To Handle Session Variables on This Page
session_start();

    $user_id = $_SESSION['user_id'];
    $jsrid = $_SESSION['jsrid'];
    echo $user_id;
    echo $jsrid;

     $servername = "localhost";
          $username = "root";
          $password = "";
          $db = "jobs";
          
           $con = mysqli_connect($servername,$username,$password,$db);
          
           if($con)
           {
            echo "connected";
            $sql = "select * from `joprofile` where user_id=$jsrid";
            $result = mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
                $jspid = $row['jspid'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $emailid = $row['emailid'];
                $address = $row['address'];
                $city = $row['city'];
                $state = $row['state'];
                $contactno = $row['contactno'];
                $qulification = $row['qulification'];
                $stream = $row['stream'];
                $skills = $row['skills'];
                $aboutme = $row['aboutme'];
                $resume = $row['resume'];
                
                
                if (isset($_POST['Add']))
                 {
                   // $jspid = $_POST['jspid'];
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $emaild = $_POST['emailid'];
                    $address = $_POST['address'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $contactno = $_POST['contactno'];
                    $qulification = $_POST['qulification'];
                    $stream = $_POST['stream'];
                    $skills = $_POST['skills'];
                    $aboutme = $_POST['aboutme'];
                    $resume = $_POST['resume'];



                    $sql = "update `joprofile` set fname = '$fname',lname = '$lname',emailid = '$emailid',address = '$address',city = '$city',state = '$state',contactno = '$contactno',qulification = '$qulification',stream = '$stream',skills = '$skills',aboutme = '$aboutme',resume='$resume' where jspid = '$jspid '";
                    $result = mysqli_query($con,$sql);
                             if($result)
                                   {
                                    echo "update";
                                   
                                   }
                                  else
                                   {
                                      die(mysql_errno($con));
                                   }

                }

           }
           else
           {
            echo "not connected";
           }
// //If user Not logged in then redirect them back to homepage. 
// if(empty($_SESSION['id_user'])) {
//   header("Location: ../index.php");
//   exit();
// }

// require_once("../db.php");
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
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
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
            <!-- <a href="../jobs.php">Jobs</a> -->
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
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Welcome <b></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                   <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="jopro.php"><i class="fa fa-user"></i> create Profile</a></li>
                  <li><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
                  <li class="active"><a href="myapplication.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
                  <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Jobs</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="logoutu.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Edit Profile</i></h2>
            <form action=" " method="post" >
            <?php
            //Sql to get logged in user details.
            // $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
            // $result = $conn->query($sql);

            // //If user exists then show his details.
            // if($result->num_rows > 0) {
            //   while($row = $result->fetch_assoc()) {
            ?>
              <div class="row">
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                     <label for="fname">First Name</label>
                    <input type="text" class="form-control input-lg" id="fname" name="fname" placeholder="First Name" value="<?php echo $fname;?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control input-lg" id="lname" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" required="">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email"  name="emailid" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $emailid;?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input id="address" name="address" class="form-control input-lg" rows="5" placeholder="Address" value="<?php echo $address;?>">
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control input-lg" id="city" name="city" value="<?php echo $city;?>" placeholder="city">
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control input-lg" id="state" name="state" placeholder="state" value="<?php echo $state;?>">
                  </div>
                  <div class="form-group">
                    <input type="submit"  name = "Add" class="btn btn-flat btn-success" value="Update Profile">
                  </div>
                </div>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <label for="contactno">Contact Number</label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $contactno;?>">
                  </div>
                  <div class="form-group">
                    <label for="qualification">Highest Qualification</label>
                    <input type="text" class="form-control input-lg" id="qualification" name="qulification" placeholder="Highest Qualification" value="<?php echo $qulification;?>">
                  </div>
                  <div class="form-group">
                    <label for="stream">Stream</label>
                    <input type="text" class="form-control input-lg" id="stream" name="stream" placeholder="stream" value="<?php echo $stream;?>">
                  </div>
                  <div class="form-group">
                    <label>Skills</label>
                    <input class="form-control input-lg" rows="4" name="skills" value="<?php echo $skills;?>">
                  </div>
                  <div class="form-group">
                    <label>About Me</label>
                    <input class="form-control input-lg" rows="4" name="aboutme" value="<?php echo $aboutme;?>">
                  </div>
                  <div class="form-group">
                    <label>Upload/Change Resume</label>
                    <input type="file" name="resume" class="btn btn-default">
                  </div>
                </div>
              </div>
              <?php
              //   }
              // }
            ?>   
            </form>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
      <strong>Copyright &copy; 2022-2023 <a href="learningfromscratch.online">RRD</a>.</strong> All rights
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
<script src="../js/adminlte.min.js"></script>
</body>
</html>
