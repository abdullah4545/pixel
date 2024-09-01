@extends('backend.layout.master')

@push('meta-title')
        Dashboard | Banner Section
@endpush

@push('add-css')
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')

 <div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Banner Table</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">Add Banner</button>
        </div>


        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="bannerTables">
              <thead>
                <tr>
                  <th>#SL.</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

              </tbody>

            </table>
          </div>
        </div>
    </div>
 </div>


    {{-- Create Category --}}
    <div class="modal fade" id="create_Modal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel3">Create New Banner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="createForm" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label for="title" class="form-label">Banner Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Banner Title">
                            </div>
                            <div class="col mb-3">
                                <label for="text" class="form-label">Banner Text</label>
                                <input type="text" id="text" name="text" class="form-control" placeholder="Banner Text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="small_title" class="form-label">Small Text</label>
                                <input type="text" id="small_title" name="small_title" class="form-control" placeholder="Banner Small Text">
                            </div>
                            <div class="col mb-3">
                                <label for="text" class="form-label">Button Name</label>
                                <input type="text" id="button_name" name="button_name" class="form-control" placeholder="Button Name">
                            </div>
                            <div class="col mb-3">
                                <label for="title" class="form-label">Button Link</label>
                                <input type="text" id="button_link" name="button_link" class="form-control" placeholder="Button Link">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="banner_img" class="form-label">Banner Image Before</label>
                                <input class="form-control" type="file" name="banner_img" id="banner_img">
                            </div>
                            <div class="col mb-3">
                                <label for="banner_img_after" class="form-label">Banner Image After</label>
                                <input class="form-control" type="file" name="banner_img_after" id="banner_img_after">
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option selected="" disabled value="">Open this select menu</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
        </div>
        </div>
    </div>


     {{-- Update Category --}}
    <div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel3">Update Banner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="updateForm" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <input type="text" id="up_id" name="id" hidden>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="title" class="form-label">Banner Title</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Banner Title">
                        </div>
                        <div class="col mb-3">
                            <label for="text" class="form-label">Banner Text</label>
                            <input type="text" id="text" name="text" class="form-control" placeholder="Banner Text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="small_title" class="form-label">Small Text</label>
                            <input type="text" id="small_title" name="small_title" class="form-control" placeholder="Banner Small Text">
                        </div>
                        <div class="col mb-3">
                            <label for="text" class="form-label">Button Name</label>
                            <input type="text" id="button_name" name="button_name" class="form-control" placeholder="Button Name">
                        </div>
                        <div class="col mb-3">
                            <label for="title" class="form-label">Button Link</label>
                            <input type="text" id="button_link" name="button_link" class="form-control" placeholder="Button Link">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="banner_img" class="form-label">Banner Image Before</label>
                            <input class="form-control" type="file" name="banner_img" id="banner_img">

                            <div id="imageShow"></div>
                        </div>
                        <div class="col mb-3">
                            <label for="banner_img_after" class="form-label">Banner Image After</label>
                            <input class="form-control" type="file" name="banner_img_after" id="banner_img_after">

                            <div id="imageShowAfter"></div>
                        </div>
                    </div>

                    <div class="col mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="up_status" name="status">
                            <option selected="" disabled value="">Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

@endsection



@push('custom-script')

 <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

 <script>

     $(document).ready(function(){

        // show all data
        let bannerTables = $('#bannerTables').DataTable({
            order: [
                [0, 'asc']
            ],
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.get-banner') }}",
            // pageLength: 30,

            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'banner_img'
                },
                {
                    data: 'title'
                },
                {
                    data: 'status'
                },
                {
                    data: 'action'
                }
            ]
        });


        //  Status updates
        $(document).on('click', '#status', function () {
            var id = $(this).data('id');
            var status = $(this).data('status');

            // console.log(id, status);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.banner.status') }}",
                data: {
                    // '_token': token,
                    id: id,
                    status: status
                },
                success: function (res) {
                    bannerTables.ajax.reload();

                    if (res.status == 1) {
                        swal.fire(
                        {
                            title: 'Status Changed to Active',
                            icon: 'success'
                        })
                    } else {
                        swal.fire(
                        {
                            title: 'Status Changed to Inactive',
                            icon: 'success'
                        })
                    }
                },
                error: function (err) {
                    console.log(err);
                }

            })
        })

        // Create Banner
        $('#createForm').submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.banner.store') }}",
                data: formData,
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting contentType
                success: function (res) {
                    // console.log(res);
                    if (res.status === true) {
                        $('#create_Modal').modal('hide');
                        $('#createForm')[0].reset();
                        bannerTables.ajax.reload();

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

        // Edit Banner
        $(document).on("click", '#editButton', function (e) {
            let id = $(this).attr('data-id');
            // alert(id);

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/banner') }}/" + id + "/edit",
                processData: false,
                contentType: false,
                success: function (res) {
                    let data = res.success;

                    $('#up_id').val(data.id);
                    $('#updateForm').find('#title').val(data.title);
                    $('#updateForm').find('#text').val(data.text);
                    $('#updateForm').find('#small_title').val(data.small_title);
                    $('#updateForm').find('#button_name').val(data.button_name);
                    $('#updateForm').find('#button_link').val(data.button_link);
                    $('#imageShow').html('');
                    $('#imageShow').append(`
                        <img src={{ asset("`+ data.banner_img +`") }} alt="" style="width: 75px;">
                    `);

                    $('#imageShowAfter').html('');
                    $('#imageShowAfter').append(`
                        <img src={{ asset("`+ data.banner_img_after +`") }} alt="" style="width: 75px;">
                    `);

                    $('#up_status').val(data.status);


                },
                error: function (error) {
                    console.log('error');
                }

            });
        })


        // Update Banner
        $("#updateForm").submit(function (e) {
            e.preventDefault();

            let id = $('#up_id').val();
            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/banner') }}/" + id,
                data: formData,
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting contentType
                success: function (res) {

                    swal.fire({
                        title: "Success",
                        text: "Banner Edited",
                        icon: "success"
                    })

                    $('#editModal').modal('hide');
                    $('#updateForm')[0].reset();
                    bannerTables.ajax.reload();
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

        });


        // Delete Banner
        $(document).on("click", "#deleteBtn", function () {
            let id = $(this).data('id')

            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, delete it!"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',

                        url: "{{ url('admin/banner') }}/" + id,
                        data: {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        },
                        success: function (res) {
                            Swal.fire({
                                title: "Deleted!",
                                text: `${res.message}`,
                                icon: "success"
                            });

                            bannerTables.ajax.reload();
                        },
                        error: function (err) {
                            console.log('error')
                        }
                    })

                } else {
                    swal.fire('Your Data is Safe');
                }

            })
        })

    });

 </script>

@endpush
