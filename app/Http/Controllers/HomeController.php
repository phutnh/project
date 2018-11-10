<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\UserRepository;

class HomeController extends Controller
{
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

    return view('table', compact('template'));
  }
}
