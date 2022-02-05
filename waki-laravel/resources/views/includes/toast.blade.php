@push('css-vendor')
<link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/toastr/toastr.min.css">
@endpush

@push('js-vendor')
<script src="{{ asset('admin-lte') }}/plugins/toastr/toastr.min.js"></script>
@endpush

@push('js')
<script>
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
@endpush