
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
        <div class="row">
          <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center">Latest Jobs</h1>
          <form method="get">  
            <div class="input-group input-group-lg">
              
                <!-- <input type="text" id="searchBar" class="form-control" placeholder="Search job" name="serch"> -->
                 <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search job">
                       
                <span class="input-group-btn">
                  <!-- <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button> -->
                  <input type="submit" class="btn btn-info btn-flat" value="Go!">
                </span>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="candidates" class="content-header">
      <div class="container">
        

          <?php

          // $limit = 4;

          // $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
          // $result = $conn->query($sql);
          // if($result->num_rows > 0)
          // {
          //   $row = $result->fetch_assoc();
          //   $total_records = $row['id'];
          //   $total_pages = ceil($total_records / $limit);
          // } else {
          //   $total_pages = 1;
          // }


          ?>
          <div class="col-md-9 bg-white padding-2">
            
            
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2 customers" class="table table-hover">
                    <thead>
                     <!--  <th>Job Title</th>
                      <th>View</th> -->
                       <th>Id</th>
                       <th>Jobtitle</th>
                       <th>Description</th>
                       <th>Minimumsalary</th>
                       <th>Maximumsalary</th>
                       <th>Experience</th>
                       <th>Qualification</th>
                       <th>Apply</th>
                       
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
 
$sql = "SELECT * from createjobpost";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0) {
 
  while($row = mysqli_fetch_assoc($result)) {

                $cjpid=$row['cjpid'];
                $jobtitle = $row['jobtitle'];
                $description = $row['description'];
                $minimumsalary = $row['minimumsalary'];
                $maximumsalary = $row['maximumsalary'];
                $experience = $row['experience'];
                $qualification = $row['qualification'];
                $email = $row['email_id'];

   
   echo '<tr>
     
      <td>'.$cjpid.'</td>
      <td>'.$jobtitle.'</td>
      <td>'.$description.'</td>
      <td>'.$minimumsalary.'</td>
      <td>'.$maximumsalary.'</td>
      <td>'.$experience.'</td>
      <td>'.$qualification.'</td>
       <td><a href="user/applyjob.php?cjpid='.$email.'" class="edit">Apply</a></td>
       
</tr>
</tbody>';

   
  }
} 
    else
    {
        echo "0 results";
    }

//  mysqli_close($conn);





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

          
            <div id="target-content">
              
            </div>
            <div class="text-center">
              <ul class="pagination text-center" id="pagination"></ul>
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
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
<script src="js/jquery.twbsPagination.min.js"></script>

<script>
  function Pagination() {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        $("#target-content").html("loading....");
        $("#target-content").load("jobpagination.php?page="+page);
      }
    });
  }
</script>

<script>
  $(function () {
      Pagination();
  });
</script>

<script>
  $("#searchBtn").on("click", function(e) {
    e.preventDefault();
    var searchResult = $("#searchBar").val();
    var filter = "searchBar";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".experienceSearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "experience";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  $(".citySearch").on("click", function(e) {
    e.preventDefault();
    var searchResult = $(this).data("target");
    var filter = "city";
    if(searchResult != "") {
      $("#pagination").twbsPagination('destroy');
      Search(searchResult, filter);
    } else {
      $("#pagination").twbsPagination('destroy');
      Pagination();
    }
  });
</script>

<script>
  function Search(val, filter) {
    $("#pagination").twbsPagination({
      totalPages: <?php echo $total_pages; ?>,
      visible: 5,
      onPageClick: function (e, page) {
        e.preventDefault();
        val = encodeURIComponent(val);
        $("#target-content").html("loading....");
        $("#target-content").load("search.php?page="+page+"&search="+val+"&filter="+filter);
      }
    });
  }
</script>


</body>
</html>
