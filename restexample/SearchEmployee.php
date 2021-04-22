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
	if (isset($_POST['emplno']) && $_POST['emplno'] != "") {
		$emplno = filter_var($_POST['emplno'], FILTER_SANITIZE_STRING) ;
		$url = "http://website2/IST4310/restexample/api/".$emplno ;

		// Quary database table -- search employees table with specify the employee number use webservices
		$client = curl_init($url);
 		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 		$response = curl_exec($client);
 
 		$result = json_decode($response);

		// Disply query result
?>
		<form method="post">
			<p>Employee Number:
			<input type="number" name="emplno" id="emplno" value="<?php echo "$result->emplId" ?>" readonly></p>
			<p>First Name:
			<input type="text" pattern="[a-zA-Z ]*" name="FirstName" id="FirstName" value="<?php echo "$result->firstName" ?>"></p>
			<p>Last Name:
			<input type="text" pattern="[a-zA-Z ]*" name="LastName" id="LastName" value="<?php echo "$result->lastName" ?>"></p>
			<p>Gender:
			<input type="text" name="Gender" id="Gender" value="<?php echo "$result->gender" ?>"></p>
			<p>Birth Date:
			<input type="date" name="BirthDate" id="BirthDate" value="<?php echo "$result->birthDate" ?>"></p>
			<p>Hire Date:
			<input type="date" name="HireDate" id="HireDate" value="<?php echo "$result->hireDate" ?>"></p>
			<!-- <input type="submit" value="Update Employee" /> -->
                </form>
 </div>
<?php
	}
?>
</body>
