<?php
	echo "Example 1"."<br/>" ;
      	$a = 25; $b = 36;
      	if( $a == $b) {
            print "$b equals $a";
      	}
      	else {
            print "$b and $a are not equal";
      	}

	echo "<br/>Example 2<br/>" ;
	$a = "a";  $b = "A";
      	if( $a === $b) {
            print "$b equals $a";
	}
      	else {
            print "$b and $a are not equal";
	}

	echo "<br/>Example 3<br/>" ;
	$a = 25; $b = 36;
      	if( $a != $b) {
            print "$b and $a are not equal";
      	}
      	else {
            print "$b and $a are equal";
      	}

	echo "<br/>Example 4<br/>" ;
	$a = "A"; $b = "a";
      	if( $a !== $b) {
            print "$b and $a are not equal";
	}
      	else {
            print "$b and $a are equal";
	}

	echo "<br/>Example 5<br/>" ;
	$a = 25; $b = 36;
      	if( $a > $b) {
            print "$a is greater than $b";
      	}
      	else {
            print "$b is greater than $a";
      	}

	echo "<br/>Example 6<br/>" ;
	$a = 36; $b = 36;
      	$result = $a <=> $b;
      	if( $result === 0) {
            print "Both are equal";
      	} else if( $result === 1) {
            print "$a is greater than $b";
      	} else {
            print "$b is greater than $a";
      	}

	echo "<br/>Logical Operator Example OR<br/>" ;
	$a = 25; $b = 25; $c = 25; $d = 35;
      	If ( $a == $b or $c == $d ) {
            print "Some or all of us are equal!";
      	} else {
            print "We are not equal";
      	}

	echo "<br/>Logical Operator Example AND<br/>" ;
	$a = 25; $b = 25; $c = 25; $d = 35;
      	If ( $a == $b && $c == $d ) {
            print "All of us are equal!";
      	} else {
            print "No one is equal";
      	}

	echo "<br/>Logical Operator Example XOR<br/>" ;
	$a = 25; $b = 25; $c = 25; $d = 25;
      	If ( $a == $b xor $c == $d ) {
            print "Everyone is equal!";
      	} else {
            print "Someone is not equal";
      	}

	echo "<br/>Logical Operator Example NOT<br/>" ;
	$a = 25; $b = 25; $c = 25; $d = 25;
      	If ( ! ($a == $b xor $c == $d ) ) {
            print "Everyone is equal!";
      	} else {
            print "Someone is not equal";
      	}

?>

