<?php declare(strict_types=1);

	if ((isset($_POST['dog_name'])) && (isset($_POST['dog_breed'])) && (isset($_POST['dog_color'])) && (isset($_POST['dog_weight'])))
      	{
		$dog_name = filter_var( $_POST['dog_name'], FILTER_SANITIZE_STRING);
		$dog_breed = filter_var( $_POST['dog_breed'], FILTER_SANITIZE_STRING);
		$dog_color = filter_var( $_POST['dog_color'], FILTER_SANITIZE_STRING);
		$dog_weight = filter_var( $_POST['dog_weight'], FILTER_SANITIZE_STRING);
		
		echo $dog_name."<br/>" ;
		echo $dog_breed."<br/>" ;
		echo $dog_color."<br/>" ;
		echo $dog_weight."<br/>" ;
	}
	else
	{
      		print "<p>Missing or invalid parameters. Please go back to the lab.html page to
      		enter valid information.<br />";
      		print "<a href='DogObject.html'>Dog Creation Page</a>";
	}
?>
