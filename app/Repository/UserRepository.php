<?php

namespace DHPT\Repository;
use DHPT\Models\User as UserModel;
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

	public function get()
	{
		return Datatables::of($this->userModel->get())->make(true);
	}
}