const { nodeName } = require("jquery");
window.onload = function() {
    let ctx = document.getElementById('resultChart').getContext('2d');;

let resultChart = new Chart(ctx,{
    type:'radar',
    data:{
        labels:["成長意欲","社会貢献","安定","仲間","将来性"],
        datasets:[{
            label:'自己分析',
            data:[3,5,5,1,4],
            backgroundColor:'RGBA(255,255,255,0)',
            borderColor:'RGB(212,204,237)',
            borderWidth:2,
            pointBorderWidth:1,
            pointBackgroundColor:'#000'
        },{
            label:'理想分析',
            data:[5,4,1,3,5],
            backgroundColor:'RGBA(255,255,255,0)',
            borderColor:'RGB(48,227,223)',
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
