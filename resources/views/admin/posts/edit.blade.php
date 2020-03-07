@extends('layouts.admin')

@section('content')
    <div class="container" style="padding-top:20px; padding-left:15px;">
        <hr>
        <h1> Edit Post</h1>
        <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-quarter">
            <img  style="width:60%" src="{{$posts->photo->file ? $posts->photo->file : 'https://via.placeholder.com/50'}}" class="responsive" alt="post_image">
        </div>
        <div class="w3-twothird">
        {!! Form::model($posts, ['method' => 'PATCH','action' => ['AdminPostsController@update', $posts->id],'files' =>true]) !!}

        {!! Form::label('title', 'Title:') !!}<br>
        {!! Form::text('title', null)!!}<br>

        {!! Form::label('category_id', 'Category:') !!}<br>
        {!! Form::select('category_id', $categories)!!}<br>

        {!! Form::label('photo_id', 'Photo:') !!}<br>
        {!! Form::file('photo_id', null )!!}<br>

        {!! Form::label('body', 'Description:') !!}<br>
        {!! Form::textarea('body', null )!!}<br>

        {!! Form::submit('Edit post',['class'=> 'w3-blue']) !!}
        {!! Form::close() !!}

        {!! Form::open(['method' => 'DELETE','action' => ['AdminPostsController@destroy', $posts->id]]) !!}




        {!! Form::submit('Delete post',['class'=> 'w3-red']) !!}
        {!! Form::close() !!}



        </div>
        </div>
    </div>
    @include('includes.form_error')
@endsection
