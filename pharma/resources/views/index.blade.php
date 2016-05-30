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
                       @if (count($errors) > 0)
                        <div class="alert alert-danger error" style="margin:10px">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{ $error}}
                                </li>
                                @endforeach
                            </ul>
                            </div>
                        @elseif(isset($done))
                            <div class='alert alert-success error'>
                                {{$done}}

                            </div>

                        @endif
                        @if(Auth::user())
                            <form method="post" action="/posts/add" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                                <div class='col-xs-12 col-md-12' >
                                    <div class='form-control addpost' >
                                        <div class=" btn  col-md-2 col-sm-2 uploadfile ">
                                            
                                                <i class="fa fa-picture-o" aria-hidden="true"></i> Upload Photo
                                                <input type="file" name="image" class="upload" />
                                            
                                        </div>
                                        <hr>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <img class="col-md-2 col-sm-2 col-xs-2 pull-left" src="{{Auth::user()->personal->image }}" alt="">
                                            <textarea  class="col-md-10 col-sm-10 col-xs-7" name='content'  placeholder="add new post"></textarea>
                                        </div>
                                        <hr>   
                                        <input  class='col-xs-2 pull-right btn btn-sm btn-primary' type='submit' name='Add' value="Publish"/>
                                </div>                                    
                               </div>
                            </form>
                        @endif
                            <div class="clearfix"> </div>
                        </div>

                    </div>
                    @if(isset($posts) && sizeof($posts) >0)
                        @foreach($posts as $post)
                            <div class="blog-artical">
                            <div class="blog-artical-basicinfo">
                                <ul>
                                 <li class="categoery"><img src="{{$post->user->personal->image}}"></li>
                                    <li class="post-date"><p><span> {{$post->created_at->format('d')}}</span><label>{{$post->created_at->format('M,Y')}}</label></p></li>
                                    <li class="artlick"><a href="#"><span> </span> <i>90</i></a></li>
                                    <li class="art-comment"><a href="#"><span> </span> <i>50</i></a></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <div class="blog-artical-info">
                                @if(isset($post->image) && $post->image != '')
                                    <div class="blog-artical-info-img">
                                        <a href="#"><img src="{{ $post->image}}"" title="post-name"></a>
                                    </div>
                                @endif
                                <div class="blog-artical-info-head">
                                    
                                    <ul>
                                        <li><span><i class="fa fa-user" aria-hidden="true"></i></span>by <a href="#">{{ $post->user->name}}</a></li>
                                        <div class="clearfix"> </div>
                                    </ul>
                                </div>
                                <div class="blog-artical-info-text">
                                    <p>{{ $post->content}}<a href="#">[...]</a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>

                        @endforeach
                    <div class="blog-pagenat">
                        <ul>
                            <li><a class="frist" href="#"> <span> </span></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a class="last" href="#"> <span> </span></a></li>
                            <div class="clearfix"> </div>
                        </ul>
                    </div>
                </div>
                    @else
                    <div class="blog-artical">
                            <h4 class="h_nopost"><i>-- There is no posts yet -- </i></h4>
                            <p class="p_nopost">you need to follow some frinds first , here is suggeions</p>
                            <div class="uname col-md-3">
                               <img src="{{ asset('images/1.png')}}" id="profile"/>
                                <span > <a href="#"> Username</a> </span>
                                <span id="follow"> <a href="#"> Follow </a> </span>
                           </div>
                           <div class="uname col-md-3">
                               <img src="{{ asset('images/1.png')}}" id="profile"/>
                                <span > <a href="#"> Username</a> </span>
                                <span id="follow"> <a href="#"> Follow </a> </span>
                           </div>
                           <div class="uname col-md-3">
                               <img src="{{ asset('images/1.png')}}" id="profile"/>
                                <span > <a href="#"> Username</a> </span>
                                <span id="follow"> <a href="#"> Follow </a> </span>
                           </div>

                    </div>
                </div>
                    @endif
                    
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
                           <img src="{{ asset('images/1.png')}}" id="profile"/>
                            <span > <a href="#"> Username</a> </span>
                            <span id="follow"> <a href="#"> Follow </a> </span>

                       </div>
                       <div class="uname">
                           <img src="{{ asset('images/1.png')}}" id="profile"/>
                            <span > <a href="#"> Username</a> </span>
                            <span id="follow"> <a href="#"> Follow </a> </span>
                       </div>
                        <a class="twittbtn" href="#">See all users</a>
                    </div>
                    <!---//End-twitter-weight---->
                    <!---- start-tag-weight---->
                    <div class="b-tag-weight">
                        <h3>Tags Weight</h3>
                        <ul>
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">consectetur</a></li>
                            <li><a href="#">dolore</a></li>
                            <li><a href="#">aliqua</a></li>
                            <li><a href="#">sit amet</a></li>
                            <li><a href="#">ipsum</a></li>
                            <li><a href="#">Lorem</a></li>
                            <li><a href="#">consectetur</a></li>
                            <li><a href="#">dolore</a></li>
                            <li><a href="#">aliqua</a></li>
                            <li><a href="#">sit amet</a></li>
                            <li><a href="#">ipsum</a></li>
                        </ul>
                    </div>
                    <!---- //End-tag-weight---->
                </div>
                <div class="clearfix"> </div>
            </div>
            
            </div>
        </div>
        </div>
        <!-- /Blog -->
         {{-- end of posts --}}
            
    </div>
    <script src="{{ asset('js/vendor/jquery-1.11.0.min.js')}}"></script>
   <script>
            $(function () {
              $('.error').delay(5000).fadeOut('slow');
            });
            
          </script>         
@endsection
