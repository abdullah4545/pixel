@extends('frontend.layout.master')

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/asset/css/blog.css') }}">
@endpush


@section('body-content')

@if(isset($singleBlog->image))
<section class="page-title bg-1" style="background: url({{ asset($singleBlog->image) }}) no-repeat 50% 50%;
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
            <h1 class="text-capitalize mb-5 text-lg">{{$singleBlog->title}}</h1>
          </div>
        </div>
      </div>
    </div>
</section>


<section class="section blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset($singleBlog->image) }}" alt="" class="img-fluid" style="border-radius: 8px;">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="mb-3">{{$singleBlog->title}}</h2>
                        <div class="blog-item-meta mb-3">
                            <span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>{{$singleBlog->created_at->format('D')}}</span>,
                            <span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i> {{$singleBlog->created_at->format('d M Y')}}</span>
                        </div>
                        <p>{{$singleBlog->short_description}}</p>
                    </div>
                </div>
                <div class="row mb-4 mt-4 pt-4">
                    @if(isset($singleBlog->postImage))
                        <h2 class="text-capitalize mb-5 text-center">Some More Related Images</h2>
                        @foreach(json_decode($singleBlog->postImage) as $single)
                            <div class="col-lg-4 mb-5">
                                <img src="{{ asset('public/images/blogpages/slider') }}/{{$single}}" alt="" class="img-fluid" style="border-radius: 8px;">
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="row mt-4">
                    <h2 class="text-capitalize mb-5 text-center">Details About This Post</h2>
                    {!!$singleBlog->description!!}
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
