<?php

namespace DHPT\Http\Controllers;
use Illuminate\Http\Request;
use DHPT\Models\User as UserModel;

class _template extends Controller
{
	protected $userModel = '';

  public function __construct(UserModel $userModel)
  {
    $this->userRepository = $userRepository;
  }

  public function index()
  {
  	dd($this->userModel->toSql());
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
