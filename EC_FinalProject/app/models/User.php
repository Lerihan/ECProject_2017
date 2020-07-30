<?php

class User extends Model
{
	public $first_name;
	public $last_name;
	public $username;
	public $password;
	public $email_address;
	
	public function __construct(){
		parent::__construct();
	}



}

?>