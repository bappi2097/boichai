@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('home.languages.create') }}" class="btn waves-effect waves-light btn-info">
                            Add Language
                        </a>
                        <br>
                        <hr><br>
                        <div class="table-responsive">
                            <table id="zero_config" class="table v-middle">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Local Name</th>
                                        <th class="border-top-0">Code</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($languages as $language)
                                        <tr>
                                            <td>{{ $language->name }}</td>
                                            <td>{{ $language->local_name }}</td>
                                            <td>{{ $language->code }}</td>
                                            <td class="d-flex justify-content-around">
                                                <a href="{{ route('home.languages.show', $language->id) }}"
                                                    class="btn btn-success text-white" title="show">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <a href="{{ route('home.languages.edit', $language->id) }}"
                                                    class="btn btn-info text-white" title="edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="{{ route('home.languages.delete', $language->id) }}"
                                                    class="btn btn-danger text-white" title="delete"
                                                    onclick="event.preventDefault(); document.getElementById('delete-item{{ $language->id }}').submit();">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                                <form id="delete-item{{ $language->id }}"
                                                    action="{{ route('home.languages.delete', $language->id) }}"
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
