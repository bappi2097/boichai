@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('home.books.create') }}" class="btn waves-effect waves-light btn-info">
                            Add Book
                        </a>
                        <br>
                        <hr><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author" class="author">Author:</label>
                                    <select name="author[]" id="author" class="form-control selectpicker" multiple>
                                        @foreach (\App\Models\Author::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sortBy" class="sortBy">Sort By:</label>
                                    <select name="sortBy" id="sortBy" class="form-control">
                                        <option value="name">Name</option>
                                        <option value="quantity">Quantity</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Price</th>
                                        <th class="border-top-0">Publisher</th>
                                        <th class="border-top-0">Quantity</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>
                                                {{ $book->name }}
                                            </td>
                                            <td>{{ $book->prices[0]->pivot->amount }}</td>
                                            <td>{{ $book->publisher_name }}</td>
                                            <td>{{ $book->quantity }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('home.books.show', $book->id) }}"
                                                    class="btn btn-success text-white" title="show">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <a href="{{ route('home.books.edit', $book->id) }}"
                                                    class="btn btn-info text-white" title="edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="{{ route('home.books.delete', $book->id) }}"
                                                    class="btn btn-danger text-white" title="delete"
                                                    onclick="event.preventDefault(); document.getElementById('delete-item{{ $book->id }}').submit();">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <form id="delete-item{{ $book->id }}"
                                                    action="{{ route('home.books.delete', $book->id) }}" method="POST"
                                                    class="d-none">
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
@push('script')
    <script>
        $(document).ready(() => {
            $('#sortBy, #author').on('change', (e) => {
                $.ajax({
                    type: "POST",
                    url: "{{ route('home.books.api-data') }}",
                    data: {
                        sortBy: $('#sortBy').val(),
                        author: $('#author').val(),
                    },
                    success: function(data) {
                        $('#tbody').empty();
                        data.forEach(element => {
                            $('#tbody').append(
                                `
                                <tr>
                                    <td> ${element.name} </td>
                                    <td> ${element.prices[0].pivot.amount} </td>
                                    <td>${element.publisher_name}</td>
                                    <td>${element.quantity}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="books/show/${element.id}" class="btn btn-success text-white" title="show">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        <a href="books/edit/${element . id}" class="btn btn-info text-white" title="edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="books/${element . id}" class="btn btn-danger text-white" title="delete"
                                            onclick="event.preventDefault(); document.getElementById('delete-item${element.id}').submit();">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        <form id="delete-item${element.id}" action="books/${element . id}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                                `
                            );
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        toastr.error("Something Went Wrong!");
                    }
                });
            });
        });
        $('#table').DataTable({
            "ordering": false
        });

    </script>
@endpush
