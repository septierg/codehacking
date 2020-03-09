@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="w3-row-padding">
        <h1> CATEGORIES</h1>
            <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
            <hr>
        <div class="w3-col m6">
            <h2> Create Category</h2>
            {!! Form::open(['method' => 'POST','action' => ['AdminCategoriesController@store']]) !!}

            {!! Form::label('name', 'Name:') !!}<br>
            {!! Form::text('name', null)!!}<br>

            {!! Form::submit('Create Category' ,['class'=> 'w3-blue-grey']) !!}
            {!! Form::close() !!}
        </div>
        <div class="w3-col m6">

        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            @if($categories)

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id}}</td>


                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{ $category->name}}</a></td>
                        <td>{{ $category->created_at ? $category->created_at->diffForHumans():'no date'}}</td>

                    </tr>
                @endforeach

            @endif


            </tbody>
        </table>
        </div>


        </div>
        <hr>
    </div>
    @include('includes.form_error')
@endsection
