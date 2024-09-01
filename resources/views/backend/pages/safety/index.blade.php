@extends('backend.layout.master')

@push('meta-title')
        Dashboard | Choose Us Section
@endpush


@section('body-content')

 <div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Choose Us Page</h5>
        </div>


        <div class="card-body">
            @if ( !empty( $safety ) )
               <form method="POST" action="{{ route('admin.safety.update', $safety->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            @else
               <form method="POST" action="{{ route('admin.safety.store') }}" enctype="multipart/form-data">
                @csrf
            @endif

                <div class="row">
                    <div class="col mb-3">
                        <label for="safty_content1" class="form-label">Choose Content 1</label>
                        <input type="text" class="form-control" id="safty_content1" name="safty_content1"
                            @if ( !empty( $safety ) )
                               value="{{ $safety->safty_content1 }}"
                            @endif>
                    </div>

                    <div class="col mb-3">
                        <label for="safty_img1" class="form-label">Choose Content Image 1</label>
                        <input class="form-control" class="form-control" type="file" name="safty_img1" id="safty_img1">

                        @if ( !empty( $safety ) )
                            <img src="{{ asset( $safety->safty_img1 ) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="safty_content2" class="form-label">Choose Content 2</label>
                        <input type="text" class="form-control" id="safty_content2" name="safty_content2"
                            @if ( !empty( $safety ) )
                               value="{{ $safety->safty_content2 }}"
                            @endif>
                    </div>

                    <div class="col mb-3">
                        <label for="safty_img2" class="form-label">Choose Content Image 2</label>
                        <input class="form-control" type="file" name="safty_img2" id="safty_img2">

                        @if ( !empty( $safety ) )
                            <img src="{{ asset( $safety->safty_img2 ) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="safty_content3" class="form-label">Choose Content 3</label>
                        <input type="text" class="form-control" id="safty_content3" name="safty_content3"
                            @if ( !empty( $safety ) )
                               value="{{ $safety->safty_content3 }}"
                            @endif>
                    </div>

                    <div class="col mb-3">
                        <label for="safty_img3" class="form-label">Choose Content Image 3</label>
                        <input class="form-control" type="file" name="safty_img3" id="safty_img3">

                        @if ( !empty( $safety ) )
                            <img src="{{ asset( $safety->safty_img3 ) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="safty_content4" class="form-label">Choose Content 4</label>
                        <input type="text" class="form-control" id="safty_content4" name="safty_content4"
                            @if ( !empty( $safety ) )
                               value="{{ $safety->safty_content4 }}"
                            @endif>
                    </div>

                    <div class="col mb-3">
                        <label for="safty_img4" class="form-label">Choose Content Image 4</label>
                        <input class="form-control" type="file" name="safty_img4" id="safty_img4">

                        @if ( !empty( $safety ) )
                            <img src="{{ asset( $safety->safty_img4 ) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                </div>

                <div class="col mb-3">
                    <label for="youtube_url" class="form-label">Youtube url</label>
                    <textarea id="youtube_url" class="form-control" name="youtube_url" placeholder="Write Here....." required>@if( !empty( $safety ) ){{ $safety->youtube_url }}@endif</textarea>
                </div>

                @if ( !empty( $safety ) )
                    <button type="submit" class="btn btn-primary">Update</button>
                @else
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                @endif
            </form>
        </div>
    </div>
 </div>

@endsection

