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

<h1>Welcome to Limbo!</h1>



If you lost or found something, you're in luck: this is the place to report it.
<?php
//Connect to MySql and the database
require( 'connect_db.php' ) ;

//Includes these tables
require( 'Tables.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $date = $_POST['create_date'] ;
    $status = $_POST['status'] ;
    $description = $_POST['description'] ;

    #Checks to see if there are values in the form
    if(!valid_number($date)){
 	echo '<p style="color:red;font-size:16px;">Please give a valid number.</p>';
    }    
    else{
	$num = trim($_POST['date']);
    }
    
    if (!valid_name($status)){
	echo '<p style="color:red;font-size:16px;">Please complete the first name.</p>';
    }
    else{
	$fName = trim($_POST['status']);
    }

    if (!valid_name($description)){
	echo '<p style="color:red;font-size:16px;">Please complete the last name.</p>';
    }
    else{
	$lName = trim($_POST['description']);
    }

    #If all are filled it will add
    if(!empty($date) && !empty($status) && !empty($description))
 	insert_record($dbc,$date,$status,$description) ;
    header('Location: limbohome.php');
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