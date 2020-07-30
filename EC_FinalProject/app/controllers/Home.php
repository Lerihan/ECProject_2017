<?php
class Home extends Controller
{

	function index()
	{
		$aVideo = $this->model('Video');
		$allVideos = $aVideo->findAll();

		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();

		$aSub = $this->model('Subscription');
		$allSubs = $aSub->where('subscriber_id', '=', $_SESSION['userID'])->get();

		$this->view('Home/index', ['videos'=>$allVideos, 'games'=>$allGames, 'user'=>""]);
	}

	function search(){
		if(isset($_POST['action']) && $_POST['action'] == 'Search')
		{
			$searchTerm = $_POST['q'];
			$optionValue = $_POST['select_catalog'];

			$aVideo = $this->model('Video');
			$aUser = $this->model('User');
			$aGame = $this->model('Game');
			$allGames = $aGame->findAll();
			$aSub = $this->model('Subscription');
			$allSubs = $aSub->where('subscriber_id', '=', $_SESSION['userID'])->get();

			if($optionValue == 'video_title'){
				$theVideos = $aVideo->where('video_title', 'LIKE', '%'.$searchTerm.'%')->get();
			}
			elseif($optionValue == 'Users'){

				$theUsers = $aUser->where('username', 'LIKE', '%'.$searchTerm.'%')->get();
				if(!empty($theUsers)){
					$theVideos = $aVideo->where('user_id', '=', $theUsers[0]->ID)->get();
				}
				else
					$theVideos = $aVideo->findAll();
				
			}
			else
			{
				$theVideos = $aVideo->where('video_title', 'LIKE', '%'.$searchTerm.'%')->where('game_id', '=', $optionValue)->get();
			}
			
			if(!empty($theUsers)){
				$this->view('/Home/index',['videos'=>$theVideos, 'games'=>$allGames, 'user'=>$theUsers]);
			}
			else
				$this->view('/Home/index',['videos'=>$theVideos, 'games'=>$allGames]);
		}


	}

	function tickets()
	{
		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();

		$aTicket = $this->model('Ticket');
		if(isset($_POST['action']) && $_POST['action'] == 'Submit')
		{
			$user = $_SESSION['userID'];
			$title = $_POST['title'];
			$description = $_POST['description'];

			$aTicket->user_id = $user;
			$aTicket->title = $title;
			$aTicket->description = $description;
			$aTicket->insert();
		}

		$this->view('/Home/tickets', ['games'=>$allGames]);
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
		$this->view('Home/index', ['videos'=>$allVideos, 'games'=>$allGames]);
	}

	function faq()
	{
		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();
		$this->view('Home/faqs', ['games'=>$allGames]);
	}
}
?>