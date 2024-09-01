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
    $contactus = App\Models\Information::where('key', 'contact_us')->first();
@endphp

@if(isset($contactus->page_banner))
<section class="page-title bg-1" style="background: url({{ asset($contactus->page_banner) }}) no-repeat 50% 50%;
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
            <h1 class="text-capitalize mb-5 text-lg">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- Start Contact Us -->
<section class="contact-us section pt-4">
    <div class="container">
        <div class="contact-info">
            <div class="row">
                <!-- single-info -->
                <div class="col-lg-4 col-12 mb-3">
                    <a href="mailto:{{ $basicInfo->email }}">
                    <div class="single-info">
                        <i class='bx bx-envelope'></i>
                        <div class="content">
                            <h3>{{ $basicInfo->email }}</h3>
                            <p>Click here to email !</p>
                        </div>
                    </div>
                    </a>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 mb-3">
                    <a href="tel:{{ $basicInfo->phone }}">
                    <div class="single-info">
                        <i class='bx bx-phone-call'></i>
                        <div class="content">
                            <h3>{{ $basicInfo->phone }}</h3>
                            <p>Click here to call !</p>
                        </div>
                    </div>
                    </a>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 mb-3">
                    <div class="single-info">
                        <i class='bx bx-map'></i>
                        <div class="content">
                            <p class="mt-0 pt-0">{{ $basicInfo->address }}</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->

            </div>
        </div>
        <div class="inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-us-left pt-4 ps-2">
                        <!--Start Google-map -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.4992984492!2d90.25487052696046!3d23.781067241102527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1725044214364!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!--/End Google-map -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-form">
                        <h2>Contact With Us</h2>
                        <p>If you have any questions please fell free to contact with us.</p>
                        <!-- Form -->
                        <form id="createForm" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <input class="form-control form-control-lg" type="text" name="name" id="" placeholder="Your Name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <input class="form-control form-control-lg" type="text" name="mobile" id="" placeholder="Your Mobile">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input class="form-control form-control-lg" type="email" name="email" id="" placeholder="Your Email">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <select class="form-select form-select-lg mb-3" name="service">
                                        <option selected>Open this select menu</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="note" style="height: 100px" required></textarea>
                                    <label for="floatingTextarea2">Special Notes</label>
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

    </div>
</section>
<!-- End Contact Us -->

@endsection


@push('script-tag')
<script>
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
