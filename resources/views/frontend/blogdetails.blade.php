@extends('frontend.layout')

@section('content')
<!-- breadcrumb start-->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>{{ $blog->title }}</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/blog') }}">blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $blog->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end-->

<!--section start-->
<section class="blog-detail-page section-b-space ratio2_3">
    <div class="container">
        <div class="row section-b-space">
            <div class="col-sm-12 blog-detail"><img src="{{ url('/public/assets/images/blog/'.$blog->image) }}" class="img-fluid blur-up lazyload" alt="">
                <h3>{{ $blog->title }}</h3>
                <ul class="post-social">
                    <li>{{ date('d F Y', strtotime($blog->created_at)) }}</li>
                    <li>Posted By : {{ get_author_name($blog->post_by) }}</li>
                    <li><i class="fa fa-heart"></i> {{ $blog->hits }} Hits</li>
                    <li><i class="fa fa-comments"></i> {{ get_post_no_comment($blog->id) }} Comment</li>
                </ul>
                {!! $blog->descriptions !!}
            </div>
        </div>

        <div class="row section-b-space">
            <div class="col-sm-12">
                <ul class="comment-section">
                    @foreach($comments as $comment)
                    <li>
                        <div class="media"><img src="{{ url('public/assets/images/avtar.png') }}" alt="{{ $comment->name }}">
                            <div class="media-body">
                                <h6>{{ $comment->name }} <span>( {{ date('d F Y', strtotime($comment->created_at)) }} )</span></h6>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row blog-contact">
            <div class="col-sm-12">
                <h2>Leave Your Comment</h2>
                @if (session('success'))
                <div class="alert alert-success alert-no-border-radious">
                    {{ session('success') }}
                </div>
                @endif 
                <form class="theme-form" action="{{ url('/post-comment') }}" method="post" id="comment-form">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                            <label class="error">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                            <label class="error">{{ $errors->first('email') }}</label>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea name="comment" class="form-control" placeholder="Write Your Comment" id="exampleFormControlTextarea1" rows="6">{{ old('comment') }}</textarea>
                            @if($errors->has('comment'))
                            <label class="error">{{ $errors->first('comment') }}</label>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <input type="hidden" name="enc" value="{{ Crypt::encryptString($blog->id) }}">
                            @csrf
                            <input class="btn btn-solid" type="submit" value="Post Comment">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection