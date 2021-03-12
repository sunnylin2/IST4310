<?php  

	echo "While loop example<br/>" ;
	$max = 0;  $i = 0; $j = 1;  $result=0;
 
	while ($max < 10 )  
	{  
    		$result = $i + $j;  
 
    		$i = $j;  
    		$j = $result;  
 
    		$max = $max + 1;  
    		echo $result;
    		echo ",";
	}

	echo "<br/>Do While loop example<br/>" ;
	$handle = fopen("file.txt", "r");
	if ($handle)
	{
    		do {
        		$line = fgets($handle);
 
        		// process the line content
 
    		} while($line !== false);
	}
	fclose($handle);

	echo "For loop example<br/>" ;
	for ($i=1; $i<=10; ++$i)
	{
  		echo sprintf("The square of %d is %d.</br>", $i, $i*$i);
	}

	echo "Foreach loop example<br/>" ;
	$fruits = array('apple', 'banana', 'orange', 'grapes');
	foreach ($fruits as $fruit)
	{
  		echo $fruit;
  		echo "<br/>";
	}
 
	$employee = array('name' => 'John Smith', 'age' => 30, 'profession' => 'Software Engineer');
	foreach ($employee as $key => $value)
	{
  		echo sprintf("%s: %s</br>", $key, $value);
  		echo "<br/>";
	}

	echo "Simple break example<br/>" ;
	echo 'Simple Break';
	for($i = 1; $i <= 2; $i++) {
    		echo "\n".'$i = '.$i.' ';
    		for($j = 1; $j <= 5; $j++) {
        		if($j == 2) {
            			break;
        		}
        		echo '$j = '.$j.' ';
    		}
	}

	echo "Multi-level break example<br/>" ;
	echo 'Multi-level Break';
	for($i = 1; $i <= 2; $i++) {
    		echo "\n".'$i = '.$i.' ';
    		for($j = 1; $j <= 5; $j++) {
        		if($j == 2) {
            			break 2;
        		}
        		echo '$j = '.$j.' ';
    		}
	}

?>

