<!DOCTYPE html>
<html>
  
<head>
    
<meta http-equiv="Content-Style-Type" content="text/css" /> 
    
<title>Limbo</title>
  <style>body { padding: 5px !important; }</style>
  </head>
  <body>


<!--Edited By Riley Stadel, Rob Lynch, Mark Miller-->
<!DOCTYPE html>
<html>


<link rel="stylesheet" type= "text/css" href="Limbo.css">

<p>
<a href="LimboAdminWelcome.php">
	<img src="picture/admin_login.png" style="width:250px;height:90px;">
</a>      
<a href="limboLost.php">
<img src="picture/Lost.png" style="width:250px;height:90px;">
</a>      
<a href="limboFound.php">
<img src="picture/found.png" style="width:250px;height:90px;">
</a>
<img src="picture/maristlogo.png" style = "width:350px; height:90px;">
<img src="picture/maristseal.png" style = "width:90px;  height:90px;">
</p>

<h1>Admins!</h1>

<form action="editAdmin.php" method="POST" >
<table border=1 align = center>
<td>First Name</td><td>Last Name</td><td>Email</td><td>Password</td>
<tr>
<td><input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name'];?>"></td>
<td><input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"></td>
<td><input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></td>
<td><input type="text" name="pass" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"></td>
</tr>
</table>
<input type="submit">
</form>
<?php
//Connect to MySql and the database
require( 'connect_db.php' ) ;

//Includes these tables
require( 'Tables.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'] ;
    $email = $_POST['email'] ;
	$pass = $_POST['pass'];

    #Checks to see if there are values in the form
    if(!valid_name($first_name)){
 	echo '<p style="color:red;font-size:16px;">Please enter a valid first name.</p>';
    }    
    else{
	$first_name = trim($_POST['first_name']);
    }
    
    if (!valid_name($last_name)){
	echo '<p style="color:red;font-size:16px;">Please enter a valid last name.</p>';
    }
    else{
	$last_name = trim($_POST['last_name']);
    }

    if (!valid_name($email)){
	echo '<p style="color:red;font-size:16px;">Please enter a valid email.</p>';
    }
    else{
	$email = trim($_POST['email']);
    }
	
	if (!valid_name($pass)){
	echo '<p style="color:red;font-size:16px;">Please enter a valid password.</p>';
    }
    else{
	$pass = trim($_POST['pass']);
    }

    #If all are filled it will add
    if(!empty($first_name) && !empty($last_name) && !empty($email) && !empty($pass)){
		$reg_date = 'now()';
		insertAdmin($dbc,$first_name,$last_name,$email,$pass, $reg_date) ;
	}
}


//Show stuff Table
showAdmins($dbc);

//Close the connection
mysqli_close( $dbc ) ;
?>


</html>