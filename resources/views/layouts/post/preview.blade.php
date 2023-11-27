@foreach($posts as $post)
        <div class="card-body">
                <a href="{{ route('post', ['id' => $post->id]) }}">
                        {{$post->title}}
                </a>

        </div>
@endforeach

