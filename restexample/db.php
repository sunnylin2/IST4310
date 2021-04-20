// Define and create database connection

	define ( 'DB_HOST', 'localhost' );
        define ( 'DB_USER', 'employees' );
        define ( 'DB_PASSWORD', 'password' );
        define ( 'DB_NAME', 'employees' );

	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;
	if (!$con) {
		echo mysqli_connect_errno().": ".mysqli_connect_error() ;
		die("<p>The database server is not available.</p>") ;
	}
