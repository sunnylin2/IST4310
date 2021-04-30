<html>
   
   <head>
      <title>Accessing Cookies with PHP</title>
   </head>
   
   <body>

	<h2>Your Cookie</h2>
      
      <?php
         echo $_COOKIE["username"]. "<br />";
         
         /* is equivalent to */
         echo $HTTP_COOKIE_VARS["username"]. "<br />";
         
         echo $_COOKIE["Sites"] . "<br />";
         
         /* is equivalent to */
         echo $HTTP_COOKIE_VARS["Sites"] . "<br />";
      ?>
      
   </body>
</html>
