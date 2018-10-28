<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\Repository\UserRepository;

class HomeController extends Controller
{
  public function index()
  {
    return view('home');
  }
}
