$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
})
$('.chat_form_wrap').on('submit',function(event){
    event.preventDefault();
    let value = $('.chat_input').val();
    var url = location.href ;
    $.ajax(
        {
        type:'POST',
        url:url,
        data:{
            message:value,
        }
    })
    .done(function(data){
        event.target.value = ''
        $('.chat_input').val("")
    })
})

window.Echo.channel('ChatRoomChannel')
    .listen('ChatPusher',(e)=>{
        if(e.message.student_user !== 0){
            $('.message_wrap_student').append(
                '<div class="text-right"><div class="balloon1-right"><p>' + 
                e.message.message +
                '</p></div></div>'
            )
            $('.message_wrap_company').append(
                '<div><div class="balloon1-left"><p>' + 
                e.message.message +
                '</p></div></div>'
            )
        }else{
            $('.message_wrap_company').append(
                '<div class="text-right"><div class="balloon1-right"><p>' + 
                e.message.message +
                '</p></div></div>'
            )
            $('.message_wrap_student').append(
                '<div><div class="balloon1-left"><p>' + 
                e.message.message +
                '</p></div></div>'
            )
        }
    })


