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
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Name</th>
                                        {{-- <th class="border-top-0">Price</th> --}}
                                        <th class="border-top-0">Publisher</th>
                                        <th class="border-top-0">Quantity</th>
                                        <th class="border-top-0">Publication Date</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>
                                                {{ $book->name }}
                                            </td>
                                            {{-- <td>{{ $book->prices->amount }}</td> --}}
                                            <td>{{ $book->publisher_name }}</td>
                                            <td>{{ $book->quantity }}</td>
                                            <td>{{ date('F j, Y', strtotime($book->publication_date)) }}</td>
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
            $('.admin-ban').on('change', (e) => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('home.books.api-data', 1) }}",
                    data: {
                        data: "bappi"
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(error) {
                        toastr.error("Something Went Wrong!");
                    }
                });
            });
        });

    </script>
@endpush
