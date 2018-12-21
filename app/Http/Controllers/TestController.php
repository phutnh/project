<?php

namespace DHPT\Http\Controllers;
use Illuminate\Http\Request;
use DHPT\Repository\UserRepository;
use Auth;

class TestController extends Controller
{
	private $userRepo = '';

	function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}

  public function index()
  {
    $template['pageHeader'] = 'Quản lý';
    $template['pageDesc'] = 'Trang chủ';
    $template['breadcrumbs'] = [
      [
        'name' => 'Quản lý',
        'link' => '',
        'active' => false
      ],
      [
        'name' => 'Trang chủ',
        'link' => '',
        'active' => true
      ],
    ];
    return view('home', compact('template'));
  }

  public function one()
  {
    // $this->authorize('delete'); 
    echo " funcction test one";
  }

  public function many()
  {
    // $this->authorize('delete'); 
    echo " funcction test many";
  }

  public function table()
  {
    $this->authorize('view');
    $template['pageHeader'] = 'Quản lý';
    $template['pageDesc'] = 'Trang chủ';
    $template['breadcrumbs'] = [
      [
        'name' => 'Quản lý',
        'link' => '',
        'active' => false
      ],
      [
        'name' => 'Trang chủ',
        'link' => '',
        'active' => true
      ],
    ];

    return view('table', compact('template'));
  }

  public function form()
  {
    $this->authorize('view');
    $template['pageHeader'] = 'Quản lý';
    $template['pageDesc'] = 'Trang chủ';
    $template['breadcrumbs'] = [
      [
        'name' => 'Quản lý',
        'link' => '',
        'active' => false
      ],
      [
        'name' => 'Trang chủ',
        'link' => '',
        'active' => true
      ],
    ];

    return view('form', compact('template'));
  }

  public function ajax()
  {
  	return $this->userRepo->get();
  }
}
