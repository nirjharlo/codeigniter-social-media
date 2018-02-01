<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>List of users</title>
</head>
<body>

<div id="container" style="text-align: center;">
	<h1>List</h1>
	<div id="body">
		<table style="text-align: center;">
		<?php foreach ($members as $value) : ?>
			<tr>
				<td><img src="/codeigniter-social-media/uploads/<?php echo $value['image']; ?>" width="120" height="120"></td>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['email']; ?></td>
				<td><?php echo $value['uname']; ?></td>
				<td><a href="/codeigniter-social-media/profile/<?php echo $value['uname']; ?>">View</a></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>

</body>
</html>