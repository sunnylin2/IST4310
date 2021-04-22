<?php
	header("Content-Type:application/json") ;
	header("Access-Control-Allow-Methods: POST") ;
	header("Access-Control-Max-Age: 3600") ;
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With") ;

	$data = json_decode(file_get_contents("php://input")) ;

	define ( 'DB_HOST', 'localhost' );
        define ( 'DB_USER', 'my_username' );
        define ( 'DB_PASSWORD', 'my_password' );
        define ( 'DB_NAME', 'my_db' );

        $con = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;
        if (!$con) {
        	echo mysqli_connect_errno().": ".mysqli_connect_error() ;
                die("<p>The database server is not available.</p>") ;
	}

	$firstName = $data->firstName ;
	$lastName = $data->lastName ;
	$gender = $data->gender ;
	$birthDate = $data->birthDate ;
	$hireDate = $data->hireDate ;
	
	// Quary database table -- selecting employees table to create new employee number

	$query = "select max(emp_no) from employees" ;
	$ResultSet = @mysqli_query($con, $query) ;
	// Disply query result
        $Row = @mysqli_fetch_row($ResultSet) ;
	$newEmplID = $Row[0] + 1 ;

	$query = "INSERT INTO employees (emp_no, first_name, last_name, birth_date, gender, hire_date) VALUES (".$newEmplID.", '".$firstName."', '".$lastName."', '".$birthDate."', '".$gender."', '".$hireDate."')" ;
	echo "<p>".$query."</p>" ;
	$ResultSet = @mysqli_query($con, $query)
		Or die("<p>Unable to execute the update</p>"
		."<p>Error code: ".mysqli_errno($con).": "
				.mysqli_error($con))."</p>" ;
	echo "<p>Successfully updated ".mysqli_affected_rows($con)." record(s).</p>" ;

	// Close the database connection
	mysqli_close($con) ;
?>
