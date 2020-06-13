<?php
  require_once 'function.php';

  $query = "SELECT * FROM articles";
  $result = queryMysql($query);

  if(!$result) die ("Database access failed : " . $connection->error);
?>
  <html>
  	<head>
  		<title> - KumangSite - </title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  		<link rel="stylesheet" href="style-collection.css">
  		<link rel="stylesheet" href="aos-master/dist/aos.css">
  		<script src="jquery-3.4.1.min.js"></script>
  		<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  		<script src="script.js"></script>
  	</head>
  <body class="backgroundCustom">
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #ffa31a">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="fa fa-home nav-link" href="header.php"  style="font-size:2.8vw"></a>
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
    <br>
    <h1 class="collection-title">Our Collection.</h1>
    <br><br><br><br>
      <?php
          $col = 3;
          $rowCount = 0;
          $bootstrapWidth = 3 / $col;
          if(!$result) die ("Database access failed : " . $connection->error);
          foreach ($result as $row) {
            if($rowCount % $col == 0){
              echo '<div class="card-deck">';
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
