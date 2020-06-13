<?php
  $dbhost   = 'localhost';
  $dbname   = 'kumang';
  $dbuser   = 'brian';
  $dbpass   = '1234';
  $appname  = 'KUMANG';

  $connection = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
  if($connection->connect_error) die($connection->connect_error);

  function createTable($name, $query){
    queryMysql("create table if not exists $name($query)");
    echo "Table '$name' created or alredy exists.<br>";
  }

  function queryMysql($query){
    global $connection;
    $result = $connection->query($query);
    if(!$result) die($connection->error);
    return $result;
  }

  function destroySession(){
    $_SESSION = array();

    if(session_id() != "" || isset($_COOKIE[session_name()])){
      setcookie(session_name(), '', time()-2592000, '/');

      session_destroy();
    }
  }

  function sanitizeString($var){
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }
?>
