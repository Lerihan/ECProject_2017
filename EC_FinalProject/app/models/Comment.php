<?php
Class Comment extends Model{
	public $video_id;
	public $commentor_id;
	public $comment_message;

	public function __contruct(){
		parent::__construct();
	}
}