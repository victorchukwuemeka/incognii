<div class="">
  <form class="" action="{{ route('comments.store') }}" method="post">
    @csrf
    <input type="hidden" name="answer_id" value="{{ $answer->id }}">
    <input type="hidden" name="parent_id" value="">
    <textarea name="content" id="comment"
    class="w-full bg-gray-200 focus:outline-none border-transparent
    rounded-lg px-4 py-2 text-gray-600"
    placeholder="Your comment..." required></textarea>
    <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700
    text-white font-bold py-2 px-4 rounded">
      Submit Comment
    </button>
     {{-- @include('questions.partials.comment') --}}

     @include('questions.partials.comment_section',
      ['comments' => $answer->comments, 'answerId' => $answer->id])

  </form>

</div>
