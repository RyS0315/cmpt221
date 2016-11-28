<!DOCTYPE html>
<html>
  
<head>
    
<meta http-equiv="Content-Style-Type" content="text/css" /> 
    
<title>Admin Login</title>
   
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
<a href="limbofound.php">Found Something</a>      
<a href="limbolost.php">Lost Something</a>
<h1>Welcome!</h1>

<!-- Get inputs from the user. -->
<form action="limboAdminWelcome.php" method="POST">
<table border=1>
<td>Username</td>
<td><input type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"></td>
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
    //$location_id = $_POST['location_id'] ;
   // $create_date = $_POST['create_date'] ;
    $room = $_POST['room'];
    $finder = $_POST['finder'] ;
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
	

    if (!valid_name($finder)){
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
    if( !empty($status) && !empty($description) && !empty($finder)){
 	$status='found';
        $created_date='now()';
        insert_record_found($dbc,$description,$finder,$status,$room);
    }
}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') 
{
 if(isset($_GET['id']))
stuffdescription($dbc, $_GET['id']) ;
}


//Close the connection
mysqli_close( $dbc ) ;
?>



</html>