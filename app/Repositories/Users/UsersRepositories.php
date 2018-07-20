<?php

namespace App\Repositories\Users;

use App\User;

class UsersRepositories implements UsersInterfaces
{
	protected $user;

	public function __construct (User $user)
	{
		$this->user = $user;
	}

	public function showUsers()
	{
		return $this->user->all();
	}

	public function registerUser(array $userData)
	{
		return $this->user->create($userData);
	}
}