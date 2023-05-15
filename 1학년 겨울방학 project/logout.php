<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["boardLevel"]);

  
  echo("
       <script>
          location.href = 'main.php';
         </script>
       ");
?>
