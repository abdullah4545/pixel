@extends('frontend.layout.master')

@section('meta')
    @php
        $basicinfo=\App\Models\BasicInfo::first();
    @endphp
    <title>{{$basicinfo->meta_title}}</title>
    <meta name="description" content="{{$basicinfo->meta_description}}">
    <meta name="keywords" content="{{$basicinfo->meta_keyword}}">

    <meta itemprop="name" content="{{$basicinfo->meta_title}} | {{env('APP_NAME')}}">
    <meta itemprop="description" content="{{$basicinfo->meta_description}}">
    <meta itemprop="image" content="{{env('APP_URL')}}{{$basicinfo->meta_image}}">

    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$basicinfo->meta_title}}  | {{env('APP_NAME')}}">
    <meta property="og:description" content="{{$basicinfo->meta_description}}">
    <meta property="og:image" content="{{env('APP_URL')}}{{$basicinfo->meta_image}}">
    <meta property="image" content="{{env('APP_URL')}}{{$basicinfo->meta_image}}" />
    <meta property="url" content="{{env('APP_URL')}}">
    <meta itemprop="image" content="{{env('APP_URL')}}{{$basicinfo->meta_image}}">
    <meta property="twitter:card" content="{{env('APP_URL')}}{{$basicinfo->meta_image}}" />
    <meta property="twitter:title" content="{{$basicinfo->meta_title}} | {{env('APP_NAME')}}" />
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta name="twitter:image" content="{{ env('APP_URL') }}{{$basicinfo->meta_image}}">
@endsection


@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/asset/css/blog.css') }}">
@endpush

@section('body-content')

@php
    $aboutus = App\Models\Information::where('key', 'about_us')->first();
@endphp

@if(isset($aboutus->page_banner))
<section class="page-title bg-1" style="background: url({{ asset($aboutus->page_banner) }}) no-repeat 50% 50%;
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
            <h1 class="text-capitalize mb-5 text-lg">About Us</h1>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Start Contact Us -->

<!-- About section start [Done] -->
<section class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6 order-1 order-lg-0">
                <div class="about-image">
                    @if ( !empty($about->image) )
                        <img src="{{ asset($about->image) }}" alt="" style="width: 100%;">
                    @else
                        <img src="{{ asset('public/asset/images/about-image.jpg') }}" alt="" style="width: 100%;">
                    @endif
                </div>
            </div>

            <div class="col-lg-6 col-xl-6 order-0 order-lg-1">
                <div class="about-info">
                    <h1>
                        @if ( !empty($about->title) )
                            {{ $about->title }}
                        @else
                            "Demo Title"
                        @endif
                    </h1>


                    <div class="about-contents">
                        @if ( !empty($about->description) )
                            {!! $about->description !!}
                        @else
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias, architecto earum ducimus animi cum assumenda minus autem vitae numquam distinctio adipisci ad ratione deserunt fugiat.
                        @endif

                    </div>

                    <a href="{{ !empty($about->url) && $about->url  }}">
                        <button class="btn-join">Join Us</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About section start -->


<!-- pro-service section start [Done] -->
  <section class="pro-service-section">
    <div class="container">
        <div class="pro-service-container">
              <div class="service-images">
                  @if ( !empty($professional->image) )
                      <img src="{{ asset($professional->image) }}" alt="">
                  @else
                      <img src="{{ asset('public/asset/images/paint-house.png') }}" alt="">
                  @endif
              </div>

              <div class="professional-service">
                  <h5>
                      @if ( !empty($professional->small_title) )
                          {{ $professional->small_title }}
                      @else
                          "Demo Title"
                      @endif
                  </h5>

                  <h1>
                      @if ( !empty($professional->main_title) )
                          {{ $professional->main_title }}
                      @else
                          "Demo Title"
                      @endif
                  </h1>

                  <div class="professional-paragraph">
                      @if ( !empty($professional->description) )
                           {!! $professional->description !!}
                      @else
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae cupiditate, temporibus facilis nulla est maxime, dolorem dolor fuga pariatur unde, non dolore obcaecati illo delectus.
                      @endif
                  </div>


                  <a href="{{ !empty($professional->url) && $professional->url  }}">
                      <button class="btn-watch">Watch Video</button>
                  </a>
              </div>
        </div>
    </div>
  </section>
<!-- pro-service section end -->


