<?php
	header("Content-Type:application/json");
	if (isset($_GET['EmplID']) && $_GET['EmplID']!="") {
		define ( 'DB_HOST', 'localhost' );
        	define ( 'DB_USER', 'employees' );
        	define ( 'DB_PASSWORD', 'password' );
        	define ( 'DB_NAME', 'employees' );

		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;
		if (!$con) {
			echo mysqli_connect_errno().": ".mysqli_connect_error() ;
			die("<p>The database server is not available.</p>") ;
		}
 		$emplId = $_GET['EmplID'];
 		$result = mysqli_query(
 			$con,
 			"SELECT * FROM employees WHERE emp_no=$emplId");
 		if(mysqli_num_rows($result)>0){
 			$row = mysqli_fetch_array($result);
 			$firstName = $row['first_name'];
 			$lastName = $row['last_name'];
 			$gender = $row['gender'];
			$birthDate = $row['birth_date'] ;
			$hireDate = $row['hire_date'] ;
			response($emplId, $firstName, $lastName, $gender, $birthDate, $hireDate);
 			mysqli_close($con);
 		}else{
			 response(NULL, 200,"No Record Found", NULL, NULL, NULL);
 		}
	}else{
 		response(NULL, 400,"Invalid Request", NULL, NULL, NULL);
 	}
 
	function response($emplId, $firstName, $lastName, $gender, $birthDate, $hireDate)
	{
 		$response['emplId'] = $emplId ;
 		$response['firstName'] = $firstName ;
 		$response['lastName'] = $lastName;
 		$response['gender'] = $gender;
 		$response['birthDate'] = $birthDate;
 		$response['hireDate'] = $hireDate;
 
 		$json_response = json_encode($response);
 		echo $json_response;
	}
?>
