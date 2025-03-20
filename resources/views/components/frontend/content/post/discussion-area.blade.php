{{--<section class="gazette-post-discussion-area section_padding_100 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- Comment Area Start -->
                <div class="comment_area section_padding_50 clearfix">
                    <div class="gazette-heading">
                        <h4 class="font-bold">Comments</h4>
                    </div>

                    <ol>
                        @foreach($post->comments as $comment)
                            <!-- Single Comment Area -->
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-md-flex align-items-start">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                        <img src="img/blog-img/25.jpg" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <h5>{{$comment->user->name}}</h5>
                                        <span class="comment-date font-pt">{{$comment->created_at}}</span>
                                        <p>{{$comment->body}}</p>
                                        <a class="reply-btn" href="#">Reply <i class="fa fa-reply" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ol>
                </div>

                --}}{{--Code comment for parent and child comments--}}{{--
                --}}{{--<ol>
                    <!-- Single Comment Area -->
                    <li class="single_comment_area">
                        <div class="comment-wrapper d-md-flex align-items-start">
                            <!-- Comment Meta -->
                            <div class="comment-author">
                                <img src="img/blog-img/25.jpg" alt="">
                            </div>
                            <!-- Comment Content -->
                            <div class="comment-content">
                                <h5>John Doe</h5>
                                <span class="comment-date font-pt">December 18, 2017</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum nunc libero, vitae rutrum nunc porta id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam arcu augue, semper at elementum nec, cursus nec ante.</p>
                                <a class="reply-btn" href="#">Reply <i class="fa fa-reply" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <ol class="children">
                            <li class="single_comment_area">
                                <div class="comment-wrapper d-md-flex align-items-start">
                                    <!-- Comment Meta -->
                                    <div class="comment-author">
                                        <img src="img/blog-img/25.jpg" alt="">
                                    </div>
                                    <!-- Comment Content -->
                                    <div class="comment-content">
                                        <h5>John Doe</h5>
                                        <span class="comment-date text-muted">December 18, 2017</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum nunc libero, vitae rutrum nunc porta id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam arcu augue, semper at elementum nec, cursus nec ante.</p>
                                        <a class="reply-btn" href="#">Reply <i class="fa fa-reply" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </li>
                </ol>--}}{{--

                <!-- Leave A Comment -->
                <div class="leave-comment-area clearfix">
                    <div class="comment-form">
                        <div class="gazette-heading">
                            <h4 class="font-bold">leave a comment</h4>
                        </div>
                        <!-- Comment Form -->
                        @if(auth()->check())
                            <form method="POST" action="{{ route('postcomment.store', $post->id) }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                            </form>
                        @else
                            <p>Je moet <a href="{{ route('login') }}">inloggen</a> om een reactie te plaatsen.</p>
                        @endif
                        --}}{{--<form method="POST" action="{{route('postcomment.store', $post->id)}}">
                            @csrf
                            --}}{{----}}{{--<div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Full Name">
                            </div>--}}{{----}}{{--
                            --}}{{----}}{{--<div class="form-group">
                                <input type="email" class="form-control" id="contact-email" placeholder="Email">
                            </div>--}}{{----}}{{--
                            <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                        </form>--}}{{--
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<section class="gazette-post-discussion-area section_padding_100 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <!-- Comment Area Start -->
                <div class="comment_area section_padding_50 clearfix">
                    <div class="gazette-heading">
                        <h4 class="font-bold">Comments</h4>
                    </div>
                    <ol class="comment-list">
                        @foreach($post->comments as $comment)
                            <x-frontend.content.post.comment :post="$post" :comment="$comment" />
                        @endforeach
                    </ol>
                </div>

                <!-- Leave A Comment -->
                <div class="leave-comment-area clearfix">
                    <div class="comment-form">
                        <div class="gazette-heading">
                            <h4 class="font-bold">Leave a comment</h4>
                        </div>
                        @if(auth()->check())
                            <form method="POST" action="{{ route('postcomment.store', $post->id) }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="5" placeholder="Message"></textarea>
                                </div>
                                <button type="submit" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                            </form>
                        @else
                            <p>Je moet <a href="{{ route('login') }}">inloggen</a> om een reactie te plaatsen.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
