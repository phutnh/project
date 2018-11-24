<?php

namespace DHPT\Http\Controllers;
use Illuminate\Http\Request;
use DHPT\Repository\UserRepository;

class HomeController extends Controller
{
  public function index()
  {
    $this->authorize('view');
    addLogs('Acess table');
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

  public function test()
  {
    $this->authorize('delete');
    echo " funcction test";
  }

  public function table()
  {
    $this->authorize('view');
    addLogs('Acess table');
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
}
