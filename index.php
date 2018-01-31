<?php session_start();

extract($_POST);

if (!isset($_SESSION['authenticated'])) {
    header('Location: login.php');
    die();
}

$num1 = rand(0, 50);
$num2 = rand(0, 50);

$operators = array('+','-');
$rand_operator = array_rand($operators);
$operator = $operators[$rand_operator];

$_SESSION['attempts'] = ((isset($_SESSION['attempts'])) ? $_SESSION['attempts'] : 0);
$_SESSION['success'] = ((isset($_SESSION['success'])) ? $_SESSION['success'] : 0);

if(isset($answer) && (is_numeric($answer))){
    $_SESSION['attempts']++;
    switch ($sign) {
        case '+':
            $sum = $first_num + $second_num;
            if ($answer == $sum) {
                $_SESSION['success']++;
                $_SESSION['correctmessage'] = "CORRECT!";
            } else {
                $_SESSION['attempterror'] = "Incorrect. " . $first_num . " + " . $second_num . " = " . $sum;
            }
            break;
        case '-': 
            $difference = $first_num - $second_num;
            if ($answer == $difference) {
                $_SESSION['success']++;
                $_SESSION['correctmessage'] = "CORRECT!";
            } else {
                $_SESSION['attempterror'] = "Incorrect. " . $first_num . " - " . $second_num . " = " . $difference;
            break;
            }
    }
} else if (!is_numeric($answer) && (isset($answer))) {
    $_SESSION['attempterror'] = 'Please enter a number for your answer.';
}

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Math Game</title>
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8" />
</head>
<body>
    <div class="container">
        <form action="index.php" method="post" class="form-horizontal">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"><h1>Math Game</h1></div>
                <div class="col-sm-4"><a href="logout.php" class="btn btn-default">Logout</a></div>
            </div>
            <div class="row">
                <label class="col-sm-4"></label>
                <label class="col-sm-1"><?php echo $num1 ?></label>
                <label class="col-sm-1"><?php echo $operator ?></label>
                <label class="col-sm-1"><?php echo $num2 ?></label>
                <div class="col-sm-5"></div>
            </div>
    
            <input type="hidden" name="first_num" value="<?php echo $num1 ?>" />
            <input type="hidden" name="sign" value="<?php echo $operator ?>" />
            <input type="hidden" name="second_num" value="<?php echo $num2 ?>" />
            <input type="hidden" name="total_score" value="<?php echo $_SESSION['attempts'] ?>" />
            <input type="hidden" name="final_score" value="<?php echo $_SESSION['success'] ?>" />
    
            <div class="form-group">
                <div class="col-sm-4"></div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="answer" id="answer" placeholder="Enter an answer">
                </div>
                <div class="col-sm-5"></div>
            </div>
            <div class="row">
                <div class=" col-sm-4"></div>
                <div class="col-sm-3 text-center">
                    <button type="submit" class="btn btn-primary">
                    Submit</button>
                </div>
                <div class="col-sm-5"></div>
            </div>
        </form>
        <hr />
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-danger">
                <?php
                    if (isset($_SESSION['attempterror'])) {
                        echo $_SESSION['attempterror'];
                        unset($_SESSION['attempterror']);
                    }?>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-success">
                <?php 
                    if (isset($_SESSION['correctmessage']))
                    {
                        echo $_SESSION['correctmessage'];
                        unset($_SESSION['correctmessage']);
                    }
                 ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">Score: <?php echo $_SESSION['success'] ?> / <?php echo $_SESSION['attempts'] ?></div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>