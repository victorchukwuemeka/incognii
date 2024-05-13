<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExceptionPageController extends Controller
{
    public function answer()
    {
      return  view('pages.answer-exception');
    }
}
