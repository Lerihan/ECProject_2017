<html>
	<head>
		<title>Upload</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="/css/upload.css">

		<?php include("css/navigation.php");?>

	</head>
	<body>
		<div class="container">
			<h2 class="form-signin-heading">Upload Video</h2>
			<form action="" method='post' enctype="multipart/form-data">

				<label for="title">Title of the Video</label>
		        <input name="video_title" id="title" class="form-control" placeholder="Video Title" required autofocus>

		        <br />

		        <label for="description">Video Description</label><br />
		        <textarea name="video_description" class = "form-control" rows = "5" cols="50" placeholder="Enter description here..."></textarea><br />


				<label for="gameName">Name of Game</label><br />
				<select name="game_id" id="select_catalog" class="form-control">
				<?php
				  foreach($data['games'] as $game){
				  	echo "<option name='game_id' value='$game->ID'>$game->game_name</option>";
				  }
				?>
				</select><br />

				<input type="file" name="file"/><br><br>
					
				<input class="btn btn-success btn-primary btn-block" type="submit" name="upload" value="Upload"/>

			</form>
		</div>
	</body>
</html>

