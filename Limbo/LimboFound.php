<!DOCTYPE html>
<html>
  
<head>
    
<meta http-equiv="Content-Style-Type" content="text/css" /> 
    
<title>Limbo Found</title>
  <style>body { padding: 5px !important; }</style>
  </head>
  <body>


<!--Edited By Riley Stadel, Rob Lynch, Mark Miller-->
<!DOCTYPE html>
<html>

<link rel="stylesheet" type= "text/css" href="Limbo.css">

<p>
<a href="LimboHome.php">
	<img src="picture/Home.png" style="width:250px;height:90px;">
</a>      
<a href="limboLost.php">
<img src="picture/Lost.png" style="width:250px;height:90px;">
</a>      
<a href="limbo_admin.php">
<img src="picture/Admin_login.png" style="width:250px;height:90px;">
</a>
<img src="picture/maristlogo.png" style = "width:350px; height:90px;">
<img src="picture/maristseal.png" style = "width:90px;  height:90px;">
</p>
<h1>Report a Found Item!</h1>

<!-- Get inputs from the user. -->
<form action="LimboFound.php" method="POST">
<table border=1 align=center>
<td>Stuff</td><td>Room</td><td>User</td>
<tr>
<td><input type="text" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"></td>
<td><input type="text" name="room" value="<?php if (isset($_POST['room'])) echo $_POST['room']; ?>"></td>
<td><input type="text" name="user" value="<?php if (isset($_POST['user'])) echo $_POST['user']; ?>"></td>
</tr>
</table>
<input type="submit" >
</form>

<?php
//Connect to MySql and the database
require( 'connect_db.php' ) ;

//Includes these tables
require( 'Tables.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $room = $_POST['room'];
    $user = $_POST['user'] ;
    $status = 'lost' ;
    $description = $_POST['description'] ;

    #Checks to see if there are values in the form
    if (!valid_name($description)){
	echo '<p style="color:red;font-size:16px;">Please enter description.</p>';
    }
    else{
	$description = trim($_POST['description']);
    }
    if (!valid_name($room)){
	echo '<p style="color:red;font-size:16px;">Please enter room.</p>';
    }
    else{
	$room = trim($_POST['room']);
    }
    if (!valid_name($user)){
	echo '<p style="color:red;font-size:16px;">Please enter user.</p>';
    }
    else{
	$user = trim($_POST['user']);
    }
    #If all are filled it will add
    if(!empty($description) && !empty($user)){
		$status='found';
        $created_date='now()';
        insert_record_found($dbc,$description,$user,$status,$room,$created_date);
		header('Location: limbohome.php');
    }
}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') 
{
 if(isset($_GET['id']))
stuffdescription($dbc, $_GET['id']) ;
}


//Show stuff Table
stuff($dbc);

//Close the connection
mysqli_close( $dbc ) ;
?>



</html>