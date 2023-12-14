@extends('admin.master.master')

@section('page-header-assets')

@endsection

@section('title')
    Welcome To Admin Dashboard
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row" style="margin-top: 80px">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-primary text-white mb-5">
                            <h2 class="mb-0 text-light">Admin General Settings</h2>
                        </div>
                        <form id="meteSettingForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Showing Name in Banner side</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$adminDetails->name_to_show}}" class="form-control" id="horizontal-firstname-input" name="name_to_show" placeholder="Enter name to show in banner">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Slogan 1</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$adminDetails->slogan_1}}" class="form-control" id="horizontal-email-input" name="slogan_1" placeholder="Enter first slogan for banner side">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Slogan 2</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$adminDetails->slogan_2}}" class="form-control" id="horizontal-email-input" name="slogan_2" placeholder="Enter second slogan for banner side">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Slogan 3</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{$adminDetails->slogan_3}}" class="form-control" id="horizontal-email-input" name="slogan_2" placeholder="Enter third slogan for banner side">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Avatar</label>
                                <div class="col-sm-9">
                                    <input type="file" value="" class="form-control" id="horizontal-email-input" name="image">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-email-input" class="col-sm-3 col-form-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea name="short_description" id="" cols="30" rows="10" class="form-control">{{$adminDetails->short_description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
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
    <script>

    </script>
@endsection
