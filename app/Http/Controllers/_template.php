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
  	$template['title'] = 'Test title';
  	$template['title-breadcrumb'] = 'Test title';
  	$template['breadcrumbs'] = [
  		[
  			'name' => 'Library',
  			'link' => 'link',
  			'active' => true
  		],
  	];
    
  	return view('back.index', compact('template'));
    return view('home');
  }
}
