<?php

  if (isset($_POST['add'])) {

  $conn=mysqli_connect("127.0.0.1","root","","fun");
  if(!$conn)
  die("Unable to connect to database");
  else {

    $title=$_POST['title'];
    $username=$_GET['username'];
    $category=$_GET['category'];
    $sub_category="WL";
    {
      $stmt="insert into list_content values('$username','$title','$category','$sub_category');";
      $result=mysqli_query($conn,$stmt);
    }
  }

}


if (isset($_POST['already_watched'])) {

  $conn=mysqli_connect("127.0.0.1","root","","fun");
  if(!$conn)
  die("Unable to connect to database");
  else {

    $title=$_POST['title'];
    $username=$_GET['username'];
    $category=$_GET['category'];
    $sub_category="AW";
    {
      $stmt="update list_content set sub_category='$sub_category' where User_Id='$username' and title='$title' and category='$category';";
      $result=mysqli_query($conn,$stmt);
    }
  }

}

if (isset($_POST['watch_list'])) {

  $conn=mysqli_connect("127.0.0.1","root","","fun");
  if(!$conn)
  die("Unable to connect to database");
  else {

    $title=$_POST['title'];
    $username=$_GET['username'];
    $category=$_GET['category'];
    $sub_category="WL";
    {
      $stmt="select * from list_content where User_Id='$username' and title='$title' and category='$category'";
      $count=0;
      $result = mysqli_query($conn, $stmt);
      while ($row = mysqli_fetch_assoc($result)) {
        $count=$count+1;
      }
      // echo "<br><br><br><br><br><br><br><br><br><br><br>";
      // echo $stmt;
      // echo $count;
      // echo "<br><br><br><br><br><br><br><br><br><br><br>";
      if($count!=0)
      {
        $stmt="update list_content set sub_category='$sub_category' where User_Id='$username' and title='$title' and category='$category';";
        $result=mysqli_query($conn,$stmt);
      }
      else
      {
        $stmt="insert into list_content values('$username','$title','$category','$sub_category');";
        $result=mysqli_query($conn,$stmt);
      }
    }
  }
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>User Home</title>
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

</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">Funzzz.com</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>



      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <?php $username=$_GET['username'];
                $category=$_GET['category'];
          ?>
          <li><a href="userHome.php?username=<?php echo $username ?>">User Home</a></li>
          <li class="menu-active"><a href="#intro"><?php echo $username; ?></a></li>
          <li><a href="index.html">LogOut</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/intro-carousel/front_page.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Welcome to Funzzz.com</h2>
                <a href="discussion.php?username=<?php echo $username ?>&category=<?php echo $category ?>" class="btn-get-started scrollto">Discussion Page</a>
              </div>
            </div>
          </div>


        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">



   


<br><br>

<div id="content" class="p-4 p-md-5 pt-5">

      <section id="posts">
        <div class="container">
          <div class="row">
            <!-- MAIN  -->
            <div class="col-md-12" style="width: 65rem;">


<div class="card">
              <div class="card-header">
                <h4><i class="fa fa-plus"></i>Add <?php echo $category ?> to watchlist</h4>
              </div>
              <br>
              <form action="open_category.php?username=<?php echo $username ?> & category=<?php echo $category ?>" method="post">

                <div class="form-group">
                  <label>Name of the <?php echo $category?><span class="m-1 text-primary">*</span></label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Name of the <?php echo $category ?>" required>
                </div>
                <input type="submit" class="btn btn-info" name="add" value="Add to watchlist">
              </form>
              <br>

            </div>
<br>

<div class="card">
          <div class="card-header">
            <h4><i class="fa fa-file-text"></i> Most Viewed <?php echo $category ?> list</h4>
          </div>
           <table class="table table-striped table-hover">
            <thead class="thead-inverse">
              <tr>
                <!-- <th></th> -->
                <th style="text-align: center">Name of the <?php echo $category ?></th>
              </tr>
            </thead>

            <tbody>

              <?php
                    $conn = mysqli_connect("localhost", "root", "", "fun");
                    if (!$conn)
                      die("Unable to connect to database");
                    // echo $roll;
                    $stmt = "select title from list_content where category='$category'  group by title order by count(title) desc limit 1";
                    //echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    //echo $row['title'];
                ?>
                <tr>
                  <!-- <td></td> -->
                    <td style="text-align: center"><?php echo $row['title'] ?></td>
                    <td style="text-align: center">
                      <form action="open_category.php?username=<?php echo $username ?>& category=<?php echo $category ?>" method="post">
                            <input type='hidden' name='title' value=<?php echo "'";
                                                                          echo $row['title'];
                                                                          echo "'"; ?>>
                            <input type="submit" class="btn btn-info" name="watch_list" value="Add to watch list" style="background-color: green">
                          </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
</div>
<br>


<div class="card">
          <div class="card-header">
            <h4><i class="fa fa-file-text"></i> Watchlist</h4>
          </div>
          <table class="table table-striped table-hover">
            <thead class="thead-inverse">
              <tr>
                <!-- <th></th> -->
                <th style="text-align: center">Name of the <?php echo $category ?></th>
                <th></th>
              </tr>
            </thead>

            <tbody>

              <?php
                    $conn = mysqli_connect("localhost", "root", "", "fun");
                    if (!$conn)
                      die("Unable to connect to database");
                    // echo $roll;
                    $stmt = "select * from list_content where User_Id='$username' and category='$category' and sub_category='WL'";
                    //echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    //echo $row['title'];
                ?>
                <tr>
                  <!-- <td></td> -->
                    <td style="text-align: center"><?php echo $row['title'] ?></td>
                    <td style="text-align: center">
                      <form action="open_category.php?username=<?php echo $username ?>& category=<?php echo $category ?>" method="post">
                            <input type='hidden' name='title' value=<?php echo "'";
                                                                          echo $row['title'];
                                                                          echo "'"; ?>>
                            <input type="submit" class="btn btn-info" name="already_watched" value="Add to already watched" style="background-color: green">
                          </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
</div>
<br>

<div class="card">
          <div class="card-header">
            <h4><i class="fa fa-file-text"></i>Already Watched</h4>
          </div>
          <table class="table table-striped table-hover">
            <thead class="thead-inverse">
              <tr>
                <!-- <th></th> -->
                <th style="text-align: center">Name of the <?php echo $category ?></th>
              </tr>
            </thead>

            <tbody>

              <?php
                    $conn = mysqli_connect("localhost", "root", "", "fun");
                    if (!$conn)
                      die("Unable to connect to database");
                    // echo $roll;
                    $stmt = "select * from list_content where User_Id='$username' and category='$category' and sub_category='AW'";
                    //echo $stmt;
                    $result = mysqli_query($conn, $stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    //echo $row['title'];
                ?>
                <tr>
                  <!-- <td></td> -->
                    <td style="text-align: center"><?php echo $row['title'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
          </table>
</div>
<br>


 </div>

            <!-- SIDEBAR -->


          </div>
        </div>
      </section>

    </div>















    <!--==========================
      Team Section
    ============================-->

    <!--==========================
      Contact Section
    ============================-->


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
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
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
























