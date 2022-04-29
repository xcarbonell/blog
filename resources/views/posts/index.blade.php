@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if (Auth::user())
                        <div class="card-header">
                            {{ __('Your posts') }}
                        </div>

                        <div class="card-body">
                            <a class="btn btn-info" href="{{ route('posts.create') }}">New Post</a>
                        </div>
                        <div class="card-body">
                            @for ($i = 0; $i < count($posts); $i++)
                                @if (Auth::user()->id == $posts[$i]->user_id)
                                    <a href="{{ route('posts.show', $posts[$i]->id) }}">
                                        <h3>{{ $posts[$i]->title }}</h3>
                                    </a>
                                    <small>
                                        @if (count($post_tag[$i]) > 0)
                                            @for ($j = 0; $j < count($post_tag[$i]); $j++)
                                                <a
                                                    href="{{ route('tags.show', $post_tag[$i][$j]->id) }}">{{ $post_tag[$i][$j]->text }}</a>
                                            @endfor
                                        @else
                                            This post hasn't tags.
                                        @endif
                                    </small>
                                    <p>{{ $posts[$i]->content }}</p>
                                    <br>
                                @endif
                            @endfor
                        </div>

                        <div class="card-header">
                            {{ __('Other posts') }}
                        </div>

                        <div class="card-body">
                            @for ($i = 0; $i < count($posts); $i++)
                                @if (Auth::user()->id != $posts[$i]->user_id)
                                    <a href="{{ route('posts.show', $posts[$i]->id) }}">
                                        <h3>{{ $posts[$i]->title }}</h3>
                                    </a>
                                    <small>
                                        @if (count($post_tag[$i]) > 0)
                                            @for ($j = 0; $j < count($post_tag[$i]); $j++)
                                                <a
                                                    href="{{ route('tags.show', $post_tag[$i][$j]->id) }}">{{ $post_tag[$i][$j]->text }}</a>
                                            @endfor
                                        @else
                                            This post hasn't tags.
                                        @endif
                                    </small>
                                    <p>{{ $posts[$i]->content }}</p>
                                    <br>
                                @endif
                            @endfor
                        </div>
                    @else
                        <div class="card-header">
                            {{ __('Posts') }}
                        </div>
                        <div class="card-body">
                            @for ($i = 0; $i < count($posts); $i++)
                                <a href="{{ route('posts.show', $posts[$i]->id) }}">
                                    <h3>{{ $posts[$i]->title }}</h3>
                                </a>
                                <small>
                                    @if (count($post_tag[$i]) > 0)
                                        @for ($j = 0; $j < count($post_tag[$i]); $j++)
                                            <a
                                                href="{{ route('tags.show', $post_tag[$i][$j]->id) }}">{{ $post_tag[$i][$j]->text }}</a>
                                        @endfor
                                    @else
                                        This post hasn't tags.
                                    @endif
                                </small>
                                <p>{{ $posts[$i]->content }}</p>
                                <br>
                            @endfor
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
