@extends('layouts.master')
@section('app')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center" style="min-height: 95vh">
                <div class="col-lg-4 col-xl-3 col-md-10 h-auto">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30">
                                <img src="{{ asset('dist/image/undraw_mobile_login_ikmv.svg') }}" class="rounded-circle"
                                    width="150" />
                                <h4 class="card-title m-t-10">Login</h4>
                                <!-- <h6 class="card-subtitle">Accoubts Manager Amix corp</h6> -->
                            </center>
                            <div class="row">
                                <!-- column -->
                                <form action="{{ route('password.email') }}" method="post"
                                    class="form-horizontal form-material mx-2">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="johnathan@admin.com"
                                                class="form-control form-control-line" name="email" id="email" />
                                            @error('email')
                                                <span class="text-danger">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary bg-gradient-primary-to-secondary">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
