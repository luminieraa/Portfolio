<?php

include_once 'connect/dbh.data.php';
 ?>

<!DOCTYPE html>
<html>
<head>
  <title> Example ni manuel </title>
</head>
<body>
<?php
$sql = "SELECT * FROM users;";
$result = mysqli_query($link,$sql);
$resultcheck = mysqli_num_rows($result);

if($resultcheck > 0){
  while ($row =msqli_fetch_assoc($result)) {
    echo $row['uid'];
  }
}



 ?>
</body>
</html>
