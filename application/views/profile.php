<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $user_name; ?></title>
</head>
<body>

<div id="container" style="text-align: center;">
	<h1>Profile</h1>

	<div id="body">
		<h2>Welcome <?php echo $user_name; ?></h2>
		<p><img src="/codeigniter-social-media/uploads/<?php echo $src; ?>" width="120" height="120"></p>

		<?php echo form_open_multipart('profile/do_upload');?>
		<form action="" method="">
			<input type="file" name="profile_image" /> 
			<input type="submit" value="Upload New" /> 
		</form>

		<p><?php echo $first_name . ' ' . $last_name; ?></p>
		<p><?php echo $email_addres; ?></p>
		<p><a href="/codeigniter-social-media/list">List of members</a></p>
	</div>
</div>

</body>
</html>