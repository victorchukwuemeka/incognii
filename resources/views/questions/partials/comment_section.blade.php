@foreach($comments as $comment)
<div class="bg-gray-100 p-4 rounded-lg mb-2">
    <p class="text-gray-900">THE COMMENTS {{ $comment->content }}</p>
</div>
<div id="reply-form-{{ $comment->id }}" class="mt-2">
    <form action="{{ route('comments.reply', ['comment' => $comment->id]) }}" method="post">
        @csrf
        <input type="hidden" name="answer_id" value="{{ $answerId }}">
        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
        <textarea name="content" class="" placeholder="Add a reply"></textarea>
        <button type="submit" class="text-gray-600">
          Post Reply
        </button>
    </form>

      {{-- @include('questions.partials.replies',
   ['replies' => $comment->replies]) --}}
   
</div>

@endforeach
