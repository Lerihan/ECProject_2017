<html>
	<head>
		<title>Home</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<?php include("css/navigation.php");?>
	</head>

	<body>
		<h2 class="form-signin-heading">Home</h2>
		<?php
			if(!empty($data['user'])){
				foreach($data['user'] as $user)
				{
					echo "<a href='/profile/$user->ID'> $user->username </a><br />";
				}
			}
		?>

		<h3>Videos</h3>
		<?php
			echo "<form action='/Home/filter' method='post'><select style = 'width: 15em; display: inline;'name='game_id' class='form-control'>
					<option name='game_id' value='default' >All Games</option>";
					foreach($data['games'] as $game){
		  				echo "<option name='game_id' value='$game->ID'>$game->game_name</option>";
		  			}
			echo  	 "</select><button type='submit' name='action' value='Filter' class='btn btn-default'>Filter</button></form>";
			foreach($data['videos'] as $video){
				echo "<div style='float: left; padding: 20px;'><a href='/upload/watch/$video->ID'>$video->video_title</a>"; 
				echo "<div><video width='320' controls='controls'><source src='/videos/$video->filename' type='video/$video->fileextension'>Your browser does not support the video tag.</video></div></div>";
			}
		?>

	</body>
</html>