<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SecreteQuetions\Answers;
use App\Models\SecreteQuetions\Questions;


class ProfileController extends Controller
{
    public function show($id)
    {
      //dd($id);
    /*$user = User::findOrFail($id);

      $questions = $user->questions;
      foreach ($questions as $q) {
        $qid = $q->user_id;
      }
      $user = Questions::findOrFail($qid)->user;
      $ansrs = Questions::findOrFail($qid)->answers;
      foreach ($ansrs as $ans) {
        dd($ans->question);
      }*/
      //d($user->questions);
      //dd($user->questions);
      //dd($user->questions);
      //$question_id = Answers::find(1)->questions_id;
      //dd($question_id);
      //$answers = Questions::find($question_id)->answers;
      //dd($answers);
      $user = User::with('answers.question')->find($id);
      //foreach ($user->answers  as $answer) {
        //dd($answer);
      //}
      //dd($user);
      return view('profile.show-profile',compact('user'));
    }
}
