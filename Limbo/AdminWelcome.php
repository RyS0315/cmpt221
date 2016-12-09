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

<!-- Get inputs from the user. -->
<!--<form action="LimboFound.php" method="POST">
<table border=1>
<td>Stuff</td><td>Room</td><td>Owner</td>
<tr>
<td><input type="text" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"></td>
<td><input type="text" name="room" value="<?php if (isset($_POST['room'])) echo $_POST['room']; ?>"></td>
<td><input type="text" name="finder" value="<?php if (isset($_POST['finder'])) echo $_POST['finder']; ?>"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form-->

<h1>Welcome Admin!</h1>
<?php



//Connect to MySql and the database
require( 'connect_db.php' ) ;

//Includes these tables
require( 'Tables.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    
    
}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') 
{
 if(isset($_GET['id']))
stuffdescriptionAdmin($dbc, $_GET['id']) ;
}
//Show stuff Table
stuffAdmin($dbc);

//Close the connection
mysqli_close( $dbc ) ;
?>



</html>