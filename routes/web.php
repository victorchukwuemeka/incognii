<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ExceptionPageController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SecreteQuetions\QuestionsController;
use App\Http\Controllers\SecreteQuetions\AnswersController;
use App\Http\Controllers\SecreteQuetions\CommentsController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\ImagesController;



Route::get('/victor', function(){
  return view('questions.test');
});


///
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/question', [PageController::class, 'question'])
->name('question');
Route::get('/secrete',[PageController::class, 'secrete'])
->name('secrete');


//this route deals with the question asking
Route::post('/store/questions',[QuestionsController::class, 'store'])
  ->name('questions.store');
Route::get('/question/page/{id}', [QuestionsController::class, 'show'])
->name('question.page');


//this route deals with answering them
Route::post('/store/answer', [AnswersController::class, 'store'])
->name('answer.store');

//this route deals with the
Route::post('/store/comment',[CommentsController::class, 'store'])
 ->name('comments.store');
Route::post('/comments/{comment}/reply', [CommentsController::class,'reply'])
 ->name('comments.reply');

//the route for the profile
Route::get('profile/{id}',[ProfileController::class,'show'])
  ->name('profile');

//exception pages
Route::get('exception-answer',[ExceptionPageController::class, 'answer'])
->name('answer.error');

//route for all the image related stuff
Route::post('store/image',[ImagesController::class, 'store'])->name('images.store');
