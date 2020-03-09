@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="w3-row-padding">
            <h1> CATEGORIES</h1>
            <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
            <hr>
            <div class="w3-col m6">
                <h2> Update Category</h2>
                {!! Form::model($category, ['method' => 'PATCH','action' => ['AdminCategoriesController@update',$category->id]]) !!}

                {!! Form::label('name', 'Name:') !!}<br>
                {!! Form::text('name', null)!!}<br>

                {!! Form::submit('Update Category' ,['class'=> 'w3-blue-grey']) !!}
                {!! Form::close() !!}

                {!! Form::open(['method' => 'DELETE','action' => ['AdminCategoriesController@destroy',$category->id]]) !!}

                {!! Form::submit('Delete Category' ,['class'=> 'w3-red']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @include('includes.form_error')
@endsection
