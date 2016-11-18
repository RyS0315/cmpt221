<!--Edited by Riley Stadel, Robert Lynch, and Mark Miller
Limbo Project-->

<?php
$debug = true;



# Shows the records in prints
function stuff($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT create_date, status, description FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Reported Items</H1>' ;
  		echo '<TABLE border=1>';
  		echo '<TR>';
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
    		$alink = '<A HREF=limbohome.php?id=' . $row['description']. '>' . $row['description'] . '</A>' ;
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
	$description = $_GET['id'];
	#creates the query
	$query = 'SELECT * FROM stuff WHERE description = "'. $description . '"';
	
	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H3>Description</H1>' ;
  		echo '<TABLE border=1>';
  		echo '<TR>';
		echo '<TH>Item ID</TH>';
		echo '<TH>Location ID</TH>';
		echo '<TH>Room</TH>';
  		echo '<TH>Date/Time Reported</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Owner</TH>';
		echo '<TH>Finder</TH>';
		echo '<TH>Description</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
		echo '<TD>' . $row['id'] . '</TD>' ;
		echo '<TD>' . $row['location_id'] . '</TD>' ;
		echo '<TD>' . $row['room'] . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
		echo '<TD>' . $row['status'] . '</TD>' ;
		echo '<TD>' . $row['owner'] . '</TD>' ;
		echo '<TD>' . $row['finder'] . '</TD>' ;
    		$alink = '<A HREF=limbohome.php?id=' . $row['description']. '>' . $row['description'] . '</A>' ;
		echo '<TD ALIGN=center>' .  $row['description'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		//if($status == 'found')
		echo '<a HREF=editfound.php>Edit Found</a>';
		//else if($status == 'lost')
                echo ' ';
                echo '<a HREF=editlost.php>Edit Lost</a>';
                

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
}
}

function stuffdescriptionAdmin($dbc)
{
	#creates the description variable
	$description = $_GET['id'];
	#creates the query
	$query = 'SELECT * FROM stuff WHERE description = "'. $description . '"';
	
	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H3>Description</H1>' ;
  		echo '<TABLE border=1>';
  		echo '<TR>';
		echo '<TH>Item ID</TH>';
		echo '<TH>Location ID</TH>';
		echo '<TH>Room</TH>';
  		echo '<TH>Date/Time Reported</TH>';
		echo '<TH>Status</TH>';
		echo '<TH>Owner</TH>';
		echo '<TH>Finder</TH>';
		echo '<TH>Description</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
		echo '<TD>' . $row['id'] . '</TD>' ;
		echo '<TD>' . $row['location_id'] . '</TD>' ;
		echo '<TD>' . $row['room'] . '</TD>' ;
    		echo '<TD>' . $row['create_date'] . '</TD>' ;
		echo '<TD>' . $row['status'] . '</TD>' ;
		echo '<TD>' . $row['owner'] . '</TD>' ;
		echo '<TD>' . $row['finder'] . '</TD>' ;
    		$alink = '<A HREF=limbohome.php?id=' . $row['description']. '>' . $row['description'] . '</A>' ;
		echo '<TD ALIGN=center>' .  $row['description'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
		echo '<button name="delete" onclick = "deleteEntity(id)">Delete</button>';
                //echo '<button name='statusUpdate'>Status</button>;

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
}
}
# Inserts a record into the STUFF table
function insert_record_lost($dbc,$description,$owner,$status,$room) {
  $query = 'INSERT INTO stuff(description, owner, status, room) VALUES ("' . $description . '" , "' . $owner . '" , "' . $status . '", "' . $room . '" )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}
function insert_record_found($dbc,$description,$finder,$status,$room) {
  $query = 'INSERT INTO stuff(description, finder, status, room) VALUES ("' . $description . '" , "' . $finder . '" , "' . $status . '", "' . $room . '" )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}
function update_record_found($dbc,$description,$finder,$status,$room, $id) {
  $query = 'UPDATE stuff SET description = "'.$description.'", finder = "'.$finder.'", status = "'.$status.'", room = "'.$room.'" WHERE id='.$id.'' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}
function update_record_lost($dbc,$description,$owner,$status,$room, $id) {
  $query = 'UPDATE stuff SET description = "'.$description.'", owner = "'.$owner.'", status = "'.$status.'", room = "'.$room.'" WHERE id='.$id.'' ;
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
	$query = 'SELECT create_date, status, description FROM stuff ORDER BY create_date DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Reported Items</H1>' ;
  		echo '<TABLE border=1>';
  		echo '<TR>';
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
    		$alink = '<A HREF=editFound.php?id=' . $row['description']. '>' . $row['description'] . '</A>' ;
		echo '<TD ALIGN=center>' . $alink . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';
                

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}
function deleteEntity($id){
   $query = 'DELETE FROM stuff WHERE id='.$id.'';
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
  echo 'deleted';
}

?>