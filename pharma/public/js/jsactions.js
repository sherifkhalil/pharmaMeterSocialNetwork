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
      console.log('here');
      /* Act on the event */
      div = $(this).parent();
      var post_id = $(this).val(); 
      var comment_content = $(this).val(); 
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
});