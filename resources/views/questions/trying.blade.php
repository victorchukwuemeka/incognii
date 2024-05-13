@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white min-h-screen flex flex-col justify-center items-center px-4">
    <div class="max-w-lg w-full bg-gray-800 rounded-md p-4 mb-4">
        <p class="text-lg">{{ $question->your_question }} oododo</p>
    </div>
    <div class="max-w-lg h-full w-full bg-gray-800 rounded-md p-4 mb-4">

            <button id="showAnswerForm" class="bg-blue-500 hover:bg-blue-700
            text-white font-bold py-2 px-4 rounded">Answer</button>
            <form id="answerForm" method="POST" action="{{ route('answer.store') }}"
            class="hidden w-full mt-4">
                @csrf
                <input type="hidden" name="question_id" value="{{ $question->id }}">
                <textarea name="answer" id="answer" class="w-full bg-gray-700 rounded-md p-2 text-white"
                placeholder="Your answer..." required></textarea>
                <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold
                py-2 px-4 rounded">
                Submit Answer</button>
            </form>
            @foreach($question->answers as $answer)
            <div class="border border-gray-300 bg-white shadow-md rounded-lg p-6 mt-4">
              <p class="text-gray-800">{{ $answer->answer }}</p>

              <!-- Button to toggle comment form -->
              <button
              class="mt-4 px-4 py-2 bg-blue-500 text-white
              rounded-lg toggle-comment-form" data-target="comment-form-{{ $answer->id }}">
                Comment
              </button>

              <!-- Comments section -->
              <div id="comment-form-{{ $answer->id }}" class="hidden mt-4">
                @foreach($answer->comments as $comment)
                <div class="bg-gray-100 p-4 rounded-lg mb-2">
                  <p class="text-gray-800">

                    {{ $comment->content }}

                    <!-- Button to toggle reply form -->
                    <!--<button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg toggle-reply-form"
                         data-target="reply-form-{{ $comment->id }}">
                      Reply
                    </button>-->

                    <!-- Reply form -->
                    <div id="reply-form-{{ $comment->id }}" class=" mt-2">
                      <form action="{{ route('comments.reply', ['comment' => $comment->id]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <textarea name="content" class="w-full mt-2 p-2 bg-gray-700 border
                        border-gray-300 rounded-lg"
                        placeholder="Add a reply"></textarea>
                        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500
                        text-white rounded-lg">
                          Post Reply
                        </button>
                      </form>
                    </div>
                  </p>
                  @foreach($comment->replies as $reply)
                  <div class="bg-gray-200 p-2 mt-2 rounded-lg">
                    <p class="text-gray-800">Replyggg: {{ $reply->content }}</p>


                    <div id="reply-form-{{ $reply->id }}" class=" mt-2">
                      <form action="{{ route('comments.reply', ['comment' => $reply->id]) }}"
                         method="post">
                        @csrf
                        <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                        <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                        <textarea name="content" class="w-full mt-2 p-2 bg-gray-700 border
                        border-gray-300 rounded-lg"
                        placeholder="Add a reply"></textarea>
                        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg">
                          Post Reply
                        </button>
                      </form>
                    </div>

                  </div>

                  @endforeach
                </div>

                @endforeach

                <!-- Form to add new comment -->
                <form action="{{ route('comments.store') }}" method="post">
                  @csrf
                  <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                  <input type="hidden" name="parent_id" value="">
                  <textarea name="content" class="w-full mt-2 p-2 bg-gray-700 border border-gray-300
                   rounded-lg"
                   placeholder="Add a comment"></textarea>
                  <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Post Comment
                  </button>
                </form>
              </div>
            </div>
            @endforeach


    </div>

</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('showAnswerForm').addEventListener('click', function () {
            document.getElementById('answerForm').classList.toggle('hidden');
        });

        const toggleButtons = document.querySelectorAll('.toggle-comment-form');

        toggleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const formId = this.getAttribute('data-target');
                const form = document.getElementById(formId);
                form.classList.toggle('hidden');
            });
        });
    });

</script>
@endsection