<!-- Safety section start [Done] -->
<section class="safty-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="safety-headtitles">
                <h1>We care about your safety...</h1>
            </div>

            <div class="col-lg-5">
               <div class="safety-service-container">
                    <div class="safety-service">
                        @if ( !empty($safety->safty_img1) )
                           <img src="{{ asset($safety->safty_img1) }}" alt="">
                        @else
                          <img src="{{ asset('public/asset/images/mask.png') }}" alt="">
                        @endif


                        @if ( !empty($safety->safty_content1) )
                          <h4>{{ $safety->safty_content1 }}</h4>
                        @else
                          <h4>Ensuring Maskes</h4>
                        @endif
                    </div>

                    <div class="safety-service">
                      @if ( !empty($safety->safty_img2) )
                          <img src="{{ asset($safety->safty_img2) }}" alt="">
                      @else
                          <img src="{{ asset('public/asset/images/phone.png') }}" alt="">
                      @endif


                      @if ( !empty($safety->safty_content2) )
                         <h4>{{ $safety->safty_content2 }}</h4>
                      @else
                         <h4>24/7 Support</h4>
                      @endif
                    </div>

                    <div class="safety-service">
                      @if ( !empty($safety->safty_img3) )
                          <img src="{{ asset($safety->safty_img3) }}" alt="">
                      @else
                          <img src="{{ asset('public/asset/images/hand.png') }}" alt="">
                      @endif


                      @if ( !empty($safety->safty_content3) )
                          <h4>{{ $safety->safty_content3 }}</h4>
                      @else
                          <h4>Sanitising hands & Equipment</h4>
                      @endif
                    </div>

                    <div class="safety-service">
                      @if ( !empty($safety->safty_img4) )
                          <img src="{{ asset($safety->safty_img4) }}" alt="">
                      @else
                          <img src="{{ asset('public/asset/images/open-hands.png') }}" alt="">
                      @endif

                      @if ( !empty($safety->safty_content4) )
                          <h4>{{ $safety->safty_content4 }}</h4>
                      @else
                          <h4>Ensuring Gloves</h4>
                      @endif
                    </div>
               </div>
            </div>

            <div class="col-lg-7">
                <div class="youtube-video">
                      @if ( !empty($safety->youtube_url) )
                         {!! $safety->youtube_url !!}
                      @else
                          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis, ex. Deserunt sapiente officia iste nostrum reiciendis, ipsam, aliquid labore repudiandae voluptas voluptatum tempora, magni totam?
                      @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Safety section end -->


<!-- Logo section start -->
<section class="logo-section" id="galary">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-container">
                    <h1>We can supply and use any below brand of paints of client choice.</h1>

                    <div class="owl-carousel owl-theme" id="logo-slider">
                      @foreach ($logos as $logo)
                          <div class="logo-div">
                              <a href="{{ $logo->url }}">
                                  <img src="{{ asset($logo->logo_img) }}" alt="">
                              </a>
                          </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Logo section end -->


<!-- Review section start -->
<section class="review-section">
    <div class="container">
        <div class="row">
            <div class="review-container">
                <h1>Client's Review</h1>

                <div class="owl-carousel owl-theme" id="review-slider">
                      @foreach ( $reviews as $review )
                          <div class="review-content">
                              <div class="review-content-head">
                                  <img src="{{ asset( $review->review_img ) }}" alt="">

                                  <div class="review-ratings-deatils">
                                      <h4>{{ $review->name }}</h4>
                                      <div class="star-ratings">
                                          @if ( $review->ratings == 2 )
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                          @elseif( $review->ratings == 3 )
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                          @elseif( $review->ratings == 4 )
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                          @elseif( $review->ratings == 5 )
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                              <i class='bx bxs-star' ></i>
                                          @endif
                                      </div>
                                  </div>
                              </div>

                              <p>{{ $review->description }}</p>
                          </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Review section end -->

@endsection


@push('script-tag')
<script>
    $('#logo-slider').owlCarousel({
        loop: true,
        margin: 40,
        autoplay: true,
        nav: true,
        dots: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive:{
            0:{
                dots: false,
                items: 2
            },
            600:{
                dots: false,
                items: 3
            },
            1000:{
                dots: false,
                items: 5
            }
        }
    })

    $('#review-slider').owlCarousel({
        loop: true,
        margin: 40,
        autoplay: true,
        nav: true,
        dots: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive:{
            0:{
                dots: true,
                items: 1
            },
            576:{
                dots: true,
                items: 1
            },
            993:{
                dots: true,
                items: 2
            },
           1200: {
               dots: true,
               items: 3
           }
        }
    })
</script>
@endpush
