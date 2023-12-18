@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    Professional Skills
@endsection
@section('content')
    <div class="container mt-5 pb-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-12">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 text-light">Professional Skills</h2>
                    <a href="{{route('admin.education.create')}}" class="btn btn-success">Add New Skill</a>
                </div>
                <table class="table table-striped table-bordered" id="dataTable" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Title</th>
                        <th>Value</th>
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
                paging: true,
                searching: true,
                serverSide: true,
                ajax: '{{ route('admin.skills.datatable') }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'title',
                        name: 'title'
                    },{
                        data: 'value',
                        name: 'value'
                    },{
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });
        })
    </script>

    {{--Delete Client--}}
    <script>
        $(document).ready(function (){
            $('body').on('click', '.educationDeleteBtn', function (){
                const id = $(this).data('id')
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{route('admin.education.delete')}}',
                    method: 'POST',
                    data: {
                        id: id
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
                            $('#dataTable').DataTable().ajax.reload();
                        }
                    }
                })
            })
        })
    </script>
@endsection
