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
                        		
	                                <div class="alert alert-info">
                                    	<p>{{$feedback->content}}</p>
                               		</div>
	                        @endforeach
	                        @endif

                            <div class="col-md-12 pull-left">
                                <form method="post" action="/feedbacks/add/{{$feature->id}}">
                                    {!! csrf_field() !!}
                                    <div class='col-xs-12 col-md-12' >
                                        <div class='form-control pull-left addcomment' >
                                            Add feedback
                                            <hr>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                            	<img class="col-md-2 col-sm-2 col-xs-2 pull-left" src="{{Auth::user()->personal->image }}" alt="">
                                            	<textarea  class="col-md-10 col-sm-10 col-xs-7" name='content'  placeholder="add new comment ..."></textarea>
                                            </div>
                                            <hr>   
                                            <input  class='col-xs-2 pull-right btn btn-sm btn-primary' type='submit' name='Add' value="Comment"/>
                                        </div>                                    
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
