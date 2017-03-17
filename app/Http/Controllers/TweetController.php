<?php
namespace App\Http\Controllers;
use Abraham\TwitterOAuth\TwitterOAuth;
use Input;

class TweetController extends Controller
{
    public function index(){
        $tweet=null;
        return view('index',['tweet' => $tweet]);
    }

    public function sample(){
        $tweet="hello";
        return view('sample',['msg' => $tweet]);
    }


    public function getTweet(){

        require_once("twitteroauth/autoload.php");
        $twitteruser = Input::get('user');
        $notweets = 500;
        $consumerkey = "j0YHN0vnMoCtcjdnZNsI5EFSU";
        $consumersecret = "uk8Hy3hO5pZKDsDs6BE2ywIeY3HzqPqMV8rmJINNIq5UU3wyAa";
        $accesstoken = "836781110298308609-3OV9XdaL4hbWGkQcBfaMvTZXCUZqWtp";
        $accesstokensecret = "Mp17rRhCybz0wJYdz19OGnM5MdqmqZcZHresqC4JLt8U3";

        function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
            $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
            return $connection;
        }

        $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
        $content = $connection->get("account/verify_credentials");
        $statuses = $connection->get("statuses/user_timeline", ["screen_name" => $twitteruser,"count"=> $notweets]);
        $array = json_decode(json_encode($statuses), true);
        $i=0;
        $tweets=null;
        $data=[0,0,0,0,0,0,0,0,0,0,0,0,
               0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($array as $stat) {
            $date = $stat['created_at'];
            $date = strtotime($date);
            $hr =  date('H', $date);
            $data[intval($hr)]+=1;
            $tweets[$i]=array('tweet'=>$stat['text'],'date'=>date("Y/m/d", $date) ,'time'=>date("H:i:s", $date));
            $i++;
        }
        return array('tweets'=>$tweets,'data'=>$data);
    }
}


