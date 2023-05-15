    @extends('frontend.layouts.app')

    @section('content')

    <!-- Page Banner Area Starts Here -->
    <section class="search-area page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center mx-auto">
                    <h4>Categories Page</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner Area Ends Here -->

    <!-- All Categories Collection Starts Here -->
    <section class="section-padding home-featured-category-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="heading h1">Category</h1>
                </div>
            </div>
            <div class="row">

                @foreach ($categories as $category)
                    <div class="col-lg-4 col-md-4 mb-4">
                        <a href="{{ url('/categories/'.$category->slug) }}" class="post-feature featured-category-home-item d-block">
                            <h6>{{ $category->name }}</h6>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- All Categories Collection Ends Here -->

    @endsection
