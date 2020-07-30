<html>
	<head>
		<title>Bookmarks</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<?php include("css/navigation.php");?>
	</head>

	<body>
		<h2 class="form-signin-heading">Bookmarks</h2>


		<?php
		foreach($data['bookmarks'] as $bookmark){
			foreach ($data['videos'] as $video) {
				if($video->ID == $bookmark->video_id){
					echo "<div style='float: left; padding: 20px;'><a href='/upload/watch/$video->ID'>$video->video_title</a>"; 
					echo "<form action='/Saved/delete/$bookmark->ID' method='post'><button class='glyphicon glyphicon-remove' type='submit' name='action' value='Delete'></button></form>";
					echo "<div><video width='320' controls='controls'><source src='/videos/$video->filename' type='video/$video->fileextension'>Your browser does
					not support the video tag.</video></div></div>";
				}
			}
		}

		?>

	</body>
</html>