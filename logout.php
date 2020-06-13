<?php
  require_once 'index.php';

  if(isset($_SESSION['user'])){
    destroySession();
    echo '<script language="javascript">';
    echo "window.location.href='header.php'";
    echo '</script>';
    exit();
  }else{
    echo "You cannot logout since you haven't login!";
  }
?>
