<!DOCTYPE html><html>
<head>
    <title>Setting up database</title>
</head>
<body>
  <h3>Setting up.....</h3>
<?php
  require_once 'function.php';

  createTable('account',
              'user VARCHAR(32) KEY,
              password VARCHAR(32),
              email VARCHAR(32)');

  createTable('articles',
              'id_article int(32) KEY AUTO_INCREMENT,
              title VARCHAR(250),
              user VARCHAR(32),
              date DATE,
              content LONGTEXT');

  createTable('images',
              'id INT(11) KEY AUTO_INCREMENT,
              title VARCHAR(200) NOT NULL,
              name VARCHAR(200) NOT NULL');
?>
  <br>...done.
</body>
</html>
