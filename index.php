<html>
<head>

<style>
 .error {color: #FF0000;}
 .g{color:#C8C8C8; font-size:14px;  font-family:"Lucida Console"; }
</style>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
   
   <!-- Load jQuery JS -->
   <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
   <!-- Load jQuery UI Main JS  -->
   <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   
   <!-- Load SCRIPT.JS which will create datepicker for input field  -->
   <script src="script.js"></script>
   
   <link rel="stylesheet" href="runnable.css" />

<script>

$(document).ready(
 
 /* This is the function that will get executed after the DOM is fully loaded */
 function () {
   $( "#datepicker" ).datepicker({
     changeMonth: true,//this option for allowing user to select month
     changeYear: true //this option for allowing user to select from year range
   });
 }

);
</script>
</head>

<body>
<?php require_once("validate.php"); ?>




<form name="s" method="POST" action="">  

<p>  Name<span class="error"> * </span>
  <input type="text" name="t1" value="<?php if(isset($_POST['t1'])&& $v1==1){echo $_POST['t1'];} else {echo "";}?>"  /><span class="error"> <?php echo $error_name;?></span></p>

<p>DOB<span class="error"> * </span>
  <input type="text" name="t2" id="datepicker" value="<?php if(isset($_POST['t2']) && $v2==1){echo $_POST['t2'];} else {echo "";}?>"><span class="error"><?php echo $error_dob;?></span></p>

<p>Email<span class="error"> * </span>
  <input type="text" name="t3" value="<?php if(isset($_POST['t3']) && $v3==1){echo $_POST['t3'];} else {echo "";}?>"><span class="error"><?php echo $error_mail;?></span></p>

<p>Password<span class="error">*</span>
     <input type="password" name="t7" size="15" value="<?php if(isset($_POST['t7'])&& $v4==1){echo $_POST['t7'];} else {echo "";}?>"><span class="error"><?php echo $error_pwd1;?></span></p>

<p>Re-enter Password<span class="error">*</span>
     <input type="password" name="t8" size="15" value="<?php if(isset($_POST['t8'])&& $v4==1){echo $_POST['t8'];} else {echo "";}?>"><span class="error"><?php echo $error_pwd2;?></span></p>


<p> Mobile<span class="error"> * </span>
<input type="text" name="t4" size="15"value="<?php if(isset($_POST['t4'])&& $v5==1){echo $_POST['t4'];} else {echo "";}?>"><span class="error"><?php echo $error_mobile;?></span></p>

<p> Education<span class="error"> *</span>
<select name="t5" size="1" single="single" value="<?php if($v6==1){echo $_POST['t5'];} else {echo "";}?>" >
<option value="B.E">B.E</option>
<option value="Btech">Btech</option>
<option value="M.S">M.S</option>
<option value="Mtech">Mtech</option>
<option value="M.E">M.E</option>
<option value="PhD">PhD</option>
<option value="MBA">MBA</option>
<option value="Bsc">Bsc</option>
<option value="Msc">Msc</option>
<option value="Diploma">Diploma</option>
<option value="MBBS">MBBS</option>
<option value="MD">MD</option>
<option value="Others">Others</option>
</select> <span class="error"> <?php echo $error_edu;?></span>
</p>

<p> Institution<span class="error"> * </span>
<input type="text"  name="t6" size="30" value="<?php if(isset($_POST['t6']) && $v7==1){echo $_POST['t6'];} else {echo "";}?>"><span class="error"><?php echo $error_insti;?></span></p>
<p><span class="error">* required field.</span></p>
<p><input type="submit" name="Submit" value="Submit" /></p>
<p>Are you already a user of CYB? Login<p>
<a href="login.php">Login</a>
</form>
</body>
</html>

