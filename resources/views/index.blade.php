@extends('includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 mt-5">
                <a href="{{ route('create') }}" class="btn btn-success float-right">Add New Contact</a>
                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $contact['id'] }}</th>
                                <td>{{ $contact['name'] }}</td>
                                <td>{{ $contact['phone'] }}</td>
                                <td><a href="{{ route('show', $contact['id']) }}" class="btn btn-info">Show</a></td>
                                <td><a href="{{ route('edit', $contact['id']) }}" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form method="POST" action="{{ route('delete', $contact['id']) }}">
                                        @csrf
                                        @method("DELETE")
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </div>
                                    </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

