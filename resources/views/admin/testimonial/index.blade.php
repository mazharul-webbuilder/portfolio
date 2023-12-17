@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    Testimonials
@endsection
@section('content')
    <div class="container mt-5 pb-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-12">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 text-light">Testimonial List</h2>
                    <a href="{{route('admin.client.create')}}" class="btn btn-success">Add New Testimonial</a>
                </div>
                <table class="table table-striped table-bordered" id="dataTable" style="width: 100% !important;">
                    <thead>
                    <tr>
                        <th>S/L</th>
                        <th>name</th>
                        <th>designation</th>
                        <th>organization_name</th>
                        <th>department_name</th>
                        <th>bio</th>
                        <th>short_description</th>
                        <th>image</th>
                        <th>rating</th>
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
                ajax: '{{ route('admin.testimonial.datatable') }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'name',
                        name: 'name'
                    }, {
                        data: 'designation',
                        name: 'designation'
                    }, {
                        data: 'organization_name',
                        name: 'organization_name'
                    },{
                        data: 'department_name',
                        name: 'department_name'
                    }, {
                        data: 'bio',
                        name: 'bio'
                    },  {
                        data: 'short_description',
                        name: 'short_description'
                    },{
                        data: 'image',
                        name: 'image'
                    },{
                        data: 'rating',
                        name: 'rating'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ]
            });
        })
    </script>

    {{--Update Client--}}
    <script>
        $(document).ready(function () {
            $('#clientUpdateForm').on('submit', function (e) {
                e.preventDefault()
                $('.error-message').hide()

                $('.submit-btn').html('Processing....').prop('disabled', true)

                const formData = new FormData(this);

                $.ajax({
                    url: '{{route('admin.client.update')}}',
                    method: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.response === 200) {
                            Toast.fire({
                                icon: data.type,
                                title: data.message
                            })
                            $('.close').click()
                            $('#dataTable').DataTable().ajax.reload();
                            $('.submit-btn').html('Processing....').prop('disabled', false)
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('error')
                        if (xhr.status === 422) {
                            $('.submit-btn').text('Submit').prop('disabled', false)
                            const errors = xhr.responseJSON.errors;

                            // Clear previous error messages
                            $('.error-message').remove();

                            // Display error messages for each input field
                            Object.keys(errors).forEach(function (field) {
                                const errorMessage = errors[field][0];
                                const inputField = $('[name="' + field + '"]');
                                inputField.after('<span class="error-message text-danger">' + errorMessage + '</span>');
                            });

                        } else {
                            console.log('An error occurred:', status, error);
                        }
                    }
                })

            })
        })
    </script>
    {{--Delete Client--}}
    <script>
        $(document).ready(function (){
            $('body').on('click', '.testimonialDeleteBtn', function (){
                const id = $(this).data('id')
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '{{route('admin.testimonial.delete')}}',
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
