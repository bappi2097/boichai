@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('home.authors.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <a href="{{ route('home.authors.index') }}" class="btn waves-effect waves-light btn-info">
                                <i class="mdi mdi-arrow-left"></i> Back
                            </a>
                            <br>
                            <hr><br>
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-xlg-9 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material mx-2">
                                                <div class="form-group">
                                                    <label class="col-md-12">Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="John Doe" name="name"
                                                            value="{{ old('name') }}"
                                                            class="form-control form-control-line">
                                                        @error('name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Address</label>
                                                    <div class="col-md-12">
                                                        <textarea placeholder="221B, Baker St." name="address"
                                                            class="form-control">{{ old('address') }}</textarea>
                                                        @error('address')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Country</label>
                                                    <div class="col-md-12">
                                                        <select name="country_id" id="country_id"
                                                            class="form-control form-control-line">
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}">
                                                                    {{ $country->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('country_id')
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
                                </div> <!-- Column -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
