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
                      <img src="{{ asset('images/profilepic/1.png')}}" width="150px" height="150px" class="img-circle"/> 
                      @else
                      <img src="{{ asset('images/profilepic').'/'.Auth::user()->personal->image }}" width="150px" height="150px" class="img-circle"/> 
                      
                    @endif
                    <b><a href="/users/{{Auth::user()->personal}}/editprofile">Edit profile </a></b>
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
         
            <!---//End-blog-pagenate---->
                </div>
                <div class="twitter-weights">
                    <div class="blog-content-right">
                        <div class="b-search">
                            <form>
                                <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                                <input type="submit" value="">

                            </form>
                        </div>                         
                    <div class="blog-post" id="sub">
                    </br>
                     <div id= "add"> <h3> People you may know ?  </h3></div></br>
                       <div class="uname">
                           <img src="images/1.png" alt="" id="profile"/>
                            <span > <a href="#"> Username</a> </span>
                            <span id="follow"> <a href="#"> Follow </a> </span>

                       </div>
                       <div class="uname">
                           <img src="images/1.png" alt="" id="profile"/>
                            <span > <a href="#"> Username</a> </span>
                            <span id="follow"> <a href="#"> Follow </a> </span>
                       </div>
                        <a class="twittbtn" href="#">See all users</a>
                    </div>
                    
                </div>
                <div class="clearfix"> </div>
            </div>
            
            </div>
        </div>
        </div>
        <!-- /Blog -->
         {{-- end of posts --}}
            
    </div>
            




@endsection