@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('home.countries.index') }}" class="btn waves-effect waves-light btn-info">
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
                                                <h6>{{ $country->name }}</h6>
                                                <small class="text-muted">Code </small>
                                                <h6>{{ $country->code }}</h6>
                                                <small class="text-muted">Created At </small>
                                                <h6>{{ date('F j, Y', strtotime($country->created_at)) }}</h6>
                                                <small class="text-muted">Updated At </small>
                                                <h6>{{ date('F j, Y', strtotime($country->updated_at)) }}</h6>
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
