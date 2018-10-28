<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Repository\UserRepository;

class _template extends Controller
{
	protected $userRepository = '';

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

  public function index()
  {
  	dd($this->userRepository->query->toSql());
    return view('home');
  }
}
