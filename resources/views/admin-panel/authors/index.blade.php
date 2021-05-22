@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('home.authors.create') }}" class="btn waves-effect waves-light btn-info">
                            Add Author
                        </a>
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Address</th>
                                        <th class="border-top-0">Country</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($authors as $author)
                                        <tr>
                                            <td>{{ $author->name }}</td>
                                            <td>{{ $author->address }}</td>
                                            <td>{{ $author->country->name }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('home.books.author', $author->id) }}"
                                                    class="btn btn-secondary text-white" title="show">
                                                    <i class="mdi mdi-book-multiple"></i>
                                                </a>
                                                <a href="{{ route('home.authors.show', $author->id) }}"
                                                    class="btn btn-success text-white" title="show">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <a href="{{ route('home.authors.edit', $author->id) }}"
                                                    class="btn btn-info text-white" title="edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="{{ route('home.authors.delete', $author->id) }}"
                                                    class="btn btn-danger text-white" title="delete"
                                                    onclick="event.preventDefault(); document.getElementById('delete-item{{ $author->id }}').submit();">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <form id="delete-item{{ $author->id }}"
                                                    action="{{ route('home.authors.delete', $author->id) }}"
                                                    method="POST" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
