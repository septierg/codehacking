@extends('layouts.admin')

@section('content')
    @if(count($comments)> 0)
        <div class="w3-row-padding">
        <h1> Comments</h1>
        <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
        <hr>

        <table>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
            </tr>
            @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id}}</td>
                <td>{{ $comment->author}}</td>
                <td>{{ $comment->email}}</td>
                <td>{{ $comment->body}}</td>
                <td><a href="{{Route('home.post', $comment->post->id)}}">View post</a></td>
                <td>@if( $comment->is_active==1)
                        {!! Form::open(['method' => 'PATCH','action' => ['PostsCommentsController@update', $comment->id]]) !!}
                        <input type="hidden" name="is_active" value="0">
                        {!! Form::submit('Un-approve' ,['class'=> 'w3-green']) !!}
                        {!! Form::close() !!}
                        @else
                        {!! Form::open(['method' => 'PATCH','action' => ['PostsCommentsController@update', $comment->id]]) !!}
                        <input type="hidden" name="is_active" value="1">
                        {!! Form::submit('Approve' ,['class'=> 'w3-blue']) !!}
                        {!! Form::close() !!}

                    @endif
                </td>

                <td>
                    {!! Form::open(['method' => 'DELETE','action' => ['PostsCommentsController@destroy', $comment->id]]) !!}
                    {!! Form::submit('Delete' ,['class'=> 'w3-red']) !!}
                    {!! Form::close() !!}

                </td>

            </tr>
                @endforeach
        </table>
            <hr>
            @else


            <h1 style="text-align:center;">No comments</h1>
        @endif




    </div>
    @include('includes.form_error')
@endsection