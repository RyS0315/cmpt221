Edited by Riley Stadel, Robert Lynch, and Mark Miller
Lab 9

<?php
$debug = true;



# Shows the records in prints
function show_records($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT num, fName, lName FROM presidents ORDER BY num DESC' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Presidents</H1>' ;
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>President Number</TH>';
		echo '<TH>First Name</TH>';
  		echo '<TH>Last name</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['num'] . '</TD>' ;
		echo '<TD>' . $row['fName'] . '</TD>' ;
    		echo '<TD>' . $row['lName'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

# Inserts a record into the presidents table
function insert_record($dbc, $num, $fName, $lName) {
  $query = 'INSERT INTO presidents(num, fName, lName) VALUES (' . $num . ' , "' . $fName . '" , "' . $lName . '" )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}

function valid_number($num) {
 if(empty($num) || !is_numeric($num))
 	return false ;
 else {
 	$num = intval($num) ;
 	if($num <= 0)
 		return false ;
 }
 return true ;
}
function valid_name($name){
 if(empty($name)){
	return false;
 }
 else
	return true;
}


function show_link_records($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT num, lName FROM presidents ORDER BY num DESC' ;
	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	
	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Presidents</H1>' ;
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>President Number</TH>';
		
  		echo '<TH>Last name</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
		$alink = '<A HREF=linkypresidents.php?id=' . $row['num']. '>' . $row['num'] . '</A>' ;
		echo '<TD ALIGN=right>' . $alink . '</TD>' ;

		
    		echo '<TD>' . $row['lName'] . '</TD>' ;
			
    		echo '</TR>' ;
  		}
		
		
  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}

}

function show_record($dbc) {
	# Create a query to get the name and price sorted by price
	$num = $_GET['id'];
	$query = 'SELECT num, fName, lName FROM presidents WHERE num = ' . $num ;
	
	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
  		echo '<H1>Presidents</H1>' ;
  		echo '<TABLE>';
  		echo '<TR>';
  		echo '<TH>President Number</TH>';
		echo '<TH>First Name</TH>';
  		echo '<TH>Last name</TH>';
  		echo '</TR>';

  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
    		echo '<TR>' ;
    		echo '<TD>' . $row['num'] . '</TD>' ;
		echo '<TD>' . $row['fName'] . '</TD>' ;
    		echo '<TD>' . $row['lName'] . '</TD>' ;
    		echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

?>