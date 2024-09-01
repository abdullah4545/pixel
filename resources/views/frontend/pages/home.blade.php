
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

    <style>
        #h1txt{
            text-align: -webkit-center;
            font-size: 30px;
            text-decoration: none;
            color: #231557;
        }
        #h1txt span {
            padding: 0px 15px;
            display: table-cell;
            animation: animate 0.9s infinite;
            font-weight: bold;
        }

        /* Specify the animation keyframes
        to be used to move the letters */
        @keyframes animate {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0px);
        }
        }

        /* Specify a slight delay for
        each of the letters */
        #h1txt span:nth-child(1) {
        animation-delay: 0.3s;
        }

        #h1txt span:nth-child(2) {
        animation-delay: 0.4s;
        }

        #h1txt span:nth-child(3) {
        animation-delay: 0.5s;
        }

        #h1txt span:nth-child(4) {
        animation-delay: 0.6s;
        }

        #h1txt span:nth-child(5) {
        animation-delay: 0.7s;
        }

        #h1txt span:nth-child(6) {
        animation-delay: 0.8s;
        }

        #h1txt span:nth-child(7) {
        animation-delay: 0.9s;
        }

        #h1txt span:nth-child(8) {
        animation-delay: 0.9s;
        }

        #h1txt span:nth-child(9) {
        animation-delay: 1s;
        }

        #h1txt span:nth-child(10) {
        animation-delay: 1.1s;
        }

        #h1txt span:nth-child(11) {
        animation-delay: 1.2s;
        }

        #h1txt span:nth-child(12) {
        animation-delay: 1.3s;
        }

        #h1txt span:nth-child(13) {
        animation-delay: 1.4s;
        }
    </style>
@endsection


@section('body-content')

 <!-- Banner section start [Done] -->
 <section class="banner-section">
    <div class="container">
      <div class="banner-poster">
        <div class="row align-items-center">
          <div class="col-lg-6">
                <h4 style="margin-bottom: 15px;font-weight: bold;font-size: 20px;">{{ $banner->title }}</h4>
                <h1 class="animate-charcter">
                    @if ( !empty( $banner->text ) )
                       {{ $banner->text }}
                    @else
                        "Demo Title"
                    @endif
                </h1>
                <p class="mb-3" style="font-size: 15px;margin-bottom: 30px;font-weight: 600;color: #2f1c6a !important;line-height: 26px;">{{$banner->small_title}}</p>
                <a href="{{$banner->button_link}}" class="btn btn-primary" style="background: #09057b;color:white;font-weight:bold">{{$banner->button_name}}</a>
            </div>

            <div class="col-lg-6">
              <div class="img-container" style="cursor: pointer">
                @if ( !empty($banner->banner_img) )
                   <img src="{{ asset($banner->banner_img) }}" id="bannerimage" onmouseout="changeimage()" onmouseover="changeimage()" alt="">
                @else
                   <img src="{{ asset('public/asset/images/banner-image.png') }}" alt="">
                @endif
              </div>
           </div>
        </div>
      </div>
    </div>
</section>
<!-- Banner section end -->

<!-- Logo section start -->
  <section class="logo-section" id="galary">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="logo-container">
                      <h1 class="animate-charcterto">Valuable Client List</h1>

                      <div class="owl-carousel owl-theme" id="logo-slider">
                        @foreach ($logos as $logo)
                            <div class="logo-div">
                                <img src="{{ asset($logo->logo_img) }}" alt="">
                            </div>
                        @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
<!-- Logo section end -->

<!-- About section start [Done] -->
<section class="about-section pb-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="about-image">
                    @if ( !empty($about->image) )
                        <img src="{{ asset($about->image) }}" id="portabout"  onmouseout="changeimageport()" onmouseover="changeimageport()" alt="" style="width: 100%;border-radius: 8px;">
                    @else
                        <img src="{{ asset('public/asset/images/about-image.jpg') }}" alt="" style="width: 100%;border-radius: 8px;">
                    @endif
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="about-info">
                    <h1 class="mb-3 pb-lg-3" style="color:#09057b;font-weight:bold;">
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

                    <a href="{{ $about->url }}">
                        <button class="btn-join">Let's Chat</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About section start -->

