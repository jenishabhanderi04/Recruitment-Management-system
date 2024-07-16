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

      if (isset($_GET['crid'])) {
            $crid = $_GET['crid'];

            $sql = "delete from `coregister` where crid = '$crid'";
            $result = mysqli_query($conn,$sql);
            if ($result)
            {
            // echo "deleted successfully";
            header('location:companies.php');
            }
                  else
                  {
                  echo "deleted  not successfully";
                  }
            }
             }


?>