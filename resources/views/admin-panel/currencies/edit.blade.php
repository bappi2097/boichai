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
                            <div class="col-lg-8 col-xlg-9 col-md-7">
                                <div class="card">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material mx-2"
                                            action="{{ route('home.currencies.update', $currency->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Dollar" name="name"
                                                        value="{{ $currency->name }}"
                                                        class="form-control form-control-line">
                                                    @error('name')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Code</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="BDT" name="code"
                                                        value="{{ $currency->code }}"
                                                        class="form-control form-control-line">
                                                    @error('code')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Symbol</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="$" name="symbol"
                                                        value="{{ $currency->symbol }}"
                                                        class="form-control form-control-line">
                                                    @error('symbol')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-info text-white">Save</button>
                                                </div>
                                            </div>
                                        </form>
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
