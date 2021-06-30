<?php
  $conn=mysqli_connect("127.0.0.1","root","","fun");
  $username=$_GET['username'];
  $category=$_GET['category'];
  if(!$conn)
  die("Unable to connect to database");

  if (isset($_POST['send'])) {

  $conn=mysqli_connect("127.0.0.1","root","","fun");
  if(!$conn)
  die("Unable to connect to database");
  else {

    $chat=$_POST['chat'];
    $username=$_GET['username'];
    $category=$_GET['category'];
    $dateTime = date("Y-m-d H:i:s");
    {
      $stmt="insert into discussion values('$username','$category','$chat','$dateTime')";
      $result=mysqli_query($conn,$stmt);
    }
  }

}

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">




<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

<!-- Main Stylesheet File -->
<link href="css/style.css" rel="stylesheet">






<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #474e5d;
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 22px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color: white;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }

  /* Full-width containers */
  .container {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }

  /* Make sure that all arrows are pointing leftwards */
  .container::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }

  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
</style>
</head>
<body>

<h1>




    <header id="header">
      <div class="container-fluid">

        <div id="logo" class="pull-left">
          <h1><a href="userHome.php?username=<?php echo $username ?>&category=<?php echo $category ?>" class="scrollto">Funzzz.com</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>



        
      </div>
    </header><!-- #header -->




  <?php
  // Start the session
  //session_start();
 // echo $_GET["username"];

 // $secondname=$_GET["secondname"];
   ?>
</h1>

<div class="container right">
  <div class="content">
    <h2>New Chat</h2>
    <h5><?php echo $username ?></h5>
    <form  action="discussion.php?username=<?php echo $username ?>&category=<?php echo $category ?>" method="post">
      <label for="postDesc">Chat</label><br>
      <textarea rows="5" cols="70" name="chat" id="postDesc" placeholder="Text"></textarea><br>
      <input type="submit" name="send" value="send">
    </form>
  </div>
</div>

<?php $num=0;
$username=$_GET['username'];
$category=$_GET['category'];
$stmt="select * from discussion where category='$category' order by Date_Time desc;";
// echo $stmt;
$result=mysqli_query($conn,$stmt);
while($row=mysqli_fetch_assoc($result))
{

  if($row['User_Id']!=$username)
  {?>
<div class="timeline">
  <div class="container left">
    <div class="content">
      <h2><?php echo $row['User_Id']; ?></h2>
      <h5><?php echo $row['Date_Time'];?></h5>
      <p><?php echo $row['Chat']; ?></p>
    </div>
  </div>
<?php }
else
{
 ?>
  <div class="container right">
    <div class="content">
      <h2><?php echo $row['User_Id']; ?></h2>
      <h5><?php echo $row['Date_Time'];?></h5>
      <p><?php echo $row['Chat']; ?></p>
    </div>
  </div>
  <?php
}} ?>

</div>

</body>
</html>
