<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  background-color: gray;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: red;
  color: white;
  font-size: 20px;

}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
#container1 {
  width:82%;
  height:800px;
  background-color: aliceblue;
  color:black
  border-radius:15px 15px 15px 15px;
  position:absolute;
  left:0px;
  top:50px;
  margin-top: 10px;
  padding: 5px 5px 5px 5px;
  font-size:28px;
  font-style:italic;
  font-family:'Century Gothic';
}
#container2 {
position: relative;
  width:  15%;
  height: 800px;
  background-color: #b2ffff;
  color:white;
  border-radius:15px 15px 15px 15px;
  position:absolute;
  margin-top: 10px;
  right:0px;
  top:50px;
  padding: 5px 5px 5px 5px;
  font-size:28px;
}
#footer{
  position:absolute;
  width:100%;
  height:20px;
  background-color: gray;
  color:blackwhite;
  font-size:15px;
  font-style:italic;
  bottom:25px;
  align: center;
  }

 
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="menu.html" class="active">Home</a>
  <a target=subwin href="calcPayArr.php">Compute (Array)</a>
  <a target=subwin href="calcPayDB.php">Compute (Database) </a>
  <a target=subwin href="printEmployeesArr.php">Print Employees ( Array )</a>
  <a target=subwin href="printEmployeesDB.php">Print Employees ( Database )</a>
  <a href="index.html">Logoff</a>
  <a target=subwin href="about.html">About</a>
</div>


<div id = container1>
   <iframe  align = right name =subwin width=100% height =100%  border = 0>
   </iframe>
</div>
<div   id = container2>
<img src=uphsd.png width=190 align="center" id=logo > </img>
</div>
<footer id= footer>
   <p align=center>Created by Juan Dela Cruz </p>
</footer>


<script>
</script>
</body>
</html>