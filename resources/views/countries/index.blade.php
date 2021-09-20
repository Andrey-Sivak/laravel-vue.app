@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>
    <div class="row">
        <div class="card mx-auto">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form class="row gy-2 gx-3 align-items-center" method="GET" action="{{ route('countries.index') }}">
                            <div class="col-auto">
                                @if( !empty($_GET['search']) )
                                    <input type="search" name="search" class="form-control" id="autoSizingInput" placeholder="{{ $_GET['search'] }}">
                                @else
                                    <input type="search" name="search" class="form-control" id="autoSizingInput" placeholder="USA">
                                @endif
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        @if( !empty($_GET['search']) )
                            <div class="mt-2">
                                <form class="row gy-2 gx-3 align-items-center" method="GET" action="{{ route('countries.index') }}">
                                    <div class="col-auto">
                                        <button type="submit" class="btn">Reset search</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('countries.create') }}" class="float-right btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Country Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countries as $country)
                        <tr>
                            <th scope="row">{{ $country->id }}</th>
                            <td>{{ $country->country_code }}</td>
                            <td>{{ $country->name }}</td>
                            <td><a class="btn btn-success" href="{{ route('countries.edit', $country->id) }}">Edit</a>\Delete</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
