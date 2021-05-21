@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('home.books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <a href="{{ route('home.books.index') }}" class="btn waves-effect waves-light btn-info">
                                <i class="mdi mdi-arrow-left"></i>
                                Back
                            </a>
                            <br>
                            <hr><br>
                            <div class="row">
                                <div class="col-lg-4 col-xlg-3 col-md-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <center class="m-t-30">
                                                <img id="user-image" class="rounded-circle"
                                                    src="{{ asset('assets/images/book.svg') }}" alt="your image"
                                                    width="150" />
                                            </center>
                                        </div>
                                        <div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material mx-2">
                                                <div class="form-group">
                                                    <label class="col-md-12">Book Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="Thirteen Reasons Why" name="name"
                                                            value="{{ $book->name }}"
                                                            class="form-control form-control-line" required>
                                                        @error('name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Description</label>
                                                    <div class="col-md-12">
                                                        <textarea rows="5" name="description"
                                                            class="form-control form-control-line"
                                                            required>{{ $book->description }}</textarea>
                                                        @error('description')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Publisher Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" placeholder="Davidson" name="publisher_name"
                                                            value="{{ $book->publisher_name }}"
                                                            class="form-control form-control-line" required>
                                                        @error('publisher_name')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Quantity</label>
                                                    <div class="col-md-12">
                                                        <input type="number" value="{{ $book->quantity }}"
                                                            placeholder="100" name="quantity" min="0"
                                                            class="form-control form-control-line" required>
                                                        @error('quantity')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Dimention</label>
                                                    <div class="col-md-12">
                                                        <input type="text" value="{{ $book->dimention }}"
                                                            placeholder="9x12" name="dimention"
                                                            class="form-control form-control-line" required>
                                                        @error('dimention')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-12">ISBN</label>
                                                    <div class="col-md-12">
                                                        <input type="text" value="{{ $book->isbn }}"
                                                            placeholder="9783161484100" name="isbn"
                                                            class="form-control form-control-line" required>
                                                        @error('isbn')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Publication Date</label>
                                                    <div class="col-md-12">
                                                        <input type="date" value="{{ $book->publication_date }}"
                                                            name="publication_date" class="form-control form-control-line"
                                                            required>
                                                        @error('publication_date')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12" for="author_id">Authors</label>
                                                    <div class="col-md-12">
                                                        <select name="author_id[]" id="author_id" multiple
                                                            class="form-control form-control-line selectpicker" required>
                                                            @foreach ($authors as $author)
                                                                <option value="{{ $author->id }}"
                                                                    {{ selected($author->id, $book->authors->pluck('id')->all()) }}>
                                                                    {{ $author->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('author_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12" for="language_id">Languages</label>
                                                    <div class="col-md-12">
                                                        <select name="language_id[]" id="language_id" multiple
                                                            class="form-control form-control-line selectpicker" required>
                                                            @foreach ($languages as $language)
                                                                <option value="{{ $language->id }}"
                                                                    {{ selected($language->id, $book->languages->pluck('id')->all()) }}>
                                                                    {{ $language->name }} - {{ $language->code }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('language_id')
                                                            <span class="text-danger">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <table>
                                                    <tbody id="file_table">
                                                        @foreach ($book->prices as $item)
                                                            <tr class="d_row">
                                                                <td>
                                                                    <div class="form-group">
                                                                        <label class="col-md-12">
                                                                            Amount
                                                                        </label>
                                                                        <div class="col-md-12">
                                                                            <input type="number" placeholder="49.0"
                                                                                value="{{ $item->pivot->amount }}"
                                                                                min="0" name="amount[]" required
                                                                                class="form-control form-control-line">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <select name="currency_id[]" id="currency_id"
                                                                            class="form-control form-control-line" required>
                                                                            @foreach ($currencies as $currency)
                                                                                <option value="{{ $currency->id }}"
                                                                                    {{ selected($currency->id, $item->id) }}>
                                                                                    {{ $currency->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('currency_id')
                                                                            <span class="text-danger">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </td>
                                                                <td class="">
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger rounded btn-sm"
                                                                        onclick="deleteRow(this)">
                                                                        <i class="mdi mdi-delete"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                    @error('currency_id')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                    @error('amount')
                                                        <span class="text-danger">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </table>
                                                <div class="col-sm-12">
                                                    <button id="add_document" type="button"
                                                        class="btn btn-success text-white rounded-circle float-end">
                                                        <span class="fw-bolder">
                                                            <i class="mdi mdi-plus"></i>
                                                        </span>
                                                    </button>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(() => {
            $("#add_document").on('click', () => {
                $("#file_table").append(
                    `<tr class="d_row">
                                                                                        <td>
                                                                                            <div class="form-group">
                                                                                                <label class="col-md-12">
                                                                                                    Amount
                                                                                                </label>
                                                                                                <div class="col-md-12">
                                                                                                    <input type="number" placeholder="49.0"
                                                                                                        value="{{ old('amount') }}" min="0"
                                                                                                        name="amount[]" required
                                                                                                        class="form-control form-control-line">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <select name="currency_id[]" id="currency_id" 
                                                                                                    class="form-control form-control-line"
                                                                                                    required>` +
                    `
                                                                                                    @foreach ($currencies as $currency)
                                                                                                        <option value="{{ $currency->id }}">
                                                                                                            {{ $currency->name }}
                                                                                                        </option>
                                                                                                    @endforeach` + `
                                                                                                </select>
                                                                                                @error('currency_id')
                                                                                                    <span class="text-danger">
                                                                                                        <strong>{{ $message }}</strong>
                                                                                                    </span>
                                                                                                @enderror
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="">
                                                                                            <button type="button"
                                                                                                class="btn btn-outline-danger rounded btn-sm"
                                                                                                onclick="deleteRow(this)">
                                                                                                <i class="mdi mdi-delete"></i>
                                                                                            </button>
                                                                                        </td>
                                                                                        </tr>`
                );
            });
        });

        function deleteRow(e) {
            $(e).closest("tr").remove();
        }

    </script>
@endpush
