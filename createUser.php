<?php
if (isset($_POST['submit'])) {


      // $check = getimagesize($_FILES["image"]["tmp_name"]);
      // if($check !== false){
          // $image = $_FILES['image']['tmp_name'];
          // $imgContent = addslashes(file_get_contents($image));



      $conn=mysqli_connect("127.0.0.1","root","","fun");
      if(!$conn){
        die('Unable to connect to database');
      }
      else {
         $email=$_POST['email'];
         $password=md5($_POST['password']);
         $firstName=$_POST['firstName'];
         $lastName=$_POST['lastName'];
         $stmt2="select * from users where user_id='$email'";
         $result1=mysqli_query($conn,$stmt2);
         if(mysqli_num_rows($result1)>0)
         {
           die("Account for this email id already exists\n");
         }
         $stmt="insert into users values('$email','$password','$firstName','$lastName');";
         $result=mysqli_query($conn,$stmt);

         if($result)
         {
          echo "User added successfully<br>";
          echo '<meta http-equiv="refresh" content="5; url = index.html" />';
         }
         else echo "failed";

      }
        
      // }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User signUp</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
 
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header" style = "background-color: black">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Funzzz.com</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.html">Home</a></li>
          <!-- <li><a href="">About Us</a></li>
          <li><a href="">Clubs</a></li>
          <li><a href="">Team</a></li>
          <li><a href="">Sign up/Login</a></li> -->
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
 

  <div style="margin: 200px;">
     <div>
        <h1>SignUp User</h1>
     </div>
<form action="createUser.php" method="post"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
  </div>

  <div class="form-group">
    <label for="lastName">Last Name</label>
    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
  </div>
  
  <button style = "background-color:black;" name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
    
  </div>
  
  

  <!-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> -->
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries --><!-- 
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script> -->
  <!-- Contact Form JavaScript File -->
  <!-- <script src="contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  <!-- <script src="js/main.js"></script> -->

</body>
</html>

