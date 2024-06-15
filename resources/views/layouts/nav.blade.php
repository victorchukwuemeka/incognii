<nav class="bg-gray-800  bg-opacity-95 shadow-md py-6">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center">
      <div>
        <a href="/" class="btn btn-ghost text-white text-xl">Incognii</a>
      </div>
      @guest
      <div class="flex items-center space-x-8">
        <a href="{{route('create.token')}}" class="text-gray-300 hover:text-white">Joins Us</a>
        <a href="{{ route('getin')}}" class="text-gray-300 hover:text-white">Paste Your Token</a>
      </div>
      @else
      <div class="items-center space-x-8">
        <div class="flex space-x-4">
          <a href="{{ route('profile',['id' => auth()->user()->id]) }}">
              <p class="text-gray-300 hover:text-white">
                Welcome, {{ auth()->user()->alias }}!
              </p>
          </a>
          <a href="{{ route('exit') }}" class="text-gray-300 hover:text-white">
            Bye, leave the matrix
          </a>
        </div>
      </div>
      @endguest
    </div>
  </div>
</nav>
