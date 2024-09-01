@extends('backend.layout.master')

@push('meta-title')
     Professional Section
@endpush


@push('add-css')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css" />
@endpush


@section('body-content')

 <div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Professional Page</h5>
        </div>


        <div class="card-body">
            @if ( !empty( $professional ) )
               <form method="POST" action="{{ route('admin.professional.update', $professional->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            @else
               <form method="POST" action="{{ route('admin.professional.store') }}" enctype="multipart/form-data">
                @csrf
            @endif

                <div class="row">
                    <div class="col mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="image">

                        @if ( !empty( $professional ) )
                            <img src="{{ asset( $professional->image ) }}" alt="" style="width: 150px;">
                        @endif
                    </div>

                    <div class="col mb-3">
                        <label class="form-label" for="url">URL</label>
                        <input type="text" class="form-control"
                            id="url"
                            name="url"
                            placeholder="Write url here...."
                            @if ( !empty( $professional ) )
                               value="{{ $professional->url }}"
                            @endif
                        >
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="small_title" class="form-label">Sub Title</label>
                        <input type="text" class="form-control" id="small_title" name="small_title"
                            placeholder="Write Here......"
                            @if ( !empty( $professional ) )
                               value="{{ $professional->small_title }}"
                            @endif
                            required
                        >
                    </div>

                    <div class="col mb-3">
                        <label class="form-label" for="main_title">Main Title</label>
                        <input type="text" class="form-control" id="main_title" name="main_title"
                            @if ( !empty( $professional ) )
                               value="{{ $professional->main_title }}"
                            @endif
                            placeholder="Write Phone ( Optional )"
                            >
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="color_theme" class="form-label">Color Theme</label>
                        <input class="form-control" type="color" name="color_theme" id="color_theme"
                            @if ( !empty( $professional ) )
                                value="{{ $professional->color_theme }}"
                            @endif
                        >
                    </div>

                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option selected="" disabled value="">Open this select menu</option>
                            @if ( !empty( $professional ) )
                                <option value="1" @if( $professional->status === 1 ) selected @endif>Active</option>
                                <option value="0" @if( $professional->status === 0 ) selected @endif>Deactive</option>
                            @else
                               <option value="1">Active</option>
                               <option value="0">Deactive</option>
                            @endif

                        </select>
                    </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="">Description</label>
                    {{-- When using ck editor must be add ( 'hidden' ==> Attribute ) --}}
                  <textarea id="description" name="description"  placeholder="Write Here....." hidden>@if( !empty( $professional ) ){{ $professional->description }}@endif</textarea>
                </div>

                @if ( !empty( $professional ) )
                    <button type="submit" class="btn btn-primary">Update</button>
                @else
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                @endif
            </form>
        </div>
    </div>
 </div>

@endsection


@push('script-tag')

<script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(newEditor => {
            jReq = newEditor;
        })
        .catch(error => {
            console.error(error);
    });
</script>

@endpush

