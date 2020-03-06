@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1> CREATE POST</h1>

        {!! Form::open(['action' => 'AdminPostsController@store', 'method' => 'post','files' =>true]) !!}

        {!! Form::label('title', 'Title:') !!}<br>
        {!! Form::text('title', null)!!}<br>

        {!! Form::label('category_id', 'Category:') !!}<br>
        {!! Form::select('category_id', ['' => 'choose categories' ] + $categories)!!}<br>

        {!! Form::label('photo_id', 'Photo:') !!}<br>
        {!! Form::file('photo_id', null )!!}<br>

        {!! Form::label('body', 'Description:') !!}<br>
        {!! Form::textarea('body', null )!!}<br>

        {!! Form::submit('create post') !!}
        {!! Form::close() !!}


    </div>
    @include('includes.form_error')
@endsection