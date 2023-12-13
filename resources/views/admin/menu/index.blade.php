@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    Welcome To Admin Dashboard
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-12">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0 text-light">Menus Control</h2>
                </div>
                <table class="table table-striped table-bordered" id="dataTable" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Name</th>
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
    {{--modal--}}
        <div class="my-4 text-center">
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Edit Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="menuEditForm">
                            @csrf
                            <input type="text" class="form-control" name="name" id="menuNameId">
                            <br>
                            <input type="submit" class="btn btn-sm btn-primary">
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    {{--End modal--}}
@endsection

@section('page-footer-assets')
    <script>
        $(document).ready(function (){
            $('#dataTable').DataTable({
                processing: true,
                paging: false,
                searching: false,
                serverSide: true,
                info: false,
                ajax: '{{ route('admin.menus.datatable') }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'name',
                        name: 'name'
                    }, {
                        data: 'status',
                        name: 'status',
                        orderable: false
                    },{
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });
        })
    </script>
    {{--Acitve and Deactivate Menus--}}
    <script>
        $(document).ready(function (){
            $('body').on('change', '.change-status', function (){
                const menuId = $(this).data('id');
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{route('admin.menu.status.change')}}',
                    method: 'POST',
                    data: {
                        menuId: menuId
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (data) {
                        if (data.response === 200) {
                            Toast.fire({
                                icon: data.type,
                                title: data.message
                            })
                        }
                    }
                })
            })
        })
    </script>
    {{--Edit Menu--}}
    <script>
        $(document).ready(function (){
            $('body').on('click', '.menuEditBtn', function () {
                const menuId = $(this).data('id');
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{route('admin.menu.get')}}',
                    method: 'GET',
                    data: {
                        menuId: menuId
                    },
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function (data) {
                        $('#menuNameId').val(data.name)
                        $('.bs-example-modal-center').modal('show')
                    }
                })
            })
        })
    </script>
@endsection
