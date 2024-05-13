<?php

namespace App\Http\Controllers\SecreteQuetions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SecreteQuetions\Comments;
use App\Models\SecreteQuetions\Questions;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    public function store(Request $request)
    {
      // dd($request->input('answer_id'));
      Comments::create([
        'user_id' => Auth::id(),
        'answers_id' => $request->input('answer_id'),
        'parent_id' => $request->input('parent_id'),
        'content' => $request->input('content'),
      ]);
      //$answer_id = $request->input('answer_id');
      //dd($answer_id);
      //$question_id = Questions::find($answer_id)->id;
      //dd($question_id);
      return redirect()->back();
      //->route('question.page',$question_id);

    }

    public function reply(Request $request, $comment_id)
    {

      $parentComment = Comments::find($comment_id);
      //dd($request);
      $reply = new Comments();
      $reply->user_id = Auth::id();
      $reply->parent_id = $parentComment->id;
      $reply->answers_id = $request->input('answer_id');
      $reply->content = $request->input('content');
      $reply->save();

      return redirect()->back();
    }

    /*public function show($id)
    {
    } */



}
