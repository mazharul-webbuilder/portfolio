@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    Clients
@endsection
@section('content')
    <div class="container mt-5 pb-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-12">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 text-light">Portfolio Create</h2>
                    <a href="{{\Illuminate\Support\Facades\URL::previous()}}" class="btn btn-success">Back</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form id="portFolioCreateForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Portfolio Category*</label>
                                <div class="col-sm-9">
                                    <select name="portfolio_category_id" id="" class="form-control">
                                        <option value="">Select a category</option>
                                        @foreach($portfolioCategories as $portfolioCategory)
                                        <option value="{{$portfolioCategory->id}}">{{$portfolioCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Portfolio Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" id="horizontal-firstname-input" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea name="short_description" id="horizontal-firstname-input" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Image (800x600)</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="horizontal-email-input">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Create</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-footer-assets')
    {{--Client Store--}}
    <script>
        $(document).ready(function () {
            $('#portFolioCreateForm').on('submit', function (e) {
                e.preventDefault()
                $('.error-message').hide()

                $('.submit-btn').html('Processing....').prop('disabled', true)

                const formData = new FormData(this);

                $.ajax({
                    url: '{{route('admin.portfolio.store')}}',
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
@endsection
