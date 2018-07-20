<?php

namespace App\Repositories\Users;

interface UsersInterfaces
{
	public function showUsers();
	public function registerUser(array $userData);
}