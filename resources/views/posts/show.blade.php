@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $post->title }}</h3>
                        <small>
                            Categories: 
                            @forelse ($tags as $tag)
                                {{ $tag->text }}
                            @empty
                                This post hasn't tags.
                            @endforelse
                        </small>
                    </div>

                    <div class="card-body">
                        {{ $post->content }}
                    </div>
                    @if (Auth::user())
                        @if (Auth::user()->id == $post->user_id || Auth::user()->role_id == 1)
                            <div class="card-body">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="DELETE">
                                    <a class="btn btn-info"
                                        href="{{ route('posts.edit', $post->id, $post->user_id) }}">Edit
                                        Post</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete Post</button>
                                </form>
                            </div>
                        @endif
                    @else
                    @endif
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <h4>Comments</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($comments as $comment)
                            <p>User {{ $comment->user_id }} says: <br> {{ $comment->comment }}
                                @if (Auth::user())
                                    @if (Auth::user()->id == $comment->user_id || Auth::user()->role_id == 1)
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="DELETE">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">Delete this comment</button>
                                        </form>
                                    @endif
                                @else
                                @endif
                            </p><br>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Comment something</h4>
                    </div>
                    <div class="card-body text-center">
                        <form action="{{ route('comments.store', $post->id) }}" method="POST">
                            @csrf
                            <textarea class="form-control" name="comment" id="comment"></textarea>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary">Comment</button>
                                <button type="reset" class="btn btn-secondary">Clean text</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
