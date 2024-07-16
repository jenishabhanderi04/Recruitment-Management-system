<?php

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

      if (isset($_GET['cjpid'])) {
            $cjpid = $_GET['cjpid'];

            $sql = "delete from `createjobpost` where cjpid = '$cjpid'";
            $result = mysqli_query($conn,$sql);
            if ($result)
            {
            // echo "deleted successfully";
            header('location:my-job-post.php');
            }
                  else
                  {
                  echo "deleted  not successfully";
                  }
            }
             }


?>