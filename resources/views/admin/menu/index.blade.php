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
@endsection
