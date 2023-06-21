@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    @foreach ($posts as $post)
                        <h2><a href="{{ route('posts.show', $post->id) }}" style="color: inherit;">{{ $post->title }}</a></h2>
                        <small>
                            Posted by 
                            <a href="{{ route('profile', $post->user->name) }}">
                                {{ $post->user->name }}
                                @if ($post->user->is_admin)
                                    
                                @endif
                            </a> {{ $post->created_at->diffForHumans() }}
                        </small>
                            
                        @if($post->user_id == Auth::user()?->id)
                            <a href="{{ route('posts.edit', $post->id) }}" style="float: right;">Edit</a>
                        @endauth
                        <br>
                        
                     

                        <hr>
                        
                    @endforeach

                </div>
            </div>
            

        </div>
    </div>
</div>
@endsection
