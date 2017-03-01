/**
 * Created by jimmy.buyco on 3/1/17.
 */
function getTweet(){
    $.ajax({
        url: "getTweet?user="+$("#username").val(),
        beforeSend: function () {
        },//
        success: function (msg) {
            console.log(msg);
        }
    });
}
