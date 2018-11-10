<?php

namespace App\Repository;
use App\Models\User as UserModel;

class UserRepository
{
	protected $userModel = '';

	public function __construct(UserModel $userModel)
	{
		$this->userModel = $userModel;
	}

	public function model()
	{
		return $this->userModel;
	}

	public function create($data)
	{
		$this->userModel->create();
	}
}