<html>
<head>
</head>
<body>
<?php
session_start();
$random=$_SESSION["n1"];
echo "<p> Welcome ur random number is </p>".$random;
session_destroy();
?>
<form name="we" action="http://localhost/login.php" method="">
<input type="submit" value="logout"/>
</form> 
</body>
</html>

