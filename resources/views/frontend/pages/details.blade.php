@extends('frontend.layout.master')


@push('meta-title')
    Danpite Tech
@endpush


@section('body-content')

<!-- Banner Section start-->
<section class="detail_banner_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner_content_details">{{ $service->title }}</div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section end-->


<!-- Service Details Section start-->
<section class="service_details">
    <div class="container">
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
</section>
<!-- Service Details Section end-->


<!-- Materials Section start-->
<section class="material_section" style="padding:0px">
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
            @foreach ($pricePlan_details as $pricePlan)
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
<!-- Materials Section start-->


<!-- Projects section start [Done] -->
<section class="project-section" id="project">
  <div class="container">
      <div class="row">
          <div class="project-headtitle">
             <h1 class="mb-4" style="color: #0b0977">Project Done By Our Team</h1>

             <div class="project-galary">
                @foreach ($project_details as $project)
                    <a href="{{ url('details',\App\Models\Service::where('id',$project->service_id)->first()->slug) }}"><img src="{{ asset($project->project_img) }}" alt="{{ $project->name }}"></a>
                @endforeach
             </div>
          </div>
      </div>
  </div>
</section>
<!-- Projects section end -->


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



@endsection



@push('script-tag')

    <script>
        AOS.init();
    </script>

   <script>
        let shuffle_list = document.querySelectorAll('.shuffle_tab_menu ul li');
        let shuffle_content = document.querySelectorAll('.shuffle_content');

        shuffle_list.forEach((item, index) =>{
            item.addEventListener("click", function(){
                    // console.log(item, index)
                item.classList.add('shuffle_active');

                shuffle_list.forEach((item2, i) => {
                    if( i!= index){
                        item2.classList.remove('shuffle_active');
                    }
                })


                shuffle_content.forEach((content, i) =>{
                    if( i!= index){
                        content.classList.remove('content_active');
                    }
                    else{
                        content.classList.add('content_active');
                    }
                })
            })
        })

   </script>
@endpush
