@extends('frontend.layout.master')

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/asset/css/blog.css') }}">
@endpush


@section('body-content')

@if(isset($basicInfo->pricepage))
<section class="page-title bg-1" style="background: url({{ asset($basicInfo->pricepage) }}) no-repeat 50% 50%;
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
            <h1 class="text-capitalize mb-5 text-lg">See Our Pricing</h1>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- pricelist section start [Done]  -->
<section class="pricelist_section" id="price">

    <div class="container mb-4">
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

@endsection
