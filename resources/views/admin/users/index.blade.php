@extends('layouts.admin')

@section('content')
@if(\Illuminate\Support\Facades\Session::has('deleted_user'))

        <p class="w3-red">{{ session('deleted_user')}}</p>

@endif
<!-- !PAGE CONTENT! -->
        <div class="container">

                <h1> USERS</h1>
                <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
                <hr>
                <table class="table">
                        <thead>
                        <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users)

                                @foreach($users as $user)
                        <tr>
                                <td>{{ $user->id}}</td>

                                <th><img height="100" width="100" src="{{$user->file ? $user->file : 'https://via.placeholder.com/100'}}"></th>

                                <td><a href="{{route('admin.users.edit', $user->id)}}">{{ $user->name}}</a></td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->role->name}}</td>
                                <td>{{ $user->is_active ==1 ? 'Active' : 'Not Active'}}</td>
                                <td>{{ $user->created_at->diffForHumans()}}</td>
                                <td>{{ $user->updated_at->diffForHumans()}}</td>


                        </tr>
                                @endforeach

                        @endif


                        </tbody>
                </table>  <hr>






        </div>
@endsection