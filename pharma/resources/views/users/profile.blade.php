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
                        
                        <div class='form-group form-group-sm'>
                            <form>
                                <div class='col-xs-12'>
                                    <textarea  class='form-control' name='post'  placeholder="add new post"></textarea>
                                    <hr>
                                    <input  class='col-xs-2 pull-right btn btn-sm btn-primary' type='submit' name='Add' value="Publish"/>
                                </div>

                            </form>
                            <div class="clearfix"> </div>
                        </div>

                    </div>
                    
                      @if(Auth::user()->personal->image =='')
                      <img src="{{Auth::user()->personal->image}}" width="150px" height="150px" class="img-circle"/> 
                      @else
                      <img src="{{ Auth::user()->personal->image }}" width="150px" height="150px" class="img-circle"/> 
                      
                    @endif
                    <b><a href="/users/{{Auth::user()->id}}/editprofile">Edit profile </a></b>
                    <div class="blog-artical">

                       
                        <div class="blog-artical-info">


                        <label class="col-md-4 control-label">Username : </label>
                            {{Auth::user()->name}}

                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-artical">
                        
                        <div class="blog-artical-info">
                        <label class="col-md-4 control-label">Email : </label>
                            {{Auth::user()->email}}
                        </div>
                        
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-artical">
                        
                        <div class="blog-artical-info">
                         <label class="col-md-4 control-label">Fullname : </label>
                         @if (isset($profile->first_name) )
                         @if (isset($profile->last_name))
                           {{$profile->first_name }} {{$profile->last_name }}
                          @endif
                          @endif 
                        </div>
                        <div class="clearfix"> </div>
                        
                    </div>
                    <div class="blog-artical">
                        
                        <div class="blog-artical-info">
                         <label class="col-md-4 control-label">Sientific Degree : </label>
                        @if (isset($profile->degree))
                          {{$profile->degree }} 
                        @endif 
                        </div>
                        <div class="clearfix"> </div>
                        
                    </div>
                    <div class="blog-artical">
                        
                        <div class="blog-artical-info">
                         <label class="col-md-4 control-label">Company : </label>
                         @if(isset($profile->company ))
                          {{$profile->company }} 
                          @endif 
                        </div>
                        <div class="clearfix"> </div>
                        
                    </div>
                </div>
                <!---start-blog-pagenate---->
         
           
@endsection