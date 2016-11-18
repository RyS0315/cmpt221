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

<a href="LimboHome.php">Home</a>      
<a href="limboLost.php">Lost Something</a>      
<a href="limbo_admin.php">Admin</a>
<h1>Update a Lost Item!</h1>

<!-- Get inputs from the user. -->
<form action="editlost.php" method="POST">
<table border=1>
<td>ItemID</td><td>Stuff</td><td>Room</td><td>Finder</td>
<tr>
<td><input type="int" name="id" value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>"></td>
<td><input type="text" name="description" value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"></td>
<td><input type="text" name="room" value="<?php if (isset($_POST['room'])) echo $_POST['room']; ?>"></td>
<td><input type="text" name="owner" value="<?php if (isset($_POST['owner'])) echo $_POST['owner']; ?>"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>

<?php
//Connect to MySql and the database
require( 'connect_db.php' ) ;

//Includes these tables
require( 'Tables.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $id=$_POST['id'];
    //$location_id = $_POST['location_id'] ;
   // $create_date = $_POST['create_date'] ;
    $room = $_POST['room'];
    $owner = $_POST['owner'] ;
    $status = 'lost' ;
    $description = $_POST['description'] ;

    #Checks to see if there are values in the form
    /*if(!valid_number($location_id)){
 	echo '<p style="color:red;font-size:16px;">Please give a location number.</p>';
    }    
    else{
	$location_id = trim($_POST['location_id']);
    }
    
    if (!valid_name($status)){
	echo '<p style="color:red;font-size:16px;">Enter Status</p>';
    }
    else{
	$status = trim($_POST['status']);
    }
	*/
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
	$finder = trim($_POST['finder']);
    }
    /*if ( $status == 'lost'){
	$status = trim($_POST['status']);
    }
    else{
	echo '<p style="color:red;font-size:16px;">Please enter found, lost, or claimed for status.</p>';
    }*/



    #If all are filled it will add
    if( !empty($status) && !empty($description) && !empty($owner)&& !empty($id)){
	   $status = 'found';
        $created_date='now()';
        update_record_lost($dbc,$description,$owner,$status,$room, $id);
    }
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