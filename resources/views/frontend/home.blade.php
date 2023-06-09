    @extends('frontend.layouts.app')

    @section('content')

    <!-- Banner Starts Here -->
    <section class="banner"
        style="background-color: #F5F5F5; background-image: url('{{ $cms->home_banner_img }}'); background-position: right; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-slider">
                        @foreach ($postSliders as $post)
                            <div class="banner-content">
                                <div class="banner-content-main">
                                    <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                    <h4><a href="{{ url('/posts/' . $post->slug) }}">{{ $post->title }}</a></h4>
                                    <div class="blog-date">
                                        <div class="blog-date-start">
                                            <span>{{ $post->created_at->format('F j, Y') }}</span>
                                        </div>
                                        <div class="blog-date-end">
                                            <span>{{ $post->reading_duration }} {{ __('read') }}</span>
                                        </div>
                                    </div>
                                    <p>{!! Str::limit($post->details, 150) !!}</p>
                                    <a href="{{ url('/posts/' . $post->slug) }}" class="btn btn-default d-inline-block">{{ __('Read More') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Ends Here -->

    <!-- Home Featured Categories Starts Here -->
    <section class="section-padding home-featured-category-area">
        <div class="container">
            <div class="blog-item-feature-heading">
                <h4>{{ __('Featured Category') }}</h4>
                <a href="{{ url('/categories') }}">View All</a>
            </div>

            <div class="row">

                <!-- Show Featured Category start -->
                @foreach ($featuredCategories as $category)
                    <div class="col-lg-3">
                        <a href="{{ url('/categories/' . $category->slug) }}"
                            class="post-feature featured-category-home-item d-block">
                            <h6>{{ $category->name }}</h6>
                        </a>
                    </div>
                @endforeach
                <!-- Show Featured Category end -->

            </div>
        </div>
    </section>
    <!-- Home Featured Categories Ends Here -->

    <!-- Recent Post Starts Here -->
    <section class="section-padding recent-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Recent Post') }}</h4>
                </div>
            </div>
            <div class="row">

                @foreach ($recentPosts as $post)
                    <div class="col-lg-4">
                        <div class="post-feature">
                            <span class="fs-6 has-line">{{ $post->category->name }}</span>
                            <h6><a href="{{ url('/posts/' . $post->slug) }}">{{ Str::limit($post->title, 15) }}</a></h6>
                            <div class="blog-item-info-release">
                                <span>{{ $post->created_at->format('F j, Y') }}</span> <span class="dot"></span>
                                <span>{{ $post->reading_duration }} read</span>
                            </div>
                            <a href="{{ url('/posts/' . $post->slug) }}" class="btn btn-link">{{ __('Read Article') }}
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Recent Post Ends Here -->

    <!-- Latest Post Starts Here -->
    <section class="section-padding latest-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Top Post') }}</h4>
                </div>
            </div>
            <div class="row">

                @if ($topPost->count())

                    @foreach ($topPost as $post)
                        <div class="col-lg-4 col-md-6 mt-4">
                            <div class="blog-item blog-item-sm">
                                <div class="blog-item-image">
                                    <a href="{{ url('/posts/' . $post->slug) }}">
                                        <img src="{{ asset(url($post->thumbnail)) }}" alt="Image">
                                    </a>
                                </div>
                                <div class="blog-item-info">
                                    <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                    <h5><a
                                            href="{{ url('/posts/' . $post->slug) }}">{{ Str::limit($post->title, 15) }}</a>
                                    </h5>
                                    <div class="blog-item-info-release">
                                        <span>{{ $post->created_at->format('F j, Y') }}</span>
                                        <span class="dot"></span>
                                        <span>{{ $post->reading_duration }} {{ __('read') }}</span>

                                    </div>
                                    <a href="{{ url('/posts/' . $post->slug) }}"
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
                    <h4 class="h4">No Posts to Show</h4>
                @endif

            </div>
        </div>
    </section>
    <!-- Latest Post Ends Here -->

    <!-- Featured Post Starts Here -->
    <section class="section-padding featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Featured Post') }}</h4>
                </div>
            </div>
            <div class="row">

                @foreach ($featuredPosts as $post)
                    <div class="col-lg-6 col-md-6 mt-4">
                        <div class="blog-item">
                            <div class="blog-item-image">
                                <a href="{{ url('/posts/' . $post->slug) }}">
                                    <img src="{{ asset(url($post->thumbnail)) }}" alt="Image">
                                </a>
                            </div>
                            <div class="blog-item-info">
                                <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                <h5><a href="{{ url('/posts/' . $post->slug) }}">{{ Str::limit($post->title, 20) }}</a>
                                </h5>
                                <div class="blog-item-info-release">
                                    <span>{{ $post->created_at->format('F j, Y') }}</span>
                                    <span class="dot"></span>
                                    <span>{{ $post->reading_duration }} {{ __('read') }}</span>
                                </div>
                                <a href="{{ url('/posts/' . $post->slug) }}"
                                    class="btn btn-link">{{ __('Read Article') }}
                                    <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Featured Post Ends Here -->

    <!-- All Post Starts Here -->
    <section class="section-padding all-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center heading">
                        <h4 class="">All Post</h4>
                        <a href="{{ url('/posts') }}" class="btn btn-default custom-btn">View All Post</a>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($allPosts as $post)
                    <div class="col-lg-4 col-md-4 mt-4">
                        <div class="blog-item blog-item-sm">
                            <div class="blog-item-image">
                                <a href="{{ url('/posts/' . $post->slug) }}">
                                    <img src="{{ asset(url($post->thumbnail)) }}" alt="Image">
                                </a>
                            </div>
                            <div class="blog-item-info">
                                <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                {{-- <h5><a href="{{ url('/posts/'.$post->slug) }}">{{ $post->title }}</a></h5> --}}
                                <h5>
                                    <a href="{{ url('/posts/' . $post->slug) }}">
                                        {{ Str::limit($post->title, 15) }}
                                    </a>
                                </h5>
                                <div class="blog-item-info-release">
                                    <span>{{ $post->created_at->format('F j, Y') }}</span> <span
                                        class="dot"></span>
                                    <span>{{ $post->reading_duration }} {{ __('read') }}</span>
                                </div>
                                <a href="{{ url('/posts/' . $post->slug) }}"
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

            </div>

            {{-- <div class="text-center">
                <a href="{{ url('/posts') }}" class="btn btn-default custom-btn">View All Post</a>
            </div> --}}

        </div>
    </section>
    <!-- All Post Ends Here -->

    @endsection
