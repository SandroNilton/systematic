<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
  public function index(): View
  {
    return view('admin.users.index', []);
  }

  public function create(): View
  {
    return view('admin.users.create', []);
  }
}
