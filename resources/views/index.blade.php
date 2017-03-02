<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery.js"></script>
    <script src="js/Chart.js"></script>
    <title>Tweet</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <!-- Styles -->
    <style>

    </style>
</head>
<body>
<div class="se-pre-con hidden"></div>
<br>
<div class="flex-center position-ref">
    <input type="text" placeholder="tweeter username" id="username">
    <input type="button" onclick="getTweet()"  value="Submit">
</div>
<hr>
<div class="flex-center  row">



        <div id="tweets" class="col-md-8" >


        </div>
        <div id="g" class="col-md-4">

            <canvas id="myChart" width="400" height="400"></canvas>
        </div>



</div>

</body>
</html>

<script src="js/tweet.js"></script>