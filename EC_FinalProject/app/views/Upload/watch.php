<html>
	<head>
		<title>Watch</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="/css/watch.css">
		<?php include("css/navigation.php");?>
	</head>
	<body>

		<?php
			$video = $data['videos'];
			$user = $data['user'];
			echo "<div class='video_container'><video width='1000' controls='controls'><source src='/videos/$video->filename' type='video/$video->fileextension'></video></div>";
			echo "<div class='title_container' style='margin:auto;'><h2 style='display:inline;'>$video->video_title</h2>";
			echo "<form action='/Saved/add/$video->ID' method='post' style='display:inline;'><button class='glyphicon glyphicon-bookmark pull-right' type='submit' name='action' value='Bookmark'></button></form><br/>";
			echo "<a href='/profile/$user->ID'>$user->username</a>&nbsp;<br/>";
			if($user->ID != $_SESSION['userID']){
				//check if subscribed already
			    echo "<form method='post' action='/follow/subscribe' style='display:inline'>";
			    echo "<input name = 'subscribedto_id' type = 'hidden' value='$user->ID'>";
			    echo "<input type='submit' name='action' value='Subscribe' /></form><br /><br />";
			}
			echo "<b>Uploaded on $video->date_uploaded</b>";
			echo "<p>$video->video_description</p></div><br/>";
		?>
		<div class="comments_container" style='margin:auto;'>
			<b>COMMENTS</b>
			<form method="post" action="/Remark/add"><br />
				<input name = "video_id" type = "hidden" value="<?php echo $data['videos']->ID; ?>">
				<textarea class = "form-control" name="comment_message" rows = "5" cols="50" placeholder="Enter comment here..."></textarea>
				<input class = "btn btn-success" type="submit" name="action" value='Submit'/>
			</form>

			<table>
				<?php
				if(!empty($data['comments']))
				{
					  foreach($data['comments'] as $comment){
						    $theUser = $this->model('User');
						    $theUser = $theUser->find($comment->commentor_id);
						    $theVid = $data['videos'];
						    // echo "<tr><td><a href='/profile/$comment->commentor_id'>$theUser->username</a>"; 
						    // echo "<p>$comment->comment_message</p></td></tr>";
		    				
		    					echo "<tr>
	    								<td>
	    								 	<a href='/profile/$comment->commentor_id'>$theUser->username</a></ br>";
	    								 	if($theUser->ID == $_SESSION['userID'])
	    								  	{
	    								  		echo "<form action='/remark/delete/$comment->ID' method='post' style='display:inline'>
				    									<button class='glyphicon glyphicon-remove' type='submit' name='action' value='Delete'></button>
				    									<input name = 'video_id' type = 'hidden' value='$theVid->ID'>
								    					<input name = 'commentor_id' type = 'hidden' value='$theUser->ID'>
	    								  			  </form>";

	    								  		echo "<form action='/remark/edit/$comment->ID' method='post' style='display:inline'>
				    									<button class='glyphicon glyphicon-pencil' type='submit' name='action' value='Edit'></button>
				    									<input name = 'video_id' type = 'hidden' value='$theVid->ID'>
								    					<input name = 'commentor_id' type = 'hidden' value='$theUser->ID'>
	    								  			  </form>";
	    								  	}

	    						echo	"<p>
	    								  	$comment->comment_message";
	    								  	
		    					echo "  </p>
		    						  	</td>
	    							  </tr>";
		    				}
					  }
				?>
			</table>
		</div>

	</body>
</html>