<?php

namespace App\Http\Controllers\SecreteQuetions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SecreteQuetions\Answers;
use Illuminate\Support\Facades\Auth;


class AnswersController extends Controller
{
    public function store(Request $request)
    {

      $request->validate([
        'question_id' => ['required', 'exists:questions,id'],
        'answer' => ['required', 'string', 'max:255'],
      ]);

      try {
        if (Auth::check()) {
          //dd($request->input('answer'));
          Answers::create([
            'user_id' => Auth::id(),
            'questions_id' => $request->input('question_id'),
            'answer' => $request->input('answer'),
          ]);
          //dd($request);
          return redirect()
              ->route('question.page',$request->input('question_id'))
              ->with('success', 'your answer has been submitted');
        }else {
          return redirect()->route('getting')
          ->with('failed', 'you need to login to summit answer');
        }
      } catch (\Exception $e) {

        return redirect()->route('answer.error')
        ->with(
          'error',
          'something went wrong
           while submitting the answer'
         );
      }
    }

    public function show($id)
    {
      $answer = Answers::findOrFail($id);
    }
}
