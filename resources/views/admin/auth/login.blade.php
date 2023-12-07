<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/")}}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset("assets/")}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset("assets/")}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset("assets/")}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="home-btn d-none d-sm-block">
    <a href="{{route('home')}}" class="text-dark"><i class="fas fa-home h2"></i></a>
</div>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Admin Login !</h5>
                                    <p>Sign in to Manage your Application.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset("assets/")}}/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="javascript:void(0)">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset("assets/")}}/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" id="AdminLoginForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                                <div class="mt-4 text-center">
                                    <a href="javascript:void(0)" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset("assets/")}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset("assets/")}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset("assets/")}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset("assets/")}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset("assets/")}}/libs/node-waves/waves.min.js"></script>

<!-- App js -->
<script src="{{asset("assets/")}}/js/app.js"></script>

<script>
    /*Admin Login*/
    $(document).ready(function (){
        $('#AdminLoginForm').on('submit', function (e) {
            e.preventDefault();

            const AdminLoginForm = $(this);

            // Clear previous error messages
            $('.error-message').remove();

            // Serialize the form data
            const formData = AdminLoginForm.serialize();

            $.ajax({
                url: '{{ route('admin.auth.check') }}',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    if (data.response === 200) {
                        if (data.type === "success") {
                            window.location.href = "{{route('admin.dashboard')}}"
                            Toast.fire({
                                icon: data.type,
                                title: data.message
                            })
                        } else {
                            Toast.fire({
                                icon: data.type,
                                title: data.message
                            })
                        }
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;

                        // Display error messages for each input field
                        $.each(errors, function (field, errorMessage) {
                            const inputField = $('[name="' + field + '"]');
                            inputField.after('<span class="error-message text-danger">' + errorMessage[0] + '</span>');
                        });
                    } else {
                        console.log('An error occurred:', status, error);
                    }
                }
            });
        });
    })
</script>
@include('includes.toastr-notification.toastr')
</body>

</html>
