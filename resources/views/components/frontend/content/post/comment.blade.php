<li class="single_comment_area">
    <div class="comment-wrapper d-md-flex align-items-start">
        <div class="comment-author">
            <img src="img/blog-img/25.jpg" alt="">
        </div>
        <div class="comment-content">
            <h5>{{ $comment->user->name }}</h5>
            <span class="comment-date font-pt">{{ $comment->created_at }}</span><br>
            @if($comment->parent)
                <span class="font-pt">{{$comment->user->name }} replied to {{ $comment->parent->user->name }}</span>
            @endif
            <p>{{ $comment->body }}</p>
            <a class="reply-btn" href="#" onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display='block'">Reply <i class="fa fa-reply"></i></a>


            <!-- Reply Form -->
            <form id="reply-form-{{ $comment->id }}" method="POST" action="{{ route('postcomment.store',['post' => $comment->post_id]) }}" style="display:none; margin-top:10px;">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <div class="form-group">
                    <textarea class="form-control" name="body" cols="30" rows="3" placeholder="Reply..."></textarea>
                </div>
                <button type="submit" class="btn leave-comment-btn">Reply</button>
            </form>
        </div>
    </div>

    @if($comment->children->count() > 0)
        <ol class="children ml-4">
            @foreach($comment->children as $reply)
                @include('components.frontend.content.post.comment', ['comment' => $reply])
            @endforeach
        </ol>
    @endif
</li>


