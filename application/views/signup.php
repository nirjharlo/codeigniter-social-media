<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login to CodeIgniter Social Media</title>
</head>
<body>

<div id="container" style="text-align: center;">
	<h1>Signup to CodeIgniter Social Media</h1>

	<div id="body">
		<h2>Signup Form</h2>
		<?php
			if( !isset($insert) || $insert == false ) {
				echo 'Invalid Credentials';
			}
			echo validation_errors();
			echo form_open( 'signup/validate' );
			echo '<p>' . form_input( 'first_name', '', 'placeholder="First Name"' ) . '</p>';
			echo '<p>' . form_input( 'last_name', '', 'placeholder="Last Name"' ) . '</p>';
			echo '<p>' . form_input( 'email_address', '', 'placeholder="Email Address"' ) . '</p>';
			echo '<p>' . form_input( 'username', '', 'placeholder="User Name"' ) . '</p>';
			echo '<p>' . form_password( 'password', '', 'placeholder="Password"' ) . '</p>';
      		echo form_submit( 'submit', 'Signup' );
      		echo form_close();
		?>
		<p><a href="/codeigniter-social-media">Log In</a></p>
	</div>
</div>

</body>
</html>