<?php
session_start();
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "geotracks";
			$conn = mysqli_connect($servername, $username, $password,'geotracks');

			// Check connection
			if (!$conn) 
			{
			  echo "Sorry Connection not available";
			}
			if(isset($_POST["o"]))
			{
				
			}
			if(isset($_POST["o"]))
			{
					$str=$_POST["o"];
					$select="SELECT * from package WHERE Description like '%$str%' OR Package_name like '%$str%'";
					$result=mysqli_query($conn,$select);
					
			}
			else
			{
				$str="";
				$select="SELECT * from package";
				$result=mysqli_query($conn,$select);
				
			}
?>
<html>
<head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Kirang+Haerang&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Rajdhani&display=swap');
body{
	background-image: url('white8.jpg');
	background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
.card {
  box-shadow: 0 0 8px 0 rgba(0, 0, 0, 1);
  background-color: rgba(255,255,255,1);
  width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  padding:5px;
  height:557px;
}

.price {
  color: grey;
  font-size: 22px;
}
a
{
	text-decoration:none;
	color:white;
}

.b  {
	height:25px;
	width:285px;
  border: none;
  outline: 0;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  font-size: 22px;
  position:relative;
  top:-230px;
}

.b:hover {
  opacity: 0.7;
}
.searchbox
		{
			position: absolute;
			display: flex;
			top:38px;
			right:10px;
			
		}
		.search
		{
			width: 17em;
			height: 1px;
			padding: 1.5rem;
			border-radius: 5em;
			opacity:0.5;
			
		}
		.search:focus
		{
			outline: none;
		}	
		#sbtn
		{
			width: 3rem;
			height: 3rem;
			background-color: 
			color: #fff;
			position: absolute;
			right: 0;
			display: grid;
			align-items: center;
			align-self: center;
		}
		.heading{
			font-family: 'Kirang Haerang', cursive;
			font-size:70px;
		}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" />
</head>
<body>

<form method="post">
<div class="h">
<h1 class="heading" style="text-align:center">Popular Adventures</h1>
<div class="searchbox">	
	<input type="text" class="search" placeholder= "Type to search..." name="o" value="<?php echo $str;?>"  >
		<i class="fas fa-search fa-1.5x" id="sbtn"></i>	
</div>
</div>
</form>

<br>
<br>
<br>
<table width="100%" align="center">
<?php

while($row=mysqli_fetch_array($result))
{
?>
<tr>
<td><div class="card">
<br>
  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" style="width:250px;height:250px;border-radius:8px;">
  <h1 style="font-family: 'Satisfy', cursive;"><?php echo $row['Package_name']?></h1>
  <p><?php echo $row['Package_id']?></p>
  <p class="price">Rs.<?php echo $row['Price']?></p>
  <div style="height:300px;">
  <p><?php echo $row['Description']?></p>
  </div>
	<a style="font-family: 'Rajdhani';"href ="reg.php?id=<?php  echo $row['Package_id']; ?> "><div class ="b">Register Now</div></a>
	
</div>
<br>
</td>
<?php 
if($row=mysqli_fetch_array($result))
{
?>
<td><div class="card">
<br>
  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" style="width:250px;height:250px;border-radius:8px;">
  <h1 style="font-family: 'Satisfy', cursive;"><?php echo $row['Package_name']?></h1>
  <p><?php echo $row['Package_id']?></p>
  <p class="price">Rs.<?php echo $row['Price']?></p>
  <div style="height:300px;">
  <p><?php echo $row['Description']?></p>
  </div>
  <a style="font-family: 'Rajdhani';"href ="reg.php?id=<?php  echo $row['Package_id']; ?>"><div class ="b">Register Now</div></a>
  
</div><br></td>
<?php 
}
else
{ break;}

if($row=mysqli_fetch_array($result))
{
?>
<td><div class="card">
<br>
  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" style="width:250px;height:250px;border-radius:8px;">
  <h1 style="font-family: 'Satisfy', cursive;"><?php echo $row['Package_name']?></h1>
  <p><?php echo $row['Package_id']?></p>
  <p class="price">Rs.<?php echo $row['Price']?></p>
  <div style="height:300px;">
  <p><?php echo $row['Description']?></p>
  </div>
  <a style="font-family: 'Rajdhani';"href ="reg.php?id=<?php  echo $row['Package_id']; ?>"><div class ="b">Register Now</div></a>
</div><br></td>
<?php 
}
else
{ break;}

if($row=mysqli_fetch_array($result))
{
?>
<td><div class="card">
<br>
  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"style="width:250px;height:250px;border-radius:8px;">
  <h1 style="font-family: 'Satisfy', cursive;"><?php echo $row['Package_name']?></h1>
  <p><?php echo $row['Package_id']?></p>
  <p class="price">Rs.<?php echo $row['Price']?></p>
  <div style="height:300px;">
  <p><?php echo $row['Description']?></p>
  </div>
  <a style="font-family: 'Rajdhani';"href ="reg.php?id=<?php  echo $row['Package_id']; ?>"><div class ="b">Register Now</div></a>
</div><br></td>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
