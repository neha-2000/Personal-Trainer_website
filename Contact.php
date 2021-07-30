<?php
     require 'includes/PHPMailer.php';
     require 'includes/SMTP.php';
     require 'includes/Exception.php';

     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;

     $mail=new PHPMailer(true);
     if(isset($_POST['submit']))
     {
         $name=$_POST['firstname'];
         $email=$_POST['email'];
         $message=$_POST['Message'];
         $num=$_POST['num'];
        //  echo $name ."<br>" .$message . "<br>" . $email;
        $servername="localhost";
        $uname="root";
        $password="";
        $db="fitbank";

        $conn =mysqli_connect($servername,$uname,$password,$db);
        //create a connection
        if($conn){
            // die("Sorry we failed". mysqli_connect_error());
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Connected sucessfully<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'; '<div class="alert alert-success alert-dismissible fade show" role="alert">'. $email .'</strong> and   <strong> '.$name .'</strong>  and <strong>'. $message .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            $sql="INSERT INTO `fitbank`.`contact` ( `Name`, `Email`, `Message`) VALUES ( '$name', '$email', '$message')";

            $result=mysqli_query($conn,$sql);
            // if($result){
            //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'. $email .'</strong> and   <strong> '.$name .'</strong>  and <strong>'. $message .'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                
            // }
            // else{
            //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Your record has not submited due to technical problem Sorry for inconvience!!!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            //     mysqli_error($conn);
            // }
        }
        try{
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->SMTPAuth=true;
            $mail->Username='bhaleraonehali7@gmail.com';
            $mail->Password="neha44444";
            $mail->SMTPSecure="tls";
            $mail->Port='587';

             //set sender email
            $mail->setFrom("bhalerao@gmail.com");//email address which you used as SMPT server
            $mail->addAddress('bhaleraonehali7@gmail.com');
            
            $mail->isHTML(true);
            $mail->Subject= 'Message Received';
            $mail->Body='<h3>Name : ' . $name .' <br> Email : ' . $email .'<br>Number :' . $num .'<br> Message : ' . $message .'</h3>';
           //finally send email
           $mail -> send();
     
            // if($mail -> send())
            // {
            //     echo "Email sent";
            // }
            // else{
            //     echo "Error sending";
            // } -->

            //Closing smtp
            $mail->smtpClose();
            header("Location: index.php");

        } catch(Exception $e){

            echo "<h1>Something wrong</h1>";

        }

              //INSERT INTO `contact` (`ID`, `Name`, `Email`, `Message`, `Date`) VALUES ('1', 'neha', 'hellp thanks', 'tyh jufhytfrhy', 'current_timestamp()');
    } 
?>