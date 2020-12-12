<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/scss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <title>Login</title>

</head>
<body class="vh-100" style="background-image: url('{{asset('assets/img/bg.jpg')}}')">
<div class="container h-100 align-content-center">
    <div class="row justify-content-center d-flex flex-lg-row-reverse h-100">
        <div class="col-md-6 align-self-center">
            <img draggable="false" src="{{URL::to('/assets/img/icon.png')}}" alt="icon aspirasi" width="50%">
        </div>
        <div class="col-md-6 align-self-center">

            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-transparent border-0">
                            <div class="card-title">
                                <h1><strong>LOG-<br>IN</strong></h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('login')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="kode_asisten" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary form-control">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/dist/js/dataTable.js')}}"></script>
</body>
</html>




