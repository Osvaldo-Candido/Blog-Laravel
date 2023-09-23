@vite(['resources/css/app.css','resources/js/app.js'])
@forelse($posts as $post)

<h4>{{$post->id}} / {{$post->title}} state {{$post->is_active}}</h4>
<p>{{$post->body}}</p>

@empty

<h4>Sem registros</h4>

@endforelse

{{$posts->links()}}
