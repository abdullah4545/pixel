@extends('backend.layout.master')

@push('meta-title')
        Dashboard | Blog Page Section
@endpush
@push('add-css')
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush

@section('body-content')
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="row">

    <div class="pagetitle row">
        <div class="col-6">
            <h1><a href="{{ url('admin/dashboard') }}">Dashboard</a></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Blogs</li>
                </ol>
            </nav>
        </div>
        <div class="col-6" style="text-align: right">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mainProject"><span
                    style="font-weight: bold;">+</span> Create Blog</button>
        </div>
    </div><!-- End Page Title -->

    {{-- //popup modal for create Project --}}
    <div class="modal fade" id="mainProject" tabindex="-1">
        <div class="modal-dialog" style="margin-left:150px">
            <div class="modal-content" style="max-width: 1100px; min-width:1040px">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form name="form" id="AddProject" enctype="multipart/form-data">
                        @csrf
                        <div class="successSMS"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="websiteTitle" class="control-label">Title</label>
                                    <div class="webtitle">
                                        <input type="text" class="form-control" name="title" id="title"
                                            required>
                                        <span
                                            class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="slug">Slug Title <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" name="slug" class="form-control mb-2"
                                        required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="Description">Short Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description">Blog Description <span
                                            class="text-danger">*</span></label>
                                    <textarea id="description" class="form-control" name="description" placeholder="Write Here....." hidden></textarea>
                                </div>


                            </div>

                            <div class="col-md-6">

                                <div class="form-group mb-3">
                                    <label for="ProductDetails">
                                        Blog Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <button type="button" class="btn btn-success d-block mb-2">
                                        <input type="file" name="image" id="service_image"
                                            onchange="loadFile(event)">
                                        Browse
                                    </button>
                                    <div class="single-image image-holder-wrapper clearfix">
                                        <div class="image-holder"
                                            style="border: 1px solid gray;max-width: 128px;min-height: 125px;">
                                            <img id="prevImage" style="height: 125px;width:125px" />
                                            <i class="mdi mdi-folder-image"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"
                                    style="padding: 10px;padding-top: 3px;margin:0;padding-bottom:3px;width:96%;margin-left: 8px;border-radius: 8px;padding-left: 0;margin-left: -0;">
                                    <label class="fileContainer">
                                        <span style="color: black;font-size: 20px;">Project Slider image</span>
                                    </label>
                                    <input type="file" onchange="prevPost_Img()" name="postImage[]" id="postImage"
                                        multiple>
                                </div>
                                <div class="file">
                                    <div id="prevFile" style="width: 100%;float:left;background: lightgray;">

                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group mb-2">
                                    <label for="ProductSku">Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" id="meta_title" name="meta_title" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Meta Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Description">Meta Keywords <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword" rows="3"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="text-align: right">
                            <div class="submitBtnSCourse">
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Save
                                    Blog</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><!-- End popup Modal-->



    {{-- //table section for Project --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body pt-4">
                        @if (\Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ \Session::get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <div class="table-responsive" style="text-align: center">
                            <table class="table table-centered table-borderless table-hover mb-0" id="serviceinfo"
                                width="100%">
                                <thead>
                                    <tr style="text-align: center">
                                        <th scope="col"># ID:</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- //popup modal for edit Blog --}}
    <div class="modal fade" id="editmainProject" tabindex="-1">
        <div class="modal-dialog" style="margin-left:150px">
            <div class="modal-content" style="max-width: 1100px;min-width:1040px">
                <div class="modal-header">
                    <h5 class="modal-title">Create new Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form name="form" id="EditProject" enctype="multipart/form-data">
                        @csrf
                        <div class="successSMS"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label for="websiteTitle" class="control-label">Title</label>
                                    <div class="webtitle">
                                        <input type="text" class="form-control" name="title" id="title"
                                            required>
                                        <span
                                            class="text-danger">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="slug">Slug Title <span class="text-danger">*</span></label>
                                    <input type="text" id="slug" name="slug" class="form-control mb-2"
                                        required>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="Description">Short Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3"></textarea>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="description">Blog Description <span
                                            class="text-danger">*</span></label>
                                    <textarea id="up_description" class="form-control" name="description" placeholder="Write Here....." hidden></textarea>
                                </div>


                            </div>

                            <div class="col-md-6">

                                <div class="form-group mb-3">
                                    <label for="ProductDetails">
                                        Blog Image
                                        <span class="text-danger">*</span>
                                    </label>
                                    <button type="button" class="btn btn-success d-block mb-2">
                                        <input type="file" name="image" id="service_image"
                                            onchange="editloadFile(event)">
                                        Browse
                                    </button>
                                    <div class="single-image image-holder-wrapper clearfix">
                                        <div class="image-holder"
                                            style="border: 1px solid gray;max-width: 128px;min-height: 125px;">
                                            <div id="previmg" style="height: 125px;width:125px">

                                            </div>
                                            <img id="editprevImage" style="max-height: 125px;max-width:125px" />
                                            <i class="mdi mdi-folder-image"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"
                                    style="padding: 10px;padding-top: 3px;margin:0;padding-bottom:3px;width:96%;margin-left: 8px;border-radius: 8px;padding-left: 0;margin-left: -0;">
                                    <label class="fileContainer">
                                        <span style="color: black;font-size: 20px;">Blog Slider image</span>
                                    </label>
                                    <input type="file" onchange="editprevPost_Img()" name="postImage[]"
                                        id="editpostImage" multiple>
                                </div>
                                <div class="file">
                                    <div id="editprevFile" style="width: 100%;float:left;background: lightgray;">

                                    </div>
                                    <div id="viewprevFile" style="width: 100%;float:left;background: lightgray;">

                                    </div>
                                </div>

                                <br><br>
                                <div class="form-group mb-2 mt-4 pt-4">
                                    <label for="ProductSku">Meta Title <span class="text-danger">*</span></label>
                                    <input type="text" id="meta_title" name="meta_title" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Description">Meta Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Description">Meta Keywords <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="meta_keyword" name="meta_keyword" rows="3"></textarea>
                                </div>

                            </div>
                        </div>

                        <input type="text" id="service_id" name="service_id" class="form-control" hidden>

                        <div class="form-group" style="text-align: right">
                            <div class="submitBtnSCourse">
                                <button type="submit" name="btn" class="btn btn-primary btn-block">Save
                                    Blog</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div><!-- End popup Modal-->

</div>

@endsection
@push('custom-script')

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <script src="{{asset('https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js')}}"></script>


    <script>
        $(document).ready(function() {
            let jReq;
            // Ckeditor 5
            ClassicEditor
                .create(document.querySelector('#description'))
                .then(newEditor => {
                    jReq = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            let datainfo;
            // Ckeditor 5
            ClassicEditor
                .create(document.querySelector('#up_description'))
                .then(newEditor => {
                    datainfo = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });

            var serviceinfo = $('#serviceinfo').DataTable({
                ajax: {
                    url: "{{ url('admin/bloginfo') }}",
                },
                order: [
                    [0, "desc"]
                ],
                processing: true,
                serverSide: true,
                pageLength: 30,
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: null,
                        render: function(data) {
                            return '<img src="../' + data.image +
                                '" style="max-width:50px;" />';
                        }
                    },
                    {
                        data: 'short_description'
                    },
                    {
                        "data": null,
                        render: function(data) {

                            if (data.status == '0') {
                                return '<button type="button" class="btn btn-success btn-sm btn-status" data-status="1" id="projectstatusBtn" data-id="' +
                                    data.id + '">Active</button>';
                            } else {
                                return '<button type="button" class="btn btn-warning btn-sm btn-status" data-status="0" id="projectstatusBtn" data-id="' +
                                    data.id + '" >Inactive</button>';
                            }


                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
            });

            //add project
            $('#AddProject').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    uploadUrl: '{{ route('blogs.store') }}',
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {
                        $('#short_description').val('');
                        $('#meta_title').val('');
                        $('#meta_description').val('');
                        $('#meta_keyword').val('');
                        $('#title').val('');
                        $('#service_description').val('');
                        $('#service_image').val('');
                        $('#prevImage').attr('src', "");
                        $('#prevFile').html('');

                        $('#mainProject').modal('hide')

                        swal.fire({
                            title: "Success! Project Added Successfully",
                            icon: "success",
                        });
                        serviceinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            $(document).on('click', '#editProjectBtn', function() {
                let serviceId = $(this).data('id');

                $.ajax({
                    type: 'GET',
                    url: 'blogs/' + serviceId + '/edit',

                    success: function(data) {
                        $('#EditProject').find('#short_description').val(data.short_description);
                        $('#EditProject').find('#meta_title').val(data.meta_title);
                        $('#EditProject').find('#meta_description').val(data.meta_description);
                        $('#EditProject').find('#meta_keyword').val(data.meta_keyword);
                        $('#EditProject').find('#service_id').val(data.id);
                        $('#EditProject').find('#title').val(data.title);
                        $('#EditProject').find('#slug').val(data.slug);
                        $('#previmg').html('');
                        $('#previmg').css('display', 'inline');
                        $('#previmg').append(`
                            <img  src="../` + data.image + `" alt = "" style="height: 125px;width:125px" />
                        `);
                        $('#EditProject').attr('data-id', data.id);

                        if(data.description==null){
                            datainfo.setData('');
                        }else{
                            datainfo.setData(data.description);
                        }

                        var postImages = JSON.parse(data.postImage);
                        var postImage = "";
                        $('#viewprevFile').html('');
                        postImages.forEach((i) => {
                            postImage +=`<div class="postImg" style="width:25%;float:left;position:relative;">
                                            <img src="../public/images/blogpages/slider/`+i+`" alt="" id="previewImage" style="border-radius: 10px;width:100%;padding:5px;">
                                        </div>`;
                        })
                        $('#viewprevFile').html(postImage);

                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

            $('#EditProject').submit(function(e) {
                e.preventDefault();
                let serviceId = $('#service_id').val();

                $.ajax({
                    type: 'POST',
                    url: 'blog/' + serviceId,
                    processData: false,
                    contentType: false,
                    data: new FormData(this),

                    success: function(data) {
                        $('#EditProject').find('#short_description').val('');
                        $('#EditProject').find('#meta_title').val('');
                        $('#EditProject').find('#meta_description').val('');
                        $('#EditProject').find('#meta_keyword').val('');
                        $('#EditProject').find('#title').val('');
                        $('#EditProject').find('#editservice_description').val('');
                        $('#EditProject').find('#editservice_image').val('');
                        $('#EditProject').find('#slug').val('');
                        $('#EditProject').find('#previmg').html("");
                        $('#EditProject').find('.select2-selection__rendered').html('');
                        $('#EditProject').find('.note-editable').html("");
                        $('#EditProject').find('#editprevFile').html('');
                        $('#EditProject').find('#viewprevFile').html('');
                        $('#EditProject').find('#editprevImage').attr('src', '');
                        $('#editmainProject').modal('hide');

                        swal.fire({
                            title: "Success! Blog Update Successfully",
                            icon: "success",
                        });
                        serviceinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }
                });
            });

            $(document).on('click', '#deleteProjectBtn', function(e) {
                e.preventDefault();
                let serviceId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Once deleted, you will not be able to recover this !",
                    type: 'warning',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "get",
                            url: 'blog/destroy/' + serviceId,
                            success: function(data) {
                                if (data == "success") {
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Blog Deleted',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    serviceinfo.ajax.reload();
                                } else {
                                    if (data == "failed") {
                                        Swal.fire(
                                            "Something wrong ! Please try again.");
                                    } else {
                                        Swal.fire(
                                            "Something wrong ! Please try again.");
                                    }
                                }
                            }
                        });
                    } else {
                        Swal.fire("Your data is safe!");
                    }
                });


            });

            //update status
            $(document).on('click', '#projectstatusBtn', function() {
                let serviceId = $(this).data('id');
                let serviceStatus = $(this).data('status');

                $.ajax({
                    type: 'PUT',
                    url: 'bloginfo/status',
                    data: {
                        blogpage_id: serviceId,
                        status: serviceStatus,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        serviceinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

            $(document).on('click', '#serviceTopratedstatusBtn', function() {
                let serviceId = $(this).data('id');
                let serviceTopratedStatus = $(this).data('status');

                $.ajax({
                    type: 'PUT',
                    url: 'project/toprated',
                    data: {
                        service_id: serviceId,
                        toprated_status: serviceTopratedStatus,
                    },

                    success: function(data) {
                        Swal.fire({
                            title: "Status updated !",
                            icon: "success",
                        });
                        serviceinfo.ajax.reload();
                    },
                    error: function(error) {
                        console.log('error');
                    }

                });
            });

        });


        var loadFile = function(event) {
            var output = document.getElementById('prevImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        var editloadFile = function(event) {
            document.getElementById("previmg").style.display = "none";
            var output = document.getElementById('editprevImage');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>

    <script>
        var postImages = [];

        function prevPost_Img() {
            var postImage = document.getElementById('postImage').files;

            for (i = 0; i < postImage.length; i++) {
                if (check_duplicate(postImage[i].name)) {
                    postImages.push({
                        "name": postImage[i].name,
                        "url": URL.createObjectURL(postImage[i]),
                        "file": postImage[i],
                    });
                } else {
                    alert(postImage[i].name + 'is already added to your list');
                }
            }

            document.getElementById("prevFile").innerHTML = postImage_show();

        }

        function check_duplicate(name) {
            var postImage = true;
            if (postImages.length > 0) {
                for (e = 0; e < postImages.length; e++) {
                    if (postImages[e].name == name) {
                        postImage = false;
                        break;
                    }
                }
            }
            return postImage;
        }

        function postImage_show() {
            var postImage = "";
            postImages.forEach((i) => {
                postImage += `<div class="postImg" style="width:25%;float:left;position:relative;">
                                <img src="` + i.url + `" alt="" id="previewImage" style="border-radius: 10px;width:100%;padding:5px;">
                                <span onclick="removeSelectedPostImage(` + postImages.indexOf(i) + `)" style="position: absolute;right: 0;cursor: pointer;font-size: 31px;color: red;margin-top: -8px;margin-right: 8px;">&times</span>
                            </div>`;
            })
            return postImage;
        }

        function removeSelectedPostImage(e) {
            postImages.splice(e, 1);
            document.getElementById("prevFile").innerHTML = postImage_show();
        }

        var editpostImages = [];

        function editprevPost_Img() {
            $('#viewprevFile').html('');
            var editpostImage = document.getElementById('editpostImage').files;

            for (i = 0; i < editpostImage.length; i++) {
                if (check_duplicate(editpostImage[i].name)) {
                    editpostImages.push({
                        "name": editpostImage[i].name,
                        "url": URL.createObjectURL(editpostImage[i]),
                        "file": editpostImage[i],
                    });
                } else {
                    alert(editpostImage[i].name + 'is already added to your list');
                }
            }

            document.getElementById("editprevFile").innerHTML = editpostImage_show();

        }

        function check_duplicate(name) {
            var editpostImage = true;
            if (editpostImages.length > 0) {
                for (e = 0; e < editpostImages.length; e++) {
                    if (editpostImages[e].name == name) {
                        editpostImage = false;
                        break;
                    }
                }
            }
            return editpostImage;
        }

        function editpostImage_show() {
            var editpostImage = "";
            editpostImages.forEach((i) => {
                editpostImage += `<div class="postImg" style="width:25%;float:left;position:relative;">
                                <img src="` + i.url + `" alt="" id="previewImage" style="border-radius: 10px;width:100%;padding:5px;">
                                <span onclick="removeSelectededitpostImage(` + editpostImages.indexOf(i) + `)" style="position: absolute;right: 0;cursor: pointer;font-size: 31px;color: red;margin-top: -8px;margin-right: 8px;">&times</span>
                            </div>`;
            })
            return editpostImage;
        }

        function removeSelectededitpostImage(e) {
            editpostImages.splice(e, 1);
            document.getElementById("editprevFile").innerHTML = editpostImage_show();
        }
    </script>


@endpush
