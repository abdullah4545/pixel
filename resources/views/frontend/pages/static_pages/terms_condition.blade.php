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

@if(isset($terms->page_banner))
<section class="page-title bg-1" style="background: url({{ asset($terms->page_banner) }}) no-repeat 50% 50%;
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
            <h1 class="text-capitalize mb-5 text-lg">Terms & Condition</h1>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Start Contact Us -->

<!-- Body Content Section start-->
 <div class="privacy_content_section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 m-auto">
                <div class="main_privacy_content">
                    <div class="main_privacy_content_description">
                        {!! $terms->value !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- Body Content Section start-->


@endsection


@push('script-tag')

@endpush
