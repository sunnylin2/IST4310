<head>
 <title>Update Employee</title>
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
 <h2>Update Employee Information</h2>
 <div>
<?php
        define ( 'DB_HOST', 'localhost' );
        define ( 'DB_USER', 'ist4310' );
        define ( 'DB_PASSWORD', 'password' );
        define ( 'DB_NAME', 'employees' );

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

	if (isset($_POST['emplno']) && isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['BirthDate'])) {
		$emplno = filter_var($_POST['emplno'], FILTER_SANITIZE_STRING) ;
		$firstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING) ; 
		$lastName = filter_var($_POST['LastName'], FILTER_SANITIZE_STRING) ; 
		$birthDate = filter_var($_POST['BirthDate'], FILTER_SANITIZE_STRING) ; 

		// Quary database table -- selecting employees table for any employee hired after Januray 1, 2000
		$query = "UPDATE employees SET first_name = '".$firstName ."', last_name = '".$lastName."', birth_date = '".$birthDate."' WHERE emp_no = ".$emplno ;
		echo "<p>".$query."</p>" ;
		$ResultSet = @mysqli_query($conn, $query) 
			Or die("<p>Unable to execute the update</p>"
				."<p>Error code: ".mysqli_errno($conn).": "
				.mysqli_error($conn))."</p>" ;
		echo "<p>Successfully updated ".mysqli_affected_rows($conn)." record(s).</p>" ;
	}

	// Close the database connection
	mysqli_close($conn) ;
?>
</div>
</body>
