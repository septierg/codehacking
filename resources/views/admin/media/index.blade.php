@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="w3-row-padding">
    <h1> MEDIAS</h1>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <hr>
        <div class="w3-col m6">
            <h2> Create Media</h2>
            {!! Form::open(['action' => 'MediasController@store', 'method' => 'post','files' =>true]) !!}

            {!! Form::label('name', 'Name:') !!}<br>
            {!! Form::text('name', null)!!}<br>

            {!! Form::label('file', 'File:') !!}<br>
            {!! Form::file('file', null)!!}<br>

            {!! Form::submit('Create Media' ,['class'=> 'w3-blue-grey']) !!}
            {!! Form::close() !!}


        </div>
        <div class="w3-col m6">
    @if($photos)
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Created</th>

        </tr>
        </thead>
        <tbody>

            @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id}}</td>

                    <td><img height="100" width="100" src="{{ $photo->file}}" alt=""></td>
                    <td>{{ $photo->created_at ? $photo->created_at: 'no date'}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','action' => ['MediasController@destroy', $photo->id]]) !!}
                        {!! Form::submit('Delete Media' ,['class'=> 'w3-red']) !!}
                        {!! Form::close() !!}

                    </td>
                    <td></td>

                </tr>
            @endforeach




        @endif


        </tbody>
    </table>

    </div>
</div>
    <hr>

</div>

@endsection()
@include('includes.form_error')