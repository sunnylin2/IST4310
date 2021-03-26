<?php
        define ( 'DB_HOST', 'localhost' );
        define ( 'DB_USER', 'my_username' );
        define ( 'DB_PASSWORD', 'my_password' );
        define ( 'DB_NAME', 'my_database' );

        // Open database connection
        $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) ;

	if (!$conn) {
		echo mysqli_connect_errno().": ".mysqli_connect_error() ;
		die("<p>The database server is not available.</p>") ;
	}
	echo "<p>Database connection is open</p>" ;

	// Select database
	$DBSelect = @mysqli_select_db($conn, DB_NAME) ;
	if (!$DBSelect) {
		die("<p>The database is not available.</p>") ;
	}
	echo "<p>Successfully opened the database.</p>" ;

	// Quary database table -- selecting employees table for any employee hired after Januray 1, 2000
	$SQL = "SELECT * FROM employees WHERE hire_date >= '2000-01-01'" ;
	$ResultSet = @mysqli_query($conn, $SQL) ;
	$NumFields = @mysqli_num_fields($ResultSet) ;

	// Disply query result
	echo "<table width='100%' border='1'>" ;
	echo "<tr><th>Employee Number</th><th>Birth Date</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Hire Date</th></tr>" ;
	$Row = @mysqli_fetch_row($ResultSet) ;
	do {
		echo "<tr>" ;
		for ($i = 0 ; $i < $NumFields ; $i++) {
			echo "<td>{$Row[$i]}</td>" ;
		}
		echo "</tr>" ;
		$Row = @mysqli_fetch_row($ResultSet) ;
	} while ($Row) ;
	echo "</table>" ;
	echo "<p>Total rows returned: ".@mysqli_num_rows($ResultSet)."</p>" ;

	// Release the query result set
	mysqli_free_result($ResultSet) ;

	// Close the database connection
	mysqli_close($conn) ;
?>
