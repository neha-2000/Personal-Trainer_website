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
            header("Location: home.html");

        } catch(Exception $e){

            echo "<h1>Something wrong</h1>";

        }

              //INSERT INTO `contact` (`ID`, `Name`, `Email`, `Message`, `Date`) VALUES ('1', 'neha', 'hellp thanks', 'tyh jufhytfrhy', 'current_timestamp()');
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="home.css">
  <!-- Bootstrap CSS -->
  <link href="css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <!-- <style>
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
          background-color: goldenrod;
          color: white;
          padding: 16px 20px;
          border: none;
          /* border-radius: 4px; */
          cursor: pointer;
          float: right;
        }
    
        input[type=submit]:hover {
          background-color: crimson;
        }
    
        .ccontainer {
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
      </style>  -->
</head>

<body>
  <div class="nav">
    <h2>FitBank</h2>
    <ul id="item">
      <li> <a href="#back" style="color: goldenrod;">Home</a></li>
      <li><a href="#about-us">About</a></li>
      <li><a href="#mission">What We Do</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <span id="bar" style="font-size:30px;cursor:pointer">&#9776;</span>
  </div>
  </div>
  <div class="line"></div>
  <div id="back">
    <div class="overlay "></div>
    <div class="mid ">
      <h1 class="wow bounceInUp">FITBANK YOUR FITNESS CENTER</h1>
      <p class="wow bounceInUp">Train your body with online traniner</p>
      <p class="wow bounceInUp">Be Enthusiastic for Fitness</p>
      <div class="btn">
        <a href="ourtraning.html" class="simple">Get Started</a>
        <!-- <a href="#" class="border">Learn More</a> -->
      </div>
    </div>
  </div>
  <!-- <section class="container-fluid" id="containerc">
        <div class="rowc">
            <h1 class="">Online and Personal Trainer</h1>
            <p class="">
                I welcome fatness and help them to gain their dream body.
                I help busy males and females to improve their health & fitness using a combination of
                exercise,nutrition ,lifestyle.
                Feel confident and attractive around their friends, family, and out in public
                Feel Physically & mentally strong, capable of taking on any challenge without worrying that their energy
                levels or body weight will get in the way.
                Fit into the clothes they want to wear
                Stop worrying about getting diseases and dying young
                Run around with their kids, or grandkids, without feeling pain, winded or tired; and do it again the
                next day
                Add 10+ years of healthy living to their retirement
            </p>

        </div>
    </section> -->
  <div class="container-fluid fh5co-network " id="mission">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <!-- <h4 class="wow bounceInUp">FOR NETWORK</h4> -->
          <h2 class="wow bounceInRight">My mission</h2>
          <hr />
          <h5 class="wow bounceInLeft">Be Enthaustic for fitness</h5>
          <p class="wow bounceInDown">The purpose of training is to tighten up the slack, toughen the body,
            and polish the spirit Whether you want to loose weight ,tone up body ,gain muscle wish to have
            healthier lifestyle FITBANK is right choice The purpose of training is to tighten up the slack,
            toughen the body, and polish the spirit Whether you want to loose weight ,tone up body ,gain
            muscle wish to have healthier lifestyle FITBANK is right choice</p>
        </div>
        <div class="col-md-6">
          <figure class="wow bounceInDown"> <img src="img/whatsfront1.jpeg" alt="gym" class="img-fluid" width="250px"
              height="200px" /> </figure>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Features Item Start ***** -->
  <section class="section" id="features">
    <div class="container">
      <br><br>
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading  wow bounceInUp">
            <h2 style="color: goldenrod;">FitBank <em style="color: white;">LifeStyle Program</em></h2>
            <div class="line wow bounceInUp"></div>

          </div>
          <br><br>
        </div>
        <div class="col-lg-6">
          <ul class="features-items">
            <li class="feature-item wow bounceInUp">
              <div class="left-icon  wow bounceInRight">
                <img src="/images/features-first-icon.png" alt="First One">
              </div>
              <div class="right-content  wow bounceInLeft">
                <h4>Medical Health</h4>
                <p class="wow bounceInUp">To ensure good health: eat lightly, breathe deeply, live
                  moderately, cultivate cheerfulness, and maintain an interest in life.</p>
                <!-- <a href="#" class="text-button">Discover More</a> -->
              </div>
            </li>
            <li class="feature-item wow bounceInDown">
              <div class="left-icon wow bounceInDown">
                <img src="/images/features-first-icon.png" alt="second one">
              </div>
              <div class="right-content wow bounceInDown">
                <h4>Meditation</h4>
                <p>Meditate. Live purely. Be quiet. Do your work with mastery. Like the moon, come out
                  from behind the clouds! Shine.</p>
                <!-- <a href="#" class="text-button">Discover More</a> -->
              </div>
            </li>
            <!-- <li class="feature-item">
                            <div class="left-icon">
                                <img src="/images/features-first-icon.png" alt="third gym training">
                            </div>
                            <div class="right-content">
                                <h4>Basic Muscle Course</h4>
                                <p>Credit goes to <a rel="nofollow" href="https://www.pexels.com" target="_blank">Pexels website</a> for images and video background used in this HTML template.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li> -->
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="features-items">
            <li class="feature-item wow bounceInUp">
              <div class="left-icon wow bounceInUp">
                <img src="/images/features-first-icon.png" alt="fourth muscle">
              </div>
              <div class="right-content wow bounceInUp">
                <h4>Exercise Training</h4>
                <p>Push harder than yesterday if you want a different tomorrow.</p>
                <!-- <a href="#" class="text-button">Discover More</a> -->
              </div>
            </li>
            <li class="feature-item wow bounceInDown">
              <div class="left-icon wow bounceInDown">
                <img src="/images/features-first-icon.png" alt="training fifth">
              </div>
              <div class="right-content  wow bounceInDown">
                <h4>Healthy life style</h4>
                <p>Our life becomes beautiful when our body is healthy , your schedules our fitness
                  plans will help you to acheive a healthy lifestyle</p>
                <!-- <a href="#" class="text-button">Discover More</a> -->
              </div>
            </li>
            <!-- <li class="feature-item">
                            <div class="left-icon">
                                <img src="/images/features-first-icon.png" alt="gym training">
                            </div>
                            <div class="right-content">
                                <h4>Body Building Course</h4>
                                <p>Suspendisse fringilla et nisi et mattis. Curabitur sed finibus nisi. Integer nibh sapien, vehicula et auctor.</p>
                                <a href="#" class="text-button">Discover More</a>
                            </div>
                        </li> -->
          </ul>
        </div>
      </div>
    </div>
  </section>
  <div class="programs">
    <div class="head">
      <h1>What We Do</h1>
    </div>
    <div class="rowp">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <h1>Body Measures</h1>
            <!-- <img src="/img/diet2.jpg" alt="Avatar" style="width:300px;height:300px;"> -->
          </div>

          <div class="flip-card-back">
            <!-- <h1>John Doe</h1>  -->
            <p>Each person’s body is unique – and what works for one person, doesn’t necessarily work for
              another. Hence we give you nutrition and fitness plans that are designed specially for your
            </p>
            <!-- requirements. We make sure that they are also sustainable in the long run, so that your
                            efforts and results are not just temporary. -->
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <h1>Analyse</h1>
            <!-- <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;"> -->
          </div>
          <div class="flip-card-back">
            <p>Analysing health and all other factors for further fitness traning.</p>

          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <!-- <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;"> -->
            <h1>Program</h1>
          </div>
          <div class="flip-card-back">
            <p>Schedules Programs as per clients schedules and timing</p>
          </div>
        </div>
      </div>
    </div>
    <div class="rowp r2" id="r2">
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <h1>Progress Tracking</h1>
            <!-- <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;"> -->
          </div>
          <div class="flip-card-back">
            <p>Progress Tracking for clients and on time gudiance</p>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <h1>Diet Plans</h1>
            <!-- <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;"> -->
          </div>
          <div class="flip-card-back">
            <p>Perfect Diet plans to gain your dream shape. Finding the correct ingredients to make healthy
              meals can be challenging thats someting fitbank provide you proper guide.</p>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <!-- <img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;"> -->
            <h1>Personal Traning Sessions</h1>
          </div>
          <div class="flip-card-back">
            <p>One to One sessions regarding traning .Its Extremely important to have an expert give you
              individual attention , analyse your form and techique and teach you correct way.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <section id="container">
        <div class="row">
            <h1>Online and Personal Trainer</h1>
            <p>
                I welcome fatness and help them to gain their dream body.
                I help busy males and females to improve their health & fitness using a combination of
                exercise,nutrition ,lifestyle.
                Feel confident and attractive around their friends, family, and out in public
                Feel Physically & mentally strong, capable of taking on any challenge without worrying that their energy
                levels or body weight will get in the way.
                Fit into the clothes they want to wear
                Stop worrying about getting diseases and dying young
                Run around with their kids, or grandkids, without feeling pain, winded or tired; and do it again the
                next day
                Add 10+ years of healthy living to their retirement
            </p>

        </div>
    </section> -->

  <section class="conditions2 fh5co-content-box">
    <div class="LCon">
      <div class="conleft">
        <h1>CONDITIONS WE MANAGE</h1>
        <ul class="ulist">
          <li>Weight Management</li>
          <li>PCOS</li>
          <li>PCOD</li>
          <li>Arthritis</li>
          <li>Postanal Traning</li>
          <li>Cholesterol</li>
          <li>Cardiovascular Disease</li>
          <li>Cardiovascular Disease</li>
          <li>Diabetes</li>
        </ul>
      </div>
    </div>
    <div class="conright">
      <div class="conrimg" id="conrimg"></div>
    </div>
    </div>
  </section>
  <div id="about-us" class="container-fluid fh5co-about-us pl-0 pr-0 parallax-window" data-parallax="scroll"
    data-image-src="images/about-us-bg.jpg">
    <div class="container">
      <div class="col-sm-6 offset-sm-6">
        <h2 class="wow bounceInLeft" data-wow-delay=".25s">ABOUT US</h2>
        <hr />
        <p class="wow bounceInRight" data-wow-delay=".25s">Trainers, athletes and serious clients alike are
          looking for the toughest, most brutally productive training techniques to spice up their workouts
          and provide a truly unique challenge for their body and mind. Think: one-arm push-ups, pistols,
          pull-ups, handstands, hanging levers and the like! If you want toeither for </p>
        <a class="btn btn-lg btn-outline-danger d-inline-block text-center mx-auto wow bounceInDown">Learn
          More</a>
      </div>
    </div>
  </div>

  <div class="container-fluid fh5co-content-box">
    <div class="container">

      <div class="row">
        <div class="col-md-5 pr-0"><img src="images/rode-gym.jpg" alt="gym" class="img-fluid wow bounceInLeft" /> </div>
        <div class="col-md-7 pl-0">
          <div class="wow bounceInRight" data-wow-delay=".25s">
            <div class="card-img-overlay">
              <p>Great weekend, met lots of cool people and took away quite a bit. Thank you for the
                experience, and to you and your professional team for
                making things seem </p>
            </div>
            <img src="images/gym-girls.jpg" alt="girls in gym" class="img-fluid" />
          </div>
        </div>
      </div>
      <!-- <div class="row trainers pl-0 pr-0">
            <div class="col-12 bg-50">
              <div class="quote-box2 wow bounceInDown" data-wow-delay=".25s">
                <h2> TRAINERS </h2>
              </div>
            </div>
            <div class="col-md-6 pr-5 pl-5">
              <div class="card text-center wow bounceInLeft" data-wow-delay=".25s"> <img class="card-img-top rounded-circle img-fluid" src="images/trainers1.jpg" alt="Card image">
                <div class="card-body mb-5">
                  <h4 class="card-title">JENIFERR</h4>
                  <p class="card-text">Trainers, athletes and serious clients alike are looking for the toughest, most brutally productive training techniques to spice up their workouts and provide a truly unique challenge</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 pl-5 pr-5">
              <div class="card text-center wow bounceInRight" data-wow-delay=".25s"> <img class="card-img-top rounded-circle img-fluid" src="images/trainers2.jpg" alt="Card image">
                <div class="card-body mb-5">
                  <h4 class="card-title">JHON</h4>
                  <p class="card-text">Trainers, athletes and serious clients alike are looking for the toughest, most brutally productive training techniques to spice up their workouts and provide a truly unique challenge</p>
                </div>
              </div>
            </div>
          </div>  -->

      <div class="row gallery">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body mb-4 wow bounceInLeft" data-wow-delay=".25s">
              <h4 class="card-title">FILEX</h4>
              <p class="card-text">I just wanted to sincerely thank you for the opportunity to represent
                Precision Nutrition and the US at such an amazing event. </p>
            </div>
            <img class="card-img-top img-fluid wow bounceInRight" data-wow-delay=".25s" src="./img/i4.jpg"
              alt="Card image">
          </div>
        </div>
        <div class="col-md-4">
          <div class="card"> <img class="card-img-top img-fluid wow bounceInUp" data-wow-delay=".25s" src="./img/i2.jpg"
              height="300px" alt="Card image">
            <div class="card-body mt-4 wow bounceInDown" data-wow-delay=".25s">
              <h4 class="card-title">IGNITING</h4>
              <p class="card-text">I just wanted to sincerely thank you for the opportunity to represent
                Precision Nutrition and the US at such an amazing event. </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body mb-4 wow bounceInRight" data-wow-delay=".25s">
              <h4 class="card-title">PASSION</h4>
              <p class="card-text">I just wanted to sincerely thank you for the opportunity to represent
                Precision Nutrition and the US at such an amazing event. </p>
            </div>
            <img class="card-img-top img-fluid wow bounceInLeft" data-wow-delay=".25s" src="./img/i3.jpg"
              alt="Card image">
          </div>
        </div>
      </div>

    </div>
  </div>

 

  <footer class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-3 footer1 d-flex wow bounceInLeft" data-wow-delay=".25s">
          <div class="d-flex flex-wrap align-content-center">
            <a href="#"><img src="/img/logo.jpeg" width="160px" height="200px" alt="logo" /></a>
            <h3>FitBank.com</h3>
          </div>
        </div>
        <div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s" id="contact">
          <div class="form-box">
            <h4>CONTACT US</h4>
            <form action=" " method="POST">
            <table class="table table-responsive d-table">
              <tr>
                <td><input type="text" class="form-control pl-0" placeholder="NAME" name='firstname' /></td>
                <td><input type="email" class="form-control pl-0" placeholder="EMAIL" name='email'/></td>
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" class="form-control pl-0" placeholder="PPHONE NUMBER" name="num"/></td>
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" class="form-control pl-0" placeholder="MESSAGES" name="Message" /></td>
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
              <tr>
                <td colspan="2" class="text-center pl-0"><button type="submit" class="btn btn-dark" name="submit">SEND</button></td>
              </tr>
            </table>
            </form>
          </div>
        </div>
        <div class="col-md-3 footer3 wow bounceInRight" data-wow-delay=".25s">
          <h5>PHONE</h5>
          <p>253232323232</p>
          <h5>EMAIL</h5>
          <p>email@example.com</p>
          <div class="social-links">
            <ul class="nav nav-item">
              <li><a href="https://www.facebook.com/fh5co" class="btn btn-secondary mr-1 mb-2"><img
                    src="images/facebook.png" alt="facebook" /></a></li>
              <li><a href="#" class="btn btn-secondary mr-1 ml-1 mb-2"><img src="images/facebook.png"
                    alt="facebook" /></a></li>
              <li><a href="#" class="btn btn-secondary mr-1 ml-1 mb-2"><img src="images/facebook.png"
                    alt="facebook" /></a></li>
              <li><a href="#" class="btn btn-secondary ml-1 mb-2"><img src="images/facebook.png" alt="facebook" /></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <div class="footer">
    <div class="overlayf"></div>

    <div class="mid1">

      <h1>FitBank</h1>
      <p>Copyright @ 2021 fitbank</p>
    </div>
    <div class="line"></div>
  </div>
  <script src="js/resp.js"></script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Bootstrap JS, ... -->

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/parallax.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/main.js"></script>
</body>

</html>