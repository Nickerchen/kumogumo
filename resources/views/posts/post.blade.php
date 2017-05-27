<div class="post">
  <h2 class="post-content">
                    {{$post->body}}
              </h2>
  <p class="post-meta">Posted by <a href="/myprofile">{{ $post->user->name}}</a> on {{ $post->created_at->toFormattedDateString() }}</p>
</div>
