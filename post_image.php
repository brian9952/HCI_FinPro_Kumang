<?php
  require_once 'function.php';

  $title = sanitizeString($_GET['id']);
  $message = "";
  if(isset($_POST['image_upload'])){
    $image = $_FILES['file']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    //file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //valid extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
    //check extensions

    if(in_array($imageFileType,$extensions_arr)){
      $query = queryMysql("INSERT INTO images VALUES(NULL,'$title','$image')");

      move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$image);
      $message = "<h4 style='color:white;'>Upload Success</h4><br><h6 style='color:white;'><a href='index.php'>click here</a> to go back to the main page</h6>";
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
        <a class="fa fa-home nav-link" href="#"  style="font-size:2.8vw"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Collection</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Post a Review</a>
      </li>
  		<li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
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
  			<a class="nav-link" href="#">Login / Register</a>
  		</li>
  	</ul>
  </nav>
  <br>
  <div class="container-fluid">
    <div class="col-sm-6 mx-auto">
      <h1 style="color:white;">Post Image</h1><br><br>
      <form style='color:white;' method='post' action='' enctype='multipart/form-data'>
        <input type='file' class="form-control-file" name='file' /><br>
        <input type='submit' value='Save name' name='image_upload'>
      </form>
      <?php echo $message; ?>
    </div>
  </div>
