@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>

@section('title', "| $titleTag")
@section('stylesheets')
{!! Html::style('css/photo-gallery.css') !!}
@endsection
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if(!empty($post->image))
				<center><img class="img-responsive" src="{{asset('/images/' . $post->image)}}" style="height: 400px" /></center>
			@endif
			 
			<h1 style="text-decoration: underline;"><center>{{ $post->title }}</center></h1>
			<p>{!! $post->body !!}</p>
			<br>
			@if($imgs->count()>=1)

			&nbsp<a href="{{ route('blog.singleImage', $post->slug) }}"> see all ></a>
			<br>
			<br>
			   <ul class="row gallery">
			   @foreach($imgs as $img)
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="margin:0px;padding: 0px">
        <a href="{{ route('blog.singleImage', $post->slug) }}"><img style=" border-radius: 5px;" class="img-responsive" src="{{asset('/images/' . $img->image)}}"></a>
            </li>
            @endforeach
</ul>
@endif
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
			<span><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-share-button" data-href="{{url()->current()}}" data-layout="button" data-size="large"></div>
</span>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span >  {{ $post->comments()->count() }} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">

						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
						<div class="author-name">
							<h4>{{ $comment->name }}</h4>
							<p class="author-time">{{ date('F dS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
						</div>

					</div>

					<div class="comment-content"  style="overflow: auto;">
						{{ $comment->comment }}
					</div>

				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "Name:") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-12">
						{{ Form::label('comment', "Comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>

			{{ Form::close() }}
		</div>
	</div>
	

@endsection
@section('scripts')

@endsection