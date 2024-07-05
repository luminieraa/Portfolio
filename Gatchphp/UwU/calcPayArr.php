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
      top:20px;
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
  if (isset($_POST['eno'])) {
      $eno = $_POST['eno'];
  }
  $empNos = array("1111","1112","1113","1114", "1115");
  $eNames = array("Lebron James","Michael Jordan","Luke Doncic","James Harden", "Manu Ginbili");
  $eRates = array(350, 450, 300, 400, 200);
  if ( $cmd == 'Load') { 
      $eno = $_POST['eno'];
      $name="";
      $rate=0;
      // search array and find employee name
      $idx = 0;
      for ($idx=0;$idx<5;$idx++) {
         if ( $empNos[$idx] == $eno) {
              $name = $eNames[$idx];
              $rate = $eRates[$idx];
              break;
         }
      }
      if ( $idx == 5)
         $name = "Not Found"; 
 }      
echo "
<body style='background-color:powderblue;'>
<h4>Pay Calculator</h4>
<hr width = 100%>
<div id = container1>
    <form name = myForm action = calcPayArr.php method = post>
    <table>
    <tr><td>Employee No.  :</td>
        <td><input name = eno id = eno type =text value = '$eno' placeholder= 'Enter a Valid Employee Number'>
         <input type = submit value = 'Load' name = cmd>
   <tr><td><label>Name : </label>
       <td><input type =text readonly name = ename id = ename value = '$name'><br>
   <tr><td><label>Rate : </label>
       <td><input type =text readonly name = erate id = rate value = '$rate'>
   </table>
   </div>
   <div id = container2>
   <p>No. of Hours Worked <br>
    <label><li>Day 1 : </label><input type =text  name = d1 id = d value = 0>
    <label><li>Day 2 : </label><input type =text  name = d2 id = d value = 0>
    <label><li>Day 3 : </label><input type =text  name = d3 id = d value = 0>
    <label><li>Day 4 : </label><input type =text  name = d4 id = d value = 0>
    <label><li>Day 5 : </label><input type =text  name = d5 id = d value = 0>
    <label><li>Day 6 : </label><input type =text  name = d6 id = d value = 0>
    <label><li>Day 7 : </label><input type =text  name = d7 id = d value = 0>
    <hr width = 100%>
    <input type = submit value = 'Compute' name = cmd>
    <input type = reset value = 'Clear'>
    </form>
  </div>";
  if ( $cmd == "Compute") {
     $d1 = $_POST['d1'];
     $d2 = $_POST['d2'];
     $d3 = $_POST['d3'];
     $d4 = $_POST['d4'];
     $d5 = $_POST['d5'];
     $d6 = $_POST['d6'];
     $d7 = $_POST['d7'];
     $reghrs = $d1 + $d2 + $d3 + $d4 + $d5;
     $othrs = $d6 + $d7;
     $regpay = $reghrs * $rate;
     $otpay = $othrs * $rate * 1.25;
     $gross = $regpay + $otpay;
     $tax = .1*$gross;
     $net = $gross - $tax;
     echo "
        <div id = container3>
        <p>Employee Payslip</p>
        <table>
           <tr><td>Regular Pay:</td>
              <td><input type =text value = $regpay>
           <tr><td>Overtime Pay:</td>
               <td><input type =text value = $otpay>
           <tr><td>Grosswage:</td>
               <td><input type =text value = $gross>
           <tr><td>Withholding Tax:</td>
               <td><input type =text value = $tax>
           <tr><td>Net Pay:</td>
               <td><input type =text value = $net>
      </div>";
  }
?>