<!DOCTYPE html>
<html>
  
<head>
    
<meta http-equiv="Content-Style-Type" content="text/css" /> 
    
<title>Limbo</title>
   
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
<a href="LimboLost.php">Lost Something</a>      
<a href="limboFound.php">Found Something</a>      
<a href="limbo_admin.php">Admin</a>
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