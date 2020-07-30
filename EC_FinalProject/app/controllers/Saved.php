<?php
class Saved extends Controller
{
	function index()
	{
		$aVideo = $this->model('Video');
		$allVideos = $aVideo->findAll();
		$aBookmark = $this->model('Bookmark');
		$theBookmarks = $aBookmark->where('user_id', '=', $_SESSION['userID'])->get();
		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();

		$this->view('Saved/index', ['videos'=>$allVideos, 'bookmarks'=>$theBookmarks, 'games'=>$allGames]);
	}

	function add($id)
	{
		$bookmark = $this->model('Bookmark');
		if(isset($_POST['action']) && $_POST['action'] == 'Bookmark'){
			$bookmark->video_id = $id;
			$bookmark->user_id = $_SESSION['userID'];
			$bookmark->insert();

			header("location:/Upload/watch/$id");
		}

	}

	function delete($id)
	{
		$aBookmark = $this->model('Bookmark');
		if(isset($_POST['action']) && $_POST['action'] == 'Delete'){
			echo "here here";
			$theBookmark = $aBookmark->find($id);
			$theBookmark->delete();

			header("location:/Saved");

		}
	}
}
?>