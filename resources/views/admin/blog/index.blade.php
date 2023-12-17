@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    Blogs
@endsection
@section('content')
    <div class="container mt-5 pb-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-12">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 text-light">Blog List</h2>
                    <a href="{{route('admin.blog.create')}}" class="btn btn-success">Add New Blog</a>
                </div>
                <table class="table table-striped table-bordered" id="dataTable" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Blog Category</th>
                        <th>Title</th>
                        <th>description</th>
                        <th>Image</th>
                        <th>Time to Read</th>
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
                ajax: '{{ route('admin.blog.datatable') }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'category',
                        name: 'category'
                    },{
                        data: 'title',
                        name: 'title'
                    },{
                        data: 'description',
                        name: 'description'
                    },{
                        data: 'image',
                        name: 'image'
                    },{
                        data: 'time_to_read',
                        name: 'time_to_read'
                    }, {
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
            $('body').on('click', '.BlogDeleteBtn', function (){
                const blogId = $(this).data('id')
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{route('admin.blog.delete')}}',
                    method: 'POST',
                    data: {
                        id: blogId
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
