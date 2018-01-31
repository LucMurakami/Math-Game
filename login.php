<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Math Game</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8" />
</head>   
<body>
    <div class="container">
    <div class="row">
        <div class="text-center">
            <h1>Please Login to Enjoy Our Math Game.</h1>
        </div>
    </div>
    <form action="logincheck.php" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="email" class="col-sm-5 text-right">Email:</label>
            <div class="col-sm-3">
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" maxlength="15">
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-5 text-right">Password:</label>
            <div class="col-sm-3">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" maxlength="15">
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <p class='col-sm-4 text-danger'>
                <?php
                if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                } ?>
                
            </p>
        </div>
    </form>
    </div>
</body>
</html>
