@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('home.books.index') }}" class="btn waves-effect waves-light btn-info">
                            <i class="mdi mdi-arrow-left"></i> Back
                        </a>
                        <br>
                        <hr><br>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="text-muted">Name </small>
                                                <h6>{{ $book->name }}</h6>
                                                <small class="text-muted">Description </small>
                                                <h6>{{ $book->description }}</h6>
                                                <small class="text-muted">Quantity </small>
                                                <h6>{{ $book->quantity }}</h6>
                                                <small class="text-muted">Dimention </small>
                                                <h6>{{ $book->dimention }}</h6>
                                                <small class="text-muted">Publisher Name </small>
                                                <h6>{{ $book->publisher_name }}</h6>
                                                <small class="text-muted">Publication Date </small>
                                                <h6>{{ date('F j, Y', strtotime($book->publication_date)) }}</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <small class="text-muted">Authors</small>
                                                @foreach ($book->authors as $item)
                                                    <h6>{{ $item->name }}</h6>
                                                @endforeach
                                                <small class="text-muted">Languages</small>
                                                @foreach ($book->languages as $item)
                                                    <h6>{{ $item->name }} {{ $item->code }}</h6>
                                                @endforeach
                                                <small class="text-muted">Prices</small>
                                                @foreach ($book->prices as $item)
                                                    <h6>{{ $item->symbol }}{{ $item->pivot->amount }}
                                                        {{ $item->code }}
                                                    </h6>
                                                @endforeach
                                                <small class="text-muted">Created At </small>
                                                <h6>{{ date('F j, Y', strtotime($book->created_at)) }}</h6>
                                                <small class="text-muted">Updated At </small>
                                                <h6>{{ date('F j, Y', strtotime($book->updated_at)) }}</h6>
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
