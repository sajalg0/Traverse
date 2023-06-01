<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="css\font-awesome.min.css">
	<script type="text/javascript">
		function validate()
		{
			if( document.myForm.name.value == "" ) {
			document.getElementById("p11").innerHTML="Please provide Admin id!";
            document.myForm.name.focus() ;
            return false;
	         }
	         if( document.myForm.password1.value == "" ) {
	            document.getElementById("p11").innerHTML="Please Enter Password";
	            document.myForm.password1.focus() ;
	            return false;
	         }
	         return true;
	     }
	</script>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Caveat:wght@500&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Spartan:wght@100;200&display=swap');
	</style>
</head>
<body>

	<?php
	if(isset($_POST['Login']))
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			//$dbname = "geotracks";
			$conn = mysqli_connect($servername, $username, $password,'geotracks');

			// Check connection
			if (!$conn) 
			{
			  echo "Sorry Connection not available";
			}

			$a_id = $_POST['name'];
			$Password = $_POST['password1'];
			$sql="SELECT * FROM admin WHERE User_id='$a_id' AND Password='$Password'";
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)===1)
			{

					header("Location: admin.php");
					exit();
					
			}
			else
			{
				
				echo '<script type="text/JavaScript"> alert("Wrong ID or Password");</script>';	
			}
		}
	?>
		<div class="container">
			<img src="avatar.svg">
			<h1 style="font-family: 'Caveat', cursive; font-size:50px;">Admin Login</h1>
			<p id="p11"></p>
			<form action="login_admin.php" method="post" name="myForm" onsubmit="return(validate())">
				<div class="form-input">
					<input type="text" name="name" placeholder="Admin ID" class="c"><br>
				</div>
				<div class="form-input">
					<input type="password" name="password1" placeholder="Password"><br>
				</div>
				<br><br>
			<input type="submit" name="Login" value="Login" class="btn-login" style="font-family: 'Spartan', sans-serif;letter-spacing:1px">
			</form>
			<br>
			
		</div>
	

</body>
</html>