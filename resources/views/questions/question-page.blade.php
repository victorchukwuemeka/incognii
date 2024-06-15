@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white min-h-screen flex flex-col justify-center items-center py-8">
    <!-- Container for the question and form -->
    <div class="max-w-3xl w-full bg-gray-800 rounded-lg shadow-md p-6">
        <!-- Question Section -->
        <div class="p-4 bg-gray-100 rounded-md mb-6">
            <div class="flex items-start space-x-4">
              @if(optional($question->user->image)->url)
                  <img class="w-10 h-10 rounded-full" src="{{ asset('storage/'.$question->user->image->url )}}" alt="User Avatar">
              @else
                  <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User Avatar">
              @endif
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h3 class="text-sm text-gray-600 font-semibold">{{ $question->user->alias }}</h3>
                        <span class="text-xs text-gray-500">
                          {{ $question->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <p class="mt-2 text-gray-700">Q: {{ $question->your_question }}?</p>
                    <div class="mt-2 flex space-x-4 text-sm text-gray-500 items-center">
                        <button class="hover:underline focus:outline-none">Upvote</button>
                        <button class="hover:underline focus:outline-none">Share</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inline Answer Form for the Question -->
        <form id="answerForm" class="flex flex-col space-y-4" method="POST" action="{{ route('answer.store') }}">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <textarea id="question-reply" name="answer" placeholder="Add an answer"
                      class="p-2 w-full shadow-sm sm:text-sm border
                      border-gray-900 rounded-md focus:ring-gray-500 text-gray-600 focus:border-gray-500 transition-all resize-none"></textarea>
            <button type="submit" class="self-end px-4 py-2 bg-gray-600 border border-transparent rounded-md text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Post</button>
        </form>
        <h2 class="text-5xl font-semibold text-gray-100  mb-4">Answers</h2>
      <div class="max-w-3xl w-full  mt-6 space-y-1">
      @foreach($question->answers as $answer)
      <div class="p-4 m-0 bg-gray-50 rounded-md shadow-sm">
          <div class="flex items-start space-x-2">
              <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/40" alt="User Avatar">
              <div class="flex-1">
                  <div class="flex justify-between items-center">
                      <h3 class="text-sm font-semibold text-gray-700">{{ $answer->user->alias }}</h3>
                      <span class="text-xs text-gray-500">30 minutes ago</span>
                  </div>
                  <p class="mt-2 text-gray-700">A: {{ $answer->answer }}</p>
                  <div class="mt-2 flex space-x-4 text-sm text-gray-500 items-center">
                        <button class="hover:underline focus:outline-none">Reply</button>
                        <button class="hover:underline focus:outline-none">Like</button>
                    </div>
                    <!-- Inline Comment Form -->
                    <form class="mt-2 flex space-x-2" method="POST" action="{{ url('comment.store') }}">
                        @csrf
                        <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                        <input type="text" name="comment" placeholder="Add a reply" class="flex-grow p-2 shadow-sm sm:text-sm border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                        <button type="submit" class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Post</button>
                    </form>
              </div>
          </div>
      </div>
      @endforeach
    </div>
    </div>
</div>
@endsection