<!-- service section start [Done] -->
<section class="service-section pb-0" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="service-container" id="propro">
                    <h1 id="h1txt">
                        <span style="padding: 3px">S</span>
                        <span style="padding: 3px">E</span>
                        <span style="padding: 3px;padding-right:10px;">E</span>
                        <span style="padding: 3px;padding-left:10px;">O</span>
                        <span style="padding: 3px">U</span>
                        <span style="padding: 3px;padding-right:10px;">R</span>
                        <span style="padding: 3px;padding-left:10px;">S</span>
                        <span style="padding: 3px">E</span>
                        <span style="padding: 3px">R</span>
                        <span style="padding: 3px">V</span>
                        <span style="padding: 3px">I</span>
                        <span style="padding: 3px">C</span>
                        <span style="padding: 3px">E</span>
                    </h1>

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

<!-- pricelist section start [Done]  -->
<section class="pricelist_section pb-0" id="price">
    <div class="container">
        <div class="row">
            <div class="price_head">
                <h1 id="h1txt">
                    <span style="padding: 3px">S</span>
                    <span style="padding: 3px">E</span>
                    <span style="padding: 3px;padding-right:10px;">E</span>
                    <span style="padding: 3px;padding-left:10px;">O</span>
                    <span style="padding: 3px">U</span>
                    <span style="padding: 3px;padding-right:10px;">R</span>
                    <span style="padding: 3px;padding-left:10px;">P</span>
                    <span style="padding: 3px">R</span>
                    <span style="padding: 3px">I</span>
                    <span style="padding: 3px">C</span>
                    <span style="padding: 3px">I</span>
                    <span style="padding: 3px">N</span>
                    <span style="padding: 3px">G</span>
                </h1>
            </div>
        </div>

        <div class="row">
            @foreach ($pricePlans as $pricePlan)
                <div class="col-12 col-lg-6 mb-4">
                    <div class="main-price-list">
                        <div class="image p-1">
                            <img src="{{asset($pricePlan->price_image)}}" alt="" style="width:100%;border-radius:6px;max-height:260px">
                        </div>
                        <div class="p-2">
                            <h4>{{ $pricePlan->price_title }}</h4>

                            <div class="price-list-menu" style="text-align: justify">
                                {{ $pricePlan->price_desc }}
                            </div>

                            <div class="text-center d-flex" style="    justify-content: space-between;">
                                <p style="text-align: left;font-weight: bold;background: #ab00aa;color: white;padding: 2px 20px;border-radius: 2px 30px;">
                                    FROM: {{$pricePlan->price}} TK
                                    <br>
                                    Per Image
                                </p>

                                <a target="_blank" href="https://wa.me/{{ $pricePlan->whatsapp }}?text=I%20am%20interested%20for%20{{ $pricePlan->price_package }}" style="background-color: #09057b;font-size: 18px;color: #fff;padding: 10px 25px;border-radius: 8px;">
                                    <i class='bx bxl-whatsapp'></i>
                                    <label class="chat-text">Get Quote</label>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- pricelist section end -->


<!-- Projects section start [Done] -->
<section class="project-section" id="project">
  <div class="container">
      <div class="row">
          <div class="project-headtitle">
             <h1 class="mb-4" style="color: #0b0977">Project Done By Our Team</h1>

             <div class="project-galary">
                @foreach ($projects as $project)
                    <a href="{{ url('details',\App\Models\Service::where('id',$project->service_id)->first()->slug) }}"><img src="{{ asset($project->project_img) }}" alt="{{ $project->name }}"></a>
                @endforeach
             </div>
          </div>
      </div>
  </div>
</section>
<!-- Projects section end -->


<!-- Safety section start [Done] -->
<section class="safty-section">
  <div class="container">
      <div class="row align-items-center">
          <div class="safety-headtitles">
              <h1 style="color: #0b0977">Why Choose Us</h1>
          </div>

          <div class="col-lg-12 pb-4">
                <div class="row">
                    <div class="col-6 col-lg-3">
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
                    </div>
                    <div class="col-6 col-lg-3">
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
                    </div>
                    <div class="col-6 col-lg-3">
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
                    </div>
                    <div class="col-6 col-lg-3">
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
          </div>
          <div class="col-12 col-lg-8 m-auto pt-4">
            <iframe width="100%" height="315"
                src="https://www.youtube.com/embed/{{$safety->youtube_url}}">
            </iframe>
          </div>
      </div>
  </div>
</section>
<!-- Safety section end -->


<!-- Emergency-call section start -->
   <section class="emergency-section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="emergency-details">
                      <h1><i class='bx bx-phone-call'></i> Need Emergency Painting? Call us 24/7 For Expert Help</h1>
                        @if ( !empty($basicInfo->phone) )
                            <a href="tel:{{ $basicInfo->phone }}">Call {{ $basicInfo->phone }}</a>
                        @else
                        @endif
                  </div>
              </div>
          </div>
      </div>
   </section>
