<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Members Only!</title>

</head>
<body>

<div id="container">
	<h1>Welcome!</h1>
	<p><?php echo "Hello $name, GG!"; ?></p>
	<p><?php echo "Your email is < $email >."; ?></p>
	<a href="<?php echo base_url().'index.php/main/logout'; ?>" >Logout</a>
</div>

</body>
</html>