@if(count($replies) > 0)
    <div class="nested-replies ml-4">
        @foreach($replies as $reply)
            <div class="bg-gray-200 p-2 mt-2 rounded-lg">
                <p class="text-gray-800">Reply: {{ $reply->content }}</p>

                <!-- Reply form for this reply -->
                <div id="reply-form-{{ $reply->id }}" class="mt-2">
                    <form action="{{ route('comments.reply', ['comment' => $reply->id]) }}"
                       method="post">
                        @csrf
                        <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                        <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                        <textarea name="content" class="w-full mt-2 p-2 bg-gray-700
                          border border-gray-300 rounded-lg"
                            placeholder="Add a reply"></textarea>
                        <button type="submit" class="mt-2 px-4 py-2
                        bg-blue-500
                        text-white rounded-lg">
                            Post Reply
                        </button>
                    </form>
                </div>

                <!-- Display nested replies recursively -->
                {{-- @include('questions.partials.comment_replies',
                 ['replies' => $reply->replies])--}}
            </div>
        @endforeach
    </div>
@endif
