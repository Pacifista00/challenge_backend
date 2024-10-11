@extends('./layouts/main')
@section('content')
<div class="d-flex align-items-center min-vh-100 bg-dark">
    <div class="card p-2 mx-auto rounded-5">
        <div class="card-body">
            <h2 class="text-center mb-3">Register</h2>
            @if ($errors->any())
                <div class="alert alert-danger p-2" role="alert">
                    @foreach ($errors->all() as $error)
                        <small>{{ $error }}</small><br>
                    @endforeach
                </div>
            @endif
            <form action="/register" method="POST" class="mb-3">
                @csrf
                <div class="mb-2">
                    <label for="username">Username</label>
                    <input type="text" class="form-control rounded-5" id="username" name="username" value="{{ old('username') }}">
                </div>
                <div class="mb-2">
                    <label for="email">Email</label>
                    <input type="email" class="form-control rounded-5" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control rounded-5" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="passwordConfirm">Password Confirm</label>
                    <input type="password" class="form-control rounded-5" id="passwordConfirm" name="passwordConfirm">
                </div>
                <button type="submit" class="btn btn-warning text-light rounded-5" style="width: 100%;">REGISTER</button>
            </form>
            <hr>
            <p>Sudah punya akun? Silahkan <a class="text-link" href="/">Login</a></p>
        </div>
    </div>
</div>
@endsection