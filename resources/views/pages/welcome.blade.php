@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                
                @foreach($posts as $post)

                    <div class="col-sm-4 full-width-480 restaurant-style" >
                    
                        <div class="product-holder">
                            <div class="figure-holder">
                                <img src="{{url('/images/'.$post->image)}}" style="width: 100%;height: 200px" alt="" >
                               
                            </div>
                            <div class="inner-detail ">
                                <h3 class="product-name"><a style="text-decoration:none" href="{{ url('blog/'.$post->slug) }}"><center><span title="{{$post->title}}">{{ substr($post->title, 0, 25) }}{{ strlen($post->title) > 25 ? "..." : "" }}</span></a></center></h3>
                                <br>
                            </div>
                        </div>
                        <center><a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a></center>
                        <br>
                        
                    </div>
                @endforeach

            </div>

        </div>
        <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@stop