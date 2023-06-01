<html>
<head>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap');
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    width:100%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #2a3542;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
	.btn{
	color:black;
	font-family: 'Kalam', cursive;
	font-size:15px;
	border-radius:0px;
	padding: 2px 50px;
	background-color:#2a3542;
	border:none;
	color:white;
	border-radius:8px;
	cursor:pointer;
	}
	.btn:hover{
	background-color:#2E4053 ;
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
			$select="SELECT * from package";
			$result=mysqli_query($conn,$select);
?>
<div>
<table class="styled-table">
    <thead>
        <tr style="	font-family: 'Kalam', cursive;font-size:18px;">
            <th>Package Id</th>
            <th>Package Name</th>
			<th>Package Description</th>
            <th>Package Price</th>
			<th>Package Image</th>
			<th>Control</th>
        </tr>
    </thead>
    <tbody>
       <?php 
	   while($row=mysqli_fetch_array($result))
	   {?>
		   <tr>
		   <td><?php echo $row['Package_id']?></td>
		   <td><?php echo $row['Package_name']?></td>
		   <td> <?php echo $row['Description']?></td>
		   <td> <?php echo $row['Price']?></td>
		   <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"style="width:100px;height:100px;border-radius:8px;"></td>
		   <form action="delete.php" method="post">
		   <input type="hidden" name="t1" value="<?php echo $row['Package_id'];?>">
		   <td><button type="submit" class="btn" value="C" name="Delete" >Delete</button></td>
		   </form>
		   </tr>
	  <?php }
		   ?>
    </tbody>
</table>

</div>
</body>
</html>
<?php
			
			if(isset($_POST['Delete']))
			{
				$id=$_POST['t1'];
				$sql = "DELETE FROM package WHERE Package_id='$id'";

				$result = mysqli_query($conn,$sql);

				if($result)
				{
					
					echo "<script>
					alert('Pack is Deleted sucessfully');
					window.location.assign('delete.php');
					</script>";
				}
				else
				{
					echo "<script>
					alert('sorry');
					window.location.assign('delete.php');
					</script>";
				}
			}
			
?>