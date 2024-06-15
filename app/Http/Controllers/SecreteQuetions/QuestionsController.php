<?php

namespace App\Http\Controllers\SecreteQuetions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SecreteQuetions\Questions;


class QuestionsController extends Controller
{
    
    public function store(Request $request){

      //check if the user is in session
      if (Auth::check()) {

        //validate the data
        $validated = $request->validate([
        'your_question' => 'required|unique:questions',
        ]);

        //store the data in the db
        Questions::create([
          'user_id' => Auth::id(),
          'your_question' => $request->input('your_question'),
        ]);
        return redirect()->route('question');
      }else{

        //if the user is not in session return
        // back to the create token page
        return redirect()->route('create.token');
      }

    }

    public function show($id)
    {
      $question = Questions::findOrFail($id);
      //dd($question->answers);
     //foreach ($question->answers as $answer) {
        //$answer->comments;
      //  foreach ($answer->comments as $comment) {
        // dd($comment->content);
        //}
      //}

      return view('questions.question-page')
       ->with('question', $question);
    }

}
