<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login to CodeIgniter Social Media</title>
</head>
<body>

<div id="container" style="text-align: center;">
	<h1>Login to CodeIgniter Social Media</h1>

	<div id="body">
		<h2>Login Form</h2>
		<?php
			if (isset($message_error) && $message_error) {
				echo '<p>Invalid Credentials</p>';
			}
			echo form_open( 'login/validate' );
			echo form_input( 'user_name', '', 'placeholder="User Name"' );
			echo form_password( 'password', '', 'placeholder="Password"' );
      		echo form_submit( 'submit', 'Login' );
      		echo form_close();
		?>
		<p><a href="/codeigniter-social-media/signup">Sign Up</a></p>
	</div>
</div>

</body>
</html>