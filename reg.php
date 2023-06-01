<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="c.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Spartan:wght@100;200&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Allura&family=Rajdhani:wght@500&display=swap');
		body{
			margin: 0;
			padding: 0;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center center;
			font-family: FontAwesome;
				background-image: url('reg2.jpg');
	
			}
			.container
			{
			    max-width:500px;
			    height: 70%;
				position:absolute;
				padding:30px;
			    background-color: rgba(255,255,255,1);
				top:90px;
				left:40px;
				border-radius:10px;
			}
.contact-form .input-text
{

border-width:1px 1px 1px 1px;
border-radius: 5px;
border-color:black;
font-family: 'Rajdhani', sans-serif;
padding:10px;
}


#p11
		{
			text-align: center;
			background-color: red;
			width: 100%;
		}
	.submitbtn1
	{
		align-items: center;
		align-content: center;
		position: absolute;
		right:160px;
		top:465px;
		
	}
		
	.r1
	{
		position: absolute;
		top: 30px;
		left: 150px;
		color:black;
		font-family: 'Satisfy', cursive;
		font-size:40px;
	}
	</style>
	<script type="text/javascript">
		function validate()
		{
		

	         if( document.myForm.FName.value == "" ) {
	            document.getElementById("p11").innerHTML="Please provide your First Name!";
	            document.myForm.FName.focus() ;
	            return false;
	         }
			  if( document.myForm.Lname.value == "" ) {
	            document.getElementById("p11").innerHTML="Please provide your Last Name!";
	            document.myForm.Lname.focus() ;
	            return false;
	         }
	         
	         
	         if(document.myForm.Address.value == "") {
	         	
	            document.getElementById("p11").innerHTML="Please enter Address";
	            document.myForm.Address.focus() ;
	            return false;
	         }

	         
	         if( document.myForm.Pincode.value == "" ) {
	            document.getElementById("p11").innerHTML="Please provide Pincode";
	            document.myForm.Pincode.focus() ;
	            return false;
	         }
			 if( document.myForm.email.value == "" ) {
	            document.getElementById("p11").innerHTML="Please provide email";
	            document.myForm.email.focus() ;
	            return false;
	         }
	         if(document.myForm.email.value != "" )
	        {
	        	var emailID = document.myForm.email.value;
		         atpos = emailID.indexOf("@");
		         dotpos = emailID.lastIndexOf(".");
		         
		         if (atpos < 1 || ( dotpos - atpos < 2 )) {
		            document.getElementById("p11").innerHTML="please enter correct email ID";
		            document.myForm.email.focus() ;
		            return false;
		         }
	        }
	         if( document.myForm.phone.value == "" ) {
	            document.getElementById("p11").innerHTML="Please provide Phone number";
	            document.myForm.phone.focus() ;
	            return false;
	         }
	         if(document.myForm.phone.value != "" )
	        {
	        	var phoneno = /^\d{10}$/;
	        	var inputtxt=document.myForm.phone.value;
				  if(!(inputtxt.match(phoneno)))
				       {
				        document.getElementById("p11").innerHTML="Enter correct Phone number";
				        return false;
        				}
	        }
			return true;
		}
	         </script>
</head>
<?php


		if(isset($_POST['Submit']))
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "geotracks";
			$conn = mysqli_connect($servername, $username, $password,$dbname);

			// Check connection
			if (!$conn) 
			{
			  echo "Sorry Connection not available";
			}


			$Fa = $_POST['FName'];
			$La = $_POST['Lname'];
			$P_id = $_POST['Packageid'];
			$address = $_POST['Address'];
			$Pincode = $_POST['Pincode'];
			$email = $_POST['email'];
			$phone1 = $_POST['phone'];
			
				$sql = "INSERT INTO register (Fname,Lname,Package_id,Address,Pincode,email,Mobile_number) VALUES ('$Fa','$La','$P_id','$address',$Pincode,'$email',$phone1)";
				$result = mysqli_query($conn,$sql);
				if($result)
				{
					$to=$email;
					$subject="Package registered successfully";
					$message="Dear customer your Package id  is ".$P_id." and we will contact you shortly";
            
					mail($to,$subject,$message);
					echo "<script>
					alert('You have been registered successfully. We will contact you shortly!');
					window.location.assign('p.html')
					</script>";
					
				}
				else
				{
					echo '<script type="text/JavaScript"> alert("Error in Registration wait for some time");</script>';
				
				}
				
			
					
			
		}
?>
<body>

	
	<div class="container">
		<form method="post" action="reg.php" onsubmit="return(validate())" name="myForm">	
			<h3 align="center" class="r1">Register Here</h3>
			<br><br>
			<p id="p11"></p>
			<div class="contact-form row">
			<div class="form-field col-lg-6">
					<input id="id" class="input-text" type="text" name="FName">
					<label for="name" class="label" style="color:black;font-family: 'Kalam', cursive;font-size:20px;">First name</label>
				</div>
			
				<div class="form-field col-lg-6">
				<input id="id" class="input-text" type="text" name="Lname">
		             <label for="name" class="label" style="color:black;font-family: 'Kalam', cursive;font-size:20px;">Last name</label>
	             </div> 
				<div class="form-field col-lg-6">
					<input id="id" class="input-text" type="text" name="Packageid" value="<?php echo $_GET['id'];?>" readonly>
					
					
					<label for="name" class="label" style="color:black;font-family: 'Kalam', cursive;font-size:20px;">Package ID</label>
				</div>
				<div class="form-field col-lg-6">
					<input id="id" class="input-text" type="text" name="phone">
					<label for="name" class="label" style="color:black;font-family: 'Kalam', cursive;font-size:20px;">Mobile number</label>
				</div> 
	             
	             <div class="form-field col-lg-6">
					<input id="id" class="input-text" type="text" name="Pincode">
					<label for="name" class="label" style="color:black;font-family: 'Kalam', cursive;font-size:20px;">Pincode</label>
				</div>    
			
				<div class="form-field col-lg-6">
					<input id="id" class="input-text" type="text" name="email">
					<label for="name" class="label" style="color:black;font-family: 'Kalam', cursive;font-size:20px;">E-mail</label>
				</div>
				
				<div class="form-field col-lg-12">
				 <input id="id" class="input-text" type="text" name="Address">
		             <label for="name" class="label" style="color:black;font-family: 'Kalam', cursive;font-size:20px;">Address</label>
	             </div>
				<br><br>
				<div class="submitbtn1">
					<p align="center"><input class="submit-btn" type="submit" value="submit" name="Submit" style="border-radius:10px;font-family: 'Spartan', sans-serif;letter-spacing:6px"></p>
				</div>
			</div>
		</form>
	
	</div>
</body>
</html>
