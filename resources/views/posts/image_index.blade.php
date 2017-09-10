@extends('main')

@section('title', '| View Post Images')
@section('stylesheets')
{!! Html::style('css/photo-gallery.css') !!}
@endsection
@section('content')

	<div class="row">

		<div class="col-md-8">
			<div class="row">
		<div class="col-md-8 col-md-offset-2" style="margin:10px; ">
		<ul class="row gallery">
			   @foreach($imgs as $img)
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4" style="margin-left:5px;padding: 0px">
                <img class="img-responsive" src="{{asset('/images/' . $img->image)}}">
                {!! Form::open(['route' => ['images.destroy', $img->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
                
            </li>
            @endforeach
</ul>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>	
      </div><!-- /.modal-dialog -->

    </div><!-- /.modal -->
    
</div>
</div>
	
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
					<br>
					<br>
					{!! Form::open(array('route' => ['add.image',$post->id], 'data-parsley-validate' => '','style'=>'margin-top:25px;margin-left:10px;', 'files' => true,)) !!}
				
				<center>
				{{ Form::label('featured_img', 'Upload another Image') }}
				{{ Form::file('featured_img') }}

				</center>
				{{ Form::submit('add', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
			{!! Form::close() !!}
			<br>
			<br>
				{!! Html::linkRoute('see.all.image', 'modify aux images', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
				
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index', '<< See All Posts', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection

@section('scripts')
	{!! Html::script('js/photo-gallery.js') !!}

@endsection