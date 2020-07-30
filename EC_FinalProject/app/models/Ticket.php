<?php
Class Ticket extends Model{
	public $user_id;
	public $title;
	public $description;

	public function __contruct(){
		parent::__construct();
	}
}