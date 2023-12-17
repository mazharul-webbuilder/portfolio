@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    Pricing
@endsection
@section('content')
    <div class="container mt-5 pb-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-12">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 text-light">Pricing List</h2>
                </div>
                <table class="table table-striped table-bordered" id="dataTable" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>Pricing Category</th>
                        <th>Title</th>
                        <th>Short description</th>
                        <th>Long description</th>
                        <th>Total price</th>
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
                ajax: '{{ route('admin.pricing.datatable') }}',
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
                        data: 'short_description',
                        name: 'short_description'
                    },{
                        data: 'long_description',
                        name: 'long_description'
                    },{
                        data: 'total_price',
                        name: 'total_price'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });
        })
    </script>
@endsection
