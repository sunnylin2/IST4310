<?php

// check if person has logged in previously
session_start();
$processingOK = "not yet";
if (isset ($_SESSION["authorized"])) {
  // user already logged in
  $processingOK = $_SESSION["authorized"];;
}
  
// cookie processing for data of last visit and number of visits
  $today = date('l, F j, Y');
  $timestamp = date('g:i A');
  if (strcmp($_COOKIE["LAST_VISIT"], "") == 0) {
     $lasttime = "";
     } else {
     $lasttime = $_COOKIE["LAST_VISIT"];
     }
  $LAST_VISIT = $today . " at " . $timestamp;
  # set last_visit cookie with date/time, with expiration for 2 full weeks
  setcookie ("LAST_VISIT", $LAST_VISIT, time() + 3600*24*14);

  if ($_COOKIE["VISIT_NUMBER"] == 0) {
     $visitcount = 0;
  } else {
     $visitcount = $_COOKIE["VISIT_NUMBER"];
  }
  # set visit_number cookie with count, with expiration for 2 full weeks
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
<h1>Examples of Cookies and Session Variables, Part 3</h1>

<?php
// check authorization
if ($processingOK != 'ok') {
?>
  <p>
  Authorization Failure!
  <p>

  <p>
  Please log in before accessing this page.
  </p>

<?php
  exit ();
}

// after authorization check, can assume authorization ok in what follows
?>

<h2>Authorization Succeeded</h2>

<p>
You have logged in previously, so processing can continue on this page.
</p>

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
       print ("and that visit was on $lasttime");
  }
?>


</body>
</html>
