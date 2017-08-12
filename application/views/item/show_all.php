<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Show All</title>
	</head>
	<body>
		<h1>Items::.</h1>
		<table style="width:100%">
			<tr>
		    	<th>ID</th>
		    	<th>User ID</th>		    	
		    	<th>Name</th> 
		    	<th>Description</th>
		    	<th>Actions</th>
			</tr>
			<?php foreach ($items as $item): ?>
			<tr>
				<td><?php echo $item['id'] ?></td>
				<td><?php echo $item['user_id'] ?></td>				
				<td><?php echo $item['name'] ?></td>
	        	<td><?php echo $item['description'] ?></td>
	        	<td><a href="/item/<?php echo $item['id'] ?>">Show</a></td>
	        	<td>
				<?php echo form_open('user/interest');?>
					<?php echo validation_errors(); ?>
				    <input hidden type="input" name="id_item" value="<?php echo $item['id'] ?>" />		    
				    <input type="submit" name="submit" value="Interest"/>
				</form>
				</td>
			</tr>
		<?php endforeach; ?>		
	</table>
	</body>
</html>