    @include('frontend.layouts.navbar')

    <!-- Banner Starts Here -->
    <section class="banner"
        style="background-color: #F5F5F5; background-image: url('frontend/assets/images/banner.jpg'); background-position: right; background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-slider">
                        <div class="banner-content">
                            <div class="banner-content-main">
                                <span class="fs-6 has-line">Interior</span>
                                <h4><a href="#">How to Get Started With Interior Design</a></h4>
                                <div class="blog-date">
                                    <div class="blog-date-start">
                                        <span>March 25, 2021</span>
                                    </div>
                                    <div class="blog-date-end">
                                        <span>4 min read</span>
                                    </div>
                                </div>
                                <p>
                                    Nulla et commodo turpis. Etiam hendrerit ornare pharetra. Cras eleifend purus vitae
                                    lorem venenatis bibendum. Sed commodo mi quis augue finibus, ut feugiat erat
                                    aliquam.
                                </p>
                                <a href="#" class="btn btn-default">Read More</a>
                            </div>
                        </div>
                        <div class="banner-content">
                            <div class="banner-content-main">
                                <span class="fs-6 has-line">Interior</span>
                                <h4><a href="#">How to Get Started With Interior Design</a></h4>
                                <div class="blog-date">
                                    <div class="blog-date-start">
                                        <span>March 25, 2021</span>
                                    </div>
                                    <div class="blog-date-end">
                                        <span>4 min read</span>
                                    </div>
                                </div>
                                <p>
                                    Nulla et commodo turpis. Etiam hendrerit ornare pharetra. Cras eleifend purus vitae
                                    lorem venenatis bibendum. Sed commodo mi quis augue finibus, ut feugiat erat
                                    aliquam.
                                </p>
                                <a href="#" class="btn btn-default">Read More</a>
                            </div>
                        </div>
                        <div class="banner-content">
                            <div class="banner-content-main">
                                <span class="fs-6 has-line">Interior</span>
                                <h4><a href="#">How to Get Started With Interior Design</a></h4>
                                <div class="blog-date">
                                    <div class="blog-date-start">
                                        <span>March 25, 2021</span>
                                    </div>
                                    <div class="blog-date-end">
                                        <span>4 min read</span>
                                    </div>
                                </div>
                                <p>
                                    Nulla et commodo turpis. Etiam hendrerit ornare pharetra. Cras eleifend purus vitae
                                    lorem venenatis bibendum. Sed commodo mi quis augue finibus, ut feugiat erat
                                    aliquam.
                                </p>
                                <a href="#" class="btn btn-default">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Ends Here -->

    <!-- Post Feture Starts Here -->
    <section class="section-padding">
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
                            <h6><a href="{{ url('/posts/'.$post->slug) }}">{{ Str::limit($post->title, 15) }}</a></h6>
                            <div class="blog-item-info-release">
                                <span>{{ $post->updated_at->format('F j, Y') }}</span> <span class="dot"></span> <span>{{ $post->reading_duration }} read</span>
                            </div>
                            <a href="{{ url('/posts/'.$post->slug) }}" class="btn btn-link">{{ __('Read Article') }}
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!-- Post Feture Ends Here -->

    <!-- Latest Post Starts Here -->
    <section class="section-padding latest-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Latest Post') }}</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($latestPosts as $post)
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="blog-item blog-item-sm">
                            <div class="blog-item-image">
                                <a href="{{ url('/posts/'.$post->slug) }}">
                                    <img src="{{ asset(url($post->thumbnail)) }}" alt="Image">
                                </a>
                            </div>
                            <div class="blog-item-info">
                                <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                <h5><a href="{{ url('/posts/'.$post->slug) }}">{{ Str::limit($post->title, 15) }}</a></h5>
                                <div class="blog-item-info-release">
                                    <span>{{ $post->updated_at->format('F j, Y') }}</span>
                                    <span class="dot"></span>
                                    <span>{{ $post->reading_duration }} {{ __('read') }}</span>

                                </div>
                                <a href="{{ url('/posts/'.$post->slug) }}" class="btn btn-link">{{ __('Read Article') }}
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
    <!-- Latest Post Ends Here -->

    <!-- Featured Post Starts Here -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Featured Post') }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mt-4">
                    <div class="blog-item">
                        <div class="blog-item-image">
                            <a href="{{ url('/posts/'.$post->slug) }}">
                                <img src="frontend/assets/images/01.jpg" alt="Image">
                            </a>
                        </div>
                        <div class="blog-item-info">
                            <span class="fs-6 has-line">Travels</span>
                            <h5><a href="{{ url('/posts/'.$post->slug) }}">How to Get Started With UI/UX in Figma</a></h5>
                            <div class="blog-item-info-release">
                                <span>March 25, 2021</span> <span class="dot"></span> <span>4 min read</span>
                            </div>
                            <a href="{{ url('/posts/'.$post->slug) }}" class="btn btn-link">Read Article
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt-4 mt-md-0 mt-lg-0">
                    <div class="blog-item">
                        <div class="blog-item-image">
                            <a href="{{ url('/posts/'.$post->slug) }}">
                                <img src="frontend/assets/images/02.jpg" alt="Image">
                            </a>
                        </div>
                        <div class="blog-item-info">
                            <span class="fs-6 has-line">Travels</span>
                            <h5><a href="{{ url('/posts/'.$post->slug) }}">Nulla facilisi. Pellentes dui ligula, varius non.</a></h5>
                            <div class="blog-item-info-release">
                                <span>March 25, 2021</span> <span class="dot"></span> <span>4 min read</span>
                            </div>
                            <a href="{{ url('/posts/'.$post->slug) }}" class="btn btn-link">Read Article
                                <svg width="18" height="12" viewBox="0 0 18 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 1.5L17 6M17 6L12.5 10.5M17 6H1" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
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

                @foreach ($allPosts as $post )

                    <div class="col-lg-4 col-md-4 mt-4">
                        <div class="blog-item blog-item-sm">
                            <div class="blog-item-image">
                                <a href="{{ url('/posts/'.$post->slug) }}">
                                    <img src="{{ asset(url($post->thumbnail)) }}" alt="Image">
                                </a>
                            </div>
                            <div class="blog-item-info">
                                <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                {{-- <h5><a href="{{ url('/posts/'.$post->slug) }}">{{ $post->title }}</a></h5> --}}
                                <h5>
                                    <a href="{{ url('/posts/'.$post->slug) }}">
                                        {{ Str::limit($post->title, 15) }}
                                    </a>
                                </h5>
                                <div class="blog-item-info-release">
                                    <span>{{ $post->updated_at->format('F j, Y') }}</span> <span class="dot"></span>
                                    <span>{{ $post->reading_duration }} {{ __('read') }}</span>
                                </div>
                                <a href="{{ url('/posts/'.$post->slug) }}" class="btn btn-link">{{ __('Read Article') }}
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

    @include('frontend.layouts.footer')
