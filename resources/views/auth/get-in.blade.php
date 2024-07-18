@extends('layouts.app')

@section('content')
<div class="bg-gray-900 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full space-y-8">
        @if(session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('status') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div class="text-center lg:text-left order-2 lg:order-1">
                <h1 class="text-5xl font-bold text-gray-300 mb-6">Put Your Token</h1>
                <p class="text-xl text-gray-400">
                    Use the token you got to access the platform, 
                    and make sure you copy and save the token for future use.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-2xl p-8 order-1 lg:order-2">
                <form action="{{ route('store.detail') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="token" class="block text-sm font-medium text-gray-700">
                            Your Token
                        </label>
                        <input type="text" name="token" id="token" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Enter your token">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm">
                            <a href="#" class="font-medium text-gray-600 hover:text-gray-500">
                                Lost token?
                            </a>
                        </div>
                    </div>
                    <div>
                        <button type="submit" 
                            class="w-full flex justify-center py-2 px-4 border 
                            border-transparent rounded-md shadow-sm text-sm 
                            font-medium text-white bg-gray-600 hover:bg-gray-700 
                            focus:outline-none focus:ring-2 focus:ring-offset-2 
                            focus:ring-gray-500">
                            Submit Token
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection