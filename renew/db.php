<?php

      $db_host="softeleven.cafe24.com";
      $db_user="softeleven";
      $db_passwd="soft11thvmxm";
      $db_name="softeleven";

      $conn=@mysql_connect($db_host,$db_user,$db_passwd);

      echo $conn;

      $db_connect_ok = 1;

      if(!$conn)
      {
        $db_connect_ok = 0;
      }
      else
      {
        $conn=@mysql_select_db($db_name. $conn);

        if(!$conn)
        {
          $db_connect_ok=-1;
        }
        else
        {
          @mysql_query("set names utf8");
        }
      }

?>
