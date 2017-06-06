<div class="post">
  <h2 class="post-content">
                    {{$post->body}}
              </h2>
  <p class="post-meta">Posted by <a href="/user/{{$post->user->id}}">{{ $post->user->name}}</a>
       on {{ $post->created_at->toFormattedDateString() }}
       @if(Auth::user()->id == $post->user_id) <a href="{{ route('post.delete', ['post_id'=> $post->id]) }}">delete post</a> @endif</p>
</div>
