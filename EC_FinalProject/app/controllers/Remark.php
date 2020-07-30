<?php
class Remark extends Controller
{
	function add()
	{
		$comment = $this->model('Comment');
		if(isset($_POST['action']) && $_POST['action'] == 'Submit'){
			$video = $_POST['video_id'];
			$comment->video_id = $video;
			$comment->comment_message = $_POST['comment_message'];
			$comment->commentor_id = $_SESSION['userID'];
			$comment->insert();

			header("location:/Upload/watch/$video");			
		}
	}

	function edit($id)
	{
		$aComment = $this->model('Comment');
		$theComment = $aComment->find($id);
		$video = $theComment->video_id;
		if(isset($_POST['action']) && $_POST['action'] == 'Submit')
		{
			$theComment->comment_message = $_POST['comment_message'];

			$theComment->update();
			header("location:/Upload/watch/$video");	
		}
		elseif(isset($_POST['action']) && $_POST['action'] == 'Cancel'){
			header("location:/Upload/watch/$video");
		}
		else
			$this->view('/Upload/commentEdit',['comment'=>$theComment]);
	}

	function delete($id)
	{
		$comment = $this->model('Comment');
		if(isset($_POST['action']) && $_POST['action'] == 'Delete')
		{
			$user = $_SESSION['userID'];
			$commentor = $_POST['commentor_id'];
			
			if($user == $commentor)
			{
				$comment = $comment->find($id);
				$comment->delete();
			}

			$video = $_POST['video_id'];
			header("location:/upload/watch/$video");	
		}
	}
}