$('.diagnosis_future_btn').on('click',function(){
    $(this).closest('.question_wrap').removeClass('show')
    $(this).closest('.question_wrap').addClass('hidden')
    id = $(this).attr("href")
    $(id).addClass('show')
    $(id).removeClass('hidden')
})

let  developmentvalue= 0;
let  socialvalue= 0;
let  stablevalue= 0;
let  teammatevalue= 0;
let  futurevalue= 0;
$('.diagnosis_future_btn').each(function(){
    $(this).on('click',function(){
        if($(this).data('developmentvalue') !== undefined){
            let development = $(this).data('developmentvalue')
            developmentvalue = developmentvalue + development
            console.log(developmentvalue)
            $('#developmentvalue').val(developmentvalue)
        }
        if($(this).data('socialvalue') !== undefined){
            let social = $(this).data('socialvalue')
            socialvalue = socialvalue + social
            $('#socialvalue').val(socialvalue)
        }
        if($(this).data('stablevalue') !== undefined){
            let stable = $(this).data('stablevalue')
            stablevalue = stablevalue + stable
            $('#stablevalue').val(stablevalue)
        }
        if($(this).data('teammatevalue') !== undefined){
            let teammate = $(this).data('teammatevalue')
            teammatevalue = teammatevalue + teammate
            $('#teammatevalue').val(teammatevalue)
        }
        if($(this).data('futurevalue') !== undefined){
            let future = $(this).data('futurevalue')
            futurevalue = futurevalue + future
            $('#futurevalue').val(futurevalue)
        }

        // futureSum = futureSum + value
        // console.log(futureSum)
        // $('#result').val(futureSum)
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
$('.diagnosis_company_btn').on('click',function(){
    $(this).closest('.question_wrap').removeClass('show')
    $(this).closest('.question_wrap').addClass('hidden')
    id = $(this).attr("href")
    $(id).addClass('show')
    $(id).removeClass('hidden')
})

let companySum = 0
$('.diagnosis_company_btn').each(function(){
    $(this).on('click',function(){
        let value = $(this).data('value')
        companySum = companySum + value
        console.log(companySum)
    })
})





