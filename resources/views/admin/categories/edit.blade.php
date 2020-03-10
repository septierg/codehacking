@extends('layouts.admin')

@section('content')
    <div class="container">
        <hr>
        <h1> Edit Categoy</h1>
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-col m6">
                <h2 style="padding-top:20px;"> Create Category</h2>

                {!! Form::model($category, ['method' => 'PATCH','action' => ['AdminCategoriesController@update', $category->id],'files' =>true]) !!}

                {!! Form::label('name', 'Name:') !!}<br>
                {!! Form::text('name', $category->name)!!}<br>


                {!! Form::submit('Edit category',['class'=> 'w3-blue']) !!}
                {!! Form::close() !!}

                {!! Form::open(['method' => 'DELETE','action' => ['AdminCategoriesController@destroy', $category->id]]) !!}




                {!! Form::submit('Delete Category',['class'=> 'w3-red']) !!}
                {!! Form::close() !!}



            </div>
        </div>
    </div>
    @include('includes.form_error')
@endsection

