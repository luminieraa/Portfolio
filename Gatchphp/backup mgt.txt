<style>
     #title {
       font-weigth : bolder;
       font-size:  25px;
       text-shadow:  5px 5px 10px #00FF00;
       font-family: 'Tahoma';
	   padding-bottom: 10px;
     }
</style>
<body bgcolor = azure text = black>
<?php
   require("connect.php");
/* This PHP program shows how to display the contents of a table using
   Select statement
*/
$cmd   = "";
$rec = 1;
if (isset($_GET['cmd'])) {
	$cmd   = $_GET['cmd'];
	$rec   = $_GET['recID'];
}
if (isset($_POST['cmd'])) {
	$cmd   = $_POST['cmd'];
	$rec   = $_POST['recID'];
}
if ( $cmd == "Cancel" or $cmd == "No" or $cmd == "") {
    $sql = "SELECT * FROM graduates order by gradID";
    $result = mysqli_query($link, $sql);
    if ( $result) {
                 if(mysqli_num_rows($result) > 0){
                     echo "<br><table  align = center width = 50% cellspacing = 2 cellpadding = 2>";
					 echo "<tr><th colspan = 7 id = title>List of Graduates";
					 echo "<tr><td colspan = 7><hr>";
                     echo "<tr>";
					 echo "<td colspan = 2><a href = employeeMgt.php?cmd=Insert&recID=Auto>Create</a></th>";
					 echo "<th>Graduates ID</th>";
					 echo "<th>Graduatee Name</th>";
           echo "<th>Course</th>";
					 echo "<tr><td colspan = 6><hr>";
                     while($row = mysqli_fetch_array($result)){
						 $id = $row['recID'];
                         echo "<tr>";
			             echo "<td nowrap><a href = employeeMgt.php?cmd=Delete&recID=$id>Delete</a>";
						 echo "<td nowrap><a href = employeeMgt.php?cmd=Edit&recID=$id>Edit</a>";
                         echo "<th align = left nowrap>" . $row['gradID'] . "</td>";
						 echo "<td>" . $row['gradName'] . "</td>";
						 echo "<td>" . $row['course'] . "</td>";
                         echo "</tr>";
                    }
					echo "<tr><td colspan = 7><hr></table>";
                    // Free result set
                         mysqli_free_result($result);
          }
		  else  {
                   echo "No records found.";
          }
      }
      else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
}
//
//   Supporting  PHP  codes
//

//======================================================
//  Block of  codes that will be called when the Edit button is clicked
//
//==================================================================
if ($cmd == 'Edit' ) {
         $sql = "Select *  from graduates where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
   		   $eno = $row['gradID'] ;
		     $ename = $row['gradName'] ;
			   $rate = $row['course'] ;
		     echo "<form action=employeeMgt.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Employee Record";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
		     echo "<tr><td>Graduate ID<td><input type = text name = eno value = $eno>";
			 echo "<tr><td>Graduatee Name<td><input type = text size = 60 name = ename width = 100px value = '$ename'>";
			 echo "<tr><td>Course<td><input type = text name = rate value = $rate>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Save' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
        }
    }
//  Codes that will be called when the Save button is clicked during Edit operation
    if ($cmd == 'Save') {
	      $rec = $_POST['recID'];
        $eno = $_POST['eno'];
	    $ename = $_POST['ename'] ;
	    $rate = $_POST['rate'];
        $sql = "Update graduates
	                 Set
					       gradID = '$eno',
						   gradName = '$ename',
						   course = '$rate'
				     where recID = '$rec'";
	    $result =  mysqli_query($link, $sql);
	    if ($result)
		      $mess = "Student Qualifed for Graduation!!";
	    else
		      $mess = "Not qualified for Graduation !";
		$cmd = "";
	    echo "<form action=employeeMgt.php method = post>";
        echo "<br><table align = center>";
        echo "<tr><td align = center>$mess";
	    echo "<tr><th><input type = submit value = 'Click here to update list'></form>";
        mysqli_close($link);
   }
// Block of codes for Insert Command
//
   if ($cmd == 'Insert' ) {
		echo "<form action=employeeMgt.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Create Employee Record";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
		     echo "<tr><td>Graduatee ID<td><input type = text name = eno >";
			 echo "<tr><td>Graduatee Name<td><input type = text size = 60 name = ename width = 100px>";
			 echo "<tr><td>Course<td><input type = text name = rate >";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Create' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
   }
 //
 // Codes to add record if user clicked the 'Create' button during Insert
 //
   if ($cmd == 'Create') {

      $eno = $_POST['eno'];
	    $ename = $_POST['ename'];
	    $rate = $_POST['rate'];
       $sql = "Insert into graduates(gradID,gradName,course)
	                         values ('$eno','$ename','$rate')";
   	   $result =  mysqli_query($link, $sql);
	   if ($result)
		   $mess = "Student has been added on the list !";
       else
 		   $mess = "Unable to create record !";
      echo "<form action=employeeMgt.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Click here to redisplay list'></form>";
      mysqli_close($link);
   }

//==========================================================
// Codes for Delete Command
//
   if ($cmd == 'Delete') {
      $sql = "Select *  from graduates where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "Select *  from graduates where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
   		     $eno = $row['gradID'] ;
		     $name = $row['gradName'] ;
			 $rate = $row['course'] ;
		     echo "<form action=employeeMgt.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Employee Record";
         echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
		     echo "<tr><td>Grad ID<td><input type = text name = eno value = $eno>";
			   echo "<tr><td>Course<td><input type = text name = rate value = $rate>";
		     echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td><input type=submit  value = 'Confirm' name = cmd>
			               <input type=submit  value = 'Cancel' name = cmd>";
		     echo "</form>";
       }
   }
 }
//
// Codes to delete record if  user clicked  'Yes' button
//
  if ($cmd == 'Confirm') {
      $sql = "Delete  from graduates where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result)
		   $mess = "Graduate removed from list !";
	  else
		   $mess = "Unable to delete student !";
	  echo "<form action=employeeMgt.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Click here to display list'></form>";
	  mysqli_close($link);
  }
?>
