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
                            <h3 id="title">Feedbacks </h3>
                        	@foreach($feedbacks as $feedback)
                        		
	                                <div class="alert alert-info">
                                    	<p><h4>{{$feedback->content}}</h4></p>
                                        <br>
                                        @foreach($feedback->feedcomments as $comment)
                                        <div class="uname">
                                            <img src="{{ $comment->user->personal->image}}" id="profile"/>
                                            <span><i class="fa fa-user" aria-hidden="true"></i></span>   by <a href="">{{$comment->user->name}}</a>
                                            {{$comment-> content}}
                                            <span><a id="feed" class="glyphicon glyphicon-pencil" href=""></a></span>
                                            <span><a  class="glyphicon glyphicon-trash" href="/feedcomment/{{$comment->id}}/delete"></a><span>
                                           
                                            <!-- up -->

                                            <form method="post" id="comment_up" action="/feedcomment/up">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="comment"  value="{{ $comment->id }}" />
                                                
                                                 <br>
                                                <button type="submit" class="btn btn-default" >
                                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                                                {{$comment->no_ups}}
                                                </button>
                                           </form>
                                            <div id="formdiv" class="hidden" > 
                                            <h2> Here </h2>
                                            </div> 
                                            <br><hr>
                                        </div>
                                        @endforeach
                                        <form  method='post' action = "/feedcomment/{{$feedback->id}}/add">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class='form-group col-md-4'>
                                                        <input  class='form-control' type='text' name='content' class='form-control'/>
                                                </div>
                                                
                                                <div  class='form-group '>
                                                    
                                                        <input type='submit' class='btn btn-primary ' value='Commet'/>   
                                                </div>
                                        </form>
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
                        <div class="clearfix"> </div>
    </div>
</div>                       
@endsection
