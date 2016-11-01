<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>Linkypresidents.php</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" language="JavaScript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
  </head>
  <body>
<!--
This PHP script was modified based on result.php in McGrath (2012).
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
By Ron Coleman


Edited by Riley Stadel, Robert Lynch, and Mark Miller
Lab 9
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $num = $_POST['num'] ;
    $fName = $_POST['fName'] ;
    $lName = $_POST['lName'] ;

    #Checks to see if there are values in the form
    if(!valid_number($num)){
 	echo '<p style="color:red;font-size:16px;">Please give a valid number.</p>';
    }    
    else{
	$num = trim($_POST['num']);
    }
    
    if (!valid_name($fName)){
	echo '<p style="color:red;font-size:16px;">Please complete the first name.</p>';
    }
    else{
	$fName = trim($_POST['fName']);
    }

    if (!valid_name($lName)){
	echo '<p style="color:red;font-size:16px;">Please complete the last name.</p>';
    }
    else{
	$lName = trim($_POST['lName']);
    }

    #If all are filled it will add
    if(!empty($num) && !empty($fName) && !empty($lName))
 	insert_record($dbc,$num,$fName,$lName) ;
}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') 
{
 if(isset($_GET['id']))
show_record($dbc, $_GET['id']) ;
}

# Show the records
show_link_records($dbc);


# Close the connection
mysqli_close( $dbc ) ;
?>

<!-- Get inputs from the user. -->
<form action="linkypresidents.php" method="POST">
<table>
<tr>
<td>President Number:</td><td><input type="int" name="num" value="<?php if (isset($_POST['num'])) echo $_POST['num']; ?>"></td>
</tr>
<tr>
<td>First Name:</td><td><input type="text" name="fName" value="<?php if (isset($_POST['fName'])) echo $_POST['fName']; ?>"></td>
</tr>
<tr>
<td>Last Name:</td><td><input type="text" name="lName" value="<?php if (isset($_POST['lName'])) echo $_POST['lName']; ?>"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>
  </body>
</html>
