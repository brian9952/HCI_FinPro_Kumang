<?php
  session_start();
  require_once 'function.php';

  if(isset($_SESSION['user'])){
      $loggedin = TRUE;
  }else{
      $loggedin = FALSE;
  }

  if($loggedin){
    $error = $title = $userstr = $date = $content = $message = $message2 = "";
    if(isset($_POST['title'])){
      $user     = $_SESSION['user'];
      $userstr  = " $user";
      $title    = sanitizeString($_POST['title']);
      $date     = date('Y-m-d');
      $content  = sanitizeString($_POST['content']);

      if($title == "" || $content == ""){
        $error = "Not all fields were Entered<br><br>";
      }else{
        $result = queryMysql("SELECT * FROM articles WHERE user = '$userstr'");

        queryMysql("INSERT INTO articles VALUES(NULL,'$title','$userstr','$date','$content')");
        $message = "<h4 style='color:white;'>POST SUCCESS!</h4>";
        $message2 = "<h4 style='color:white;'><a href='./post_image.php?id=" . $title . "'>Click here</a> to post image</h4>";
      }
    }
?>
          <html>
          	<head>
          		<title> - KumangSite - </title>
          		<meta charset="utf-8">
          		<meta name="viewport" content="width=device-width, initial-scale=1">
          		<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
          		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          		<link rel="stylesheet" href="style-post.css">
          		<link rel="stylesheet" href="aos-master/dist/aos.css">
          		<script src="jquery-3.4.1.min.js"></script>
          		<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
          		<script src="script.js"></script>
          	</head>
          <body class="backgroundCustom">
            <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #ffa31a">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="fa fa-home nav-link" href="index.php"  style="font-size:2.8vw"></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="article.php">Collection</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="post.php">Post a Review</a>
                </li>
            		<li class="nav-item">
                  <a class="nav-link" href="account.php">Account</a>
                </li>
            	</ul>
            	<ul class="navbar-nav ml-auto">
            		<li class="nav-item">
            			<a class="fa fa-search nav-link" href="#"  style="font-size:2.4vw;"></a>
            		</li>
            		<form class="form-inline my-2 my-lg-0 ml-auto" style="margin-right:1vw">
            			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            		</form>
            	</ul>
            	<ul class="navbar-nav">
            		<li class="nav-item">
            			<a class="nav-link" href="logout.php">Log Out</a>
            		</li>
            	</ul>
            </nav>
            <br>
            <div class="container-fluid">
              <center><h1 style="color:white;">Post Article</h1></center><br>
              <div class="col-sm-6 mx-auto">
                <form method="post" action="post.php">
<?php echo        '<div class="form-group">' . $error . ''; ?>
                    <label for="exampleFormControlInput1"><h2>Title</h2></label>
<?php echo          "<input type='text' class='form-control' name='title' value='$title' placeholder='Title'>"; ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1"><h2>Content</h2></label>
<?php echo          "<textarea type='text' class='form-control' name='content' value='$content' rows='3'></textarea>"; ?>
                  </div>
                  <center><button type='submit' value='post' class='submitbutton'>Submit</button></center>
                </form>
              </div>
<?php echo   '<center>'.$message.'<br>'.$message2.'</center>'; ?>
            </div>
<?php
  }else{
    header("Location: ./header.php");
    exit();
  }

?>
