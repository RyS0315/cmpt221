<!DOCTYPE html>
<html>
  
<head>
    
<meta http-equiv="Content-Style-Type" content="text/css" /> 
    
<title>Edit Lost</title>
   
 <!--<link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    
<link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
   
 <script type="text/javascript" language="JavaScript" src="/library/js/headscripts.js"></script>

 -->
  <style>body { padding: 5px !important; }</style>
  </head>
  <body>


<!--Edited By Riley Stadel, Rob Lynch, Mark Miller-->
<!DOCTYPE html>
<html>

<link rel="stylesheet" type= "text/css" href="Limbo.css">

<p>
<a href="LimboLost.php">
	<img src="picture/Lost.png" style="width:250px;height:90px;">
</a>      
<a href="limboFound.php">
<img src="picture/Found.png" style="width:250px;height:90px;">
</a>      
<a href="limbo_admin.php">
<img src="picture/Admin_login.png" style="width:250px;height:90px;">
</a>
<img src="picture/maristlogo.png" style = "width:350px; height:90px;">
<img src="picture/maristseal.png" style = "width:90px;  height:90px;">
</p>

<h1>Update An Item!</h1>
<!-- Get inputs from the user. -->
<form action="editItem.php" method="POST" >
<table border=1 align = center>
<td>ItemID</td><td>Stuff</td><td>Room</td><td>User</td><td>Status</td>
<tr>
<td><input type="text" name="id" value="<?php if (isset($_GET['id'])) echo $_GET['id'];?>"></td>
<td><input type="text" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"></td>
<td><input type="text" name="room" value="<?php if (isset($_POST['room'])) echo $_POST['room']; ?>"></td>
<td><input type="text" name="owner" value="<?php if (isset($_POST['owner'])) echo $_POST['owner']; ?>"></td>
<td><class = "select">
<select name ="status"  value="<?php if(isset($_POST['status']))?>">
<option value="lost">Lost</option>
<option value="found">Found</option>
<option value="claimed">Claimed</option>
</select>
</td>   
</tr>
</table>
<input type="submit">
</form>

<?php

//Connect to MySql and the database
require( 'connect_db.php' ) ;

//Includes these tables
require( 'Tables.php' ) ;
if (isset($_GET['id'])) 
	$id=$_GET['id'];
if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	$id=$_POST['id'];
    //$location_id = $_POST['location_id'] ;
   // $create_date = $_POST['create_date'] ;
    $room = $_POST['room'];
    $owner = $_POST['owner'] ;
    $status = $_POST['status'] ;
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
    if (!valid_name($owner)){
	echo '<p style="color:red;font-size:16px;">Please enter finder.</p>';
    }
    else{
	$owner = trim($_POST['owner']);
    }
    #If all are filled it will add
    if( !empty($status) && !empty($description) && !empty($owner)&& !empty($id)){
	   $status = trim($_POST['status']);
        $created_date='now()';
        update_record($dbc,$description,$owner,$status,$room, $id);
		header('Location: limbohome.php');
    }
}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') 
{
	
}


//Show stuff Table
stuff($dbc);

//Close the connection
mysqli_close( $dbc ) ;
?>



</html>