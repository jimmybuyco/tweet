<?php
namespace App\Http\Controllers;
use Abraham\TwitterOAuth\TwitterOAuth;
use Input;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    //
    public function index(){
        $tweet=null;
        return view('index',['tweet' => $tweet]);
    }

    public function getTweet(){

        require_once("twitteroauth/autoload.php"); //Path to twitteroauth library
//        dd('1');
        $twitteruser = Input::get('user');
//        dd($twitteruser);
        $notweets = 100;
        $consumerkey = "j0YHN0vnMoCtcjdnZNsI5EFSU";
        $consumersecret = "uk8Hy3hO5pZKDsDs6BE2ywIeY3HzqPqMV8rmJINNIq5UU3wyAa";
        $accesstoken = "836781110298308609-3OV9XdaL4hbWGkQcBfaMvTZXCUZqWtp";
        $accesstokensecret = "Mp17rRhCybz0wJYdz19OGnM5MdqmqZcZHresqC4JLt8U3";

        function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
            $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
//            $content = $connection->get("account/verify_credentials");
            return $connection;
        }

        $connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
        $content = $connection->get("account/verify_credentials");
        $statuses = $connection->get("statuses/user_timeline", ["screen_name" => $twitteruser,"count"=> $notweets]);
//        $tweets = $connection->get("statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
//        echo var_dump($statuses);
//        echo json_encode($content);
        $array = json_decode(json_encode($statuses), true);
//        dd($array);
        $i=0;
        $tweets=null;
        foreach ($array as $stat) {
            $tweets[$i]=array('tweet'=>$stat['text'],'time'=>$stat['created_at']);
            $i++;
        }

        return $tweets;

    }


}


