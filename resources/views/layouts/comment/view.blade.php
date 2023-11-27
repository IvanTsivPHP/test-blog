@foreach($comments as $comment)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $comment->user->email }}</h5>
            <p class="card-text">{{ $comment->text }}</p>
        </div>
    </div>
@endforeach
{{$comments->links()}}