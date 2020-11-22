$('.diagnosis_future_btn').on('click',function(){
    $(this).closest('.question_wrap').removeClass('show')
    $(this).closest('.question_wrap').addClass('hidden')
    id = $(this).attr("href")
    $(id).addClass('show')
    $(id).removeClass('hidden')
})

let futureSum = 0
$('.diagnosis_future_btn').each(function(){
    $(this).on('click',function(){
        let value = $(this).data('value')
        futureSum = futureSum + value
        console.log(futureSum)
    })
})

$('.diagnosis_self_btn').on('click',function(){
    $(this).closest('.question_wrap').removeClass('show')
    $(this).closest('.question_wrap').addClass('hidden')
    id = $(this).attr("href")
    $(id).addClass('show')
    $(id).removeClass('hidden')
})

let selfSum = 0
$('.diagnosis_self_btn').each(function(){
    $(this).on('click',function(){
        let value = $(this).data('value')
        selfSum = selfSum + value
        console.log(selfSum)
    })
})