<!-- Emergency-call section end -->

<!-- Review section start -->
  <section class="review-section mt-4">
      <div class="container">
          <div class="row">
              <div class="review-container">
                  <h1 style="color: #0b0977">Client's Review</h1>

                  <div class="owl-carousel owl-theme" id="review-slider">
                        @foreach ( $reviews as $review )
                            <div class="review-content">
                                <div class="review-content-head">
                                    <img src="{{ asset( $review->review_img ) }}" alt="">

                                    <div class="review-ratings-deatils">
                                        <h4>{{ $review->name }}</h4>
                                        <div class="star-ratings">
                                            @if ( $review->rating == 2 )
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                            @elseif( $review->rating == 3 )
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                            @elseif( $review->rating == 4 )
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                            @elseif( $review->rating == 5 )
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


<!-- Contact section start -->
 <section class="contact-section">
    <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-6">
             <div class="contact-img">
                 <img src="{{ asset($basicInfo->contact_image) }}" alt="">
             </div>
          </div>

          <div class="col-lg-6">
              <div class="contact-form">
                  <h1>{{$basicInfo->contact_title}}</h1>
                  <p>{{$basicInfo->contact_description}}</p>

                  <form id="createForm" method="POST">
                    @csrf

                      <div class="row">
                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <input class="form-control form-control-lg" type="text" name="name" id="" placeholder="Full Name">
                              </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="mb-3">
                                  <input class="form-control form-control-lg" type="text" name="mobile" id="" placeholder="Phone">
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-12">
                          <div class="mb-3">
                            <input class="form-control form-control-lg" type="email" name="email" id="" placeholder="Email">
                          </div>
                      </div>

                      <div class="col-lg-12">
                          <div class="mb-3">
                              <select class="form-select form-select-lg mb-3" name="service">
                                  <option selected>Select a Service</option>
                                  @foreach ($services as $service)
                                     <option value="{{ $service->id }}">{{ $service->title }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>

                      <div class="col-lg-12">
                          <div class="form-floating">
                              <textarea class="form-control" placeholder="Write your query here" id="floatingTextarea2" name="note" style="height: 100px" required></textarea>
                              <label for="floatingTextarea2">Messages</label>
                          </div>
                      </div>

                      <div class="d-flex justify-content-end">
                          <button class="contact-btn-submit">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
 </section>
<!-- Contact section end -->


<input type="hidden" value="0" name="loading" id="loading">
<input type="hidden" value="{{$banner->banner_img}}" name="before" id="before">
<input type="hidden" value="{{$banner->banner_img_after}}" name="after" id="after">

<input type="hidden" value="0" name="portvalue" id="portvalue">
<input type="hidden" value="{{$about->image}}" name="portbefore" id="portbefore">
<input type="hidden" value="{{$about->image_after}}" name="portafter" id="portafter">


@endsection



@push('script-tag')

<script>
    AOS.init();
</script>

<script>
    function changeimage(){
        var load =$('#loading').val();
        if(load==0){
            var after =$('#after').val();
            $('#loading').val(1);
            $('#bannerimage').attr('src',after);
        }else{
            var before =$('#before').val();
            $('#loading').val(0);
            $('#bannerimage').attr('src',before);
        }
    }

    function changeimageport(){
        console.log('ds');
        var portload =$('#portvalue').val();
        if(portload==0){
            var portafter =$('#portafter').val();
            $('#portvalue').val(1);
            $('#portabout').attr('src',portafter);
        }else{
            var portbefore =$('#portbefore').val();
            $('#portvalue').val(0);
            $('#portabout').attr('src',portbefore);
        }
    }

    $('#logo-slider').owlCarousel({
        loop: true,
        margin: 40,
        autoplay: true,
        nav: false,
        dots: false,
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

            // Create Logo
            $('#createForm').submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('contact-now') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    if (res.status === true) {
                        $('#createForm')[0].reset();

                        swal.fire({
                            title: "Success",
                            text: `${res.message}`,
                            icon: "success"
                        })
                    }
                },
                error: function (err) {
                    console.error('Error:', err);
                    swal.fire({
                        title: "Failed",
                        text: "Something Went Wrong !",
                        icon: "error"
                    })
                }
            });
        })
</script>

@endpush
