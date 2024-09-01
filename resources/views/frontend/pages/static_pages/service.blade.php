@extends('frontend.layout.master')

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/asset/css/blog.css') }}">
@endpush


@section('body-content')

@if(isset($basicInfo->servicepage))
<section class="page-title bg-1" style="background: url({{ asset($basicInfo->servicepage) }}) no-repeat 50% 50%;
background-size: cover;">
@else
<section class="page-title bg-1" style="background: url({{ asset('public/asset/images/22.jpg') }}) no-repeat 50% 50%;
background-size: cover;">
@endif
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <h1 class="text-capitalize mb-5 text-lg">See Our Services</h1>
          </div>
        </div>
      </div>
    </div>
</section>


<!-- service section start [Done] -->
<section class="service-section" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="service-container" id="propro">

                    <div class="row" style="background:none;padding:0;">
                        @foreach ($services as $key=>$service)
                            @if(($key+2) % 2 == 0)
                                <div class="col-12 mb-3">
                                    <div class="card card-body" style="background: #f3f5ff;border: 1px solid #efefef;">
                                        <div class="row">
                                            <div class="col-12 col-lg-5 mb-2">
                                                <a href="{{ route('service.details', $service->slug) }}">
                                                    <img src="{{ asset( $service->service_img ) }}" alt="" style="width:100%">
                                                </a>
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-12 col-lg-6 mb-2">
                                                <div class="service-content">
                                                    <a href="{{ route('service.details', $service->slug) }}" style="color: black">
                                                        <h2>{{ $service->title }}</h2>
                                                        <h4>{{$service->small_title}}</h4>
                                                        <div>
                                                            {!!$service->long_description!!}
                                                        </div>
                                                    </a>
                                                    <div class="d-flex mt-4" style="justify-content:space-between">
                                                        <div class="star-ratings">
                                                            @if ( $service->ratings == 2 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @elseif( $service->ratings == 3 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @elseif( $service->ratings == 4 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @elseif( $service->ratings == 5 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="action-service">
                                                        <a href="{{ route('service.details', $service->slug) }}">
                                                            <button class="chat-btn">View More</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 mb-3">
                                    <div class="card card-body" style="background:#f2fff2;border: 1px solid #efefef;">
                                        <div class="row">
                                            <div class="col-12 col-lg-6 mb-2">
                                                <div class="service-content">
                                                    <a href="{{ route('service.details', $service->slug) }}" style="color: black">
                                                        <h2>{{ $service->title }}</h2>
                                                        <h4>{{$service->small_title}}</h4>
                                                        <div>
                                                            {!!$service->long_description!!}
                                                        </div>
                                                    </a>
                                                    <div class="d-flex mt-4" style="justify-content:space-between">
                                                        <div class="star-ratings">
                                                            @if ( $service->ratings == 2 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @elseif( $service->ratings == 3 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @elseif( $service->ratings == 4 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @elseif( $service->ratings == 5 )
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            <i class='bx bxs-star' ></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="action-service">
                                                        <a href="{{ route('service.details', $service->slug) }}">
                                                            <button class="chat-btn">View More</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1"></div>
                                            <div class="col-12 col-lg-5 mb-2">
                                                <a href="{{ route('service.details', $service->slug) }}">
                                                    <img src="{{ asset( $service->service_img ) }}" alt="" style="width:100%">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section end -->


@endsection
