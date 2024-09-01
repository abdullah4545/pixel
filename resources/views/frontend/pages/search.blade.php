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
            <h1 class="text-capitalize mb-5 text-lg">Search Content: {{$title}}</h1>
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

                    <div class="service-list">
                        @forelse ($searchs as $service)
                            <div class="service-details">
                                <a href="{{ route('service.details', $service->id) }}">
                                    <img src="{{ asset( $service->service_img ) }}" alt="">
                                </a>
                                <div class="service-content">
                                    <a href="{{ route('service.details', $service->id) }}" style="color: black">
                                        <h2>{{ $service->title }}</h2>
                                    </a>
                                    <div class="d-flex" style="justify-content:space-between">
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
                                        <div class="like" style="margin-bottom: 24px;">
                                            <div class="d-flex" style="justify-content: space-around;font-size: 14px;">
                                                <span style="padding-right:14px;"><span class="sts" style="padding-right: 4px;font-size:18px;"
                                                        id="likereactof{{ $service->id }}">{{ App\Models\React::where('service_id', $service->id)->where('sigment','like')->get()->count() }}</span><i
                                                        @if(App\Models\React::where('service_id', $service->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','like')->first()) style="color:green !important;font-size:22px;cursor:pointer" @else  style="font-size:22px;cursor:pointer"  @endif class="fas fa-thumbs-up" id="likereactdone{{ $service->id }}"
                                                        onclick="givereactlike({{ $service->id }})"></i></span>
                                                <span><span class="sts" style="padding-right: 4px;font-size:18px;"
                                                        id="lovereactof{{ $service->id }}">{{ App\Models\React::where('service_id', $service->id)->where('sigment','love')->get()->count() }}</span><i
                                                        @if(App\Models\React::where('service_id', $service->id)->whereIn('user_id', [\Request::ip(),Auth::id()])->where('sigment','love')->first()) style="color:red !important;font-size:22px;cursor:pointer" @else  style="font-size:22px;cursor:pointer" @endif class="fas fa-heart" id="lovereactdone{{ $service->id }}"
                                                            onclick="givereactlove({{ $service->id }})"></i></span>
                                            </div>
                                        </div>
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
                        @empty
                        <div class="card card-body">
                            No data found with this search content
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service section end -->


@endsection
