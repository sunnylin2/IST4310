<?php  
	$submitted =  isset($_POST['username']) &&  isset($_POST['password']);
	if($submitted) {
		setcookie('username', $_POST['username'], time()+3600, "/","", 0);
		setcookie("Sites", "website1", time()+3600, "/", "",  0);
	}
?>
<!Doctype>
<html>
 <head>
	<title>User Authentication</title>
 </head>
 <body>
	<?php if ($submitted): ?>
	<p>Hello <b><?php echo $_POST['username']; ?></b></p>
	<?php else: ?>
	<p>Login First</p>
	<?php endif; ?>
 </body>
</html>
