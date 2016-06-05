@extends('layouts.app')

@section('content')
 <div id="latest-blog">
    <div class="container">  
        {{-- posts --}}
        <div class="blog-content">
            <div class="wrap">
                <div class="blog-content-left">
                    <div class="blog-articals">
                        <div class="heading-section">
	                        <h2 id="title"> Research and development section </h2>
	                        <h3 id="show"> {{$feature->name}}</h3>
	                        <br>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    	<div class='form-group form-group-sm'>

							@if(isset($feedbacks) && sizeof($feedbacks) >0)
                        	@foreach($feedbacks as $feedback)
                        	<div class="blog-artical">

	                                <div class="alert alert-info">
	                                    <img src="{{$feedback->user->personal->image}}" class="thumbnail" height="70" width="70" style="display: inline;">   

                                    	<span>{{$feedback->content}}</span>
                                    	<div class="pull-right">
                                    	<span>{{$feedback->feedbackups->count()}} ups </span><span><a href="/feedbacks/up/{{$feedback->id}}" >Up</a> </span>
                                    	</div>
                               		</div>

                               		</div>
                               		
	                        @endforeach
	                        @endif

                            <div class="col-md-12 pull-left">
                                <form method="post" action="/feedbacks/add/{{$feature->id}}" id="feedback_up">
                                    {!! csrf_field() !!}
                                    <div class='col-xs-12 col-md-12' >
                                        <div class='form-control pull-left addcomment' >
                                            Add feedback
                                            <hr>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            	<img class="col-md-2 col-sm-2 col-xs-2 pull-left" src="{{Auth::user()->personal->image }}" alt="">
                                            	<textarea  class="col-md-10 col-sm-10 col-xs-7" name='content'  placeholder="add feedback ..."></textarea>
                                            	<input type="hidden" name="feedback_id" value="{{ $feedback->id }}">
                                            </div>
                                            <hr>   
                                            <input class='col-xs-2 pull-right btn btn-sm btn-primary' type='submit' name='Add' value="Comment"/>
                                        </div> 
                                         @if($errors->any())
										<h4>{{$errors->first()}}</h4>
										@endif                                   
                                    </div>
                                </form>

                            </div>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>                       
@endsection
