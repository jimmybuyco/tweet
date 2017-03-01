/**
 * Created by jimmy.buyco on 3/1/17.
 */
function getTweet(){
    $.ajax({
        url: "getTweet?user="+$("#username").val(),
        beforeSend: function () {
        },//
        success: function (msg) {
            var htm="<table border=1>";
            htm+="<tr><td>Tweet</td><td>Date</td>";
            console.log(msg);
            msg.forEach(function (dt) {
                htm+="<tr><td>"+dt.tweet+"</td><td>"+dt.time+"</td>";
            })
            htm+="</table>";
            $("#tweets").html(htm);
            console.log(htm);


            //chart
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
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
