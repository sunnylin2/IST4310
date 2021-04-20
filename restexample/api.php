<?php
	header("Content-Type:application/json");
	if (isset($_GET['EmplID']) && $_GET['EmplID']!="") {
 		include('db.php');
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
			 response(NULL, NULL, 200,"No Record Found");
 		}
	}else{
 		response(NULL, NULL, 400,"Invalid Request");
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
