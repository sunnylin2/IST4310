<?php
// cookie processing for data of last visit and number of visits
$today = date('l, F j, Y');
  $timestamp = date('g:i A');
  if (strcmp($_COOKIE["LAST_VISIT"], "") == 0) {
     $lasttime = "";
     } else {
     $lasttime = $_COOKIE["LAST_VISIT"];
     }
  $LAST_VISIT = $today . " at " . $timestamp;

// set last_visit cookie with date/time, with expiration for 2 full weeks
  setcookie ("LAST_VISIT", $LAST_VISIT, time() + 3600*24*14);

  if ($_COOKIE["VISIT_NUMBER"] == 0) {
     $visitcount = 0;
  } else {
     $visitcount = $_COOKIE["VISIT_NUMBER"];
  }
// set visit_number cookie with count, with expiration for 2 full weeks
  setcookie ("VISIT_NUMBER",1 + $visitcount, time() + 3600*24*14);
  
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <META http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Some Web Information About You</title>
    <link rev="made" href="mailto:slin@csusb.edu">
</head>

<body>
<h1>Examples of Cookies and Session Variables</h1>


<h2>History Information</h2>
<?php
   if ((strcmp($lasttime, "") == 0) AND ($visitcount == 0)) {
     print ("There is no record when you last visited this page previously");
   } else {
     if ($visitcount == 1) {
       print ("You have visited this Web page once previously,<br>");
     } else {
       print ("You have visited this Web page $visitcount times.<br>");
     }
       print ("and the last visit was on $lasttime");
  }
?>

<h2>Log In Examples</h2>

<p>
Example for logging in (with password "Test")
</p>

<ul>
<li>
Log in option:
<form method="post" action="session-cookies-2.php">
<i>Password: </i>
<input type="password" name="password">
<input type="submit" value="Log in">
</form>
vvvvvv
<li>
<a href="session-cookies-3.php">Try this link</a?

</body>
</html>

