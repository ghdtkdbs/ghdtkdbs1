<?php

      $mysql_host = 'localhost';
      $mysql_user = 'softeleven';
      $mysql_password = 'soft11thvmxm';
      $mysql_db = 'softeleven';

      $conn=new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_db);

      if($conn->connect_error)
      {
        echo "DB error";
      }

      $conn->set_charset('utf8');
?>
