@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1> EDIT POST</h1>



        {!! Form::model($posts, ['method' => 'PATCH','action' => ['AdminPostsController@update', $posts->id],'files' =>true]) !!}

        {!! Form::label('title', 'Title:') !!}<br>
        {!! Form::text('title', null)!!}<br>

        {!! Form::label('category_id', 'Category:') !!}<br>
        {!! Form::select('category_id', $categories)!!}<br>

        {!! Form::label('photo_id', 'Photo:') !!}<br>
        {!! Form::file('photo_id', null )!!}<br>

        {!! Form::label('body', 'Description:') !!}<br>
        {!! Form::textarea('body', null )!!}<br>

        {!! Form::submit('Update post') !!}
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE','action' => ['AdminPostsController@destroy', $posts->id]]) !!}




        {!! Form::submit('Delete post') !!}
        {!! Form::close() !!}





    </div>
    @include('includes.form_error')
@endsection
