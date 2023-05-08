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
                    <h2 class="h2 text-purple-950">Category Name: - {{ $post->category->name }}</h2>
                    <h2 class="h2 mt-4">{{ $post->title }}</h2>
                    <div class="mb-3">
                        <img src="{{ asset($post->thumbnail) }}" alt="Post thumbnail" class="post-img-h">
                    </div>
                    <p>{!! $post->details !!}</p>
                </div>

            </div>
        </div>
    </section>
    <!-- All Categories Collection Ends Here -->

    @include('frontend.layouts.footer')
