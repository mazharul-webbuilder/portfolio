@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    New Blog
@endsection
@section('content')
    <div class="container mt-5 pb-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-12">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0 text-light">Blog Create</h2>
                    <a href="{{\Illuminate\Support\Facades\URL::previous()}}" class="btn btn-success">Back</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form id="blogUpdateForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$id->id}}" name="id">
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Blog Category</label>
                                <div class="col-sm-9">
                                    <select name="blog_category_id" class="form-control" id="">
                                        <option value="">Select blog category</option>
                                        @foreach($blogCategories as $blogCategory)
                                        <option value="{{$blogCategory->id}}" {{$blogCategory->id === $id->blog_category_id ? 'selected' : ''}} >{{$blogCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Blog Title</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$id->title}}" class="form-control" name="title" id="horizontal-firstname-input" placeholder="Enter blog title">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Time to read (in minutes)</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$id->time_to_read}}" class="form-control" name="time_to_read" id="horizontal-firstname-input" placeholder="Enter minutes here">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea placeholder="Enter blog detail here" class="form-control" name="description" id="horizontal-firstname-input" cols="30" rows="4">{{$id->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Thumbnail</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" id="horizontal-email-input">
                                    <br>
                                    <img src="{{asset('uploads/blog-image/resize' . '/' . $id->image)}}" alt="" height="80" width="80">
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Update Post</button>
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
            $('#blogUpdateForm').on('submit', function (e) {
                e.preventDefault()
                $('.error-message').hide()

                $('.submit-btn').html('Processing....').prop('disabled', true)

                const formData = new FormData(this);

                $.ajax({
                    url: '{{route('admin.blog.post.update')}}',
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
