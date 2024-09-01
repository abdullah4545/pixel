@extends('backend.layout.master')

@push('meta-title')
        Dashboard | Pricing-plan
@endpush

@push('add-css')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush


@section('body-content')

 <div class="row">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Pricing Plan Table </h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_Modal">Add Pricing-Plan</button>
        </div>


        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="pricingTables">
              <thead>
                <tr>
                  <th>#SL.</th>
                  <th>Image</th>
                  <th>Service</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

              </tbody>

            </table>
          </div>
        </div>


        {{-- Create Pricing Plan --}}
        <div class="modal fade" id="create_Modal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel3">Create Pricing Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="createForm" enctype="multipart/form-data">
                            @csrf


                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="price_title" class="form-label">Price Title</label>
                                        <input type="text" id="price_title" name="price_title" class="form-control" placeholder="Price Title">
                                    </div>

                                    <div class="col mb-3">
                                        <label for="price_package" class="form-label">Choose Service</label>
                                        <select name="service_id" id="service_id" class="form-control" required>
                                            <option value="">Choose</option>
                                            @forelse(App\Models\Service::all() as $service)
                                                <option value="{{$service->id}}">{{$service->title}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="price_image" class="form-label">Service Image</label>
                                        <input class="form-control" type="file" name="price_image" id="price_image">

                                        <div id="imageShow"></div>
                                    </div>

                                    <div class="col mb-3">
                                        <label for="whatsapp" class="form-label">Whatsapp</label>
                                        <input type="text" id="whatsapp" name="whatsapp" class="form-control" placeholder="Whatsapp....">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="price_desc">Description</label>
                                    <textarea id="price_desc" class="form-control" name="price_desc" placeholder="Write Here....."></textarea>
                                </div>

                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option selected="" disabled value="">Open this select menu</option>
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" id="price" name="price" class="form-control" placeholder="Price...." required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- Update Pricing Plan --}}
        <div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="updateForm" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <input type="text" id="up_id" name="id" hidden>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="price_title" class="form-label">Price Title</label>
                                    <input type="text" id="price_title" name="price_title" class="form-control" placeholder="Price Title">
                                </div>

                                <div class="col mb-3">
                                    <label for="price_package" class="form-label">Choose Service</label>
                                    <select name="service_id" id="service_id" class="form-control" required>
                                        <option value="">Choose</option>
                                        @forelse(App\Models\Service::all() as $service)
                                            <option value="{{$service->id}}">{{$service->title}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="price_image" class="form-label">Service Image</label>
                                    <input class="form-control" type="file" name="price_image" id="price_image">

                                    <div id="imageShow"></div>
                                </div>

                                <div class="col mb-3">
                                    <label for="whatsapp" class="form-label">Whatsapp</label>
                                    <input type="text" id="whatsapp" name="whatsapp" class="form-control" placeholder="Whatsapp....">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="price_desc">Description</label>
                                <textarea id="price_desc" class="form-control" name="price_desc" placeholder="Write Here....."></textarea>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option selected="" disabled value="">Open this select menu</option>
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" id="price" name="price" class="form-control" placeholder="Price...." required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close </button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
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
        let pricePlanTables = $('#pricingTables').DataTable({
            order: [
                [0, 'asc']
            ],
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin/get-pricing-data') }}",
            // pageLength: 30,

            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'pricing_image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'service-name'
                },
                {
                    data: 'price_title'
                },
                {
                    data: 'price'
                },
                {
                    data: 'status',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });


        // Create pricing
        $('#createForm').submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('admin.price-plan.store') }}",
                data: formData,
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting contentType
                success: function (res) {
                    console.log(res);
                    if (res.status === true) {
                        $('#create_Modal').modal('hide');
                        $('#createForm')[0].reset();
                        pricePlanTables.ajax.reload();

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


        //  Status updates
        $(document).on('click', '#status', function () {
            var id = $(this).data('id');
            var status = $(this).data('status');

            // console.log(id, status);

            $.ajax({
                type: "POST",
                url: "{{ route('admin.price-plan.status') }}",
                data: {
                    // '_token': token,
                    id: id,
                    status: status
                },
                success: function (res) {
                    pricePlanTables.ajax.reload();

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


        // Edit pricePlan
        $(document).on("click", '#editButton', function (e) {
            let id = $(this).attr('data-id');
            // alert(id);

            $.ajax({
                type: 'GET',
                url: "{{ url('admin/price-plan') }}/" + id + "/edit",
                processData: false,
                contentType: false,
                success: function (res) {
                    let data = res.success;

                    $('#updateForm').find('#up_id').val(data.id);
                    $('#updateForm').find('#price').val(data.price);
                    $('#updateForm').find('#price_title').val(data.price_title);
                    $('#imageShow').html('');
                    $('#imageShow').append(`
                        <img src={{ asset("`+ data.price_image +`") }} alt="" style="width: 75px;">
                    `);
                    $('#updateForm').find('#whatsapp').val(data.whatsapp);
                    $('#updateForm').find('#price_desc').val(data.price_desc);
                    $('#updateForm').find('#status').val(data.status);
                    $('#updateForm').find('#service_id').val(data.service_id);
                },
                error: function (error) {
                    console.log('error');
                }

            });
        })


        // Update pricePlan
        $("#updateForm").submit(function (e) {
            e.preventDefault();

            let id = $('#up_id').val();
            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/price-plan') }}/" + id,
                data: formData,
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Prevent jQuery from setting contentType
                success: function (res) {

                    swal.fire({
                        title: "Success",
                        text: "Price-plan Edited",
                        icon: "success"
                    })

                    $('#editModal').modal('hide');
                    $('#updateForm')[0].reset();
                    pricePlanTables.ajax.reload();
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


        // Delete pricePlan
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

                        url: "{{ url('admin/price-plan') }}/" + id,
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

                            pricePlanTables.ajax.reload();
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
