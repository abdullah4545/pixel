@extends('backend.layout.master')

@push('meta-title')
       {{ env('APP_NAME') }}- Information {{ $title }}
@endpush

@section('body-content')
    <div class="container- pt-4 px-4">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-xl-12 mb-4">
                <div class="bg-light rounded h-100 p-4">
                    <h2 class="mb-4" style="text-align: center;color:red">{{ $title }} Page Info</h2>
                    <form action="{{ url('/admin/information/update', $slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="key" value="{{ $slug }}" hidden>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="Logo" class="form-label">Page Banner</label>
                                <input class="form-control" type="file" name="page_banner" id="page_banner">
                            </div>
                            <div class="col-6 mb-3">
                                @if ( !empty( $value ) )
                                    <img src="{{ asset($value->page_banner) }}" alt="" style="width: 150px;">
                                @endif
                            </div>
                            <div class="col-12 mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title"
                                @if ( !empty( $value ) )
                                    value="{{ $value->meta_title }}"
                                @endif >
                            </div>
                            <div class="col-6 mb-3">
                                <label for="footer_text" class="form-label">Meta Keywords</label>
                                <textarea id="meta_keyword" class="form-control" name="meta_keyword" placeholder="Meta Keywords">@if ( !empty( $value ) ){{ $value->meta_keyword }} @endif</textarea>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="footer_text" class="form-label">Meta Description</label>
                                <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Meta Description">@if ( !empty( $value ) ){{ $value->meta_description }} @endif</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control ckeditor" name="value" id="value" style="height: 150px;">{{ $value->value }}</textarea>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

 <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#value'))
            .then(newEditor => {
                jReq = newEditor;
            })
            .catch(error => {
                console.error(error);
        });
    </script>

@endsection
