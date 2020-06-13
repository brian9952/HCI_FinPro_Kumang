<?php
  require_once 'function.php';
  echo <<<_END
    <script>
      function checkUser(user){
        if(user.value == ''){
          0('info').innerHTML = ''
          return
        }

        params = "user=" + user.value
        request = new ajaxRequest()
        request.open("POST","checkuser.php",true)
        request.setRequestHeader("Content-type",
          "application/x-www-form-urlencoded")
        request.setRequestHeader("Content-length", params.length)
        request.setRequestHeader("Connection","close")

        request.onreadystatechange = function(){
          if(this.readyState == 4)
            if(this.status == 200)
              if(this.responseText != null)
                0('info').innerHTML = this.responseText
        }
        request.send(params)
      }

      function ajaxRequest(){
        try { var request = new XMLHttpRequest() }
        catch(e1){
          try{ request = new ActiveXObject("Msxml2.XMLHTTP")}
          catch(e2){
            try{ request = new ActiveXObject("Microsoft.XMLHTTP")}
            catch(e3){
              request = false
      }}}
      return request
    }
  </script>
_END;

  $error = $user = $pass = $email = "";
  if(isset($_SESSION['user'])) destroySession();

  if(isset($_POST['user'])){
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    $email = sanitizeString($_POST['email']);

    if($user == "" || $pass == "" || $email == ""){
      $error = "Not all fields were entered!<br><br>";
    }else{
      $result = queryMysql("SELECT * FROM account WHERE user ='$user'");

      if($result->num_rows){
        $error = "Username are already exists<br><br>";
      }else{
        queryMysql("INSERT INTO account VALUES('$user','$pass','$email')");
        echo "<p class='register-message' style='font-family: coolvetica'>Account Created! Please <a href='login.php' style='color: #47525e;'>login</a> to continue!</p>";
      }
    }
  }

  echo <<<_END
  <html>
  	<head>
  		<title> Sign up </title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  		<link rel="stylesheet" href="style-login.css">
  		<link rel="stylesheet" href="aos-master/dist/aos.css">
  		<script src="jquery-3.4.1.min.js"></script>
  		<script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  		<script src="script.js"></script>
  </head>
  <body>
  	<div class="container-fluid full">
  		<div class="row" style="height:100%;">
  			<div class="col-sm-6">
  				<div class="container-fluid left" style="font-family: eastwood">
  					<p style="font-size : 6vw"><b>Write . . .<br>Chat . . .<br>Rate . . .<br>About Food.<br></b></p>
  				</div>
  			</div>
  			<div class="col-sm-6">
  				<div class="container-fluid right">
  					<div class="container inner-right" data-aos="fade-left">
  						<center>
  							<h1 style="font-family: coolvetica"><b>Sign Up</b></h1><br>
_END;
echo           "<form method='post' action='register.php' class='needs-validation' novalidate>
  								<div class='form-group col-lg-7'>
      							<input type='text' class='form-control' id='email' placeholder='Email Adress' name='email' value='$email' required>
      							<div class='valid-feedback'>Valid.</div>
      							<div class='invalid-feedback'>Please fill out this field.</div>
    							</div>
    							<div class='form-group col-lg-7'>
      							<input type='text' class='form-control' id='user' placeholder='Username' name='user' value='$pass' onBlur='checkUser(this)' required>
      							<div class='valid-feedback'>Valid.</div>
      							<div class='invalid-feedback'>Please fill out this field.</div>
    							</div>
    							<div class='form-group col-lg-7'>
      							<input type='password' class='form-control' id='pass' placeholder='Password' name='pass' value='$pass' required>
      							<div class='valid-feedback'>Valid.</div>
      							<div class='invalid-feedback'>Please fill out this field.</div>
    							</div>
    							<button type='submit' class='submitbutton' value='register'>Submit</button>
  							</form>";
echo <<<_END
                <p class="register-message" style="font-family: coolvetica">Back to <a href="login.php" style="color: #47525e;">Sign In</a> page</p>
  						</center>
  					</div>
  				</div>
  			</div>
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
  <script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
  </script>
_END;
?>
