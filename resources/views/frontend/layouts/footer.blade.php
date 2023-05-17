    <!-- Footer Starts Here -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-lg-between">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <a href="/">
                            <img src="{{ asset(url($cms->app_logo)) }}" alt="logo">
                        </a>
                        <p>{{$cms->footer_about}}</p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-2">
                    <div class="footer-wizard">
                        <h6>{{ __('Category') }}</h6>
                        <ul class="list-unstyled">
                            <!-- Show Featured Category start -->
                            @foreach ($featuredCategories as $category)
                                <li><a href="{{ url('/categories/'.$category->slug) }}">{{ $category->name }}</a></li>
                            @endforeach
                            <!-- Show Featured Category end -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3">
                    <div class="footer-wizard">
                        <h6>{{ __('Follow us') }}</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ $cms->facebook_url }}" target="_blank">{{ __('Facebook') }}</a></li>
                            <li><a href="{{ $cms->twitter_url }}" target="_blank">{{ __('Twitter') }}</a></li>
                            <li><a href="{{ $cms->instagram_url }}" target="_blank">{{ __('Instagram') }}</a></li>
                            <li><a href="{{ $cms->youtube_url }}" target="_blank">{{ __('Youtube') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-wizard">
                        <h6>{{ __('Newsletter') }}</h6>
                        <form id="subscribeForm" action="{{ route('subscribe') }}" method="POST">
                            @csrf
                            <div class="footer-wizard-form">
                                <input type="email" name="email" placeholder="{{ __('Enter Email') }}">
                                <button type="submit" class="btn btn-default btn-default-sm">{{ __('Subscribe') }}</button>
                            </div>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </form>

                    </div>

                </div>
            </div>
            <div class="copy-right">
                {{-- <p>&copy; {{ date('Y') }} - {{ __('Blogy') }}</p> --}}
                <p>&copy; {{ date('Y') }} - {{ env('APP_NAME') }}</p>
                <p>{{ __('Designed & Develop by') }} <a href="{{ $cms->company_url }}" target="_blank">{{ $cms->company_name }}</a></p>
            </div>
        </div>
    </footer>
    <!-- Footer Ends Here -->
