
@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top:20px; padding-left:15px;">
        <hr>
        <h1 > Edit User</h1>

            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-quarter">
                    <img  width="80%"  src="{{$user->file ? $user->file : 'https://via.placeholder.com/150'}}" class="responsive" alt="profil_picture">
                </div>
                <div class="w3-twothird">
                    {!! Form::model($user, ['method' => 'PATCH','action' => ['AdminUsersController@update', $user->id],'files' =>true]) !!}
                    <input type="hidden" name="_method" value="PUT">
                    {!! Form::label('name', 'Name:') !!}<br>
                    {!! Form::text('name', null)!!}<br>

                    {!! Form::label('email', 'Email:') !!}<br>
                    {!! Form::email('email', $user->email)!!}<br>

                    {!! Form::label('status', 'Status:') !!}<br>
                    {!! Form::select('is_active', ['0' => 'Not Active', '1' => 'Active'], null, ['placeholder' => 'choose a status']);!!}<br>

                    {!! Form::label('role', 'Role:') !!}<br>
                    {!! Form::select('role_id', $role)!!}<br>

                    {!! Form::label('file', 'Photo:') !!}<br>
                    {!! Form::file('file', null )!!}<br>

                    {!! Form::label('password', 'Password:') !!}<br>
                    {!! Form::password('password', null)!!}<br>

                    {!! Form::submit('Edit user',['class'=> 'w3-blue-grey']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'DELETE','action' => ['AdminUsersController@destroy', $user->id]]) !!}

                    {!! Form::submit('Delete user',['class'=> 'w3-red']) !!}
                    {!! Form::close() !!}



                </div>
            </div>

    </div>

    @include('includes.form_error')
@endsection

