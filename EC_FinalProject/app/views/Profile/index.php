<html>
	<head>
		<title>My Channel</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<?php include("css/navigation.php");?>
	</head>
	<body>
		<?php
		 	$theUser = $data['user']; //profile user
		 	$theSubs = $this->model('Subscription');
		 	$theSubs = $theSubs->where("subscriber_id", '=', $_SESSION['userID'])->get();
		    echo "<h2 style='display:inline;'>$theUser->first_name's Channel&nbsp;</h2>";
		    if($theUser->ID == $_SESSION['userID']){
		    	echo "<form action='/Profile/edit/$theUser->ID' method='post' style='display:inline;'><button class='glyphicon glyphicon-pencil' type='submit' name='action' value='Edit'></button></form>";
		    	echo "<form action='/Follow/subscriber'method='post'><button class='btn btn-default' type='submit' name='action' value='View'>View Followers</button></form>";
		    }
		    
		    if($theUser->ID != $_SESSION['userID']){
		    	foreach ($theSubs as $subs) {
					if($theUser->ID == $subs->subscribedto_id)		
					{
						//missing if: already following
						echo "<form method='post' action='/Follow/unsubscribe' style='display:inline;'>
									<input name = 'subscribedto_id' type = 'hidden' value='$theUser->ID'>
									<input type='submit' name='action' value='Unsubscribe' class='btn btn-default'/>
								</form>";
				 
						}
					else
					{
					   //missing if: not already subscribed
						echo "<br /><form method='post' action='/profile/subscribe' style='display:inline;'>
							<input name = 'subscribedto_id' type = 'hidden' value='$theUser->ID'>
							<input type='submit' name='action' value='Subscribe' class='btn btn-default'/>
						</form>";

					}
 				      
		     }

		      

			            			



		    }
		      
		      
		?>

		<h3>Uploads</h3>
		<?php
			foreach($data['videos'] as $video){
				echo "<div style='float: left; padding: 20px;'><a href='/Upload/watch/$video->ID'>$video->video_title</a><br />";
				if($video->user_id == $_SESSION['userID']){
					echo "<form action='/Profile/delete/$video->ID' method='post' style='display:inline'>
							<button class='glyphicon glyphicon-remove' type='submit' name='action' value='Delete'></button>
						  </form>";

					echo "<form action='/Upload/edit/$video->ID' method='post' style='display:inline'>
							<button class='glyphicon glyphicon-pencil' type='submit' name='action'></button>
						  </form>";
				}
				echo "<div><video width='320' controls='controls'><source src='/videos/$video->filename' type='video/$video->fileextension'>Your browser does
				not support the video tag.</video></div></div>";
			}
		?>
	</body>
</html>