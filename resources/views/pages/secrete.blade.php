@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-lg text-center">
        <h1 class="text-4xl font-bold mb-4 text-gray-800">Exciting Feature Coming Soon!</h1>
        <p class="text-gray-600 mb-8">
          We are working on an amazing new feature that will allow you to share your secrets anonymously. 
          Stay tuned for more updates!
        </p>
        <div class="flex items-center justify-center">
            <svg class="animate-spin h-10 w-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>
        </div>
        <p class="mt-8 text-gray-500">We can't wait to share this with you. Keep an eye on this space for more information!</p>
    </div>
</div>
@endsection
