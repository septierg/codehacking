@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="w3-row-padding">
    <h1 style="padding-top:20px;"> MEDIA</h1>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <hr>
        <div class="w3-col m6">
            <h2 style="padding-top:20px;"> UPLOAD MEDIA</h2>
            {!! Form::open(['method' => 'POST','action' => ['MediaController@store']]) !!}

            {!! Form::label('name', 'Name:') !!}<br>
            {!! Form::text('name', null)!!}<br>

            {!! Form::submit('Update Category' ,['class'=> 'w3-blue-grey']) !!}
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE','action' => ['AdminCategoriesController@destroy',$category->id]]) !!}

            {!! Form::submit('Delete Category' ,['class'=> 'w3-red']) !!}
            {!! Form::close() !!}

        </div>
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

                    <td><img height="50" width="50" src="{{ $photo->file}}" alt=""></td>
                    <td>{{ $photo->created_at ? $photo->created_at: 'no date'}}</td>
                    <td></td>
                    <td></td>

                </tr>
            @endforeach




        @endif


        </tbody>
    </table>  <hr>

</div>








@endsection()
