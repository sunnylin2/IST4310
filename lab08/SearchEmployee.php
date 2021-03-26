<head>
 <title>Employee Search Result</title>
 <style type="text/css">
  h1 { color:  red ; }
  h2 { font-family: Times New Roman; color: blue ; }
  p { font-family: Ariel; color: green}
  input[type=submit] {
     background-color: #4CAF50; /* Green */
     border: none;
     color: white;
     padding: 20px;
     text-align: center;
     text-decoration: none;
     display: inline-block;
     font-size: 12px;
     margin: 4px 2px;
     cursor: pointer;
  }
 </style>
</head>
<body>
 <h1>Employee Information Update</h1>
 <h2>Employee search result</h2>
 <div>
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

	if (isset($_POST['emplno'])) {
		$emplno = filter_var($_POST['emplno'], FILTER_SANITIZE_STRING) ;

		// Quary database table -- search employees table with specify the employee number
		$query = "SELECT * FROM employees WHERE emp_no = " . $emplno ;
		echo "<p>".$query."</p>" ;
		$ResultSet = @mysqli_query($conn, $query) ;
		$NumFields = @mysqli_num_fields($ResultSet) ;

		// Disply query result
		$Row = @mysqli_fetch_row($ResultSet) ;
?>
		<form method="post" action="UpdateEmployee.php">
			<p>Employee Number:
			<input type="number" name="emplno" id="emplno" value="<?php echo "{$Row[0]}" ?>" readonly></p>
			<p>First Name:
			<input type="text" pattern="[a-zA-Z ]*" name="FirstName" id="FirstName" value="<?php echo "{$Row[2]}" ?>"></p>
			<p>Last Name:
			<input type="text" pattern="[a-zA-Z ]*" name="LastName" id="LastName" value="<?php echo "{$Row[3]}" ?>"></p>
			<p>Birth Date:
			<input type="date" name="BirthDate" id="BirthDate" value="<?php echo "{$Row[1]}" ?>"></p>
			<input type="submit" value="Update Employee" />
                </form>
 </div>
<?php
		echo "<p>Total rows returned: ".@mysqli_num_rows($ResultSet)."</p>" ;

		// Release the query result set
		mysqli_free_result($ResultSet) ;
	}

	// Close the database connection
	mysqli_close($conn) ;
?>
</div>
</body>
