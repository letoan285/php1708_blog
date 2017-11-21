<h1>Post list</h1>
@foreach ($posts as $post)
<p><b>{{$post['title']}}</b></p>
<img src="{{$post['image']}}" alt="">
<p>{{$post['content']}}</p><br>
<small>{{$post['author']}}</small>
	
@endforeach