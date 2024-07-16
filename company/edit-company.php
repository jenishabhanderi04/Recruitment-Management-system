<?php
session_start();
$user_id = $_SESSION['user_id'];
    $crid = $_SESSION['crid'];
    echo $user_id;
    echo $crid;

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
            $sql = "select * from `coprofile` where user_id=$crid";
            $result = mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
                $cpid = $row['cpid'];
                $coname = $row['coname'];
                $website = $row['website'];
                $email = $row['email'];
                $aboutme = $row['aboutme'];
                $contactno = $row['contactno'];
                $city = $row['city'];
                $state = $row['state'];
                if (isset($_POST['Add']))
                 {
                    $coname = $_POST['coname'];
                    $website = $_POST['website'];
                    $email = $_POST['email'];
                    $aboutme = $_POST['aboutme'];
                    $contactno = $_POST['contactno'];
                    $city = $_POST['city'];
                    $state = $_POST['state'];
                    $image = $_POST['image'];

                    $sql = "update `coprofile` set coname = '$coname',website = '$website',email = '$email',aboutme = '$aboutme',contactno = '$contactno',city = '$city',state = '$state' , companylogo = '$image' where cpid = '$cpid'";
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
//To Handle Session Variables on This Page
// session_start();

// //If user Not logged in then redirect them back to homepage. 
// if(empty($_SESSION['id_company'])) {
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
                   
        </ul>
         <?php
                  //  session_start();
                    if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] !=true)
                    {
                        echo '<a href="login-company.php" class="logo logo-bg">login</a>';
                    }
                    else{
                        echo ' <a href="logoutc.php" class="logo logo-bg">logout</a>';
                         
                    }
                    
                    ?>
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
                   <li><a href="copro.php"><i class="fa fa-tv"></i> Create profile</a></li>
                  <li><a href="edit-company.php"><i class="fa fa-tv"></i> My Company</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Create Job Post</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-file-o"></i> My Job Post</a></li>
                  <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Job Application</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                  <li><a href="logoutc.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>My Company</i></h2>
            <p>In this section you can change your company details</p>
            <div class="row">
              <form action="" method="post">
                <?php
                // $sql = "SELECT * FROM company WHERE id_company='$_SESSION[id_company]'";
                // $result = $conn->query($sql);

                // if($result->num_rows > 0) {
                //   while($row = $result->fetch_assoc()) {
                  



                ?>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                     <label>Company Name</label>
                    <input type="text" class="form-control input-lg" name="coname" value="<?php echo $coname;?>" required="" >
                  </div>
                  <div class="form-group">
                     <label>Website</label>
                    <input type="text" class="form-control input-lg" name="website" value="<?php echo $website;?>" required="" >
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control input-lg" id="email" placeholder="Email" value="<?php echo $email;?>" readonly >
                  </div>
                  <div class="form-group">
                    <label>About Me</label>
                    <input class="form-control input-lg" rows="4" name="aboutme"
                    value="<?php echo $aboutme;?>" >
                  </div>
                  <div class="form-group">
                    <input type="submit" name="Add" class="btn btn-flat btn-success" value="Update Company Profile">
                  </div>
                </div>
                <div class="col-md-6 latest-job ">
                  <div class="form-group">
                    <label for="contactno">Contact Number</label>
                    <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $contactno;?>">
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
                    <label>Change Company Logo</label>
                    <input type="file" name="image" class="btn btn-default">
                    <?php  ?>
                    <!-- <img src="../uploads/logo/<?php //echo $row['logo']; ?>" class="img-responsive" style="max-height: 200px; max-width: 200px;"> -->
                    <?php  ?>
                  </div>
                </div>
                    <?php
                  //   }
                  // }
                ?>  
              </form>
            </div>
            <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
              <div class="col-md-12 text-center">
                <?php echo $_SESSION['uploadError']; ?>
              </div>
            </div>
            <?php unset($_SESSION['uploadError']); } ?>
            
          </div>
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
<script src="../js/adminlte.min.js"></script>
</body>
</html>
