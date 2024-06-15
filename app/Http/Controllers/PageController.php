<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecreteQuetions\Questions;

class PageController extends Controller
{
    public function home()
    {
      return view('pages.index');
    }

    public function question()
    {
      $questions = Questions::orderBy('created_at', 'desc')->get();
      return view('pages.question')
       ->with('questions', $questions);
    }

    public function secrete()
    {
      return view('pages.secrete');
    }
}
