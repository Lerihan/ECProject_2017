<?php
class Follow extends Controller
{
	function index()
	{
		$aVideo = $this->model('Video');
		$allVideos = $aVideo->findAll();

		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();

		$aSub = $this->model('Subscription');
		$allSubs = $aSub->where('subscriber_id', '=', $_SESSION['userID'])->get();

		$this->view('Following/index', ['videos'=>$allVideos, 'games'=>$allGames, 'subs'=>$allSubs]);
	}

	function subscriptions()
	{
		$aSub = $this->model('Subscription');
		$theSubs = $aSub->where('subscriber_id', '=', $_SESSION['userID'])->get();

		$this->view('Following/index', ['subs'=>$theSubs]);
	}

	function subscribe()
	{
		//TODO: only if not already subscribed
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

	function subscriber()
	{
		$subscriber = $this->model('Subscription');
		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();
		if(isset($_POST['action']) && $_POST['action'] == 'View'){

			$user = $_SESSION['userID'];
			$allSubscribers = $subscriber->where('subscribedto_id', '=', $user)->get();

			$this->view('Following/subscribers', ['games'=>$allGames, 'subs'=>$allSubscribers]);	
		}
	}

	function unsubscribe()
	{
		//TODO: only if already subscribed (maybe interchange buttons)
		$subscription = $this->model('Subscription');
		if(isset($_POST['action']) && $_POST['action'] == 'Unsubscribe')
		{
			$user = $_SESSION['userID'];
			$subbedTo = $_POST['subscribedto_id'];

			$subs = $subscription->where('subscriber_id', '=', $user)->where('subscribedto_id', '=', $subbedTo)->get();

			foreach ($subs as $sub) {
				$sub->delete();
			}	
			
			header("location:/follow");	
		}
	}

	function filter()
	{
		$aVideo = $this->model('Video');
		$game = $_POST['game_id'];
		$allVideos = $aVideo;

		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();

		$aSub = $this->model('Subscription');
		$allSubs = $aSub->where('subscriber_id', '=', $_SESSION['userID'])->get();

		if(isset($_POST['action']) && $_POST['action'] == 'Filter')
		{
			if($game == 'default'){
				$allVideos = $allVideos->findAll();
			}
			else{
				$allVideos = $allVideos->where('game_id', '=', $game)->get();
			}		
		}
		$this->view('Following/index', ['videos'=>$allVideos, 'games'=>$allGames, 'subs'=>$allSubs]);
	}
}
?>