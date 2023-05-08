    @include('frontend.layouts.navbar')

    <!-- All Categories Collection Starts Here -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="heading h1">Category Slug wise Posts</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h2 class="h2 text-primary">{{ $category->name }}</h2>
                    {{-- Show Category wise Posts --}}
                    @if (count($category->posts) > 0)
                        <ul>
                            @foreach ($category->posts as $post)
                            <li>
                                <a href="{{ url('/collections/'.$category->slug.'/'.$post->slug) }}">{{ $post->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        No posts to show!
                    @endif
                    {{-- Show Category wise Posts --}}
                </div>

            </div>
        </div>
    </section>
    <!-- All Categories Collection Ends Here -->

    @include('frontend.layouts.footer')
