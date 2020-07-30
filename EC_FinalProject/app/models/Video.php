<?php
class Video extends Model{
	public $filename;
	public $fileextension;
	public $video_title;
	public $video_description;
	public $game_id;
	public $user_id;

	public function __contruct(){
		parent::__construct();
	}
}