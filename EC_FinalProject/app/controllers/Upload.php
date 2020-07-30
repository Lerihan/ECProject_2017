<?php
class Upload extends Controller
{
	public function add()
	{
		$video = $this->model('Video');

		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();

		if(isset($_POST['upload']) && $_POST['upload'] == 'Upload')
		{
			$name= $_FILES['file']['name'];
			$tmp_name= $_FILES['file']['tmp_name'];
			$position= strpos($name, "."); 
			$fileextension= substr($name, $position + 1);
			$fileextension= strtolower($fileextension);
			echo $_POST['game_id'];
			$video->filename = $name;
			$video->fileextension = $fileextension;
			$video->video_title = $_POST['video_title'];
			$video->video_description = $_POST['video_description'];
			$video->game_id = $_POST['game_id'];
			$video->user_id = $_SESSION['userID'];

			if (isset($name)) {				
				$path= 'videos/';
				if (!empty($name)){
					if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
					{
						print ("The file extension must be .mp4, .ogg, or .webm in order to be uploaded");
					}

					else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
					{

						if (move_uploaded_file($tmp_name, $path.$name)) {
							echo "here";
							$video->insert();
							print ("Uploaded!");
							header('location:/Home');
						}
						else
						{
							print ("Video not uploaded :(");
						}
					}
				}
			}
		}
		else 
			$this->view('Upload/add', ['games'=>$allGames]);
	}

	function watch($id){
		$aVideo = $this->model('Video');
		$aVideo = $aVideo->find($id);
		$theUser = $this->model('User');
		$theUser = $theUser->find($aVideo->user_id);
		$theComments = $this->model('Comment');
		$theComments = $theComments->where('video_id', '=', $aVideo->ID)->get();
		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();
		$this->view('/Upload/watch',['videos'=>$aVideo, 'user'=>$theUser, 'comments'=>$theComments, 'games'=>$allGames]);

	}

	function edit($id)
	{
		$aVideo = $this->model('Video');
		$aVideo = $aVideo->find($id);
		$aGame = $this->model('Game');
		$allGames = $aGame->findAll();
		$id = $aVideo->user_id;
		if(isset($_POST['action']) && $_POST['action'] == 'Edit'){
			$aVideo->video_title = $_POST['video_title'];
			$aVideo->video_description = $_POST['video_description'];
			$aVideo->game_id = $_POST['game_id'];
			$aVideo->update();
			
			header("location:/Profile/$id");
		}
		elseif(isset($_POST['action']) && $_POST['action'] == 'Cancel'){
			header("location:/Profile/$id");
		}
		else
			$this->view('/Upload/edit', ['video'=>$aVideo, 'games'=>$allGames]);
	}
}