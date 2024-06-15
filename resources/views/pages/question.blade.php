@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white min-h-screen flex flex-col pt-8 justify-center items-center px-4 md:px-0">
    <div class="mb-12 text-center">
        <p class="text-3xl md:text-5xl font-bold text-gray-400 mb-4">{{ __('What is your question?') }}</p>
        <div class="max-w-xl mx-auto">
          <form class="" action="{{ route('questions.store')}}" method="post">
              @csrf
            <div class="bg-white rounded-lg shadow-md p-4">
                <textarea id="your_question" placeholder="Ask your question..." name="your_question"
                rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg
                focus:outline-none @error('your_question') focus:ring-2 focus:ring-gray-500 @enderror focus:border-transparent
                 text-gray-800 resize-none"></textarea>

                 @error('your_question')
                     <p class="text-red-500 text-xs italic">{{ $message }}</p>
                 @enderror
                <button class="mt-4 w-full px-4 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-75">
                    Ask
                </button>
            </div>
          </form>
        </div>
    </div>

    <div class="max-w-lg w-full mt-8">
        @foreach($questions as $question)
        <a href="{{ url('/question/page/'.$question->id) }}">
            <div class="bg-gray-800 rounded-md p-4 mb-4 hover:bg-gray-700 transition duration-300">
                <p class="text-lg font-medium">Q : {{ $question->your_question }} ?</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
