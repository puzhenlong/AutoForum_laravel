<div class="thread {{ $thread->isQuestion() ? 'question' : '' }} {{ $thread->isSolved() ? 'solved' : '' }} _post" data-author-name='{{ json_encode($thread->author->name, JSON_HEX_QUOT|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS) }}' data-quote-body='{{ json_encode($thread->getWrappedObject()->body, JSON_HEX_QUOT|JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS) }}'>
    <h1>
        @if ($thread->pinned)
            [Pinned]
        @endif

        {{{ $thread->subject }}}
    </h1>

    <span class="markdown">
        {!! $thread->body !!}
    </span>

    <div class="user">
        {!! $thread->author->thumbnail !!}

        <div class="info">
            <h6><a href="{{ $thread->author->profileUrl }}">{{ $thread->author->name }}</a></h6>
            <ul class="meta">
                <li>{{ $thread->created_ago }}</li>
            </ul>
        </div>
    </div>

    @if (Auth::check())
        <div class="admin-bar">
            <ul>
                @if ($thread->isManageableBy(Auth::user()))
                    <li><a href="{{ $thread->editUrl }}">Edit</a></li>
                    <li><a href="{{ $thread->deleteUrl }}">Delete</a></li>

                    @if ($thread->isQuestion() && $thread->isSolved())
                        <li><a href="{{ $thread->markAsUnsolvedUrl }}">Mark Unsolved</a></li>
                    @endif
                @endif

                <li class="space"></li>
                <li><a href="#" class="quote _quote_forum_post">Quote</a></li>
            </ul>
        </div>
    @endif
</div>
