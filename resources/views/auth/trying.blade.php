@extends('layouts.app')

@section('content')

<div class=" bg-gray-900  min-h-screen bg-base-200 flex items-center justify-center">
    <div class="flex-col lg:flex-row-reverse">
        <div class="card   w-full max-w-sm  shadow-2xl bg-base-100 p-8">
            <form action="{{ route('store.token') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="alias" class="block text-sm font-medium text-gray-700">
                      Your Secret Name
                    </label>
                    <input type="text" name="alias" id="alias"
                     class="input input-bordered border rounded-md w-full"
                     placeholder="Enter your secret name">
                </div>
                <div class="text-center form-control mt-6">
                    <button type="submit" class="">Create Token</button>
                </div>
            </form>
        </div>
        <div class="max-w-md text-center text-gray-300 lg:text-left lg:ml-8">
            <h1 class="text-5xl font-bold ">Create Your Incognii Name!</h1>
            <p class="py-6 text-gray-400">{{ __('You can only join by picking a false name, then a token will be given to you. The token generated is what you will use to log in every time, so make sure you copy and save it.') }}</p>
        </div>
    </div>
</div>
@endsection
