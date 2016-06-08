$(function () {
    console.log('ajax here');
    $("#btn1").click(function () {
        var z = $("#div1").hasClass("hidden");
        if (z == true) {
            $("#div1").removeClass("hidden")
        } else {
            $("#div1").addClass("hidden")

        }
    });
    $("#btn1").click(function () {
        $("#sp1").addClass("glyphicon-ok");
        return false;
    });
    $("#div1").on("close.bs.alert", function () {
        $("#div1").addClass("hidden")
        return false;
    });
    $("#div2").on("hide.bs.modal", function () {
        $("#divalert").removeClass("hidden")
    });
    $("#divalert").on("close.bs.alert", function () {
        $("#divalert").addClass("hidden");
        return false;});
    $("#cartemp").carousel();
    $('[data-toggle="tooltip"]').tooltip();

    $("#feed").click(function (e){
        e.preventDefault();
        $(".formdiv").removeClass("hidden");

    });


    $(".comment_up").click(function(e){
                console.log("ajax");
                e.preventDefault();
                var comment = $(this).data('rowid');
                var _token=$(this).data('rowtok');
                console.log(comment);
                var data ={};
                data.comment=comment;
                data._token=_token;
                // data.append('comment',comment);
                console.log(data);
                $.ajax({
                    url:'/feedcomment/up',
                    type:'POST',
                    data:data,
                    success:function(data)
                    {
                        if(data==1)
                        {



                           span=document.getElementById("data"+comment+"");
                           value=document.getElementById("data"+comment+"").innerText;
                           value=parseInt(value);

                           console.log(value);
                           span.innerHTML=value+1;

                        }
                        else
                        {}
                    }
                });
            });

    $(".feedcomment").click(function(e){
                console.log("ajaxcomment");
                e.preventDefault();
                var feedback_id = $(this).data('rowid');
                var _token=$(this).data('rowtok');
                var content = $(this).parent().parent().find("#comment"+feedback_id).val();
                var data ={};
                data.id=feedback_id;
                data._token=_token;
                data.content=content;
                
                console.log(data);
                $.ajax({
                    url:'/feedcomment/'+feedback_id+'/add',
                    type:'POST',
                    data:data,
                    success:function(data)
                    {
                        console.log(data);
                        $(".comm"+feedback_id).append('<div class="uname">');
                        $(".comm"+feedback_id).append('<img src="' +data[2]+'" id="profile" style="width: 30px; height: 25px ; -webkit-border-radius: 30em;"/> ');
                        $(".comm"+feedback_id).append('<span><i class="fa fa-user" aria-hidden="true"></i></span>  by <a href="">' +data[1]+ '</a> ');
                        $(".comm"+feedback_id).append('<span>' +data[0]['content']+ '</span>');
                        $(".comm"+feedback_id).append('<span><a id="feed" class="glyphicon glyphicon-pencil" href="" style="color: #19b5fe;"></a></span> ');
                        $(".comm"+feedback_id).append('<span><a  class="glyphicon glyphicon-trash" href="/feedcomment/'+data[0]['id']+'/delete" style="color: #19b5fe;"></a><span>');
                        
                        $(".comm"+feedback_id).append('<form>');
                        $(".comm"+feedback_id).append('<input type="hidden" name="_token" value="{{ csrf_token() }}">');
                        $(".comm"+feedback_id).append('<input type="hidden" name="comment"  value="'+data[0]['id']+'" />');
                        $(".comm"+feedback_id).append('<br>');
                        $(".comm"+feedback_id).append('<button class="btn btn-default comment_up" data-rowtok="{{ csrf_token() }}" data-rowid="'+data[0]['id']+'" > <span class="glyphicon glyphicon-thumbs-up" id="'+data[0]['id']+'" aria-hidden="true">'+data[0]['no_ups']+'</span></button>');                               
                        $(".comm"+feedback_id).append ('</form></div><br><hr>');            
                        // $(".comm"+feedback_id).append(''); 

                                               
                    }
                });
            });

       
})