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
    $sql = "SELECT * FROM employees order by empNo";
    $result = mysqli_query($link, $sql);
    if ( $result) {
                 if(mysqli_num_rows($result) > 0){
                     echo "<br><table  align = center width = 50% cellspacing = 2 cellpadding = 2>";
					 echo "<tr><th colspan = 7 id = title>List of Employees";
					 echo "<tr><td colspan = 7><hr>";
                     echo "<tr>";
					 echo "<td colspan = 2><a href = employeeMgt.php?cmd=Insert&recID=Auto>Create</a></th>";
					 echo "<th>Employee No.</th>";
					 echo "<th>Employee Name</th>";
                     echo "<th>Rate Per Hour</th>";
					 echo "<th>Department</th>";
					 echo "<th>Position</th>";
           echo "<th>CompID</th>";
					 echo "<tr><td colspan = 7><hr>";
                     while($row = mysqli_fetch_array($result)){
						 $id = $row['recID'];
                         echo "<tr>";
			             echo "<td nowrap><a href = employeeMgt.php?cmd=Delete&recID=$id>Delete</a>";
						 echo "<td nowrap><a href = employeeMgt.php?cmd=Edit&recID=$id>Edit</a>";
                         echo "<th align = left nowrap>" . $row['empNo'] . "</td>";
						 echo "<td>" . $row['empName'] . "</td>";
						 echo "<td>" . $row['ratePerHour'] . "</td>";
						 echo "<td><small>" . $row['dept'] . "</small></td>";
						 echo "<td><small>" . $row['position'] . "</small></td>";
						 echo "<td><small>" . $row['compID'] . "</small></td>";
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
         $sql = "Select *  from employees where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
   		     $eno = $row['empNo'] ;
		     $ename = $row['empName'] ;
			 $rate = $row['ratePerHour'] ;
			 $dept = $row['dept'] ;
			 $pos = $row['position'] ;
		     echo "<form action=employeeMgt.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Update Employee Record";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
		     echo "<tr><td>Employee No<td><input type = text name = eno value = $eno>";
			 echo "<tr><td>Employee Name<td><input type = text size = 60 name = ename width = 100px value = '$ename'>";
			 echo "<tr><td>Rate Per Hour<td><input type = text name = rate value = $rate>";
		     echo "<tr><td>Position<td><input type = text size = 60 name = pos width = 100px value = '$pos'>";
			 echo "<tr><td>Department<td><input type = text name = dept value = $dept>";
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
	    $dept = $_POST['dept'];
	    $rate = $_POST['rate'];
		$pos = $_POST['pos'];
        $sql = "Update employees
	                 Set
					       empNo = '$eno',
						   empName = '$ename',
						   dept = '$dept',
						   position = '$pos',
						   ratePerHour = '$rate'
				     where recID = '$rec'";
	    $result =  mysqli_query($link, $sql);
	    if ($result)
		      $mess = "Employee record successfully updated !";
	    else
		      $mess = "Unable to update record !";
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
		     echo "<tr><td>Employee No<td><input type = text name = eno >";
			 echo "<tr><td>Employee Name<td><input type = text size = 60 name = ename width = 100px>";
			 echo "<tr><td>Rate Per Hour<td><input type = text name = rate >";
		     echo "<tr><td>Position<td><input type = text size = 60 name = pos width = 100px >";
			 echo "<tr><td>Department<td><input type = text name = dept>";
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
	    $ename = $_POST['ename'] ;
	    $dept = $_POST['dept'];
	    $rate = $_POST['rate'];
		$pos = $_POST['pos'];
       $sql = "Insert into employees(empNo,empName,ratePerHour,dept, position)
	                         values ('$eno','$ename','$rate','$dept','$pos')";
   	   $result =  mysqli_query($link, $sql);
	   if ($result)
		   $mess = "New employee record has been created !";
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
      $sql = "Select *  from employees where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result) {
		      $sql = "Select *  from employees where recID = '$rec'";
	     $result =  mysqli_query($link, $sql);
	     if ($result) {
		     $row = mysqli_fetch_array($result);
   		     $eno = $row['empNo'] ;
		     $name = $row['empName'] ;
			 $rate = $row['ratePerHour'] ;
			 $dept = $row['dept'] ;
			 $pos = $row['position'] ;
		     echo "<form action=employeeMgt.php method = post>";
		     echo "<br><table width = 40% cellspacing = 2 cellpadding = 2 align = center>";
		     echo "<tr><th colspan = 2 id = title>Delete Employee Record";
             echo "<tr><td colspan = 2><hr>";
		     echo "<tr><td>Record ID <td><input type = text name = recID value = $rec readonly>";
		     echo "<tr><td>Employee No<td><input type = text name = eno value = $eno>";
			 echo "<tr><td>Rate Per Hour<td><input type = text name = rate value = $rate>";
		     echo "<tr><td>Position<td><input type = text size = 60 name = pos width = 100px value = '$pos'>";
			 echo "<tr><td>Department<td><input type = text name = dept value = $dept>";
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
      $sql = "Delete  from employees where recID = '$rec'";
	  $result =  mysqli_query($link, $sql);
	  if ($result)
		   $mess = "Record successfully deleted !";
	  else
		   $mess = "Unable to delete record !";
	  echo "<form action=employeeMgt.php method = post>";
      echo "<br><table align = center>";
      echo "<tr><td align = center>$mess";
	  echo "<tr><th><input type = submit value = 'Click here to display list'></form>";
	  mysqli_close($link);
  }
?>
