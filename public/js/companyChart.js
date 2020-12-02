
window.onload = function() {
    let ctx2 = document.getElementById('companyChart');
    console.log(ctx2);

    window.myBar = new Chart(ctx2,{
    type:'radar',
    data:{
        labels:["成長意欲","社会貢献","安定","仲間","将来性"],
        datasets:[{
            label:'企業診断',
            data:[3,5,5,1,4],
            backgroundColor:'RGBA(255,255,255,0)',
            borderColor:'RGB(253,255,131)',
            borderWidth:2,
            pointBorderWidth:1,
            pointBackgroundColor:'#000'
        }]
    },
    options:{
        title:{
            display:false,
        },
        scale:{
            ticks:{
                suggestedMin:0,
                suggestedMax:5,
                stepSize:1,
            }
        }
    }
})
}

