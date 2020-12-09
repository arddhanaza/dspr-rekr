@extends('template.template')
@section('title','Login')
@section('container')

    <div class="text-center mt-5 mb-5">
        <h2>Login</h2>
    </div>
    <div class="card">
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
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection

