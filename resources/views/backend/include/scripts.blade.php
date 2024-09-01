<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('public/backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('public/backend/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('public/backend/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('public/backend/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('public/backend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('public/backend/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('public/backend/assets/js/dashboards-analytics.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@stack('script-tag')


<script type="text/javascript">
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

<script type="text/javascript">
    @if ( Session::has( 'message' ) )

       var type = "{{ Session::get('alert-type', 'info') }}";

       switch( type ){
           case 'info':
              toastr.info("{{ Session::get('message') }}");
             break;

           case 'success':
               toastr.success("{{ Session::get('message') }}");
             break;

           case 'warning':
               toastr.warning("{{ Session::get('message') }}");
             break;

           case 'error':
               toastr.error("{{ Session::get('message') }}");
             break;
       }
    @endif
 </script>


 @stack('custom-script')


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
