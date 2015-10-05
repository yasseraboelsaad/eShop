<?php 
session_start();
if (isset($_SESSION['user'])) {
   session_destroy();
   echo "<br> you are logged out successufuly!";
} 
   echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
 ?>