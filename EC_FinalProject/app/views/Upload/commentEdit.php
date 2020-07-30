<html>
	<head>
		<title>Edit Comment</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="/css/editComment.css">

		<?php include("css/navigation.php");?>

	</head>
	<body>
		<div class="container">
			<h2 class="form-signin-heading">Edit Comment</h2>
			<form action="/Remark/edit/<?php echo $data['comment']->ID; ?>" method='post' enctype="multipart/form-data">


		        <label for="description">Comment</label><br />
		        <textarea name="comment_message" class = "form-control" rows = "5" cols="50" placeholder="Enter description here..."><?php echo $data['comment']->comment_message; ?></textarea><br />
					
				<button class="btn btn-lg btn-danger btn-block" type="action" name="action" value="Submit">Edit</button>

				<form action="/upload/watch/<?php echo $data['comment']->video_id; ?>" class="form-signin" method="post">
        			<button class="btn btn-lg btn-warning btn-block" type="submit" name="action" value="Cancel">Cancel</button>
        		</form>
			</form>
		</div>
	</body>
</html>

