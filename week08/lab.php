<?php declare(strict_types=1);

	if ((isset($_POST['dog_name'])) && (isset($_POST['dog_breed'])) && (isset($_POST['dog_color'])) && (isset($_POST['dog_weight'])))
      	{
		string $dog_name = filter_var( $_POST['dog_name'], FILTER_SANITIZE_STRING);
		string $dog_breed = filter_var( $_POST['dog_breed'], FILTER_SANITIZE_STRING);
		string $dog_color = filter_var( $_POST['dog_color'], FILTER_SANITIZE_STRING);
		string $dog_weight = filter_var( $_POST['dog_weight'], FILTER_SANITIZE_STRING);
	}
	else
	{
      		print "<p>Missing or invalid parameters. Please go back to the lab.html page to
      		enter valid information.<br />";
      		print "<a href='lab.html'>Dog Creation Page</a>";
	}
?>
