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
         echo $name ."<br>" .$message . "<br>" . $email;

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
            $mail->Body='<h3>Name : ' . $name .' <br> Email : ' . $email .'<br> Message : ' . $message .'</h3>';
           //finally send email
    
            if($mail -> send())
            {
                echo "Email sent";
            }
            else{
                echo "Error sending";
            }

            //Closing smtp
            $mail->smtpClose();
        } catch(Exception $e){

            echo "<h1>Something wrong</h1>";

        }

              
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="home.css">
  <style>
    input[type=text],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
</head>

<body>
  <div class="nav">
    <h2>FitBank</h2>
    <ul id="item">
      <li> <a href="home.php">Home</a></li>
      <li><a href="About.php">About</a></li>
      <li><a href="ourtraning.php">Our Traning</a></li>
      <li><a href="Contact.php">Contact</a></li>
    </ul>
    <span id="bar" style="font-size:30px;cursor:pointer">&#9776;</span>
  </div>
  <div class="line"></div>

  <section class="container">
    <div class="row">
      <h1 style="font-size: 3rem;">Contact US</h1>

    </div>
  </section>

  <div class="contact">
    <div class="container-contact">
      <form action="Contact.php" method="POST">
        <div class="row">
          <div class="col-25">
            <label for="fname">First Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="firstname" placeholder="Your name..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Your Email</label>
          </div>
          <div class="col-75">
            <input type="text" id="email" name="email" placeholder="Forexample@gmail.com">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="subject">Message</label>
          </div>
          <div class="col-75">
            <textarea id="subject" name="Message" placeholder="Write something.." style="height:200px"></textarea>
          </div>
        </div>
        <div class="row">
          <input type="submit" value="Submit" name="submit">
        </div>
      </form>
    </div>
  </div>
  <div class="footer">
    <div class="overlayf"></div>

    <div class="mid1">

      <h1>FitBank</h1>
      <p>Copyright &copy2021 fitbank</p>
    </div>
    <div class="line"></div>
  </div>
  <!-- <div class="right">
        </div> -->
  </div>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="js/resp.js"></script>
</body>

</html>