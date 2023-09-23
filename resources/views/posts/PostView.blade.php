@vite(['resources/css/app.css'])
@forelse ($posts as $post )
<div>
        <h2>{{$post->id}} / {{$post->title}} / criado em {{$post->created_at->diffForHumans()}}<h2>
        {{$post->description}}
        <p>{{$post->body}}</p>
        <small> <a href="/posts/post/{{$post->slug}}">Ver Post...</a> </small>
        <hr>
</div>
@empty
    <h3>Sem nenhum registro</h3>
@endforelse
