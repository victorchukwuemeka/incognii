@extends('layouts.app')

@section('content')
<div class="bg-gray-900 text-white min-h-screen flex flex-col pt-8 items-center px-4 md:px-0 space-y-8">
    <!-- Profile Header -->
    <div class="flex items-center space-x-6">
        <img class="w-24 h-24 rounded-full border-4 border-gray-700" src="{{ asset('storage/'. $user->image->url )}}" alt="User Avatar">
        <div>
            <h2 class="text-2xl font-semibold">{{ $user->alias }}</h2>
            <p class="text-gray-400">{{ '@' . $user->username }}</p>
            <p class="text-gray-500">Joined {{ $user->created_at->format('F Y') }}</p>
        </div>
    </div>
    <button id="editImageButton"
     class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
     Edit Image
   </button>

   <div id="imageForm" class="mt-4 hidden">
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
      @csrf
      <div>
        <label for="url" class="block text-sm font-medium text-gray-700">Choose Image</label>
       <input type="file" name="url" id="url" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
     </div>
     <input type="hidden" name="imageable_type" value="{{ get_class($user) }}">
     <input type="hidden" name="imageable_id" value="{{ $user->id }}">
     <button type="submit" class="mt-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
       Upload Image
     </button>
   </form>
  </div>

    <!-- Login Token -->
    <div class="w-full max-w-3xl px-6">
        <p class="text-gray-300"><strong>{{ __('Your Login Token:') }}</strong> {{ $user->token }}</p>
    </div>

    <!-- Profile Details -->
    <div class="w-full max-w-3xl px-6 mb-8">
        <h3 class="text-xl font-semibold text-white">About</h3>
        <p class="text-gray-300 mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec mauris vel sapien venenatis aliquet. Duis ac augue arcu. Integer convallis nisl non tellus bibendum, vel tempor turpis cursus.</p>
    </div>

    <!-- Recent Activities -->
    <div class="w-full max-w-3xl pb-8 px-6">
        <h3 class="text-xl font-semibold text-white mb-4">Recent Activities</h3>
        <div class="space-y-4">

            <!-- Display User Answers -->
            @foreach($user->answers as $answer)
            <div class="p-4 bg-gray-800 rounded-md shadow-sm">
                <div class="flex flex-col space-y-2">
                    <p class="text-gray-300"><strong>Answer:</strong> {{ $answer->answer }}</p>
                    @if($answer->question)
                    <p class="text-gray-400"><strong>Question:</strong> "{{ $answer->question->your_question }}"</p>
                    @else
                    <p class="text-red-400">Question not found</p>
                    @endif
                    <span class="text-xs text-gray-500">Answered {{ $answer->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @endforeach

            <!-- Display User Questions -->
            @foreach($user->questions as $question)
            <div class="p-4 bg-gray-800 rounded-md shadow-sm">
                <div class="flex flex-col space-y-2">
                    <p class="text-gray-300"><strong>Question:</strong> {{ $question->your_question }}</p>
                    <span class="text-xs text-gray-500">Asked {{ $question->created_at->diffForHumans() }}</span>

                    <!-- Display Answers to User's Questions -->
                    <div class="mt-2">
                        <h4 class="text-sm font-semibold text-gray-400">Answers:</h4>
                        <div class="space-y-2">
                            @foreach($question->answers as $question_answer)
                            <p class="text-gray-300">{{ $question_answer->answer }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Example of Other Activities -->
            <div class="p-4 bg-gray-800 rounded-md shadow-sm">
                <div class="flex items-center space-x-4">
                    <div>
                        <p class="text-white">Posted a new question</p>
                        <p class="text-gray-400">"What is the best way to learn JavaScript?"</p>
                    </div>
                    <span class="text-xs text-gray-500 ml-auto">1 day ago</span>
                </div>
            </div>
            <div class="p-4 bg-gray-800 rounded-md shadow-sm">
                <div class="flex items-center space-x-4">
                    <div>
                        <p class="text-white">Liked a post</p>
                        <p class="text-gray-400">"Top 10 Tailwind CSS Tips"</p>
                    </div>
                    <span class="text-xs text-gray-500 ml-auto">3 days ago</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   document.getElementById('editImageButton').addEventListener('click', function() {
     var form = document.getElementById('imageForm');
     form.classList.toggle('hidden');
   });
 </script>

@endsection
