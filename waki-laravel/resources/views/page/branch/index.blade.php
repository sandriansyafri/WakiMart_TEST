@extends('layouts.backend.main')

@section('title')
Branchs
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Branch</li>
@endsection

@include('page.branch.vendor')
@section('content')
<div class="row mb-3">
    <div class="col-md-12">
        <button onclick="addBranch(`{{ route('branch.store') }}`,'Form New Branch')" type="button" class="btn btn-primary">
            <i class="text-sm fa fa-plus mr-2"></i> Add New Branch
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Waki Branch </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table" id="branchs-table">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 20%">Action</th>

                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        @include('page.branch.form')
    </div>
</div>
@endsection

@push('js')
<script>
    let table;
    let modal = '.modal';
    table = $('table.table').DataTable({
        processing: true,
        autoWidth: false,
        ajax: {
            url: "{{ route('branch.data') }}",
        },
        columns: [{
                data: 'DT_RowIndex',
                searchable: false,
                orderable: false
            },
            {
                data: 'name',
                class: 'text-center'
            },
            {
                data: 'email',
                class: 'text-center'
            },
            {
                data: 'action',
                class: 'text-center'
            },
        ],
    })

    function openModal() {
        $('.modal').modal();
    }

    function closeModal() {
        $('.modal').modal('hide');
    }

    function resetForm(form) {
        $(`${form}`)[0].reset()
    }

    function loopErrors(errors) {
        $('.invalid-feedback').remove();
        $('.is-invalid').removeClass('is-invalid');

        for (let error in errors) {
            $(`[name=${error}]`).addClass('is-invalid');
            $(`<span class="error invalid-feedback">${errors[error][0]}</span>`)
                .insertAfter($(`[name=${error}]`));
        }
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    function submitForm(originalForm) {
        $.post({
                url: $(originalForm).attr('action'),
                data: new FormData(originalForm),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false
            })
            .done((res) => {
                if (res.ok) {
                    swal({
                        title: res.message,
                        icon: "success",
                        button: "Aww yiss!",
                    });
                    table.ajax.reload();
                    closeModal('hide');
                }
            })
            .fail(({
                responseJSON
            }) => {
                if (!responseJSON.ok) {
                    toastr["error"](responseJSON.message,responseJSON.status.toUpperCase())

                    loopErrors(responseJSON.errors);
                }
            })
    }

    function addBranch(url, title) {
        $('.invalid-feedback').remove();
        $('.is-invalid').removeClass('is-invalid');
        resetForm(`${modal} form`);

        $('[name=name]').attr('readonly', false)
        $('[name=email]').attr('readonly', false)
        openModal();

        $(`${modal} .modal-title`).text(title)
        $(`${modal} .btn-submit-label`).text("Save")
        $(`${modal} form`).attr('action', url)
        $(`${modal} form input[name=_method]`).val('POST')
        $(`${modal} .btn-submit`).show();
    }

    function loadForm(fields) {
        for (field in fields) {
            $(`[name=${field}]`).val(fields[field])
        }
    }

    function editBranch(url, title = 'Form') {
        $('.invalid-feedback').remove();
        $('.is-invalid').removeClass('is-invalid');

        $(`${modal} form`).attr('action', url);
        $(`${modal} .modal-title`).text(title);
        $(`${modal} .btn-submit-label`).text('Update');
        $(`${modal} form [name=_method]`).val('PUT');
        $(`${modal} .btn-submit`).show();
        $('[name=name]').attr('readonly', false)
        $('[name=email]').attr('readonly', false)

        resetForm(`${modal} form`);
        openModal('show');

        $.get(url)
            .done((res) => {
                if (res.ok) {
                    loadForm(res.data);
                }
            })
    }

    function detailBranch(url, title = 'Form') {
        $('.invalid-feedback').remove();
        $('.is-invalid').removeClass('is-invalid');

        $(`${modal} .modal-title`).text(title);
        $(`${modal} .btn-submit`).hide();

        resetForm(`${modal} form`);
        openModal('show');

        $('[name=name]').attr('readonly', true)
        $('[name=email]').attr('readonly', true)

        $.get(url)
            .done((res) => {
                if (res.ok) {
                    loadForm(res.data);
                }
            })
    }

    function deleteBranch(url) {

        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.post({
                            url,
                            type: 'DELETE',
                        })
                        .done((res) => {
                            if (res.ok) {
                                table.ajax.reload();
                                swal(res.message, {
                                    icon: "success",
                                });
                            }
                        })
                        .fail((e) => console.log(e))
                }
            });

    }
</script>
@endpush