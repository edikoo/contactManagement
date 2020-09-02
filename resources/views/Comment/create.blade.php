@extends('includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 mt-5">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                    </div>
                @endif

                @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                @endif

                <form class="formHorisontal" action="{{ route('comment.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-sm-12">
                        <label for="exampleInputEmail1">Enter Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                    </div>
                    <div class="form-group  col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <a href="{{ route('comment.index') }}">Back To Comment List</a>
            </div>
        </div>
    </div>
@endsection

