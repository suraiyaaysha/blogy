    @include('frontend.layouts.navbar')

    <!-- All Post Starts Here -->
    <section class="section-padding all-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">Show All Post</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        @foreach ($allPosts as $post )

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
                            {{ $allPosts->links() }}
                        </div>
                        {{-- Pagination end --}}

                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="featured-category">

                        <h6>{{ __('Featured Category') }}</h6>


                        <!-- Show Featured Category start -->
                        @foreach ($featuredCategories as $category)
                            <div class="featured-category-item" style="background-image: url(frontend/assets/images/category-01.jpg);">
                                <a href="#">{{ $category->name }}</a>
                            </div>
                        @endforeach
                        <!-- Show Featured Category end -->

                        {{-- <div class="featured-category-item"
                            style="background-image: url(frontend/assets/images/category-02.jpg);">
                            <a href="#">Food</a>
                        </div>
                        <div class="featured-category-item mb-0"
                            style="background-image: url(frontend/assets/images/category-03.jpg);">
                            <a href="#">Lifestyle</a>
                        </div> --}}
                    </div>
                    <div class="all-tags">
                        <h6>All Tags</h6>
                        <ul class="list-unstyled list-inline all-tags-list">
                            <li class="list-inline-item"><a href="#">Journey</a></li>
                            <li class="list-inline-item"><a href="#">Life</a></li>
                            <li class="list-inline-item"><a href="#">Food</a></li>
                            <li class="list-inline-item"><a href="#">Fashion</a></li>
                            <li class="list-inline-item"><a href="#">UI</a></li>
                        </ul>
                        <ul class="list-unstyled list-inline all-tags-list mb-0">
                            <li class="list-inline-item"><a href="#">Interior</a></li>
                            <li class="list-inline-item"><a href="#">Minimalistic</a></li>
                            <li class="list-inline-item"><a href="#">Design</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- All Post Ends Here -->

    @include('frontend.layouts.footer')