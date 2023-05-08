    @include('frontend.layouts.navbar')

    <!-- All Categories Collection Starts Here -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="heading h1">Categories</h1>
                </div>
            </div>
            <div class="row">

                @foreach ($categories as $category)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <a href="{{ url('/collections/'.$category->slug) }}">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="h2">{{ $category->name }}</h2>

                                    {{-- Show Category wise Posts --}}
                                    @if (count($category->posts) > 0)
                                        <ul>
                                            @foreach ($category->posts as $post)
                                            <li>{{ $post->title }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        No posts to show!
                                    @endif
                                    {{-- Show Category wise Posts --}}

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- All Categories Collection Ends Here -->

    @include('frontend.layouts.footer')
