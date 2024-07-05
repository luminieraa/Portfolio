<?php
   $sno = array(1111,2222,3333,4444);
   $sname = array("Lebron James","Michael Jordan","Luka Doncic","James Harden");
   $srate = array(350,450,300,400);
   $ctr = 0;
   echo "<table bgcolor=#b19cd9 valign = middle align=center cellpadding=2 border=1 width = 50% >";
   echo "<tr>";
   	   echo "<th>Employee No.";
   	   echo "<th>Employee Name";
	    echo "<th>Employee Rate";
   for($ctr=0;$ctr<=3;$ctr++) {
   	   echo "<tr>";
   	   echo "<td> $sno[$ctr]";
   	   echo "<td>$sname[$ctr]";
	   echo "<td>$srate[$ctr]";
   }	   
   echo "</table>";
   echo "</center>";
?>   