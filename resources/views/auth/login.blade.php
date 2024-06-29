<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login Page</h1>
                @include('backend.components.messages')
            </div>
            <div class="col-md-12 mt-5  ">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email:
                            <span class="txt-danger">{{$errors->first('email')}}</span>
                        </label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password:
                            <span class="txt-danger">{{$errors->first('password')}}</span>
                        </label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-success">Login</button>
                    </div>

                </form>
            </div>
        </div>




    </div>


</body>

</html>