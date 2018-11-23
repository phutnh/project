<?php

namespace App\Repository;
use App\Models\User as UserModel;
use Datatables;

class UserRepository
{
	protected $userModel = '';

	public function __construct(UserModel $userModel)
	{
		$this->userModel = $userModel;
	}

	public function create($data)
	{
		$this->userModel->create();
	}

	public function getDataTable()
	{
		
	}
}