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

<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'limbo_admin_tools.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	$Uname = $_POST['user_id'] ;
	$pass = $_POST['pass'];

    $pid = validate($Uname, $pass) ;

    if($pid == -1)
      echo '<P style=color:red>Login failed please try again.</P>' ;

    else
      load('limboadminwelcome.php', $pid);
}
?>
<!-- Get inputs from the user. -->
<h1>Limbo Login</h1>
<form action="limbo_admin.php" method="POST">
<table>
<tr>
<td>UserName:</td><td><input type="text" name="user_id"></td>
</tr>
<tr>
<td>Password:</td><td><input type="text" name="pass"></td>
</table>
<p><input type="submit" ></p>
</form>
</html>