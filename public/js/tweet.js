/**
 * Created by jimmy.buyco on 3/1/17.
 */
function getTweet(){
    $.ajax({
        url: "getTweet?user="+$("#username").val(),
        beforeSend: function (d) {
            $(".se-pre-con").removeClass('hidden');
        },//
        success: function (msg) {
            $(".se-pre-con").addClass('hidden');
//            var htm="<table border=1>";
            var htm="<div>";
//            htm+="<tr><td>Date</td><td>Time</td><td>Tweet</td>";
//            console.log(msg);
            msg.tweets.forEach(function (dt) {
//                htm+="<tr><td> "+dt.date+" </td><td> "+dt.time+" </td><td> "+dt.tweet+" </td></tr>";
                htm+="<div class='divrows'><p> "+dt.date+" </p><p> "+dt.time+" </p><p> "+dt.tweet+" </p></div><br>";
            })
//            htm+="</table>";
            htm+="</div>";
            $("#tweets").html(htm);
//            console.log(htm);

            //chart
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["00", "01", "02", "03", "04", "05","06", "07",
                        "08", "09", "10", "11","12", "13", "14", "15", "16", "17","18",
                        "19", "20", "21", "22","23"],
                    datasets: [{
                        label: '# of tweets',
                        data: msg.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
    });
}
