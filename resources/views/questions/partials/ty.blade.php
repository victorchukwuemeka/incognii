<div id="reply-form-{{ $comment->id }}" class="mt-2">
    <form action="{{ route('comments.reply', ['comment' => $comment->id]) }}" method="post">
        @csrf
        <input type="hidden" name="answer_id" value="{{ $answerId }}">
        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
        <textarea name="content" class="w-full mt-2 p-2 bg-gray-700 border
        border-gray-300 rounded-lg" placeholder="Add a reply"></textarea>
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-gray-600 rounded-lg">
          Post Reply
        </button>
    </form>
</div>
