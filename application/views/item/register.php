<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
	</head>
	<body>
		<h1>New Item</h1>
		<?php echo form_open('item/register'); ?>
			<?php echo validation_errors(); ?>

		    <label for="name">Name</label>
		    <input type="input" name="name"/><br/>
		    
		    <label for="description">Description</label>
		    <input type="input" name="description"/><br/>		    

		    <input type="submit" name="submit" value="Register"/>
		</form>
	</body>
</html>