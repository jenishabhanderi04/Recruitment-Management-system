<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        
        .error{
            color: red;
            margin-top: 0px;
            padding-top: 0px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <!-- CSS File -->
    <!-- <link rel="stylesheet" href="addservice.css"> -->
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <?php
        use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/Exception.php');
    require('PHPMailer/src/SMTP.php');


        ?>

        <?php
                       $servername = "localhost";
                       $username = "root";
                       $password = "";
                       $dbname = "jobs";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);


                        if (!$conn) {
                            echo "not connected";
                        }

else{
 //echo "connected";
    header('location:job-applications.php');
   }

   if(isset($_GET['uid']))
   {
       $ajid = $_GET['uid'];
       $sql = "select * from `applyjob` where ajid=$ajid";
       $result = mysqli_query($conn,$sql);
       $row=mysqli_fetch_assoc($result);
                $ajid = $row['ajid'];
               
                $email = $row['email'];
       

      
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
                    $mail->addAddress($email);     //Add a recipient

                    $mail->isHTML(true);
                    //$msg=file_get_contents("beefree-wbrjvkqo22s.php");

                    $mail->Subject = 'your job Application';

                    $mail->Body    = "your job Application is approve";

                    $mail->MsgHTML = ('h');
 
                    $mail->send();                    
                    $sql = "update `applyjob` set status = 'accept' where ajid = '$ajid';";
                    $run = mysqli_query($conn, $sql);
                    if ($run) {
                       // $showsuccess = "Otp Sent to your Email!";
                        //header location to otp pAGE
                        // header('location:otpform.php');

                    }
                    else
                        {
                            mysqli_error($run,$conn);
                        }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }        
       }
   


      
        
    
  
?>


       

    <!-- header start -->
    
</body>
</html>