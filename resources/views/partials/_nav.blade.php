
<div class="container-fluid">
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid navbar-border">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><i class="fa fa-home"></i>Foodie World</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">Home</a></li>
        <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/blog">All Blogs</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact us</a></li>
        <li>
        {!!Form::open(array('route'=>'blog.search','method' => 'GET','class'=>'navbar-form','role'=>'search'))!!}
            <div class="input-group">
                {{Form::text('search',null,array('class' => 'form-control','placeholder'=>'search blogs','required'=>''))}}
                <div class="input-group-btn">
                   {{ Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-default'] )  }}
                </div>
            </div>
            </form>    
        </li>
        <li><a href=""><i class="fa fa-twitter color-twitter"></i></a></li>
        <li><a href="https://www.facebook.com/pradeepta.choudhury"><i class="fa fa-facebook color-facebook"></i></a></li>
        <li><a href="https://www.instagram.com/pape_prc/?hl=en"><i class="fa fa-instagram color-instagram"></i></a></li>  
      </ul>
      <ul class="nav navbar-nav navbar-right">
      @if (Auth::check())
        
        <li class="dropdown">
          <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('posts.index') }}">Posts</a></li>
            <li><a href="{{ route('categories.index') }}">Categories</a></li>
            <li><a href="{{ route('tags.index') }}">Tags</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </li>
          </ul>
        </li>
        
        @else
          <li><a href="{{ route('login') }}">login</a></li>  
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>