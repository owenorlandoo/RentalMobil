@extends('layouts.template')

@section('layout_content')
    <style>
         .btn-primary {
            color: #cfac89;
            background-color: #42332e;
            border: #cfac89 solid 1px;
        }

        .btn-primary:hover {
            color: #42332e;
            background-color: #cfac89;
            border: #42332e solid 1px;
        }
    </style>
    <div class="mask d-flex align-items-center h-100">
        <div class="container h-100">
            <br>
            <br>
            <br>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">

                        <div class="card-body p-5">

                            <h2 class="text-uppercase text-center mb-5">Buat Akun</h2>

                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required autofocus />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="no_telp">Nomor Telepon</label>
                                    <input id="no_telp" type="text"
                                        class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                                        value="{{ old('no_telp') }}" required autocomplete="no_telp" autofocus>
                                    @error('no_telp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">E-mail</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Kata Sandi</label>
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        required />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password-confirm">Ulangi Kata Sandi</label>
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                        class="form-control form-control-lg" required />
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="gender"
                                        class="col form-label text-md-end">{{ __('Choose gender') }}</label>
                                    <div class="col-md-6">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="female" />
                                        <label class="form-check-label" for="femaleGender">Perempuan</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="male" />
                                        <label class="form-check-label" for="maleGender">Laki-laki</label>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    </div>
@endsection
