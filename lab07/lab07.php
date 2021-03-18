<head>
	<title>Unit Converter</title>
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
	<h1>Unit Converter</h1>
<?php

	if ((isset($_POST['original_unit'])) && (isset($_POST['value'])) && (isset($_POST['target_unit'])))
      	{
		$original_unit = filter_var( $_POST['original_unit'], FILTER_SANITIZE_STRING);
		$value = filter_var( $_POST['value'], FILTER_SANITIZE_STRING);
		$target_unit = filter_var( $_POST['target_unit'], FILTER_SANITIZE_STRING);

		echo "<p>The original value is " . $value . " " . $original_unit . "</p>" ;
	
		if ($original_unit == "inch") {
			if ($target_unit == "centimeter") {
				$target_value = $value * 2.54 ;
			} else if ($target_unit == "meter") {
				$target_value = $value * 2.54 / 100 ;
			} else if ($target_unit == "kilometer") {
				$target_value = $value * 2.54 / 1000 ;
			}
		}		
	
		if ($original_unit == "feet") {
			if ($target_unit == "centimeter") {
				$target_value = $value * 30.48 ;
			} else if ($target_unit == "meter") {
				$target_value = $value * 30.48 / 100 ;
			} else if ($target_unit == "kilometer") {
				$target_value = $value * 30.48 / 1000 ;
			}
		}		
	
		if ($original_unit == "mile") {
			if ($target_unit == "centimeter") {
				$target_value = $value * 160934 ;
			} else if ($target_unit == "meter") {
				$target_value = $value * 1609.34  ;
			} else if ($target_unit == "kilometer") {
				$target_value = $value * 1.60934 ;
			}
		}		
		
		echo "<p style='color: darkblue ;'>The target value is " . $target_value . " " . $target_unit . "</p>" ;
	}
	else
	{
      		print "<p>Missing or invalid parameters. Please go back to the lab.html page to
      		enter valid information.<br />";
      		print "<a href='UnitConvertion.html'>Unit Converter Page</a>";
	}
?>
	</body>
