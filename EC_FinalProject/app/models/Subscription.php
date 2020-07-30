<?php
Class Subscription extends Model{
	public $subscriber_id;
	public $subscribedto_id;

	public function __contruct(){
		parent::__construct();
	}
}