@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('home.countries.create') }}" class="btn waves-effect waves-light btn-info">
                            Add Country
                        </a>
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Code</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $country->code }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('home.countries.show', $country->id) }}"
                                                    class="btn btn-success text-white" title="show">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <a href="{{ route('home.countries.edit', $country->id) }}"
                                                    class="btn btn-info text-white" title="edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="{{ route('home.countries.delete', $country->id) }}"
                                                    class="btn btn-danger text-white" title="delete"
                                                    onclick="event.preventDefault(); document.getElementById('delete-item{{ $country->id }}').submit();">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <form id="delete-item{{ $country->id }}"
                                                    action="{{ route('home.countries.delete', $country->id) }}"
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
