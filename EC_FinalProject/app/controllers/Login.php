<?php
class Login extends Controller
{
	public function index()
	{
		$user = $this->model('User');
		if(isset($_POST['action']) && $_POST['action'] == 'Login'){
			$username = $_POST['username'];
			$password = $_POST['password'];
			LoginCore::login($username, $password);
			header('location:/Home');
		}else
			$this->view('Login/index');
	}

	public function Signup()
	{
		$user = $this->model('User');
		if(isset($_POST['action']) && $_POST['action'] == 'Signup'){
			$user->first_name = $_POST['first_name'];
			$user->last_name = $_POST['last_name'];
			$user->username = $_POST['username'];
			$user->password = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$user->email_address = $_POST['email_address'];
			$user->insert();
			
			header('location:/Login');
		}else if(isset($_POST['action']) && $_POST['action'] == 'Cancel')
		{
			header('location:/Login');
		}
		else
			$this->view('Login/signup');
	}

	public function doLogout(){
		LoginCore::logout();
		header('location:/Login');
	}
}