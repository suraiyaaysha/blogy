    @extends('frontend.layouts.app')

    @section('content')

    <!-- Page Banner Area Starts Here -->
    <section class="search-area page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center mx-auto">
                    <h4 class="h4">Showing result of {{ $tag->name }}</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner Area Ends Here -->

    <!-- Retrive Posts which have this Tag Starts Here -->
    <section class="section-padding all-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Showing {{ $tag->name }} result</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        @if ($posts->count())

                            @foreach ($posts as $post)
                            <div class="col-lg-6 col-md-6 mt-4">
                                <div class="blog-item blog-item-sm">
                                    <div class="blog-item-image">
                                        <a href="{{ url('/posts/'.$post->slug) }}">
                                            <img src="{{ asset(url($post->thumbnail)) }}" alt="Image">
                                        </a>
                                    </div>
                                    <div class="blog-item-info">
                                        <span class="fs-6 has-line">{{ $post->category->name }}</span>
                                        <h5><a href="{{ url('/posts/'.$post->slug) }}">{{ Str::limit($post->title, 15) }}</a></h5>

                                        <div class="post-tags">
                                            <span class="badge badge-frontend-tag">{{ $tag->name }}</span>
                                        </div>

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

                            {{-- Pagination start --}}
                            <div class="pagination mt-5 text-center">
                                {{ $posts->links() }}
                            </div>
                            {{-- Pagination end --}}

                        @else

                        <h4 class="h4">No Posts found related to this tag.</h4>

                        @endif

                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="featured-category">

                        <h6>{{ __('Featured Category') }}</h6>

                        <!-- Show Featured Category start -->
                        @foreach ($featuredCategories as $category)
                            <div class="featured-category-item" style="background-image: url({{ asset(url($category->thumbnail)) }});">
                                <a href="{{ url('/categories/' . $category->slug) }}" class="{{ Request::is('categories/'.$category->slug) ? 'active' : '' }}">{{ $category->name }}</a>
                            </div>
                        @endforeach
                        <!-- Show Featured Category end -->

                    </div>
                    <div class="all-tags">
                        <h6>All Tags</h6>
                        <ul class="list-unstyled list-inline all-tags-list">
                            @foreach ($tags as $tag)
                                <li class="list-inline-item mb-2">
                                    <a href="{{ url('/tags/'.$tag->slug) }}" class="{{ Request::is('tags/'.$tag->slug) ? 'active' : '' }}">
                                    {{ $tag->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Retrive Posts which have this Tag Ends Here -->

    @endsection
