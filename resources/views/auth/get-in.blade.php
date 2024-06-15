@extends('layouts.app')

@section('content')

  @if(session('status'))
       <p>{{ session('status') }}</p>
   @endif
<div class="hero  bg-gray-900  min-h-screen bg-base-200">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left">
      <h1 class="text-5xl text-gray-400 font-bold">Put Your Token</h1>
      <p class="py-6 text-gray-300">Use the token you got to access  the  platform ,
        and make sure you copy and save the token for future use.
        </p>
    </div>
    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
      <form action="{{ route('store.detail') }}" method="POST" class="card-body">
           @csrf
        <div class="form-control">
          <label class="label">
            <span class="label-text"></span>
          </label>
          <input type="text" placeholder="token" name='token' id='token'
           class="input input-bordered" required />
          <label class="label">
            <a href="#" class="label-text-alt link link-hover">lost token?</a>
          </label>
        </div>
        <div class="form-control mt-6">
          <button class="btn btn-neutral">Summit Token</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
