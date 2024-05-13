@extends('layouts.app')

@section('content')
<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="max-w-md mx-auto lg:mx-0 lg:ml-6 bg-white rounded-lg shadow-md p-6">
      <h1 class="text-3xl font-bold mb-4">Create Your Incognii Name!</h1>
      <p class="text-gray-700 mb-6">
        You can only join by picking a false name. Then, a token will be given to you. The token generated is what you will use to log in every time, so make sure you copy and save it.
      </p>
      <form action="{{ route('store.token') }}" method="POST">
        @csrf

        <div class="mb-4">
          <label for="alias" class="block text-sm font-medium text-gray-700">Your Secret Name</label>
          <input type="text" name="alias" id="alias" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div>
          <button type="submit" class="btn bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create Token</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
