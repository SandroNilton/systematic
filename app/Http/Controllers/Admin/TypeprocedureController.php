<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TypeprocedureController extends Controller
{
  public function index(): View
  {
    return view('admin.typeprocedures.index', []);
  }
}
