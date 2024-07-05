<html>
<title>Pay Calculator</title>
<style> 
   #d {
     width:100px;
     height: 24px;
     color:yellow;
     background-color: maroon;
     border-radius: 5px 5px;
     text-align: center;
   }
   li {
      width : 200px;
      text-align:right;
      padding-right:10px;
   }
   td {
      text-align:right;
   }
   #container3 {
      position: absolute;
      width: 30%;
      height: 250px;
      background-color: yellow;
      color:black;
      border-radius: 10px 10px;
      left:30%;
      top:20%;
      padding: 10px 10px 10px 10px;

   }
  </style>
<?php
  if (isset($_POST['cmd'])) {
     $cmd = $_POST['cmd'];
     $rate = $_POST['erate'];
     $name = $_POST['ename'];
  }
  else {
     $cmd = "";
     $name = "";
     $rate = 0;
     $eno = "";
  }
  $error="";
  if (isset($_POST['eno'])) {
      $eno = $_POST['eno'];
  }
  if ( $cmd == 'Load') { 
      $eno = $_POST['eno'];
      $name="";
      $rate=0;
      // search array and find employee name
      require("connect.php");
      $sql = "Select * from employees where empNo = '$eno'";
      $result = mysqli_query($link,$sql);
      $row =  mysqli_fetch_array($result);
      if($result) {
           if(mysqli_num_rows($result) > 0) {
              $name = $row['empName'];
              $rate = $row['ratePerHour'];
           }   
           else {
              $error="No such record exist Found"; 
           }
      } 
      mysqli_close($link);
 }      
echo "
<body style='background-color:powderblue;'>
<h4>Pay Calculator</h4>
<hr width = 100%>
<div id = container1>
    <form name = myForm action = calcPayDB.php method = post>
    <table>
    <tr><td>Employee No.  :</td>
        <td colspan = 2><input name = eno id = eno type =text value = '$eno' placeholder= 'Enter a Valid Employee Number'>
        <td><input type = submit value = 'Load' name = cmd>
   <tr><td><label>Name : </label>
       <td><input type =text readonly name = ename id = ename value = '$name'><br>
   <tr><td><label>Rate : </label>
       <td><input type =text readonly name = erate id = rate value = '$rate'>
   <tr><td colspan = 2><small> $error </small>
   </table>";
if ( ($cmd == 'Load' or $cmd == "Compute") and $error=="") { 
   if (isset($_POST['d1'])) $d1 = $_POST['d1']; else $d1 = 0;
   if (isset($_POST['d2'])) $d2 = $_POST['d2']; else $d2 = 0;
   if (isset($_POST['d3'])) $d3 = $_POST['d3']; else $d3 = 0;
   if (isset($_POST['d4'])) $d4 = $_POST['d4']; else $d4 = 0;
   if (isset($_POST['d5'])) $d5 = $_POST['d4']; else $d5 = 0;
   if (isset($_POST['d6'])) $d6 = $_POST['d6']; else $d6 = 0;
   if (isset($_POST['d7'])) $d7 = $_POST['d7']; else $d7 = 0;
echo "<div id = container2>
   <p>No. of Hours Worked <br>
    <label><li>Day 1 : </label><input type =text  name = d1 id = d value = $d1>
    <label><li>Day 2 : </label><input type =text  name = d2 id = d value = $d2>
    <label><li>Day 3 : </label><input type =text  name = d3 id = d value = $d3>
    <label><li>Day 4 : </label><input type =text  name = d4 id = d value = $d4>
    <label><li>Day 5 : </label><input type =text  name = d5 id = d value = $d5>
    <label><li>Day 6 : </label><input type =text  name = d6 id = d value = $d6>
    <label><li>Day 7 : </label><input type =text  name = d7 id = d value = $d7>
    <hr width = 100%>
    <input type = submit value = 'Compute' name = cmd>
    <input type = reset value = 'Clear'>
    </form>
  </div>";   
  if ( $cmd == "Compute") {
    $reghrs = $d1 + $d2 + $d3 + $d4 + $d5;
    $othrs = $d6 + $d7;
    $regpay = $reghrs * $rate;
    $otpay = $othrs * $rate * 1.25;
    $gross = $regpay + $otpay;
    $tax = .1*$gross;
    $net = $gross - $tax;
    echo "<div id = container3>
          <table cellpadding = 5 cellspacing = 5>";
    echo "<tr><th colspan = 2>Employee Payslip
                 <tr><td>Regular Pay:</td>
                     <td><input type =text value = $regpay>
                 <tr><td>Overtime Pay:</td>
                     <td><input type =text value = $otpay>
                 <tr><td>Grosswage:</td>
                     <td><input type =text value = $gross>
                 <tr><td>Withholding Tax:</td>
                     <td><input type =text value = $tax>
                 <tr><td>Net Pay:</td>
                    <td><input type =text value = $net></table></div>";
  }
}
?>