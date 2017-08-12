<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
	</head>
	<body>
		<h1>New User</h1>
		<?php echo form_open('user/register'); ?>
			<?php echo validation_errors(); ?>
		    
		    <label for="name">Name</label>
		    <input type="input" name="name" /><br/>
		    
		    <label for="nick_name">Nick Name</label>
		    <input type="input" name="nick_name" /><br/>		    
		
		    <label for="password">Password</label>
		    <input type="input" name="password"/><br/>
		
		    <input type="submit" name="submit" value="Register"/>
		</form>
	</body>
</html>