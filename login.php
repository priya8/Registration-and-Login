<html>
<head>
<style>
 .error {color: #FF0000;}
</style>
</head>
<body>
<?php require_once("validate2.php"); ?>
<form action=""method="post">
<p>Email ID<span class="error">*</span><input type="text" name="p1" size="30" value="<?php if(isset($_POST['p1']) && $v2==1){echo $_POST["p1"];} else {echo ""; }?>"/><span class="error"><?php echo $error_mail ?></span></p>
<p>Password<span class="error">*</span><input type="password" name="p2" size="20" /><span class="error"><?php echo $error_pass ?></span></p>
<p><span class="error">* required field.</span></p>
<input name="submit"  type="submit" value="Submit" />
<p>Are you a new user ? Go ahead and Register</p>
<a href="index.php">Register</a>
</body>
</html>

