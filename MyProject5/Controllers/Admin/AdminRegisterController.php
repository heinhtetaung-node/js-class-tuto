<?php

namespace Controllers\Admin;

use Controllers\BaseController;
use Models\MemberModel;
use Sysgem\Session;
use Helper\Validation;

class AdminRegisterController extends BaseController
{
	private $memberModel;

	public function __construct()
	{
		$this->memberModel = new MemberModel();
	}

	public function login()
	{
		$this->renderBlade('admin.login');
	}

	public function register()
	{
		$this->renderBlade('admin.register');
	}


	public function regInsert()
	{
		$name = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		$data = [
			'username' => $_POST['username'],
			'email' => $_POST['email'],
			'password' => $_POST['password'],
			'confirm_password' => $_POST['confirm_password']
		];

		$rules = [
			'username' => 'minlength=5',
			'email' => 'minlength=5',
			'password' => 'minlength=5',
			'confirm_password' => 'minlength=5'
		];

		$validate = new Validation($rules, $data);

		if ($validate->hasError()) {
			Session::flash('errors', $validate->getError());
			header('location: ' . $this->baseurl . '/admin/register');
			exit;
		}

		if ($password === $confirm_password) {
			$result = $this->memberModel->insert($name, $email, $password);

			if ($result === true) {
				Session::flash('register_success', 'Register Successfull. How do you do, Admin.');
				header('location: ' . $this->baseurl . '/admin/login');
			}else {
				Session::flash('email_exist', 'Email already in use');
				header('location: ' . $this->baseurl . '/admin/register');
			}	
		}else {
			Session::flash("error_message", "Password do not match. Please check your password.");
			header('location: ' . $this->baseurl . '/admin/register');
		}
	}

	public function loginMember()
	{
		 
		$data = [
			'email' => $_POST['email'],
			'password' => $_POST['password']
		];

		$rules = [
			'email' => 'required',
			'password' => 'required'
		];

		$validate = new Validation($rules, $data);

		if ($validate->hasError()) {
			Session::flash('errors', $validate->getError());
			header('location: ' . $this->baseurl . '/admin/login');
			exit;
		}

		$obj = $this->memberModel->getUserEmail($data['email']);
		$rowUser = json_decode(json_encode($obj));

		if ($rowUser) {
			$hash_pass = $rowUser->password;
			$hash_user_pass = $this->memberModel->encodePass($data['password']);
			if ($hash_user_pass == $hash_pass) {
				Session::add("user_id", $rowUser->id);
				Session::add("user_name", $rowUser->name);
				header('location: ' . $this->baseurl . '/admin/index');
			}else {
				Session::flash("password_fail", "Wrong password. Please check your password.");
				header('location: ' . $this->baseurl . '/admin/login');
			}
		}else {
			Session::flash("error_message", "Email fail. Please check your email.");
			header('location: ' . $this->baseurl . '/admin/login');
		}

	}

	public function logout()
	{
		Session::remove('user_id');
		Session::remove('user_name');
		header('location: ' . $this->baseurl . '/admin/login');
	}
}