@extends('layouts.app')

@section('content')
<div class="bg-gray-900  text-white min-h-screen flex flex-col justify-center items-center px-4 md:px-0">
    <div class="mb-8 text-center">
        <a href="{{ route('asking') }}"
         class="text-xl font-bold text-blue-400 hover:text-blue-200">
         {{ __('Ask a Question') }}
       </a>
    </div>

      <div class="max-w-lg w-full">
          @foreach($questions as $question)
          <a href="{{ url('/question/page/'.$question->id) }}">
            <div class="bg-gray-800 rounded-md p-4 mb-4">
              <p class="text-lg">{{ $question->your_question }}</p>
            </div>
          </a>
          @endforeach
      </div>
    </a>

</div>
@endsection
