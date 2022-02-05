@push('css-vendor')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin-lte') }}/plugins/summernote/summernote-bs4.min.css">
@endpush

@push('js-vendor')
<!-- Summernote -->
<script src="{{ asset('admin-lte') }}/plugins/summernote/summernote-bs4.min.js"></script>
@endpush

@push('js')
<script>
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', '', '']],
            ['view', ['fullscreen', '', 'help']]
        ]
    })
</script>
@endpush