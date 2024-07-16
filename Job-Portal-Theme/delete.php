<?php

$servername = "localhost";
$username ="root";
$password = " ";
$db = "jobs";

$conn = mysqli_connect($servername,$username,$password,$db);

 if(!$conn)
 {
      echo" not connected ";
 }
 else
 {
      echo"connected";

      if (isset($_GET['cjpid'])) {
            $id = $_GET['cjpid'];

            $sql = "delete from `create-job-post` where pjid = $cjpid";
            $result = mysqli_query($conn,$sql);
            if ($result)
            {
            // echo "deleted successfully";
            header('location:company/my-job-post.php');
            }
                  else
                  {
                  echo "deleted  not successfully";
                  }
            }
             }


?>