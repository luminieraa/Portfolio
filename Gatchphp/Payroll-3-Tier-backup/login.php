<?php
  $user = $_POST['user'];
  $passw = $_POST['passw'];
  require('connect.php');
  $sql = "select * from users where username = '$user' and password = '$passw'";
  $result = mysqli_query($link,$sql);
  if($result) {
       $rows=mysqli_num_rows($result);
       if ( $rows > 0) {
          header( "Location: menu.html" );
       }
       else {
       	  echo "<script>
       	           alert('Invalid user, please try again !')
       	           window.open('index.html');
       	        </script>";
       }
  }
  else
  	  echo "Error occured while logging in";
  mysqli_close($link);
 ?>
