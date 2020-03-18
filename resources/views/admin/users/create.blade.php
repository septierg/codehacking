
@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top:20px; padding-left:15px;">
        <h1 style="padding-top:20px;"> Create User</h1>
        {!! Form::open(['action' => 'AdminUsersController@store','method' => 'POST','files' =>true]) !!}

        {!! Form::label('name', 'Name:') !!}<br>
        {!! Form::text('name', null)!!}<br>

        {!! Form::label('email', 'Email:') !!}<br>
        {!! Form::text('email', null)!!}<br>

        {!! Form::label('status', 'Status:') !!}<br>
        {!! Form::select('is_active', ['0' => 'Not Active', '1' => 'Active'], null, ['placeholder' => 'choose a status']);!!}<br>

        {!! Form::label('role', 'Role:') !!}<br>
        {!! Form::select('role_id',['' => 'choose role' ] + $roles)!!}<br>

        {!! Form::label('file', 'Photo:') !!}<br>
        {!! Form::file('file', null ) !!}<br>

        {!! Form::label('password', 'Password:') !!}<br>
        {!! Form::password('password', null)!!}<br>

        {!! Form::submit('Create user',['class'=> 'w3-blue-grey']) !!}
        {!! Form::close() !!}

    </div>

  @include('includes.form_error')


@endsection
