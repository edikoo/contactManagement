@extends('includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 mt-5">
                <a href="{{ route('index') }}" class="btn btn-primary float-left">Contacts</a>
                <a href="{{ route('comment.create') }}" class="btn btn-success float-right">Add New Comment</a>
                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <th scope="row">{{ $comment['id'] }}</th>
                                <td>{{ $comment['name'] }}</td>
                                <td><a href="{{ route('comment.show', $comment['id']) }}" class="btn btn-info">Show</a></td>
                                <td><a href="{{ route('comment.edit', $comment['id']) }}" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form method="POST" action="{{ route('comment.destroy', $comment['id']) }}">
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

