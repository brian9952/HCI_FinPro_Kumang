<?php
  require_once 'function.php';

  $id_article = (int) $_GET['id'];

  $query = "SELECT * FROM articles WHERE id_article='$id_article'";
  $result = queryMysql($query);

    $row = mysqli_fetch_array($result);
    $img = $row['title'];
    $image_query = "SELECT * FROM images WHERE title='$img' LIMIT 1";
    $image_result = queryMysql($image_query);
    $image_row = mysqli_fetch_array($image_result);
    $image = $image_row['name'];
    $image_src = "images/".$image;
?>
<html>
	<head>
		<title> - KumangSite - </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style-details.css">
		<link rel="stylesheet" href="aos-master/dist/aos.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
		<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
		<script src="script.js"></script>
	</head>
<body class="backgroundCustom">
  <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #ffa31a">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="fa fa-home nav-link" href="./header.php"  style="font-size:2.8vw"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="article.php">Collection</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="post.php">Post a Review</a>
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
  			<a class="nav-link" href="login.php">Sign In</a>
  		</li>
  	</ul>
  </nav>
  <br><br>
	<div class="container-fluid">
		<div class="row details">
			<div class="col-sm-5">
<?php	 echo	'<img class="img-fluid" src="'.$image_src.'"><br>'; ?>
			</div>
			<div class="col-sm-7 right">
<?php
			  echo "<h1>{$row['title']}</h1>";
				echo "<p>{$row['content']}</p>";
?>
<?php
  $img = $row['title'];
  $image_query = "SELECT * FROM images WHERE title='$img'";
  $image_result = queryMysql($image_query);
?>
<div class="owl-carousel owl-theme">
<?php
      while($image_row = mysqli_fetch_array($image_result)){
      $image = $image_row['name'];
      $image_src = "images/".$image;
        echo   '<div class="item"><img src="' . $image_src . '"></div>';
      }
?>
</div>
</div>
</div>
</div>
<br><br>
<script>
$('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  responsiveClass:true,
  responsive:{
      0:{
          items:1,
          nav:true
      },
      600:{
          items:3,
          nav:false
      },
      1000:{
          items:5,
          nav:true,
          loop:false
      }
  }
})
</script>
