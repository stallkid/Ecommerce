<?php

namespace codecommerce\Http\Controllers;

use Illuminate\Http\Request;

use codecommerce\Http\Requests;
use codecommerce\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
      return view('categories.index');
    }
}
