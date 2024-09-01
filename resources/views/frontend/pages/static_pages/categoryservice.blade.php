@extends('frontend.layout.master')

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/asset/css/blog.css') }}">
@endpush


@section('body-content')

<section class="page-title bg-1" style="background: url({{ asset('public/asset/images/22.jpg') }}) no-repeat 50% 50%;
background-size: cover;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <h1 class="text-capitalize mb-5 text-lg">Service List Of {{$category->cat_name}}</h1>
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
                <div class="service-container"> 

                    <div class="service-list">
                        @foreach ($services as $service)
                            <div class="service-details">
                                <a href="{{ route('service.details', $service->id) }}">
                                    <img src="{{ asset( $service->service_img ) }}" alt="">
                                </a>
                                <div class="service-content">
                                    <a href="{{ route('service.details', $service->id) }}" style="color: black">
                                        <h2>{{ $service->title }}</h2>
                                    </a>
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

                                    <div class="action-service">
                                        <a href="{{ route('service.details', $service->id) }}"><span>Read More</span>
                                            <i class='bx bx-right-arrow-alt'></i>
                                        </a>

                                        <a target="_blank" href="https://wa.me/{{ $service->whatsapp }}?text=I%20am%20interested%20for%20{{ $service->title }}">
                                            <button class="chat-btn">Chat Now</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section end -->


@endsection
