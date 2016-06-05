$(function() {
      $('.error').delay(3000).fadeOut('slow');

  $('.follow').on('click', function(event) {
      // event.preventDefault();
      // console.log('here');
      /* Act on the event */
      div = $(this).parent();
      var follower_id = $(this).val(); 
      var follow_Url = '/follow/'+follower_id;
      var token = $(this).parent().parent().find('.token').val()
      var formData = {
          '_token': token,
          'follower_id':follower_id,
      }
      // console.log(formData)
      $.ajax({
          url: follow_Url,
          type: 'post',
          data: formData,
          success:function(response){
              if(response == 'error')
              {
                  div.fadeOut('slow');
                  div.html('<div class="alert alert-error"><i class="fa fa-frown-o" aria-hidden="true"></i> something went wrong </div>');
                  div.find('.alert').fadeIn('slow').delay(5000).fadeOut(5000);
              }
              else if(response == 'already followed')
              {
                  div.fadeOut('slow');
                  div.html('<div class="alert alert-warning"><i class="fa fa-meh-o" aria-hidden="true"></i> already followed </div>');
                  div.find('.alert').fadeIn('slow').delay(5000).fadeOut(5000);
              }
              else
              {
                  div.fadeOut('slow');
                  div.html('<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> followed </div>');
                  div.find('.alert').fadeIn('slow').delay(5000).fadeOut(5000);
              }
              
          },
          error:function(response){
              console.log(response);
          }
      })//end of ajax action
  });//end of follow submit

  // un follow
  $('.unfollow').on('click', function(event) {
      // event.preventDefault();
      // console.log('here');
      /* Act on the event */
      div = $(this).parent();
      var follower_id = $(this).val(); 
      var follow_Url = '/unfollow/'+follower_id;
      var token = $(this).parent().parent().find('.token').val()
      var formData = {
          '_token': token,
          'follower_id':follower_id,
      }
      // console.log(formData)
      $.ajax({
          url: follow_Url,
          type: 'post',
          data: formData,
          success:function(response){
              if(response == 'error')
              {
                  div.fadeOut('slow');
                  div.html('<div class="alert alert-error"><i class="fa fa-frown-o" aria-hidden="true"></i> something went wrong </div>');
                  div.find('.alert').fadeIn('slow').delay(5000).fadeOut(5000);
              }
              else if(response == 'already followed')
              {
                  div.fadeOut('slow');
                  div.html('<div class="alert alert-warning"><i class="fa fa-meh-o" aria-hidden="true"></i> already unfollowed </div>');
                  div.find('.alert').fadeIn('slow').delay(5000).fadeOut(5000);
              }
              else
              {
                  div.fadeOut('slow');
                  div.html('<div class="alert alert-success"><i class="fa fa-check-circle" aria-hidden="true"></i> unfollowed </div>');
                  div.find('.alert').fadeIn('slow').delay(5000).fadeOut(5000);
              }
              
          },
          error:function(response){
              console.log(response);
          }
      })//end of ajax action
  });//end of follow submit
/************************************ comment actions ******************************************/
$('.comment').on('click', function(event) {
      event.preventDefault();
      /* Act on the event */
      div = $(this).parent().parent().parent().find('blog-artical-info-comment');
      var user_name = $(this).parent().find('.user').attr('user');
      var user_image = $(this).parent().find('.user').attr('src');
      var user_id = $(this).parent().find('.user').attr('id');

      var post_id = $(this).parent().find('.comment_content').attr('post'); 
      var content = $(this).parent().find('.comment_content').val();
      var comment_Url = '/comment/add/'+post_id;
      var token =  $(this).parent().find('.comment_token').val();
      var formData = {
          '_token': token,
          'post_id':post_id,
          'content':content
      }
      console.log(formData)
      $.ajax({
          url: comment_Url,
          type: 'post',
          data: formData,
          success:function(response){
              if(response == 'error')
              {
                console.log(response);
                // div.firstChild.hide('1000');
                // div.append('<div class="commentHolder ">');
                // div.append('<div class="leftSection pull-left col-md-1"><a href="/users/'+user_id+'"><img src="'+user_image+'" alt=""></a></div>');
                // div.append('<div class="pull-left rightSide col-md-11"><a class="col-md-12 pull-left" href="'+user_id+'}}"> <p>'+user_name+'</p></a>');
                // div.append('<p class="col-md-12 pull-left">'+response[content]+'}}</p></div>');
                // div.append('<div class="commentAction col-md-12"><a href="/posts/'+response[post_id]+'">');
                // div.append('<label>'+response[created_at]+'</label></a>');
                // div.append('<span><i class="fa fa-heart" aria-hidden="true"></i><a href="" "> Up</a></span>');
                // div.append('<span><i class="fa fa-pencil" aria-hidden="true"></i><a href="" "> Edit</a></span>');
                // div.append('<span><i class="fa fa-trash" aria-hidden="true"></i><a href="" "> Delete</a></span>');
                // div.append('</div></div>');
              }
              else
              {
                  console.log(response);
                div.$("div:last-child").hide('1000');
                div.append('<div class="commentHolder ">');
                div.append('<div class="leftSection pull-left col-md-1"><a href="/users/'+user_id+'"><img src="'+user_image+'" alt=""></a></div>');
                div.append('<div class="pull-left rightSide col-md-11"><a class="col-md-12 pull-left" href="'+user_id+'}}"> <p>'+user_name+'</p></a>');
                div.append('<p class="col-md-12 pull-left">'+response[content]+'}}</p></div>');
                div.append('<div class="commentAction col-md-12"><a href="/posts/'+response[post_id]+'">');
                div.append('<label>'+response[created_at]+'</label></a>');
                div.append('<span><i class="fa fa-heart" aria-hidden="true"></i><a href="" "> Up</a></span>');
                div.append('<span><i class="fa fa-pencil" aria-hidden="true"></i><a href="" "> Edit</a></span>');
                div.append('<span><i class="fa fa-trash" aria-hidden="true"></i><a href="" "> Delete</a></span>');
                div.append('</div></div>');
              }
              
          },
          error:function(response){
              console.log(response);
          }
      })//end of ajax action
  });//end of comment submit
});