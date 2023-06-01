<html>
<head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Kalam:wght@400&display=swap');
	body{
		background:#99A3A4;
	}
	.btn{
	position:relative;
	color:black;
	font-family: 'Kalam', cursive;
	font-size:20px;
	left:150px;
	border-radius:0px;
	padding: 1px 70px;
	background-color:#2a3542;
	border:none;
	color:white;
	cursor:pointer;
	}
	.btn:hover{
	background-color:#2E4053 ;
	}
	.l
	{
		color:black;
		font-family: 'Kalam', cursive;
		font-size:20px;
		
	}
	.i{
	position:absolute;
	color:black;
	font-family: 'Kalam', cursive;
	border-radius:10px;
	left:750px;
	outline:none;
	height:35px;
	border:1.9px solid;
	
	}
	.div1{
	padding:20px;
	margin-left:380px;
	margin-top:100px;
	box-shadow: 0 0 8px 0 rgba(0, 0, 0, 1);
	border-radius:8px;
	width:40%;
	height:60%;
	background-color:white;
	}
	.file{
	position:relative;
	color:black;
	font-family: 'Kalam', cursive;
	font-size:20px;
	left:120px;
	}
</style>
</head>
<body>



<?php
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
			$id=$_GET['id1'];
			$select="SELECT * from package WHERE Package_id='$id'";
			$result=mysqli_query($conn,$select);
			$row=mysqli_fetch_array($result);
			?>
			<div class="div1">
			<br><br>
			<form action="" method="post">
			<label class="l">Package ID</label>
			<input type="text" name="t1" class="i" value="<?php echo $row['Package_id'];?>"><br><br><br>
			<label class="l">Package Name</label>
			<input type="text" name="t2" class="i" value="<?php echo $row['Package_name'];?>"><br><br><br>
			<label class="l">Description</label>
			<input type="text" name="t3" class="i" value="<?php echo $row['Description'];?>"><br><br><br>
			<label class="l">Price</label>
			<input type="text" name="t4" class="i" value="<?php echo $row['Price'];?>"><br><br><br><br>
			<input type="submit" name="up" class="btn" value="Update">
			</form>
			</div>
			<?php
			if(isset($_POST['up']))
			{
				$id=$_POST['t1'];
				$pname=$_POST['t2'];
				$pdes=$_POST['t3'];
				$pp=$_POST['t4'];
				$sql="UPDATE package SET Package_name='$pname',Description='$pdes',
							Price=$pp WHERE Package_id='$id'";
				$result = mysqli_query($conn,$sql);

				if($result)
				{
					
					echo "<script>
					alert('Pack is Updated sucessfully');
					window.location.assign('update.php');
					</script>";
				}
				else
				{
					echo "<script>
					alert('sorry');
					window.location.assign('update.php');
					</script>";
				}
			}
?>

</body>
</html>