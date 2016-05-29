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
                    <div class="blog-artical">
                        <div class="blog-artical-basicinfo">
                            <ul>
                                <li class="post-date"><p><span> 05</span><label>Nov,2014</label></p></li>
                                <li class="categoery"> <span> </span></li>
                                <li class="artlick"><a href="#"><span> </span> <i>90</i></a></li>
                                <li class="art-comment"><a href="#"><span> </span> <i>50</i></a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                        <div class="blog-artical-info">
                            <div class="blog-artical-info-img">
                                <a href="#"><img src="images/slide1.jpg" title="post-name"></a>
                            </div>
                            <div class="blog-artical-info-head">
                                <h2><a href="#">Blog image and text post</a></h2>
                                <ul>
                                    <li><span> </span>by <a href="#">John Deo</a></li>
                                    <li><span> </span><a href="#">Lorem</a>,<a href="#">Ipsum</a>,<a href="#">printer</a>,<a href="#">unknown</a></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <div class="blog-artical-info-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<a href="#">[...]</a></p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-artical">
                        <div class="blog-artical-basicinfo">
                            <ul>
                                <li class="post-date"><p><span> 05</span><label>Nov,2014</label></p></li>
                                <li class="categoery"> <span> </span></li>
                                <li class="artlick"><a href="#"><span> </span> <i>90</i></a></li>
                                <li class="art-comment"><a href="#"><span> </span> <i>50</i></a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                        <div class="blog-artical-info">
                            <div class="blog-artical-info-img">
                                <a href="#"><img src="images/slide2.jpg" title="post-name"></a>
                            </div>
                            <div class="blog-artical-info-head">
                                <h2><a href="#">Blog image and text post</a></h2>
                                <ul>
                                    <li><span> </span>by <a href="#">John Deo</a></li>
                                    <li><span> </span><a href="#">Lorem</a>,<a href="#">Ipsum</a>,<a href="#">printer</a>,<a href="#">unknown</a></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <div class="blog-artical-info-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<a href="#">[...]</a></p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="blog-artical">
                        <div class="blog-artical-basicinfo">
                            <ul>
                                <li class="post-date"><p><span> 05</span><label>Nov,2014</label></p></li>
                                <li class="categoery"> <span> </span></li>
                                <li class="artlick"><a href="#"><span> </span> <i>90</i></a></li>
                                <li class="art-comment"><a href="#"><span> </span> <i>50</i></a></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                        <div class="blog-artical-info">
                            <div class="blog-artical-info-img">
                                <a href="#"><img src="images/slide3.jpg" title="post-name"></a>
                            </div>
                            <div class="blog-artical-info-head">
                                <h2><a href="#">Blog image and text post</a></h2>
                                <ul>
                                    <li><span> </span>by <a href="#">John Deo</a></li>
                                    <li><span> </span><a href="#">Lorem</a>,<a href="#">Ipsum</a>,<a href="#">printer</a>,<a href="#">unknown</a></li>
                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <div class="blog-artical-info-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<a href="#">[...]</a></p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!---start-blog-pagenate---->
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
            
@endsection
