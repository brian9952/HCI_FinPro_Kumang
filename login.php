<?php
  require_once 'function.php';
  $error = $user = $pass = "";

  if(isset($_POST['user'])){
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);

    if($user == "" || $pass == ""){
      $error = "Not all fields were entered<br>";
    }else{
      $result = queryMysql("SELECT user,password FROM account WHERE user='$user' AND password='$pass'");
      if($result->num_rows == 0){
        $error = "<span class='error'>Username/Password Invalid</span><br><br>";
      }else{
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        header("Location: ./index.php");
        exit();
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
                <h1 style="font-family: coolvetica"><b>Sign In</b></h1><br>
_END;
    echo       "<form method='post' action='login.php' class='needs-validation' novalidate>
                  <div class='form-group col-lg-7'>
                    <input type='text' class='form-control' id='user' placeholder='Username' name='user' value='$user' required>
                    <div class='valid-feedback'>Valid.</div>
                    <div class='invalid-feedback'>Please fill out this field.</div>
                  </div>
                  <div class='form-group col-lg-7'>
                    <input type='password' class='form-control' id='pass' placeholder='Password' name='pass' value='$pass' required>
                    <div class='valid-feedback'>Valid.</div>
                    <div class='invalid-feedback'>Please fill out this field.</div>
                  </div>
                  <button type='submit' value='login' class='submitbutton'>Submit</button>
                </form>";

  echo <<<_END
                <p class="register-message" style="font-family: coolvetica">Not a member yet? <a href="register.php" style="color: #47525e;">click here</a> to register</p>
                <p class="register-message" style="font-family: coolvetica">or <a href="header.php" style="color: #47525e;">go back</a> to home page</p>
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
