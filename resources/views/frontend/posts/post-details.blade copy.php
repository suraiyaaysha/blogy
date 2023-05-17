    @extends('frontend.layouts.app')

    @section('content')

        <!-- Blog Details Banner Starts Here -->
    <section class="details-banner" style="background-image: url('{{ asset(url($post->thumbnail)) }}')">
    </section>
    <!-- Blog Details Banner Ends Here -->

    <!-- Blog Details Intro Starts Here -->
    <section class="blog-intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="blog-intro-area">

                        <span class="has-line fs-6"><a
                                href="{{ url('/categories/' . $post->category->slug) }}">{{ $post->category->name }}</a></span>
                        <h3>{{ $post->title }}</h3>
                        <div class="blog-intro-area-bottom">
                            <div class="intro-start">

                                <div class="intro-start-author">
                                    <div class="author-image">
                                        <img src="{{ asset($post->user->profile_photo) }}" alt="Author">
                                    </div>
                                    <a href="{{ url('profile') }}" class="fs-6">{{ $post->user->name }}</a>
                                </div>

                                <div class="intro-start-release d-flex">
                                    <div>
                                        <span class="dot"></span>
                                        <span class="intro-start-time">{{ $post->created_at->format('F j, Y') }}</span>
                                    </div>
                                    <div>
                                        <span class="dot"></span>
                                        <span class="intro-start-time">{{ $post->reading_duration }}
                                            {{ __('read') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="intro-end">
                                <ul class="list-unstyled list-inline social-links mb-0">
                                    {!! Share::page(url('/posts/' . $post->slug))->facebook()->twitter()->pinterest() !!}

                                    <li class="list-inline-item d-inline-flex">
                                        <button id="copyButton1">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path d="M9.99984 4.66669H11.9998C12.4376 4.66669 12.871 4.75291 13.2754 4.92042C13.6799 5.08794 14.0473 5.33347 14.3569 5.643C14.6664 5.95253 14.9119 6.31999 15.0794 6.72441C15.247 7.12883 15.3332 7.56228 15.3332 8.00002C15.3332 8.43776 15.247 8.87121 15.0794 9.27563C14.9119 9.68005 14.6664 10.0475 14.3569 10.357C14.0473 10.6666 13.6799 10.9121 13.2754 11.0796C12.871 11.2471 12.4376 11.3334 11.9998 11.3334H9.99984M5.99984 11.3334H3.99984C3.5621 11.3334 3.12864 11.2471 2.72423 11.0796C2.31981 10.9121 1.95234 10.6666 1.64281 10.357C1.01769 9.73192 0.666504 8.88408 0.666504 8.00002C0.666504 7.11597 1.01769 6.26812 1.64281 5.643C2.26794 5.01788 3.11578 4.66669 3.99984 4.66669H5.99984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M5.3335 8H10.6668" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0">
                                                        <rect width="16" height="16" fill="white"></rect>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Intro Ends Here -->

    <!-- Blog Article Starts Here -->
    <section class="blog-article section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="blog-article-start">
                                <div class="blogy-counts">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.49997 18.9999H2.79999C2.3226 18.9999 1.86477 18.8102 1.5272 18.4727C1.18964 18.1351 1 17.6773 1 17.1999V10.8999C1 10.4226 1.18964 9.96472 1.5272 9.62715C1.86477 9.28959 2.3226 9.09995 2.79999 9.09995H5.49997M11.7999 7.29996V3.69998C11.7999 2.9839 11.5155 2.29715 11.0091 1.79081C10.5028 1.28446 9.81603 1 9.09995 1L5.49997 9.09995V18.9999H15.6519C16.086 19.0048 16.5072 18.8527 16.838 18.5715C17.1688 18.2903 17.3868 17.8991 17.4519 17.4699L18.6939 9.36995C18.733 9.11197 18.7156 8.84856 18.6429 8.59798C18.5701 8.34739 18.4438 8.11562 18.2726 7.91872C18.1013 7.72182 17.8894 7.5645 17.6513 7.45765C17.4133 7.35081 17.1548 7.297 16.8939 7.29996H11.7999Z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span>{{ $post->likes()->count() }} {{ __('Likes') }}</span>
                                </div>
                                <div class="blogy-counts">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 13C19 13.5304 18.7893 14.0391 18.4142 14.4142C18.0391 14.7893 17.5304 15 17 15H5L1 19V3C1 2.46957 1.21071 1.96086 1.58579 1.58579C1.96086 1.21071 2.46957 1 3 1H17C17.5304 1 18.0391 1.21071 18.4142 1.58579C18.7893 1.96086 19 2.46957 19 3V13Z"
                                            fill="white" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span>{{ $post->comments()->count() }} {{ __('Comments') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="blog-article-end">

                                {!! $post->details !!}

                                <div class="blog-article-end-bottom">

                                    @if (auth()->check())
                                        @if (auth()->user()->likes->contains('post_id', $post->id))
                                            <form action="{{ route('posts.unlike', $post) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-default type="submit">
                                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.49997 18.9999H2.79999C2.3226 18.9999 1.86477 18.8102 1.5272 18.4727C1.18964 18.1351 1 17.6773 1 17.1999V10.8999C1 10.4226 1.18964 9.96472 1.5272 9.62715C1.86477 9.28959 2.3226 9.09995 2.79999 9.09995H5.49997M11.7999 7.29996V3.69998C11.7999 2.9839 11.5155 2.29715 11.0091 1.79081C10.5028 1.28446 9.81603 1 9.09995 1L5.49997 9.09995V18.9999H15.6519C16.086 19.0048 16.5072 18.8527 16.838 18.5715C17.1688 18.2903 17.3868 17.8991 17.4519 17.4699L18.6939 9.36995C18.733 9.11197 18.7156 8.84856 18.6429 8.59798C18.5701 8.34739 18.4438 8.11562 18.2726 7.91872C18.1013 7.72182 17.8894 7.5645 17.6513 7.45765C17.4133 7.35081 17.1548 7.297 16.8939 7.29996H11.7999Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    {{ __('Unlike') }}
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('posts.like', $post) }}" method="POST">
                                                @csrf
                                                <button class="btn-default" type="submit">
                                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.49997 18.9999H2.79999C2.3226 18.9999 1.86477 18.8102 1.5272 18.4727C1.18964 18.1351 1 17.6773 1 17.1999V10.8999C1 10.4226 1.189649.96472 1.5272 9.62715C1.86477 9.28959 2.3226 9.09995 2.79999 9.09995H5.49997M11.7999 7.29996V3.69998C11.7999 2.9839 11.5155 2.29715 11.0091 1.79081C10.5028 1.28446 9.81603 1 9.09995 1L5.49997 9.09995V18.9999H15.6519C16.086 19.0048 16.5072 18.8527 16.838 18.5715C17.1688 18.2903 17.3868 17.8991 17.4519 17.4699L18.6939 9.36995C18.733 9.11197 18.7156 8.84856 18.6429 8.59798C18.5701 8.34739 18.4438 8.11562 18.2726 7.91872C18.1013 7.72182 17.8894 7.5645 17.6513 7.45765C17.4133 7.35081 17.1548 7.297 16.8939 7.29996H11.7999Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    {{ __('Like') }}
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn-default">
                                            <svg width="16" height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.49997 18.9999H2.79999C2.3226 18.9999 1.86477 18.8102 1.5272 18.4727C1.18964 18.1351 1 17.6773 1 17.1999V10.8999C1 10.4226 1.189649.96472 1.5272 9.62715C1.86477 9.28959 2.3226 9.09995 2.79999 9.09995H5.49997M11.7999 7.29996V3.69998C11.7999 2.9839 11.5155 2.29715 11.0091 1.79081C10.5028 1.28446 9.81603 1 9.09995 1L5.49997 9.09995V18.9999H15.6519C16.086 19.0048 16.5072 18.8527 16.838 18.5715C17.1688 18.2903 17.3868 17.8991 17.4519 17.4699L18.6939 9.36995C18.733 9.11197 18.7156 8.84856 18.6429 8.59798C18.5701 8.34739 18.4438 8.11562 18.2726 7.91872C18.1013 7.72182 17.8894 7.5645 17.6513 7.45765C17.4133 7.35081 17.1548 7.297 16.8939 7.29996H11.7999Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            {{ __('Like') }}
                                        </a>
                                    @endauth

                                    <div class="d-flex align-items-center flex-column flex-lg-row">
                                        <span class="me-3">{{ __('Share the Post:') }}</span>
                                        <ul class="list-unstyled list-inline social-links mb-0">
                                            {!! Share::page(url('/posts/' . $post->slug))->facebook()->twitter()->pinterest() !!}

                                            <li class="list-inline-item d-inline-flex">
                                                <button id="copyButton">
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0)">
                                                                <path d="M9.99984 4.66669H11.9998C12.4376 4.66669 12.871 4.75291 13.2754 4.92042C13.6799 5.08794 14.0473 5.33347 14.3569 5.643C14.6664 5.95253 14.9119 6.31999 15.0794 6.72441C15.247 7.12883 15.3332 7.56228 15.3332 8.00002C15.3332 8.43776 15.247 8.87121 15.0794 9.27563C14.9119 9.68005 14.6664 10.0475 14.3569 10.357C14.0473 10.6666 13.6799 10.9121 13.2754 11.0796C12.871 11.2471 12.4376 11.3334 11.9998 11.3334H9.99984M5.99984 11.3334H3.99984C3.5621 11.3334 3.12864 11.2471 2.72423 11.0796C2.31981 10.9121 1.95234 10.6666 1.64281 10.357C1.01769 9.73192 0.666504 8.88408 0.666504 8.00002C0.666504 7.11597 1.01769 6.26812 1.64281 5.643C2.26794 5.01788 3.11578 4.66669 3.99984 4.66669H5.99984" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M5.3335 8H10.6668" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </g>
                                                            <defs>
                                                                    <clipPath id="clip0">
                                                                            <rect width="16" height="16" fill="white"></rect>
                                                                    </clipPath>
                                                            </defs>
                                                    </svg>
                                                </button>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Article Ends Here -->

    <!-- Blog Item Feature Starts Here -->
    <section class="blog-item-feature">
        <div class="container">
            <div class="blog-item-feature-heading">
                <h4>{{ __('You May Also Like') }}</h4>
                <a href="{{ $viewAllLinkUrl }}">{{ __('View All') }}</a>
            </div>
            <div class="row">

                <!-- Display related posts -->
                @if ($relatedPosts->count() > 0)
                    @foreach ($relatedPosts as $relatedPost)
                        <div class="col-lg-6 col-md-6 mb-4 mb-md-0 mb-lg-0">
                            <div class="blog-item">
                                <div class="blog-item-image">
                                    <a href="{{ url('/posts/' . $relatedPost->slug) }}">
                                        <img src="{{ asset(url($relatedPost->thumbnail)) }}" alt="Image">
                                    </a>
                                </div>
                                <div class="blog-item-info">
                                    <span class="fs-6 has-line">{{ $relatedPost->category->name }}</span>
                                    <h5><a
                                            href="{{ url('/posts/' . $relatedPost->slug) }}">{{ Str::limit($relatedPost->title, 20) }}</a>
                                    </h5>
                                    <div class="blog-item-info-release">
                                        <span>{{ $relatedPost->created_at->format('F j, Y') }}</span> <span
                                            class="dot"></span> <span>{{ $relatedPost->reading_duration }}
                                            {{ __('read') }}</span>
                                    </div>
                                    <a href="{{ url('/posts/' . $relatedPost->slug) }}"
                                        class="btn btn-link">{{ __('Read Article') }}
                                        <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h6>No posts to show!</h6>
                @endif

            </div>
        </div>
    </section>
    <!-- Blog Item Feature Ends Here -->

    <!-- Comments Area Starts Here -->
    <section class="comments-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto">

                    <h5>Leave a Comment</h5>

                    {{-- @include('frontend.posts.commentsDisplay', [
                        'comments' => $post->comments,
                        'post_id' => $post->id,
                    ])

                    <form action="#">
                        <div class="row g-3">
                            <div class="col-lg-6">
                              <input type="text" class="form-control" placeholder="Your name">
                            </div>
                            <div class="col-lg-6">
                              <input type="email" class="form-control" placeholder="Your email">
                            </div>
                        </div>
                        <textarea class="form-control" placeholder="Your Comments"></textarea>
                        <div class="d-flex justify-content-lg-end">
                            <button type="submit" class="btn-default">Post Commnent</button>
                        </div>
                    </form> --}}

                    <div class="card">
                        <div class="card-body">
                            <h4>Display Comments</h4>

                            @include('frontend.posts.commentsDisplay', [
                                'comments' => $post->comments,
                                'post_id' => $post->id,
                            ])

                            <hr />
                            <h4 class="mt-5">Add comment</h4>
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </div>
                                <div class="form-group">
                                    {{-- <input type="submit" class="btn btn-success bg-success {{ Auth::check() ? '' : 'disabled' }}" value="Add Comment"> --}}
                                    {{-- <input type="submit" class="btn btn-success bg-success {{ Auth::check() ? '' : 'disabled' }}" value="Add Comment"> --}}
                                    @guest
                                    <div class="d-flex justify-content-lg-end">
                                        <a href="{{ route('login') }}" class="btn btn-default">Login</a>
                                    </div>
                                    @endguest
                                    @auth
                                    <div class="d-flex justify-content-lg-end">
                                        {{-- <input type="submit" class="btn-default" value="Add Comment"> --}}
                                        <button type="submit" class="btn-default">Post Commnent</button>
                                    </div>
                                    @endauth
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Comments Area Ends Here -->

    @endsection

    @section('scripts')
        <script>
            document.getElementById('copyButton').addEventListener('click', function() {
                var dummy = document.createElement('input');
                var text = window.location.href;

                document.body.appendChild(dummy);
                dummy.value = text;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);

                Swal.fire({
                    // icon: 'success',
                    // title: 'URL Copied!',
                    text: 'The URL has been copied to the clipboard.',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
            document.getElementById('copyButton1').addEventListener('click', function() {
                var dummy = document.createElement('input');
                var text = window.location.href;

                document.body.appendChild(dummy);
                dummy.value = text;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);

                Swal.fire({
                    // icon: 'success',
                    // title: 'URL Copied!',
                    text: 'The URL has been copied to the clipboard.',
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
    @endsection

