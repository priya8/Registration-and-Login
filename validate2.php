<?php
$v1=$v2=$v3=0;
$error_mail=$error_pass="";
if($_POST)
{  
$mail=$_POST["p1"];
$pass=$_POST["p2"];

$con=mysql_connect("localhost","root","");
mysql_select_db("cyb_sign_in");
$query1=mysql_query("select count(*) from sign_in where mail='$mail' AND password='$pass'");
$query2=mysql_query("select count(*) from sign_in where mail='$mail'");

if(mysql_result($query1,0)==1)
{$v1=1;
 $query3=mysql_query("select active from sign_in where mail='$mail'");
$n=mysql_result($query3,0,'active');
if($n==1){
$query11=mysql_query("select rno from sign_in where mail='$mail'");
$n11=mysql_result($query11,0,'rno');
session_start();
$_SESSION["n1"]=$n11;
header( 'Location: mainpage.php' ) ; 
}
else if($n==0){echo "Account not activated,Kindly head to your ";} //added

}
else if(mysql_result($query1,0)==0 && mysql_result($query2,0)==1 )
{$v2=1;
 $error_pass="Invalid password";
}
else if(mysql_result($query2,0)==0 )
{$v3=1;
 $error_mail="Invalid Email ID";
}
else{
echo "Please activate via email";
}
mysql_close($con);
}
?>
