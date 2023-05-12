    @include('frontend.layouts.navbar')

    <!-- Page Banner Area Starts Here -->
    <section class="search-area page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center mx-auto">
                    <h4>Tags Page</h4>
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
                    <h1 class="heading h1">Tag</h1>
                </div>
            </div>
            <div class="row">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-4 mb-4">
                        <a href="#" class="">
                            <h6>{{ $post->title }}</h6>
                            <h6>{{ $post->slug }}</h6>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- All Categories Collection Ends Here -->

    @include('frontend.layouts.footer')
