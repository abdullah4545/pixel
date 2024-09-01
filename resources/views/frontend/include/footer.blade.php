<footer>
    <div class="container">
        <div class="main-footer">
            <div class="row">
                <div class="col-lg-3">
                    <div class="widget-1">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            @if ( !empty($basicInfo->footer_logo) )
                              <img src="{{ asset($basicInfo->footer_logo) }}" alt="" style="width: 200px;">
                            @else
                              <img src="{{ asset('public/asset/images/logo.png') }}" alt="" style="width: 200px;">
                            @endif
                        </a>
                        <p style="text-align: justify">
                            @if ( !empty($basicInfo->footer_text) )
                                {{ $basicInfo->footer_text }}
                            @else

                            @endif
                        </p>
                        <div class="d-flex mt-3 mb-4" style="justify-content: space-between">
                            <a href="{{$basicInfo->facebook}}" target="_blank">
                                <img src="{{asset('public/facebook.png')}}" alt="" style="width:40px">
                            </a>
                            <a href="{{$basicInfo->linkedin}}" target="_blank">
                                <img src="{{asset('public/linkedin.png')}}" alt="" style="width:40px">
                            </a>
                            <a href="{{$basicInfo->twitter}}" target="_blank">
                                <img src="{{asset('public/skype.png')}}" alt="" style="width:40px">
                            </a>
                            <a href="{{$basicInfo->instagram}}" target="_blank">
                                <img src="{{asset('public/instagram.png')}}" alt="" style="width:40px">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="widget-2">
                        <h4>Our Services</h4>
                        <ul>
                            @forelse(App\Models\Service::where('status',1)->get() as $service)
                                <li>
                                    <a href="{{url('category',$service->slug)}}">
                                        <div class="service_list">
                                            <i class='bx bx-right-arrow-alt' style="color: white;"></i>
                                            <span>{{$service->title}}</span>
                                        </div>
                                    </a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="widget-2">
                        <h4>Quick Links</h4>
                        <ul>
                            <li>
                                <div class="service_list">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    <span>
                                        <a href="{{ url('/about') }}">About Us</a>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="service_list">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    <span>
                                        <a href="{{ url('/contact') }}">Contact Us</a>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="service_list">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    <span>
                                        <a href="{{ url('/terms-condition') }}">Terms & Condition</a>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="service_list">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    <span>
                                        <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div class="service_list">
                                    <i class='bx bx-right-arrow-alt'></i>
                                    <span>
                                        <a href="{{ url('/faq') }}">Faq</a>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="widget-2">
                        <h4>Follow Us On</h4>
                        <img src="{{asset($basicInfo->page_ss)}}" alt="" style="width: 100%;    border-radius: 8px;">
                    </div>
                </div>

                <div class="col-12">
                    <div class="copyright">
                        © Copyright <strong>{{env('APP_NAME')}}</strong>. All Rights Reserved
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
