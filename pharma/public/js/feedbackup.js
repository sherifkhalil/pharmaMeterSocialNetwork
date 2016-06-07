$(document).ready(function(){
    console.log('enas');
    $('.feed').on('click',function(e){
        e.preventDefault();
        var content = $("textarea").val();
        var feature_id = $('input[name="feature_id"]').val();
        var data = {
            'feature_id': feature_id,
            '_token' : $('input[name="_token"]').val(),
            'content' : content
        }
        console.log(data);
        var url = '/feedbacks/'+feature_id;
        $.ajax({
            url: url,
            type:'POST',
            data:data,
            success:function(response){
                console.log(response);
                var array = [];
               array.push('<div class="blog-article ">');
               array.push('<div class="alert alert-info feedback">');
               array.push('<img src="'+response['image']+'"class="thumbnail" height="70" width="70" style="display: inline;>');
               array.push('<span><a href="">'+response['name']+'</a></span>');
               array.push('<span style="margin-left:15px;">'+response['feedback']['content']+'</span>');
               array.push('<div class="pull-right "><button type="button" class="deletefeed" data-rowid="'+response['feedback']['id']+'" >Delete</button>');
              // array.push('<button type="button" class="feedup" data-rowid="'+response['feedback']['id']+'">Up</button>');
               array.push('<span>'+response['count']+' ups </span></div>');
               array.push('<br><hr/>');
               array.push('<form><input type="hidden" name="_token" value="{{ csrf_token() }}"><div class="form-group col-md-4"><input  class="form-control" type="text" name="content" class="form-control"/></div><div class="form-group"><input type="submit" class="btn btn-primary" value="add"/></div></form>');
               array.push('</div></div>');
               
                $(array.join('')).insertBefore('.addcomment');
            },
            error:function(response){
                console.log(response);
            }
        });
    });

    $('.feedup').on('click',function(e){
        e.preventDefault();
        var feedback_id=$(this).data('rowid');
        var url = '/feedbacks/up/'+feedback_id;
        var data = {
            'feedback_id': feedback_id,
        }
        console.log(data);
        $.ajax({
            url: url,
            type:'GET',
            data:data,
            success:function(response){
                console.log(response);
              /*  if($(this).data('rowid')==response['feedback_id']){*/
                $('.ups').html(response['count']+'ups');
                //}
            },
            error:function(response){
                console.log(response);
            }
        });
    });

        $('.feeddown').on('click',function(e){
        e.preventDefault();
        var feedback_id=$(this).data('rowid');
        var url = '/feedbacks/down/'+feedback_id;
        var data = {
            'feedback_id': feedback_id,
        }
        console.log(data);
        $.ajax({
            url: url,
            type:'GET',
            data:data,
            success:function(response){
                console.log(response);
              /*  if($(this).data('rowid')==response['feedback_id']){*/
                $('.ups').html(response['count']+'ups');
                //}
            },
            error:function(response){
                console.log(response);
            }
        });
    });
    $('.deletefeed').on('click',function(e){
        e.preventDefault();
        var feedback_id=$(this).data('rowid');
        var url = '/feedbacks/delete/'+feedback_id;
        var data = {
            'feedback_id': feedback_id,
        }
        console.log(data);
        $.ajax({
            url: url,
            type:'GET',
            data:data,
            success:function(response){
                console.log(response);
                //if(feedback_id==response['feedback_id']){
                    $('.feedback').remove();
                //}
            },
            error:function(response){
                console.log(response);
            }
        });
    });
});