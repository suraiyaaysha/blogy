    @include('frontend.layouts.navbar')

    <!-- Page Banner Area Starts Here -->
    <section class="search-area page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center mx-auto">
                    <h4>All Posts from {{ $category->name }}</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner Area Ends Here -->

    <!-- All Categories Collection Starts Here -->
    <section class="section-padding latest-post-area">
        <div class="container">

            <div class="row">
                @if (count($category->posts) > 0)
                    @foreach ($category->posts as $post)
                        <div class="col-lg-4 col-md-6 mt-4">
                            <div class="blog-item blog-item-sm">
                                <div class="blog-item-image">
                                    <a href="{{ url('/categories/' . $category->slug . '/' . $post->slug) }}">
                                        <img src="{{ asset(url($post->thumbnail)) }}" alt="Image">
                                    </a>
                                </div>
                                <div class="blog-item-info">
                                    <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                    <h5><a
                                            href="{{ url('/categories/' . $category->slug . '/' . $post->slug) }}">{{ Str::limit($post->title, 15) }}</a>
                                    </h5>
                                    <div class="blog-item-info-release">
                                        <span>{{ $post->created_at->format('F j, Y') }}</span>
                                        <span class="dot"></span>
                                        <span>{{ $post->reading_duration }} {{ __('read') }}</span>

                                    </div>
                                    <a href="{{ url('/categories/' . $category->slug . '/' . $post->slug) }}"
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
    <!-- All Categories Collection Ends Here -->

    @include('frontend.layouts.footer')
