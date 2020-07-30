<?php
class Profile extends Controller
{

	function index($id)
	{
		$aUser = $this->model('User');
		$aUser = $aUser->find($id);
		$aVideo = $this->model('Video');
		$theVideos =  $aVideo->where('user_id', '=', $aUser->ID)->get();
		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();
		$this->view('/Profile/index',['user'=>$aUser, 'videos'=>$theVideos, 'games'=>$allGames]);
	}

	function subscribe()
	{
		$subscription = $this->model('Subscription');
		if(isset($_POST['action']) && $_POST['action'] == 'Subscribe'){

			$user = $_SESSION['userID'];
			$subTo = $_POST['subscribedto_id'];

			$subscription->subscriber_id = $user;
			$subscription->subscribedto_id = $subTo;
			$subscription->insert();

			header("location:/profile/$subTo");	
		}
	}

	function edit($id)
	{
		$aUser = $this->model('User');
		$theUser = $aUser->find($id);
		if(isset($_POST['action']) && $_POST['action'] == 'Submit'){
			$theUser->first_name = $_POST['first_name'];
			$theUser->last_name = $_POST['last_name'];
			$theUser->email_address = $_POST['email_address'];
			$theUser->update();
			
			header("location:/Profile/$id");
		}
		else
			$this->view('/Profile/edit',['user'=>$theUser]);
	}


//move this to upload ??
	function delete($id)
	{
		$aVideo = $this->model('Video');
		$aComment = $this->model('Comment');
		if(isset($_POST['action']) && $_POST['action'] == 'Delete'){
			$theComments = $aComment->where('video_id', '=', $id)->get();
			foreach ($theComments as $comment) {
				$comment->delete();
			}	
			$theVideo = $aVideo->find($id);
			$theVideo->delete();

			$user = $_SESSION['userID'];
			header("location:/Profile/$user");

		}
	}

	function changePass($id)
	{
		$user = $this->model('User');
		$user = $user->find($id);
		$password = $user->password;
		if(isset($_POST['action']) && $_POST['action'] == 'Sumbit'){
			$currPass = $_POST['currPassword'];
			$newPass = password_hash($_POST['newPassword'],PASSWORD_DEFAULT);
			if(password_verify($currPass, $password))
			{
				$user->password = $newPass;
				$user->update();

				header("location:/Profile/$id");
			}
			else{
				$this->view('Profile/changePass');
			}
		}
		elseif(isset($_POST['action']) && $_POST['action'] == 'Back'){
			echo "hiyaaa";
			header("location:/Profile/$id");
		}
		else
			$this->view('Profile/changePass');
	}
}
?>