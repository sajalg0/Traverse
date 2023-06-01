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
			$select="SELECT * from  register";
			$result=mysqli_query($conn,$select);
?>
<div>
<table class="styled-table">
    <thead>
        <tr style="	font-family: 'Kalam', cursive;font-size:18px;">
            <th>Serial No.</th>
            <th>First Name</th>
			<th>Last Name</th>
            <th>Package ID</th>
			<th>Address</th>
			<th>Pincode</th>
			<th>Email</th>
			<th>Mobile Number</th>
        </tr>
    </thead>
    <tbody>
       <?php 
	   while($row=mysqli_fetch_array($result))
	   {?>
		   <tr>
		   <td><?php echo $row['S_no']?></td>
		   <td><?php echo $row['Fname']?></td>
		   <td> <?php echo $row['Lname']?></td>
		   <td> <?php echo $row['Package_id']?></td>
		   <td><?php echo $row['Address']?></td>
		   <td><?php echo $row['Pincode']?></td>
		   <td> <?php echo $row['email']?></td>
		   <td> <?php echo $row['Mobile_number']?></td>
		   </tr>
	  <?php }
		   ?>
    </tbody>
</table>

</div>
</body>
</html>
