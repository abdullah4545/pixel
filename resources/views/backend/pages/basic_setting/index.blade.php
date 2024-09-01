@extends('backend.layout.master')

@push('meta-title')
        Dashboard | Basic Settings
@endpush


@section('body-content')

 <div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Basic Settings</h5>
        </div>


        <div class="card-body">
            @if ( !empty( $basicInfo ) )
               <form method="POST" action="{{ route('admin.basic-info.update', $basicInfo->id ) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            @else
               <form method="POST" action="{{ route('admin.basic-info.store') }}" enctype="multipart/form-data">
                @csrf
            @endif



                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Website Logo</label>
                        <input class="form-control" type="file" name="logo" id="Logo">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->logo) }}" alt="" style="width: 150px;">
                        @endif
                    </div>

                    <div class="col-6 mb-3">
                        <label for="mobile_logo" class="form-label">Mobile Logo</label>
                        <input class="form-control" type="file" name="mobile_logo" id="mobile_logo">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->mobile_logo) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label for="favicon" class="form-label">Favicon</label>
                        <input class="form-control" type="file" name="favicon" id="favicon">

                        @if (!empty( $basicInfo ))
                            <img src="{{ asset($basicInfo->favicon) }}" alt="" style="width: 150px;">
                        @endif
                    </div>

                    <div class="col-6 mb-3">
                        <label class="form-label" for="Whatsapp">What'sapp Number</label>
                        <input type="text" class="form-control"
                            id="Whatsapp"
                            name="whatsapp"
                            placeholder="What'sapp Number"
                            @if ( !empty( $basicInfo ) )
                               value="{{ $basicInfo->whatsapp }}"
                            @endif
                            >
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            placeholder="Write Phone"
                            @if ( !empty( $basicInfo ) )
                               value="{{ $basicInfo->phone }}"
                            @endif
                            required
                        >
                    </div>

                    <div class="col mb-3">
                        <label class="form-label" for="phone_optional">Phone ( Optional )</label>
                        <input type="text" class="form-control" id="phone_optional" name="phone_optional"
                            @if ( !empty( $basicInfo ) )
                               value="{{ $basicInfo->phone_optional }}"
                            @endif
                            placeholder="Write Phone ( Optional )"
                            >
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->email }}"
                            @endif
                            placeholder="Write Email Address"
                            required>
                    </div>

                    <div class="col mb-3">
                        <label class="form-label" for="email_optional">Email Address ( Optional )</label>
                        <input type="email" class="form-control" id="email_optional" name="email_optional"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->email_optional }}"
                            @endif
                            placeholder="Write Email Address ( Optional )">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->facebook }}"
                            @endif
                            placeholder="Facebook Link Here....">
                    </div>

                    <div class="col mb-3">
                        <label for="twitter" class="form-label">Skype</label>
                        <input type="text" class="form-control" id="twitter" name="twitter"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->twitter }}"
                            @endif
                            placeholder="Skype Link Here....">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="linkedin" class="form-label">Linkedin</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->linkedin }}"
                            @endif
                            placeholder="Linkedin Link Here....">
                    </div>

                    <div class="col mb-3">
                        <label for="pinterest" class="form-label">Pinterest</label>
                        <input type="text" class="form-control" id="pinterest" name="pinterest"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->pinterest }}"
                            @endif
                            placeholder="Pinterest Link Here....">
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->instagram }}"
                            @endif
                            placeholder="Instagram Link Here....">
                    </div>

                    <div class="col mb-3">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube"
                            @if ( !empty( $basicInfo ) )
                                value="{{ $basicInfo->youtube }}"
                            @endif
                            placeholder="Youtube Link Here....">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="facebook_pixel">Facebook Pixel</label>
                    <textarea id="facebook_pixel" class="form-control" name="facebook_pixel" placeholder="Facebook Pixel Code Here......">@if ( !empty( $basicInfo ) ){{ $basicInfo->facebook_pixel }} @endif</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="google_analytics">Google Analytics</label>
                    <textarea id="google_analytics" class="form-control" name="google_analytics" placeholder="Google Analytics Code Here......">@if ( !empty( $basicInfo ) ){{ $basicInfo->google_analytics }}@endif</textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="address">Address</label>
                  <textarea id="address" class="form-control" name="address" placeholder="Write Address" required>@if( !empty( $basicInfo ) ){{ $basicInfo->address }}@endif</textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="address_optional">Address ( Optional )</label>
                  <textarea id="address_optional" class="form-control" name="address_optional" placeholder="Write Address ( Optional )">@if ( !empty( $basicInfo ) ){{ $basicInfo->address_optional }}@endif</textarea>
                </div>

                <div class="row">
                    <h4 class="mt-4 mb-4 text-center">Contact Part Extra Info</h4>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Contact Image</label>
                        <input class="form-control" type="file" name="contact_image" id="contact_image">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->contact_image) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label for="contact_title" class="form-label">Contact Title</label>
                        <input type="text" class="form-control" id="contact_title" name="contact_title"
                        @if ( !empty( $basicInfo ) )
                            value="{{ $basicInfo->contact_title }}"
                        @endif >
                    </div>
                    <div class="col-12 mb-3">
                        <label for="contact_description" class="form-label">Contact Short-Description</label>
                        <textarea id="contact_description" class="form-control" name="contact_description" placeholder="Contact Short-Description">@if ( !empty( $basicInfo ) ){{ $basicInfo->contact_description }} @endif</textarea>
                    </div>

                </div>

                <div class="row">
                    <h4 class="mt-4 mb-4 text-center">Footer Info</h4>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Footer Logo</label>
                        <input class="form-control" type="file" name="footer_logo" id="footer_logo">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->footer_logo) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Page Screenshoot</label>
                        <input class="form-control" type="file" name="page_ss" id="page_ss">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->page_ss) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-12 mb-3">
                        <label for="footer_text" class="form-label">Footer Text</label>
                        <input type="text" class="form-control" id="footer_text" name="footer_text"
                        @if ( !empty( $basicInfo ) )
                            value="{{ $basicInfo->footer_text }}"
                        @endif >
                    </div>

                </div>
                <div class="row">
                    <h4 class="mt-4 mb-4 text-center">Meta Info</h4>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Meta Image</label>
                        <input class="form-control" type="file" name="meta_image" id="meta_image">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->meta_image) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                        @if ( !empty( $basicInfo ) )
                            value="{{ $basicInfo->meta_title }}"
                        @endif >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="footer_text" class="form-label">Meta Keywords</label>
                        <textarea id="meta_keyword" class="form-control" name="meta_keyword" placeholder="Meta Keywords">@if ( !empty( $basicInfo ) ){{ $basicInfo->meta_keyword }} @endif</textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="footer_text" class="form-label">Meta Description</label>
                        <textarea id="meta_description" class="form-control" name="meta_description" placeholder="Meta Description">@if ( !empty( $basicInfo ) ){{ $basicInfo->meta_description }} @endif</textarea>
                    </div>

                </div>


                <div class="row">
                    <h4 class="mt-4 mb-4 text-center">Page Banners</h4>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Service Page Banner</label>
                        <input class="form-control" type="file" name="servicepage" id="servicepage">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->servicepage) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Priceing Page Banner</label>
                        <input class="form-control" type="file" name="pricepage" id="pricepage">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->pricepage) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Project Page Banner</label>
                        <input class="form-control" type="file" name="projectpage" id="projectpage">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->projectpage) }}" alt="" style="width: 150px;">
                        @endif
                    </div>
                    <div class="col-6 mb-3">
                        <label for="Logo" class="form-label">Blog Page Banner</label>
                        <input class="form-control" type="file" name="blogpage" id="blogpage">

                        @if ( !empty( $basicInfo ) )
                            <img src="{{ asset($basicInfo->blogpage) }}" alt="" style="width: 150px;">
                        @endif
                    </div>


                </div>



                @if ( !empty( $basicInfo ) )
                    <button type="submit" class="btn btn-primary">Update</button>
                @else
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                @endif
            </form>
        </div>
    </div>
 </div>

@endsection

