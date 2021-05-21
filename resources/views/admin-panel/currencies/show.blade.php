@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('home.currencies.index') }}" class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                        <br>
                        <hr><br>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-muted">Name </small>
                                                <h6>{{ $currency->name }}</h6>
                                                <small class="text-muted">Code </small>
                                                <h6>{{ $currency->code }}</h6>
                                                <small class="text-muted">Symbol </small>
                                                <h6>{{ $currency->symbol }}</h6>
                                                <small class="text-muted">Created At </small>
                                                <h6>{{ date('F j, Y', strtotime($currency->created_at)) }}</h6>
                                                <small class="text-muted">Updated At </small>
                                                <h6>{{ date('F j, Y', strtotime($currency->updated_at)) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
