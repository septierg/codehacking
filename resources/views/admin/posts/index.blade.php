@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1> POSTS</h1>
        <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
        <hr>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Post</th>
                <th>Comment</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id}}</td>
                        <td><img height="50" width="50" src="{{ $post->photo->file ? $post->photo->file : 'https://via.placeholder.com/50'}}"></td>
                        <td><a href="{{Route('admin.posts.edit', $post->id)}}">{{ $post->user->name}}</a></td>
                        <td>{{ $post->category ? $post->category->name : 'Uncategorized'}}</td>
                        <td>{{ $post->title}}</td>
                        <td>{{ str_limit($post->body,30)}}</td>
                        <td><a href="{{Route('home.post', $post->id)}}">View post</a></td>
                        <td><a href="{{Route('admin.comments.show', $post->id)}}">View comments</a></td>
                        <td>{{ $post->created_at->diffForHumans()}}</td>
                        <td>{{ $post->updated_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach




    @endif


    </tbody>
</table>  <hr>





</div>
@endsection