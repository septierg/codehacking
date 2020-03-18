@extends('layouts.blog-post')

@section('content')

    <div class="w3-card-4 w3-margin w3-white">
            <div class="w3-container">
                <h1>{{ $post->title}}</h1>
                <h5>Created by <span class="w3-opacity">{{ $post->user->name}}</span></h5>
                <hr>
                <h5>Posted on <span class="w3-opacity">{{ $post->created_at->diffForHumans()}}</span></h5>
                <hr>
                <img class="responsive" style="width:100%" src="{{ $post->photo->file ? $post->photo->file :'https://via.placeholder.com/100' }}">
                <p>{{ $post->body}}</p>
                <hr>
                @if(session("comment message"))
                    {{ session("comment message")}}
                @endif

                @if(Auth::check())
                <div class="w3-row" style="padding-bottom:20px;">
                    <h5>Leave a Comment:</h5>

                    {!! Form::open(['method' => 'POST','action' => ['PostsCommentsController@store']]) !!}
                    <input type="hidden" name="post_id" value="{{ $post->id}}">
                    {!! Form::label('body', 'Body:') !!}<br>
                    {!! Form::textarea('body', null)!!}<br>

                    {!! Form::submit('Submit Comment' ,['class'=> 'w3-blue-grey']) !!}
                    {!! Form::close() !!}
                </div>
                @endif

        </div>
        <hr>
        <!-- Blog entry -->
        @if(count($post->comments)> 0)

        <div class="w3-card-4 w3-margin w3-white">
            @foreach($post->comments as $comment)
                @if($comment->is_active== 1)
                <div class="w3-container">
                <h3><b>Comment</b></h3>
                <h5>Created, <span class="w3-opacity">{{ $comment->created_at->diffForHumans()}}</span> by :<span class="w3-opacity">{{ $comment->author}} </span></h5>

              </div>
              <div class="w3-container">
                  <p> {{ $comment->body}}</p>
                <div class="w3-row">
                    <div class="w3-col m8 s12">
                        <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
                    </div>
                    <div class="w3-col m4 w3-hide-small">
                        <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-badge">2</span></span></p>
                    </div>
                </div>
            </div>
                @endif
                @endforeach
        </div>
    </div>
    @else
        <h1 style="text-align:center;">No comments</h1>
    @endif

@endsection