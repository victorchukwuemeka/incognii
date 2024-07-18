@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="bg-white rounded-lg shadow-2xl p-8">
                <h2 class="text-3xl font-extrabold text-gray-500 mb-6 text-center">
                    Create Your Incognii Name
                </h2>
                <form action="{{ route('store.token') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="alias" class="block text-sm font-medium text-gray-700">
                            Your Secret Name
                        </label>
                        <input type="text" name="alias" id="alias"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Enter your secret name">
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 
                        border border-transparent rounded-md shadow-sm text-sm font-medium text-white 
                        bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 
                        focus:ring-gray-500">
                            Create Token
                        </button>
                    </div>
                </form>
            </div>
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold text-white mb-6">Create Your Incognii Name!</h1>
                <p class="text-xl text-gray-300">
                    {{ __('You can only join by picking a false name, then a token will be given to you.
                         The token generated is what you will use to log in every time, so make sure you copy and save it.') }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection