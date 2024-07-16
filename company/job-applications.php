<?php

//To Handle Session Variables on This Page
// session_start();

// //If user Not logged in then redirect them back to homepage. 
// //This is required if user tries to manually enter view-job-post.php in URL.
// if(empty($_SESSION['id_company'])) {
//   header("Location: ../index.php");
//   exit();
// }

// //Including Database Connection From db.php file to avoid rewriting in all files  
// require_once("../db.php");
 session_start();
$user_id = $_SESSION['user_id'];
    $crid = $_SESSION['crid'];
    echo $user_id;
    echo $crid;
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
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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

         <style>

.add {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
    font-size: 20px;
    font-family: Arial, Helvetica, sans-serif;
   


}
 
  .edit {
    text-decoration: none;
    padding: 2px 5px;
    background: #2E8B57;
    color: white;
    border-radius: 3px;
}

.del {
    text-decoration: none;
    padding: 2px 5px;
    color: white;
    border-radius: 3px;
    background: #800000;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 20px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
 

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
h1{
color: #04AA6D;
text-align: center;
}

</style>
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
            <h2><i>Job Application</i></h2>
            <p>In this section you can view  job Applications .</p>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2 customers" class="table table-hover">
                    <thead>
                     <!--  <th>Job Title</th>
                      <th>View</th> -->
                       <th>Id</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Contactno</th>
                       <th>Qulification</th>
                       <th>skills</th>
                       <th>resume</th>
                       <th>Status</th>
                       <th>Accept</th>
                       <th>Reject</th>
                       <!-- <th>Update</th>
                       <th>Delete</th> -->
                    </thead>
                    <tbody>
                    <?php
                    //  $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                    //   $result = $conn->query($sql);

                    //   //If Job Post exists then display details of post
                    //   if($result->num_rows > 0) {
                    //     while($row = $result->fetch_assoc()) 
                    //     {





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jobs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from applyjob where `cemail` = '$user_id'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
 
  while($row = mysqli_fetch_assoc($result)) {

                $ajid=$row['ajid'];
                $name = $row['name'];
                $email = $row['email'];
                $contactno = $row['contactno'];
                $qulification = $row['qulification'];
                $skills = $row['skills'];
                $resume = $row['resume'];
                $status = $row['status'];

   
   echo '<tr>
     
      <td>'.$ajid.'</td>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$contactno.'</td>
      <td>'.$qulification.'</td>
      <td>'.$skills.'</td>
      <td>'.$resume.'</td>
      <td>'.$status.'</td>
      <td><a href="acp.php?uid='.$ajid.'" class="edit">Accept</td>
      <td><a href="rej.php.?did='.$ajid.'" class="del">Reject</td>
</tbody>';

   
  }
} 
    else
    {
        echo "0 results";
    }

mysqli_close($conn);





                      ?>
                      <!-- <tr>
                        <td></td>
                        <td><a href="view-job-post.php?id=<?php// echo $row['id_jobpost']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                      </tr> -->
                      <?php
                    //    }
                    //  }
                     ?>
                    </tbody>                    
                  </table>
                </div>
              </div>
            </div>
            
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>


<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
