    @extends('frontend.layouts.app')

    @section('content')

    <section class="search-area">
        <div class="row">
            <div class="col-lg-9 text-center mx-auto">
                <h4>All Posts</h4>
            </div>
        </div>
    </section>

    <!-- All Post Starts Here -->
    <section class="section-padding all-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <!-- Posts Filter Options Start -->
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <form action="{{ route('posts.index') }}" method="GET" class="d-flex filter-form align-items-center">
                                <h5 class="h5 font-bold me-2 mb-0">Filter By:</h5>
                                <div class="form-group me-2">
                                    <label for="category">Category:</label>
                                    <select name="category" id="category">
                                        <option value="">All</option>
                                        @foreach ($categories as $categoryId => $categoryName)
                                            <option value="{{ $categoryId }}" @if (request('category') == $categoryId) selected @endif>{{ $categoryName }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group me-2">
                                    <label for="is_featured">Featured:</label>
                                    <select name="is_featured" id="is_featured">
                                        <option value="">All</option>
                                        <option value="1" @if (request('is_featured') == '1') selected @endif>Yes</option>
                                        <option value="0" @if (request('is_featured') == '0') selected @endif>No</option>
                                    </select>
                                </div>

                                <div class="form-group me-2">
                                    <label for="tag">Tag:</label>
                                    <select name="tag" id="tag">
                                        <option value="">All</option>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->name }}" @if (request('tag') == $tag->name) selected @endif>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-default-sm">Apply Filters</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Posts Filter Options End -->

                    <div class="row">

                        @if ($allPosts->count())

                            @foreach ($allPosts as $post)
                                <div class="col-lg-6 col-md-6 mt-4">
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

                            {{-- Pagination start --}}
                            <div class="pagination mt-5 text-center">
                                {{-- {{ $allPosts->links() }} --}}
                                {{ $allPosts->appends(request()->query())->links() }}
                            </div>
                            {{-- Pagination end --}}

                        @else
                            <div class="col-md-12 mt-4">
                                <h4>No Posts found!</h4>
                            </div>
                        @endif

                    </div>

                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="featured-category">

                        <h6>{{ __('Featured Category') }}</h6>

                        <!-- Show Featured Category start -->
                        @foreach ($featuredCategories as $category)
                            <div class="featured-category-item"
                                style="background-image: url({{ asset(url($category->thumbnail)) }});">
                                <a href="{{ url('/categories/' . $category->slug) }}" class="{{ Request::is('categories/'.$category->slug) ? 'active' : '' }}">{{ $category->name }}</a>
                            </div>
                        @endforeach
                        <!-- Show Featured Category end -->

                    </div>
                    <div class="all-tags">
                        <h6>{{ __('All Tags') }}</h6>
                        <ul class="list-unstyled list-inline all-tags-list">
                            @foreach ($tags as $tag)
                                <li class="list-inline-item mb-2"><a
                                        href="{{ url('/tags/' . $tag->slug) }}">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- All Post Ends Here -->

    @endsection
