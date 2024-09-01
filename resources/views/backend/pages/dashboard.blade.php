@extends('backend.layout.master')

@push('meta-title')
        Dashboard
@endpush

@push('add-css')

@endpush


@section('body-content')
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-6 col-lg-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('public/backend/assets/img/icons/unicons/chart-success.png') }}"
                      alt="chart success"
                      class="rounded"
                    />
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Services</span>
                <h3 class="card-title mb-2">{{App\Models\Service::all()->count()}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('public/backend/assets/img/icons/unicons/wallet-info.png') }}"
                      alt="Credit Card"
                      class="rounded"
                    />
                  </div>

                </div>
                <span>Projects</span>
                <h3 class="card-title text-nowrap mb-1">{{App\Models\Project::all()->count()}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('public/backend/assets/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />
                  </div>

                </div>
                <span class="d-block mb-1">Blogs</span>
                <h3 class="card-title text-nowrap mb-2">{{App\Models\Blogpage::all()->count()}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> -14.82%</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img src="{{ asset('public/backend/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Clients</span>
                <h3 class="card-title mb-2">{{App\Models\Logo::all()->count()}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
              </div>
            </div>
          </div>
           <div class="col-6 col-lg-4 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <img
                      src="{{ asset('public/backend/assets/img/icons/unicons/chart-success.png') }}"
                      alt="chart success"
                      class="rounded"
                    />
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Query</span>
                <h3 class="card-title mb-2">{{App\Models\Contact::all()->count()}}</h3>
                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection



@push('custom-script')

@endpush
