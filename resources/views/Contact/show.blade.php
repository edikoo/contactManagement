@extends('includes.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 mt-5">

                Name : {{ $contact['name'] }}
                <br>
                Phone : {{ $contact['phone'] }}
                <br>
                Created At : {{ $contact['created_at'] }}
                <br>
                Updated At : {{ $contact['updated_at'] }}
                <br>
                <a href="{{ route('index') }}">Back To Contacts List</a>
            </div>
        </div>
    </div>
@endsection

