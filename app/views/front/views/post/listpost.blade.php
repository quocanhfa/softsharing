@extends('front.layouts.mainlayout')

@section('title')
Các bài đăng - Softsharing
@endsection

@section('content')
 <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
        @if (Session::has('flash_notice'))
        <div class="bg-success">{{ Session::get('flash_notice') }}</div>
   		 @endif
   		 @if(Auth::check())
   		 <p>
   		 	<a href="{{ URL::to('post/new') }}" class="btn btn-primary pull-right" role="button">+ Đăng bài mới</a>
   		 	</p>
   		 @endif
        @if (count($posts) === 0)
    		<h1>No Item</h1>
		@else
    		@foreach ($posts as $post)
    			@include('front.includes.postItem',['postItem'=>$post])
			@endforeach
		@endif 
@endsection