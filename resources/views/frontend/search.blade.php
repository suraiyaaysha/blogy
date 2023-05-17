    @extends('frontend.layouts.app')

    @section('content')

    <!-- Search Area Starts Here -->
    <section class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center mx-auto">
                    <h4>‘{{ $searchTerm }}’ here’s what we’ve got</h4>

                    <form action="{{ route('search') }}" method="GET">
                        <div class="form">
                            <div class="search-area-input">
                                <input type="text" name="search" id="navbar-search-input" value="{{ old('search', session('searchTerm')) }}" placeholder="Travel" required>

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </div>
                            <button type="submit" class="btn btn-default">{{ __('Search') }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Search Area Ends Here -->

    <!-- All Post Starts Here -->
    <section class="section-padding all-post-area">
        <div class="container">
            <div class="row">
                @if($posts->isNotEmpty())
                     <!-- Display search results -->
                    @foreach ($posts as $post)
                        <!-- Display each post -->
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

                    <!-- Display pagination links -->
                    <div class="pagination mt-5 text-center">
                        {{ $posts->links() }}
                    </div>
                    <!-- Display pagination links -->

                @else
                    <div class="col-md-12">
                        <h2>{{ __('No posts found') }}</h2>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- All Post Ends Here -->

    @endsection
