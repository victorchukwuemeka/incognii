@extends('layouts.app')

@section('content')
<div class="hero min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="max-w-sm rounded-lg shadow-2xl">
      <form action="{{ route('store.token') }}" method="POST">
               @csrf

               <div class="mb-4">
                   <label for="alias" class="block text-sm
                   font-medium text-white">Your Secret Name </label>
                   <input type="text" name="alias" id="alias"
                   class="mt-1 p-2 border rounded-md w-full">
               </div>

               <div>
                   <button type="submit"
                   class="btn bg-blue-500 text-white px-4 py-2
                   rounded-md hover:bg-blue-600">Create Token</button>
               </div>
           </form>
    </div>

    <div>
      <h1 class="text-5xl font-bold">Create Your Incognii Name !</h1>
      <p class="py-6">  {{_( 'Your can only join picking a false name ,
          then a token will be given to you.
            The token generated is what you will use to
            log in everytime so make sure you copy and save it .
       ')}}
     </p>
    </div>
  </div>
</div>

@endsection
