<div class="post">
  <h2 class="post-content">
       <h2>{{$user->name}}</h2>{{$user->description}}   </h2>
  <ul id="useritems">
    <li>
      <a href="/following">X following</a>
    </li>
    <li>
      <a href="/followers">X followers</a>
    </li>
    <li>
        @if(Auth::user()->id == $user->id)  <a href="/editdescription">edit description</a> @endif
    </li>
  </ul>
</div>
