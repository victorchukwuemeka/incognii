@extends('layouts.app')

@section('content')
<div class="bg-base-200 text-white min-h-screen flex flex-col justify-center items-center px-4">
    <div class="max-w-lg w-full bg-gray-800 rounded-md p-4 mb-4">
        <p class="text-lg">the question: {{ $question->your_question }}</p>
    </div>
    <div class="max-w-lg h-full w-full bg-gray-800 rounded-md p-4 mb-4">
        <button id="showAnswerForm"
        class="btn rounded-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 ">
            <i class="fa-regular fa-comment"></i>
        </button>


        <!--<input type="text" placeholder="Write here..." name="text"
        class="px-4 py-2 rounded-lg focus:outline-none focus:ring-2
        focus:ring-gray-300 border-2 border-transparent bg-gray-200
        transition duration-300 ease-in-out focus:bg-gray-200">-->

        <form id="answerForm" method="POST" action="{{ route('answer.store') }}"
        class="hidden w-full mt-4">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <textarea name="answer" id="answer"
            class="w-full bg-gray-200 focus:outline-none border-transparent
            rounded-lg px-4 py-2 text-gray-600"
            placeholder="Your answer..." required></textarea>
            <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              Submit Answer
            </button>
        </form>
        @foreach($question->answers as $answer)
        <div class="border border-gray-300 bg-white shadow-md rounded-lg p-6 mt-4">
            <p class="text-gray-800">the answers :{{ $answer->answer }}</p>
            <form class="" action="{{ route('comments.store') }}" method="post">
              @csrf
              <input type="hidden" name="answer_id" value="{{ $answer->id }}">
              <input type="hidden" name="parent_id" value="">
              <textarea name="content" id="comment"
              class="w-full bg-gray-200 focus:outline-none border-transparent
              rounded-lg px-4 py-2 text-gray-600"
              placeholder="Your comment..." required></textarea>
              <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700
              text-white font-bold py-2 px-4 rounded">
                Submit Commentoooo
              </button>
            </form>


            <!--<button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg "
             data-target="comment-form-{{ $answer->id }}">Comment</button>-->

            <!--<div id="comment-form-{{ $answer->id }}" class="mt-4">
            </div>-->
              {{-- @include('questions.partials.comment',
              ['comments' => $answer->comments, 'answerId' => $answer->id]) --}}

              {{-- @include('questions.partials.comment_section',
             ['comments' => $answer->comments, 'answerId' => $answer->id])--}}
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
