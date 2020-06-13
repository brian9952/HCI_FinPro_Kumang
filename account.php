<?php
  session_start();
  require_once 'function.php';

  if(isset($_SESSION['user'])){
    $loggedin = TRUE;
  }else{
    $loggedin = FALSE;
  }

  if($loggedin){
    $user = $email = $pass = "";
    $user     = $_SESSION['user'];
    $result   = queryMysql("SELECT * FROM account WHERE user = '$user'");
    $row      = mysqli_fetch_array($result);
?>
<html>
	<head>
		<title> - KumangSite - </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style-account.css">
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
  <div class="container col-sm-5">
    <h1 style="color:white;">Account Info</h1><br>
    <table class="table table-bordered table-hover table-light">
      <tbody>
        <tr>
          <th>Name</th>
<?php  echo  '<td>' . $row['user'] . '</td>'; ?>
        </tr>
        <tr>
          <th>Email</th>
<?php  echo   '<td>'. $row['email'] .'</td>'; ?>
        </tr>
        <tr>
          <th>Pass</th>
<?php  echo   '<td>' . $row['password'] .'</td>'; ?>
        </tr>
      </tbody>
    </table>
    <center><a href="logout.php"><button type='submit' class='submitbutton'>Log Out</button></a></center>
  </div>

<?php
  }else{
    header("Location: ./header.php");
    exit();
  }

 ?>
