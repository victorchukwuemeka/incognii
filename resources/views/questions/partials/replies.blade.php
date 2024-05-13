{{-- @if(count($replies) > 0)
@endif--}}
@foreach($replies as $reply)

<p class="text-gray-900">
the reply to the comment :{{ $reply->content }}
</p>


@endforeach
