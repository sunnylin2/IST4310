<head>
 <title>Add Employee</title>
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
 <h1>Add Employee Information</h1>
 <h2>Employee Information</h2>
 <div>
<?php
	$url = "http://website2/IST4310/restexample/create.php" ;

	$curl = curl_init($url) ;
	curl_setopt($curl, CURLOPT_URL, $url) ;
	curl_setopt($curl, CURLOPT_POST, true) ;
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true) ;

	$headers = array(
		"Accept: application/json",
 		"Content-Type: application/json",
	) ;
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

	if (isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['BirthDate']) && isset($_POST['Gender']) && isset($_POST['HireDate'])) {
		$emplno = filter_var($_POST['emplno'], FILTER_SANITIZE_STRING) ;
		$firstName = filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING) ; 
		$lastName = filter_var($_POST['LastName'], FILTER_SANITIZE_STRING) ; 
		$birthDate = filter_var($_POST['BirthDate'], FILTER_SANITIZE_STRING) ; 
		$hireDate = filter_var($_POST['HireDate'], FILTER_SANITIZE_STRING) ; 
		$gender = filter_var($_POST['Gender'], FILTER_SANITIZE_STRING) ; 

		$data['firstName'] = $firstName ;
		$data['lastName'] = $lastName ;
		$data['gender'] = $gender ;
		$data['birthDate'] = $birthDate ;
		$data['hireDate'] = $hireDate ;

		$json_data = json_encode($data) ;
 		echo $json_data ;

		curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
	}
	curl_close($curl);
	var_dump($resp);
?>
</div>
</body>
