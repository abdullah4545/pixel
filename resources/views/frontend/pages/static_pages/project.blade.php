@extends('frontend.layout.master')

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/asset/css/blog.css') }}">
@endpush


@section('body-content')

@if(isset($basicInfo->projectpage))
<section class="page-title bg-1" style="background: url({{ asset($basicInfo->projectpage) }}) no-repeat 50% 50%;
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
            <h1 class="text-capitalize mb-5 text-lg">Our Projects</h1>
          </div>
        </div>
      </div>
    </div>
</section>


<!-- Projects section start [Done] -->
<section class="project-section" id="project">
    <div class="container">
        <div class="row">
            <div class="project-headtitle">
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

@endsection
