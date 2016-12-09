<!--Edited by Riley Stadel, Robert Lynch, and Mark Miller
Limbo Project-->

<?php
$debug = true;

function deleteEntity($dbc){
	$id=$_GET['id'];
   $query = 'DROP * FROM stuff WHERE id='.$id.'';
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
  echo 'alert("deleted")';
}

# Shows the records in prints
function stuff($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Reported Items</H1>' ;
  		echo '<TABLE border=1 align = "center" height = 250 width = 750>';
  		echo '<TR color="red">';
  		echo '<TH>Date/Time Reported</TH>';
		echo '<TH>Status</TH>';
  		echo '<TH>Stuff</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
		    echo '<TD>' . $row['status'] . '</TD>' ;
    		$alink = '<A HREF=limbohome.php?id=' . $row['id']. '>' . $row['description'] . '</A>' ;
		    echo '<TD ALIGN=center>' . $alink . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}


# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}

function stuffdescription($dbc)
{
	#creates the description variable
	$id = $_GET['id'];
	#creates the query
	$query = 'SELECT * FROM stuff WHERE id = "'. $id . '"';
	
	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H3>Description</H1>' ;
  		echo '<TABLE border=1 align ="center">';
  		echo '<TR>';
		echo '<TH> Item ID </TH>';
		echo '<TH> Room </TH>';
  		echo '<TH> Date/Time Reported </TH>';
		echo '<TH> Status </TH>';
		echo '<TH> User </TH>';
		echo '<TH> Description </TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
		echo '<TD>' . $row['id'] . '</TD>' ;
		echo '<TD>' . $row['room'] . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
		echo '<TD>' . $row['status'] . '</TD>' ;
		echo '<TD>' . $row['owner'] . '</TD>' ;
    		$alink = '<A HREF=limbohome.php?id=' . $row['id']. '>' . $row['id'] . '</A>' ;
		echo '<TD ALIGN=center>' .  $row['description'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

		echo '<a HREF=editItem.php?id=' . $id . '>
			<img src="picture/Update_item.png" style="width:150px;height:50px;">
			</a>';
                
  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
}
}

function stuffdescriptionAdmin($dbc)
{
	#creates the description variable
	$id = $_GET['id'];
	#creates the query
	$query = 'SELECT * FROM stuff WHERE id = "'. $id . '"';
	
	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H3>Description</H1>' ;
  		echo '<TABLE border=1 align ="center">';
  		echo '<TR>';
		echo '<TH> Item ID </TH>';
		echo '<TH> Room </TH>';
  		echo '<TH> Date/Time Reported </TH>';
		echo '<TH> Status </TH>';
		echo '<TH> User </TH>';
		echo '<TH> Description </TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
		echo '<TD>' . $row['id'] . '</TD>' ;
		echo '<TD>' . $row['room'] . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
		echo '<TD>' . $row['status'] . '</TD>' ;
		echo '<TD>' . $row['owner'] . '</TD>' ;
    		$alink = '<A HREF=adminwelcome.php?id=' . $row['id']. '>' . $row['id'] . '</A>' ;
		echo '<TD ALIGN=center>' .  $row['description'] . '</TD>' ;
    		echo '</TR>' ;
			$id = $row['id'];
  		}

  		# End the table
		#Create a Button to delete the item from the database
  		//echo '</TABLE>';
		//echo '<input type="button" name="delete" onclick="deleteEntity(1);" value="delete">';
		echo '
			  <form method = "POST">
			  <input type="submit" value="Delete">
			  </form>';
			  
			  if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
				echo 'alert("")';
				deleteEntity($dbc, $_GET['id']);
    
}

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}
function showAdmins($dbc){
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM users' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Admins</H1>' ;
  		echo '<TABLE border=1 align = "center" height = 250 width = 750>';
  		echo '<TR color="red">';
  		echo '<TH>First Name</TH>';
		echo '<TH>Last Name</TH>';
  		echo '<TH>Email</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['first_name'] . '</TD>' ;
		    echo '<TD>' . $row['last_name'] . '</TD>' ;
		    echo '<TD>' . $row['email'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Inserts a record into the STUFF table
function insert_record_lost($dbc,$description,$owner,$status,$room, $create_date) {
  $query = 'INSERT INTO stuff(description, owner, status, room, create_date) VALUES ("' . $description . '" , "' . $owner . '" , "' . $status . '", "' . $room . '" , ' . $create_date . ')' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}
function insert_record_found($dbc,$description,$finder,$status,$room, $create_date) {
  $query = 'INSERT INTO stuff(description, owner, status, room, create_date) VALUES ("' . $description . '" , "' . $finder . '" , "' . $status . '", "' . $room . '", ' . $create_date . ' )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}
function insertAdmin($dbc,$first_name,$last_name,$email,$pass, $reg_date) {
  $query = 'INSERT INTO users(first_name, last_name, email, pass, reg_date) VALUES ("' . $first_name . '" , "' . $last_name . '" , "' . $email . '", "' . $pass . '", ' . $reg_date . ' )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

function update_record($dbc,$description,$owner,$status,$room, $id) {
  $query = 'UPDATE stuff SET description = "'.$description.'", owner = "'.$owner.'", status = "'.$status.'", room = "'.$room.'",  WHERE id='.$id.'' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}


function valid_name($name){
 if(empty($name)){
	return false;
 }
 else
	return true;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}
function stuffAdmin($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT *FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Reported Items</H1>' ;
  		echo '<TABLE border=1 align = "center" height = 250 width = 750>';
  		echo '<TR color="red">';
  		echo '<TH>Date/Time Reported</TH>';
		echo '<TH>Status</TH>';
  		echo '<TH>Stuff</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
		    echo '<TD>' . $row['status'] . '</TD>' ;
    		$alink = '<A HREF=adminwelcome.php?id=' . $row['id']. '>' . $row['description'] . '</A>' ;
		    echo '<TD ALIGN=center>' . $alink . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
                

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}


?>