@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (count($posts_by_name) > 0)
                    <div class="card">
                        <div class="card-header">
                            {{ __('Posts searched by name') }}
                        </div>
                        <div class="card-body">
                            @for ($i = 0; $i < count($posts_by_name); $i++)
                                <a href="{{ route('posts.show', $posts_by_name[$i]->id) }}">
                                    <h3>{{ $posts_by_name[$i]->title }}</h3>
                                </a>
                                <small>
                                    @if (count($post_tag_by_name[$i]) > 0)
                                        @for ($j = 0; $j < count($post_tag_by_name[$i]); $j++)
                                            <a
                                                href="{{ route('tags.show', $post_tag_by_name[$i][$j]->id) }}">{{ $post_tag_by_name[$i][$j]->text }}</a>
                                        @endfor
                                    @else
                                        This post hasn't tags.
                                    @endif
                                </small>
                                <p>{{ $posts_by_name[$i]->content }}</p>
                                <br>
                            @endfor
                        </div>
                    </div>
                    <br>
                @endif
                @if (count($posts_by_tag) > 0)
                    <div class="card">
                        <div class="card-header">
                            {{ __('Posts searched by tag') }}
                        </div>
                        <div class="card-body">
                            @for ($i = 0; $i < count($posts_by_tag); $i++)
                                <a href="{{ route('posts.show', $posts_by_tag[$i]->id) }}">
                                    <h3>{{ $posts_by_tag[$i]->title }}</h3>
                                </a>
                                <small>
                                    @if (count($post_tag_by_tag[$i]) > 0)
                                        @for ($j = 0; $j < count($post_tag_by_tag[$i]); $j++)
                                            <a
                                                href="{{ route('tags.show', $post_tag_by_tag[$i][$j]->id) }}">{{ $post_tag_by_tag[$i][$j]->text }}</a>
                                        @endfor
                                    @else
                                        This post hasn't tags.
                                    @endif
                                </small>
                                <p>{{ $posts_by_tag[$i]->content }}</p>
                                <br>
                            @endfor
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
