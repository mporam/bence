<!DOCTYPE html>
<html>
<head>
    <title>
        <?php
        echo (!empty($data['title']) ? $data['title'] . ' | ': '') . 'Bence Rewards - Powered by Finders Keepers UK';
        ?>
    </title>
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/jquery.circliful.css"/>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700,400|Roboto:300' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.circliful.min.js"></script>
    <script>
        $( document ).ready(function() {

            $("#test-circle").circliful({
                animationStep: 5,
                foregroundBorderWidth: 10,
                backgroundBorderWidth: 10,
                percent: 82,
                foregroundColor: '#9A1A31'
            });

            $("#test-circle-2").circliful({
                animationStep: 5,
                foregroundBorderWidth: 10,
                backgroundBorderWidth: 10,
                percent: 23,
                foregroundColor: '#9A1A31'
            });
        });
    </script>
</head>
<body>
<header>
    <div class="container">
        <div id="logo" class="col-md-6">
            <h1>Bence
                <small>Rewards</small>
            </h1>
        </div>
        <div class="col-md-6">
            <div class="contact">
                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> 078875 98721 <span class="glyphicon glyphicon-envelope"></span> adrian@michelangelo.cat
            </div>
            <div class="action">
                <?php if (empty($data['loggedIn'])) { ?>
                    <a href="/login">Login</a>
                <?php } else { ?>
                    <a href="/account">Account</a>
                    <a href="/logout">Logout</a>
                <?php } ?>
            </div>
        </div>
    </div>
</header>