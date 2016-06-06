    $(document).ready(function(){
        $("#feed").on('click',function(e){
                e.preventDefault();
                var content = $('input[name="content"]').val();
                var feedback_id = $('input[name="feedback_id"]').val();
                var data = {
                    'feedback_id': feedback_id,
                    '_token' : $( this ).find('input[name=_token]').val(),
                    'content' : $('input[name="content"]').val()
                };
                $.ajax({
                    url:'/feedbacks/'+feedback_id,
                    type:'POST',
                    data:data,
                    success:function(data){},
                    
                });
           
        });
    });
