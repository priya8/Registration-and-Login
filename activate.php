<?php
$ct=time();
$m1=$_COOKIE['m'];
if(isset($_COOKIE['m'])){
$con=mysql_connect("localhost","root","");
mysql_select_db("cyb_sign_in");
$query12=mysql_query("select ld from sign_in where mail='$m1'");
$n12=mysql_result($query12,0);
$query8=mysql_query("select active from sign_in where mail='$m1'");
$n9=mysql_result($query8,0);
$diff=$ct-$n12;
if( $diff>30 && $n9==0 )
{
$q=mysql_query("DELETE FROM sign_in WHERE mail='".$m1."'");
if($q){
header( 'Location: index.php' ) ; 
}
}
else {
$query8=mysql_query("select active from sign_in where mail='$m1'");
$n9=mysql_result($query8,0);
if($n9==1){
header( 'Location: login.php' ) ; 
}
else{
$n9=1;
echo "<p>Enter your activation number given below</p>"; 
$query9=mysql_query("select rno from sign_in where mail='$m1'");
$n10=mysql_result($query9,0);
echo $n10;
if($_POST){
$no=$_POST["n1"];
if(($no!="") && ($no==$n10))
{
$sql2=mysql_query("UPDATE sign_in SET active='$n9' WHERE mail='$m1'");
if($sql2) {
header( 'Location: login.php' ) ; 
}
else { echo "error in activating";}
}
else
{echo "<p>Enter the number shown above</p>";}
mysql_close($con);
}
}
}
}
else {
header( 'Location: index.php' ) ;
}
?>   
<html>
<head>
</head>
<body>
<form  method="POST" action="">
<input type="text" name="n1" size="20" />
<input type="submit" name="Submit" value="Submit"/>
</form>
</body>           
</html>               




