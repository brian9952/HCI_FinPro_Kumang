<?php
  session_start();
  require_once 'function.php';

  if(isset($_SESSION['user'])){
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " $user";
  }else{
    $loggedin = FALSE;
  }

  if($loggedin){
?>
    <html>
    	<head>
        <title> - KumangSite - </title>
        		<meta charset="utf-8">
        		<meta name="viewport" content="width=device-width, initial-scale=1">
        		<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
        		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        		<link rel="stylesheet" href="style-header.css">
        		<script src="jquery-3.4.1.min.js"></script>
        		<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
        		<script src="script.js"></script>
        	</head>
        <body class="backgroundCustom">
        <div id="carousel_main" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000" data-pause="false">
        	<div class="carousel-inner">
        		<div class="carousel-item active">
        			<img class="carousel_responsive d-block w-100" src="images/carousel_1.jpg" alt="carousel_1">
        			<div class="carousel-caption">
        				<h1 style="font-family: harytian; font-size:5vw">Welcome to Kumangsite</h1>
        				<p style="font-family: colombia; font-size:2vw">All About Culinary Review</p>
        			</div>
        		</div>
        		<div class="carousel-item">
        			<img class="carousel_responsive d-block w-100" src="images/carousel_2.jpg" alt="carousel_2">
        			<div class="carousel-caption">
        				<h1 style="font-family: harytian;font-size:5vw">Welcome to Kumangsite</h1>
        				<p style="font-family: colombia;font-size:2vw">All About Culinary Review</p>
        			</div>
        		</div>
        		<div class="carousel-item">
        			<img class="carousel_responsive d-block w-100" src="images/carousel_3.jpg" alt="carousel_3">
        			<div class="carousel-caption">
        				<h1 style="font-family: harytian;font-size:5vw">Welcome to Kumangsite</h1>
        				<p style="font-family:colombia;font-size:2vw">All About Culinary Review</p>
        			</div>
        		</div>
        	</div>
        </div>
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
        <div class="container-fluid">
        	<div class="d-flex justify-content-center" style="margin-top: 2vh; padding: 0;">
        		<h1 style="color: white;font-family: colombia;font-size: 7vw">Get Started</h1>
        	</div>
        	<div class="d-flex justify-content-center">
        		<h1 style="color: white;font-family: colombia;font-size: 2.5vw">Take a Pick of What Interesting Here!</h1>
        	</div>
        </div>
        <div class="card-deck" style="margin-top:1vh;margin-left:4vw;margin-right:4vw;margin-bottom:1vh;overflow-x:hidden;">
        	<div class="card" style="background-color: #ffa31a;margin-right:2vw" data-aos="fade-right">
        		<div class="card-body text-center" style="padding-top:4vw;">
        			<i class="fa fa-cutlery" style="font-size:15vw;color: white"></i>
        			<h1 class="card-text" style="font-size: 2vw;margin-top:2vw;">REVIEWS COLLECTION</h1>
        			<p class="card-text" style="font-size: 1.5vw;color: white">See your favourite food gets a review from other people</p>
        			<a href="#" class="btn btn-primary custom-button stretched-link">See Profile</a>
        		</div>
        	</div>
        	<div class="card" style="background-color: #ffa31a;margin-right:2vw" data-aos="fade">
        		<div class="card-body text-center" style="padding-top:4vw;">
        			<i class="fa fa-thumbs-o-up" style="font-size:15vw;color: white"></i>
        			<h1 class="card-text" style="font-size: 2vw;margin-top:2vw;">RATE</h1>
        			<p class="card-text" style="font-size: 1.5vw;color: white">Give feedback to the review and rate them!</p>
        			<a href="#" class="btn btn-primary custom-button stretched-link">See Profile</a>
        		</div>
        	</div>
        	<div class="card" style="background-color: #ffa31a;" data-aos="fade-left">
        		<div class="card-body text-center" style="padding-top:4vw;">
        			<i class="fa fa-newspaper-o" style="font-size:15vw;color: white"></i>
        			<h1 class="card-text" style="font-size: 2vw;margin-top:2vw;">POST A REVIEW</h1>
        			<p class="card-text" style="font-size: 1.5vw;color: white">Make your own review and make other people interested</p>
        			<a href="#" class="btn btn-primary custom-button stretched-link">See Profile</a>
        		</div>
        	</div>
        </div>
        <br><br><br><br><br>
        <div class="container-fluid">
        	<div class="jumbotron collection">
        		<h1 class="collectionWord">Take a look of our collection below!</h1>
        	</div>
        </div>
        <br>
    <?php
        $query = "SELECT * FROM articles LIMIT 6";
        $result = queryMysql($query);
        $col = 3;
        $rowCount = 0;
        $bootstrapWidth = 3 / $col;
        if(!$result) die ("Database access failed : " . $connection->error);
        foreach ($result as $row) {
          if($rowCount % $col == 0){
            echo '<div class="card-deck carcol">';
          }
          $rowCount++;
          $img = $row['title'];
          $image_query = "SELECT * FROM images WHERE title='$img'";
          $image_result = queryMysql($image_query);
          $image_row = mysqli_fetch_array($image_result);
        echo "<div class='col-sm-4 card bg-custom'>";
        echo    "<a href='./details.php?id={$row['id_article']}'><img class='img-fluid mx-auto card-img-top' src='./images/{$image_row['name']}' alt='card-image'>";
        echo      '<div class="card-body text-center">';
        echo         "<p class='card-text'>{$row['title']}</p>";
      	echo      '</div>'.
      	      '</div></a> ';
          if($rowCount % $col == 0){
            echo '</div><br><br>';
          }
        }
    ?>
        </div>
        <br>
        <a href="article.php"><button class="button-seemore">See more >></button></a>
        <br><br><br><br><br><br>
        <div class="container-fluid footer">
          <div class="row no-gutters">
        		<div class="col-sm-6">
        			<div class="container-fluid left">
        				<div class="footer-text">
        					<h1>About Us</h1>
        					<table class="footer inner">
        						<tr>
        							<td><h3>Owned By : </h3></td>
        							<td><h3>Email Address : </h3></td>
        						</tr>
        						<tr>
        							<td class="inner text">Atha<br>Teguh<br>Brian</td>
        							<td class="inner text">fbriann@gmail.com</td>
        						</tr>
        						<tr>
        							<td><h3><br>Phone Number : </h3></td>
        						</tr>
        						<tr>
        							<td class="inner text">081232152836</td>
        						</tr>
        					</table>
        				</div>
        			</div>
        		</div>
        		<div class="col-sm-6"></div>
        	</div>
        </div>
        </body>
        </html>
        <script src="./aos-master/dist/aos.js"></script>
        <script>
              AOS.init({
                easing: 'ease-in-out-sine'
              });
        </script>
    <?php
  }else{
    header("Location: ./header.php");
    exit();
  }
?>
