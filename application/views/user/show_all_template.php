<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Show All</title>
	</head>
	<body>
		<h1>.::LIST-OF-USERS::.</h1>
		<table style="width:100%">
			<tr style="text-align:left;">
		    	<th>ID</th>
		    	<th>Name</th> 
		    	<th>Nick Name</th>
		    	<th>Password</th>
		    	<th>Actions</th>
			</tr>
			{users}
			<tr>
				<td>{id}</td>
				<td>{name}</td>
	        	<td>{nick_name}</td>
	        	<td>{password}</td>
	        	<td><a href='/{nick_name}'>Show</a></td>
			</tr>
        	{/users}
		</table>
	</body>
</html>