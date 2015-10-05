<?php 
session_start();
if (isset($_SESSION['user'])) {
	session_unset();
   session_destroy();
   $_SESSION['authenticated']=false;
   echo "<br> you are logged out successufuly!";
} 
   echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
 ?>