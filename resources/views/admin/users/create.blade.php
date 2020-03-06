
@extends('layouts.admin')

@section('content')

    <div class="container" style="padding-top:20px; padding-left:15px;">
        <h1 style="padding-top:20px;"> Create User</h1>


        <form action="/admin/users" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="John"><br><br>
            {{csrf_field()}}
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="Doe@john.dev"><br><br>
            {{csrf_field()}}
            <label for="status">Status:</label><br>
            <select id="is_active" name="is_active">
                <option value="1">Active</option>
                <option value="0" selected>Not active</option>
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
            <input type="file" name="file" id="file"><br><br>
            {{csrf_field()}}
            <label for="role">Password:</label><br>

            <input type="password" id="password" name="password" value=""><br><br><br><br>
            {{csrf_field()}}
            <input type="submit" value="Submit">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        </form>

    </div>

  @include('includes.form_error')


@endsection
