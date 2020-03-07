
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
                    <form action="/admin/users/{{$user->id}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <label for="name">Name:</label><br>
                        <input type="text" id="name" name="name" value="{{$user->name}}"><br><br>
                        {{csrf_field()}}
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" value="{{$user->email}}"><br><br>
                        {{csrf_field()}}
                        <label for="status">Status:</label><br>
                        <select id="is_active" name="is_active">
                            <option value=""></option>
                            <option value="0">Not Active</option>
                            <option value="1"> Active</option>
                        </select><br><br>
                        {{csrf_field()}}
                        <label for="role">Role:</label><br>

                        <select id="role_id" name="role_id">
                            <option value="">Choose option</option>
                            <option value="2">Author</option>
                            <option value="3">Subscriber</option>
                            <option value="1">Administrator</option>
                        </select><br><br>
                        {{csrf_field()}}
                        <label for="file">Photo:</label><br>

                        <input type="file" id="file" name="file"><br><br><br><br>
                        {{csrf_field()}}
                        <label for="password">Password:</label><br>
                        <input type="password" id="password" name="password" value=""><br><br><br><br>
                        {{csrf_field()}}
                        <input class= "w3-blue" type="submit" value="Edit User">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </form>
                    <form action="/admin/users/{{$user->id}}"  method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE">

                        <input class= "w3-red" type="submit" value="Delete User">
                    </form>


                </div>
            </div>

    </div>

    @include('includes.form_error')
@endsection

