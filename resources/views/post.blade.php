@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.post.detail')
                @include('layouts.comment.view')
                <form action="{{ route('comment.create') }}" method="post" id="comment">
                    @csrf
                <div class="input-group">
                    <span class="input-group-text">With textarea</span>
                    <textarea class="form-control" name="text" form="comment" aria-label="With textarea"></textarea>
                </div>
                    <input hidden name="post_id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>


@endsection
