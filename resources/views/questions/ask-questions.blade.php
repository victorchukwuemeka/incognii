@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full md:w-8/12">
                <div class="bg-white shadow-md rounded-lg">
                    <div class="p-6 bg-gray-200 border-b border-gray-300">
                      {{ __('Ask a Question') }}
                    </div>
                  

                    <div class="p-6">
                        <form class="" action="{{ route('questions.store')}}" method="post">
                            @csrf

                            <div class="mb-4">
                                <label for="your_question" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Your Question') }}</label>
                                <textarea id="your_question" class="form-textarea mt-1 block w-full @error('your_question') border-red-500 @enderror" name="your_question" required autofocus>{{ old('your_question') }}</textarea>

                                @error('your_question')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Submit Question') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
