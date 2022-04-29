@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post->id) }}">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" name="title" type="text" class="form-control"
                                    value="{{ $post->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" id="content" class="form-control" cols="10" rows="5">{{ $post->content }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input id="tags" name="tags" type="text" class="form-control"
                                    placeholder="Split tags by commas" value="{{ $tags }}">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
