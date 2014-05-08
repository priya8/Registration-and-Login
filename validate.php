<?php
$error_name=$error_dob=$error_mail=$error_mobile=$error_edu=$error_insti=$error_pwd1=$error_pwd2=$a=$age=$systemdate=$year="";
$valid=$v1=$v2=$v3=$v4=$v5=$v6=$v7=0;
$num=0;
$a=0;
$lod=time();
$message=$subject=$to="";
$systemdate=date("Y");
$con=mysql_connect("localhost","root","");


mysql_query("CREATE DATABASE cyb_sign_in",$con);

mysql_select_db("cyb_sign_in");
$sql= "CREATE TABLE sign_in ( 
           name varchar(20),
           dob varchar(10),
           mail varchar(30), 
           password varchar(20),
           mobile bigint(15),
           education varchar(20),
           institution varchar(50),
           rno int(10),
           active int(3),
           ld bigint(30)
           
           
           )" ; 


if($_POST)
{  
$name=$_POST["t1"];
$dob=$_POST["t2"];
$mail=$_POST["t3"];
$mobile=$_POST["t4"];
$edu=$_POST["t5"];
$insti=$_POST["t6"];
$pass1=$_POST["t7"];
$pass2=$_POST["t8"];


mysql_query($sql,$con);
require_once "Mail.php";

$from = '<x@gmail.com>';
$to = $mail;
$subject = 'Hi!';
$link='http://localhost/activate.php';

$body = "Hi,\n\nThanks for signing up to CYB!!! Discover yourself!$link  Activate your account within a period of 5 days. If not, you will have to sign-up again.";

$headers = array(
   'From' => $from,
   'To' => $to,
   'Subject' => $subject,
   'Content-Type'=>'text/html;charset=iso-8859-1',
   'MIME-Version'=>'1.0',    
);


$smtp = Mail::factory('smtp', array(
       'host' => 'ssl://smtp.gmail.com',
       'port' => '465',
       'auth' => true,
       'username' => 'x@gmail.com',
       'password' => 'password_of_x@gmail.com'
   ));

 if(!empty($name))
     {

if (!preg_match( "/^[a-zA-Z ]*$/",$name))
         {
             $error_name="invalid name field";
         }
     else {$v1=1;}
       }
else
{
     $error_name="empty field";
     }


 if(!empty($dob))
{
                   
                   $a=Array(2);
                   
                   $a=explode("/",$dob);
                   for($i=0;$i<=2;$i++)
                       {
                         if(preg_match("/\d{4}/",$a[$i]))
                         $year=$a[$i];
                       }
                  $age=$systemdate-$year;

                   if ($age<13){ 
                                $message = "Hello young friend, We are extremely sorry for your inconvenience 

in creating the account at CYB. Please read the Terms and Conditions to know more";
                   echo "<script type='text/javascript'>alert('$message');</script>";
                               }
                     else {
                            $v2=1;
                            }
                   
       }

  else 
{ $error_dob="Please Enter valid dob";}


if(!empty($mail))
{
       if(!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+\.([a-z0-9-]+)*(\.[a-z]{2,3})*$/", $mail))
  {
               $error_mail="Invalid mail ID!!!";
     }  
    else 
     {
     $v3=1;
     
    
    $query=mysql_query("select count(mail) from sign_in where mail='$mail'");
    $query20=mysql_query("select active from sign_in where mail='$mail'");
$n20=mysql_result($query20,0);
    if(mysql_result($query,0)>=1 && $n20==1)  
   {$error_mail="already exists";
$v3=0;}
else if(mysql_result($query,0)>=1 && $n20==0){mysql_query("DELETE FROM sign_in WHERE mail='".$mail."'"); $v3=1;} 


 
}
}
else  
{
       $error_mail="Empty Field!!!";
}


if($pass1==$pass2)
{   
if(!preg_match('/^[0-9A-Za-z!@#$%]{6,15}$/', $pass1))

{  $error_pwd1="Password should have atleast 6 characters";}
else {$v4=1;}
}
else
$error_pwd2="Password didn't match";


if(!empty($mobile))
{
    if(!preg_match("/^\d{10}$/",$mobile))
    {
        $error_mobile="Phone number invalid!!!";
    }
       else{$v5=1;}
}
else  
{
         $error_mobile="Empty Field!!!";
}

if(!empty($edu))
 {
 $v6=1;
}

if(!empty($insti))
{
    if(!preg_match("/[A-Za-z ?]*/",$insti))      
        {   
               $error_insti="Invalid Institution Name!!!";  
             }
    else {$v7=1;}
}
else  
{
    $error_insti="Empty Field!!!";
}


if($age<13 && !empty($dob)){$v1=$v2=$v3=$v4=$v5=$v6=$v7=0;
$error_name=$error_dob=$error_mail=$error_mobile=$error_edu=$error_insti=$error_pwd1=$error_pwd2="";

}
                    
$valid=$v1*$v2*$v3*$v4*$v5*$v6*$v7;
    
if($valid)
{

setcookie('m',$mail,time()+120);

$num=rand(1,23);

$sql1="INSERT INTO sign_in(name,dob,mail,mobile,password,education,institution,rno,active,ld)VALUES

('$name','$dob','$mail','$mobile','$pass1','$edu','$insti','$num','$a','$lod')";

mysql_query($sql1,$con);

mysql_close($con);
header( 'Location: thankyou.html' ) ; 

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
   echo('<p>' . $mail->getMessage() . '</p>');
} else {
   echo('<p>Message successfully sent!</p>');
}}


}


?>




